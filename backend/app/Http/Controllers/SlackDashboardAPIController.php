<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use stdClass;
use App\Models\Events;
use App\Models\Config;
use App\Models\Channels;
use App\Models\TeamUsers;
use Illuminate\Support\Facades\App;

class SlackDashboardAPIController extends Controller
{
    private $SLACK_TOKEN;
    public function __construct()
    {
        $this->SLACK_TOKEN = env("SLACK_TOKEN");
    }

    // utils
    private function map_messages(stdClass $message)
    {
        Events::updateOrCreate([
            'id'=>isset($message->text)?$message->ts:"none",
            'type'=>"message",
            'subtype'=>isset($message->subtype)?$message->subtype:"none",
            'client_msg_id'=>isset($message->client_msg_id)?$message->client_msg_id:"none",
            'user_id'=>isset($message->user)?$message->user:"none",
            'bot_id'=>isset($message->bot_id)?$message->bot_id:"none",
            'text'=>isset($message->text)?$message->text:"none"
        ]);
        return true;
    }
    private function map_channels(stdClass $message)
    {
        Channels::updateOrCreate([
            'id'=>$message->id,
            'name'=>$message->name,
            'created'=>$message->created,
            'num_members'=>$message->num_members,
        ]);
        return true;
    }
    private function map_users(stdClass $message)
    {
        TeamUsers::updateOrCreate([
            'id'=>$message->id,
            'teamid'=>$message->team_id,
            'name'=>$message->name,
            'deleted'=>$message->deleted,
            'color'=>$message->color,
            'real_name'=>$message->real_name,
            'email'=>isset($message->profile->email)?$message->profile->email:"bot",
            'img_url'=>$message->profile->image_72,
        ]);
        return true;
    }

    // apis
    public function refresh(Request $req)
    {
        echo App::environment();
        if (App::environment() == 'local') return $this->_refresh_local($req);
        if (App::environment() == 'production') return $this->_refresh_prod($req);
    }

    public function getEvents(Request $req)
    {
        return Events::where('subtype','!=','none')->paginate(10, ['*'], 'page',$req->page);
    }
    public function getChannels(Request $req)
    {
        $channels = Channels::all()->toArray();
        return $channels;
    }
    public function getMessages(Request $req)
    {
        return Events::whereSubtype("none")->paginate(10, ['*'], 'page',$req->page);
    }
    public function getFiles(Request $req)
    {

    }

    public function getUsers(Request $req)
    {
        $users = TeamUsers::all()->toArray();
        return $users;
    }


    // local mode
    public function _refresh_local(Request $req)
    {
        // update last scanned timestamp
        Config::where(['term'=>'last_scanned'])->update(['value'=>microtime(true)]);

        ////// Events //////

        $response = json_decode(Http::post('http://localhost?filename=event.json')); //devmode
        if ($response->ok == false) return false;
        // insert messages to db
        array_map([$this,'map_messages'],$response->messages);

        ////// Channels //////

        $response = json_decode(Http::post('http://localhost?filename=channellist.json')); //devmode
        if ($response->ok == false) return false;
        array_map([$this,'map_channels'],$response->channels);

        ////// TeamUsers //////
        $response = json_decode(Http::post('http://localhost?filename=userlist.json')); //devmode
        if ($response->ok == false) return false;
        array_map([$this,'map_users'],$response->members);

        return true;
    }

    // produnction mode
    public function _refresh_prod(Request $req)
    {
        $oldest = Config::where(['term'=>'last_scanned'])->first()->value;

        // update last scanned timestamp
        Config::where(['term'=>'last_scanned'])->update(['value'=>microtime(true)]);

        // Events
        $cursor = 0;
        do {
            //receive data from slack
            $response = json_decode(Http::post('https://slack.com/api/conversations.history', [
                'token' => $this->SLACK_TOKEN,
                'channel' => 'C02MJ2ZSRTL',
                'limit' => 1000, 
                'oldest'=>$oldest,
                'cursor'=>$cursor
            ]));

            // check if the result is ok
            if ($response->ok == false) return false;

            // insert messages to db
            array_map([$this,'map_messages'],$response->messages);
            if (isset($response->response_metadata)) $cursor = $response->response_metadata->next_cursor;
            else $cursor = 0;
        } while ($cursor != 0);

        ////// Channels //////

        $response = json_decode(Http::post('https://slack.com/api/users.list',['token' => $this->SLACK_TOKEN])); //devmode
        if ($response->ok == false) return false;
        array_map([$this,'map_channels'],$response->channels);

        ////// TeamUsers //////
        $response = json_decode(Http::post('https://slack.com/api/conversations.list',['token' => $this->SLACK_TOKEN])); //devmode
        if ($response->ok == false) return false;
        array_map([$this,'map_users'],$response->members);

        return true;
    }

    public function test() {
        echo env('SLACK_TOKEN');
        return "token";
    }
}

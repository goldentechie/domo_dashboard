<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use stdClass;
use App\Models\Events;
use App\Models\Config;
use App\Models\Channels;
use App\Models\TeamUsers;

class SlackAPIController extends Controller
{
    //
    public function refresh(Request $req)
    {
        $response = Http::withOptions(['verify'=>false,'proxy' => 'http://rgs0712:likiseng1207@192.168.91.120:80'])
        ->post('https://slack.com/api/conversations.history', [
            'token' => 'xoxp-2732118217091-2717446413447-2830726595763-61082609021a76c8a5d96892f6525040',
            'channel' => 'C02MJ2ZSRTL',
            'limit' => 1000
        ]);
        
        var_dump($response);
        return $response->json();
    }

    public function getEvents()
    {
        $a = new stdClass;
        $a->a = 'a';
        $a->b = 'b';
        return $a;
    }
    public function getChannels()
    {
        $config = Config::all()->toArray();
        return $config;
    }
    public function getMessages()
    {

    }
    public function getFiles()
    {

    }
}

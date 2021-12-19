<?php

namespace App\Http\Controllers;

use App\Models\Configs;
use App\Models\SlackMessageTemplates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use stdClass;

class SlackAPIController extends Controller
{
    private $TEMPLATE_CLAIM_LEAD;
    private $SIERRA_API_KEY;
    private $SLACK_HOOK_URL;
    public function __construct()
    {
        // $this->TEMPLATE_NEW_LEAD = SlackMessageTemplates::where(["title"=>"CLAIM_LEAD"])->first()->template;
        // $this->SIERRA_API_KEY = Configs::where(["term"=>"sierra_key"])->first()->value;
        // $this->SLACK_HOOK_URL = Configs::where(["term"=>"slack_hook"])->first()->value;
    }

    public function index (Request $req)
    {
        $lead = $this->getLeadData($req->actions[0]->value);
        $agent = $this->getAgentData($req->user->username);

        $result = $this->sendClaimLeadSierra($lead, $agent);
        if (!$result->success) return false;

        $this->sendClaimLeadMessage($this->getMessageTemplate(
            $this->TEMPLATE_CLAIM_LEAD, 
            [
                "LEAD_ID"=>$lead->data->id,
                "LEAD_PRICE"=>$lead->data->searchPreference->minPrice,
                "LEAD_CITY"=>$lead->data->searchPreference->city,
                "LEAD_PICTURE_URL"=>$agent->photo,
                "AGENT_NAME"=>$agent->firstName
            ])
        );
        return true;
    }
    /**
     * get claimed lead's data from sierra with its id
     *
     * @param  string  $id
     * @return mixed 
     */
    private function getLeadData($id)
    {
        return Http::contentType('json')->withHeaders([
            "Sierra-ApiKey"=>$this->SIERRA_API_KEY
        ])->get(env('SIERRA_GET_LEAD_URL').$id)->json();
    }

    /**
     * get claiming agent data from sierra
     *
     * @param  string  $username
     * @return mixed 
     */
    private function getAgentData($username)
    {
        return Http::contentType('json')->withHeaders([
            "Sierra-ApiKey"=>$this->SIERRA_API_KEY
        ])->get(env('SIERRA_GET_AGENT_URL').$username)->json()->data->agents[0];
    }
    
    /**
     * send lead claim to sierra
     *
     * @param  string  $id
     * @param  mixed $lead
     * @param  mixed $agent
     * @return mixed $result
     */
    private function sendClaimLeadSierra($lead, $agent)
    {
        return Http::withBody('{
            "assignedTo":{
              "agentUserId": '.$agent->id.',
              "agentUserEmail": "'.$agent->email.'",
              "agentUserPhone": "'.$agent->directPhone.'",
              "agentUserFirstName": "'.$agent->firstName.'",
              "agentUserLastName": "'.$agent->lastName.'",
              "agentSiteId": -1
            }
          }', 'json')
          ->withHeaders(["Sierra-ApiKey"=>$this->SIERRA_API_KEY])
          ->put(env('SIERRA_PUT_LEAD').$lead->data->id)
          ->json();
    }

    /**
     * send claimed message to slack
     *
     * @param  string  $id
     * @return mixed 
     */
    private function sendClaimLeadMessage($template)
    {
        return Http::contentType('json')->get($this->SLACK_HOOK_URL)->json();
    }

    /**
     * send claimed message to slack
     *
     * @param  string $template
     * @param  array  $args
     * @return string template string
     */
    private function getMessageTemplate($template, $args)
    {
        foreach ($args as $key => $value){
            str_replace($key,$value,$template);
        }
        return $template;
    }
}

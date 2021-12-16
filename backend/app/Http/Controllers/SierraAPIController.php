<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\SlackMessageTemplates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SierraAPIController extends Controller
{
    private $SIERRA_API_KEY;
    private $SLACK_HOOK_URL;
    private $TEMPLATE_NEW_LEAD;
    //
    public function __construct()
    {
        $this->TEMPLATE_NEW_LEAD = SlackMessageTemplates::where(["title"=>"NEW_LEAD"])->first()->template;
        $this->SIERRA_API_KEY = Config::where(["term"=>"sierra_key"])->first()->value;
        $this->SLACK_HOOK_URL = Config::where(["term"=>"slack_hook"])->first()->value;
    }
    public function index (Request $req)
    {
        if ($req->eventType != 'LeadCreated') return;
        $leadData = $this->getLeadData($req->resourceList[0]);
        $this->sendNewLead($leadData);
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
     * send new lead message when sierra triggers a create event
     *
     * @param  mixed lead
     * @return mixed result
     */
    private function sendNewLead($lead)
    {
        return Http::withBody($this->getMessageTemplate(
            $this->TEMPLATE_NEW_LEAD, 
            [
                "LEAD_ID"=>$lead->data->id,
                "LEAD_PRICE"=>$lead->data->searchPreference->minPrice,
                "LEAD_CITY"=>$lead->data->searchPreference->city,
                "LEAD_ID"=>$lead->data->id
            ], 'json')
        )->post($this->SLACK_HOOK_URL)->json();
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

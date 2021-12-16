<?php

namespace Database\Seeders;

use App\Models\SlackMessageTemplates;
use Illuminate\Database\Seeder;

class SlackMessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SlackMessageTemplates::truncate();
        SlackMessageTemplates::create(['title'=>'CLAIM_LEAD',
        'template'=>'{
            "blocks": [
              {
                "type": "section",
                "text": {
                  "type": "mrkdwn",
                  "text": "Last chance guys, #newlead, going once, going twice, #{LEAD_ID}"
                }
              },
              {
                "type": "section",
                "text": {
                  "type": "mrkdwn",
                  "text": "*You have new Contact from*\n<losangeleshomes.com>\n*Price : *${LEAD_PRICE} \n *City : * LEAD_CITY"
                },
                "accessory": {
                  "type": "image",
                  "image_url": "{LEAD_PICTURE_URL}",
                  "alt_text": "computer thumbnail"
                }
              },
              {
                "type": "section",
                "text": {
                  "type": "mrkdwn",
                  "text": "*Stand down everyone, {AGENT_NAME} beat you to it.*"
                }
              }
            ]
          }']);
        SlackMessageTemplates::create(['title'=>'NEW_LEAD',
        'template'=>'{
            "blocks": [
              {
                "type": "section",
                "text": {
                  "type": "mrkdwn",
                  "text": "Last chance guys, #newlead, going once, going twice, #{LEAD_ID}"
                }
              },
              {
                "type": "section",
                "text": {
                  "type": "mrkdwn",
                  "text": "*You have new Contact from*\n<losangeleshomes.com>\n*Price:* \n*City:* {LEAD_CITY}"
                }
              },
              {
                "type": "actions",
                "elements": [
                  {
                    "type": "button",
                    "text": {
                      "type": "plain_text",
                      "text": "Claim this Lead",
                      "emoji": true
                    },
                    "value": "{LEAD_ID}",
                    "action_id": "claim-lead"
                  }
                ]
              }
            ]
          }']);
    }
}

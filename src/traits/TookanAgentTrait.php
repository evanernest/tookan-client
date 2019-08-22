<?php


namespace App\Tookan\Traits;


use App\Tookan\TookanHttp;

trait TookanAgentTrait {

    public function createTookanAgent()
    {
        $response = (new TookanHttp())->createAgent($this);
        if($response['status'] == 200){
            $this->tookan_fleet_id = $response['data']['fleet_id'];
            $this->update();
            session()->flash('success', $response['message']);
        }else{
            session()->flash('tookan-error', $response['message']);
        }

    }

    public function getTookanParameters()
    {
        return [
            "api_ky" => "my key",
            "email"=> $this->email,
            "phone"=> $this->phone,
            "transport_type"=> "1",
            "transport_desc"=> "auto",
            "license"=> "demo",
            "color"=> "blue",
            "timezone"=> "-240",
            "team_id"=> "204920",
            "password"=> "secret",
            "username"=> $this->username,
            "first_name"=> $this->name,
            "last_name"=> $this->name,
            "rule_id"=> 46690,
            "fleet_type" => 1
        ];
    }
}
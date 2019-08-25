<?php


namespace Obiefy\Tookan\Traits;


use Obiefy\Tookan\Tookan;
use Prologue\Alerts\Facades\Alert;

trait HasTookanAgent {

    public function createAgent()
    {
        $tookanResponse = Tookan::addAgent($this->getTookanAgentAttribute());
        if($tookanResponse['status'] == 200)
        {
            $this->tookan_fleet_id = $tookanResponse['data']['fleet_id'];
            Alert::success('Tookan :  ' . $tookanResponse['message'])->flash();
        }else{
            return redirect()->back()
                ->withInput()
                ->withErrors('Tookan error: ' . $tookanResponse['message']);
        }
    }

    public function updateAgent()
    {
        $response = Tookan::editAgent($this->getTookanAgentUpdateAttribute());
        if($response['status'] == 200){
            Alert::success('Tookan :  ' . $response['message'])->flash();
        }else{
            Alert::error('Tookan cannot update agent :  ' . $response['message'])->flash();
        }
    }

    public function block()
    {
        $tookanBlockResponse = Tookan::blockAndUnblockAgent([
            'block_status' => $this->status,
            'fleet_id' => $this->tookan_fleet_id
        ]);
    }
    public function getTookanAgentAttribute()
    {
        return [
            "email" => $this->email,
            "phone" => $this->phone,
            "transport_type" => "1",
            "transport_desc" => "auto",
            "license" => "demo",
            "color" => "blue",
            "timezone" => "-240",
            "team_id" => "204920",
            "password" => "secret",
            "username" => $this->username,
            "first_name" => $this->name,
            "last_name" => $this->name,
            "rule_id" => 46690,
            "fleet_type" => 1
        ];
    }

    public function getTookanAgentUpdateAttribute()
    {
        return array_merge($this->getTookanAgentAttribute(),["fleet_id"=> $this->tookan_fleet_id]);
    }
}
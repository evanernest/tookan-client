<?php


namespace Obiefy\Tookan\Tests;

use Obiefy\Tookan\Tookan;
use Tests\TestCase;

class TookanApiTest extends TestCase {

    /** @test */
    public function it_can_hit_endpoint()
    {
        $data = $this->getValidaAgentData();
        $response = Tookan::addAgent($data);
        $this->assertEquals(201, $response['status']);
    }

    /** @test */
    public function it_returned_validation_error()
    {
        $data = $this->getValidaAgentData();
        $response = Tookan::addAgent($data);
        $this->assertEquals(201, $response['status']);
        $this->assertEquals('This email ID is already registered. Please try with different ID.', $response['message']);
    }

    /** @test */
    public function it_can_create_an_agent()
    {
        $this->withoutExceptionHandling();
        $data = $this->overrideValidAgentData([
            'email' => 'tesasdasdst@gmail.com',
            'username' => 'tesasdsdsttest'
        ]);
        $this->assertTrue(true);
        $response = Tookan::addAgent($data);
        $this->assertEquals(200, $response['status']);
        $this->assertEquals("The Agent '{$data['first_name']}' has been created.", $response['message']);
    }

    protected function getValidaAgentData()
    {
        return [
            "email" => "abc@xyz.com",
            "phone" => "919999999999",
            "transport_type" => "1",
            "transport_desc" => "auto",
            "license" => "demo",
            "color" => "blue",
            "timezone" => "-330",
            "team_id" => "204920",
            "password" => "abcdefg",
            "username" => "username",
            "first_name" => "Decimate",
            "last_name" => "abc"
        ];
    }

    protected function overrideValidAgentData($attributes)
    {
        $data = $this->getValidaAgentData();
        foreach ($attributes as $key => $attribute){
            $data[$key] = $attribute;
        }
        return $data;
    }
}
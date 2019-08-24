<?php

namespace Obiefy\Tookan;
use Obiefy\Tookan\Traits\AgentsOperations;
use Exception;
use GuzzleHttp\Client;

class TookanHttp {

    use AgentsOperations;
    /**
     * @var Client
     */
    public $client;

    /**
     * @var string $key
     * Tookan API KEY
     * this is testing API key, change it to your own API key
     */
    public $key;

    /**
     * TookanHttp constructor.
     */
    public function __construct()
    {
        $this->key = config('services.tookan.key');
        $this->client = $client = new Client(['base_uri' => 'https://api.tookanapp.com/v2/']);
//        $this->register();
    }

//    public function register ()
//    {
//        $points = ['create_agent', 'add_agent'];
//        foreach ($points as $key => $item)
//        {
//            function $item(){
//                return "OK";
//            }
//        }
//
//        function asdsad(){
//                return "OK";
//            }
//    }



    /**
     * @param $endPoint
     * @param $options
     * @return array|mixed
     * @throws Exception
     */
    public function post($endPoint, $options)
    {
        try
        {
            $clientOptions = [
                'form_params' => [
                    'api_key' => $this->key,
                ]
            ];
            if (!empty($options))
            {
                $clientOptions['form_params'] = array_merge($clientOptions['form_params'], $options);
            }
            $response = $this->client->post($endPoint, $clientOptions);
            $result = json_decode($response->getBody(), 1);
            return $result;
        } catch (Exception $exception)
        {
            throw new Exception('Http Client Issue');
        }
    }

    public function validate($response)
    {
        if (in_array($response['status'], [201, 100]))
        {
            return $response;
        }
        // TODO: throw Exception
    }

}
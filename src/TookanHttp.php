<?php

namespace Obiefy\Tookan;
use Guzzle\Http\Client;
class TookanHttp {

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
        $this->key = '536b6481f84a0f1e404e717c1d4225431ae1c4f22ddf7b3f5f1d03';
        $this->client = $client = new Client(['base_uri' => 'https://api.tookanapp.com/v2/']);
    }

    /**
     * @param $endPoint
     * @param $options
     * @return array|mixed
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
            if (!empty($options['form_params']))
            {
                $clientOptions['form_params'] = array_merge($clientOptions['form_params'], $options['form_params']);
            }
            $response = $this->client->post($endPoint, $clientOptions);
            $result = json_decode($response->getBody(), 1);
            return $result;
        } catch (\Exception $exception)
        {
            dd($exception);
            return [];
        }
    }

    public function validate($response)
    {
        if (in_array($response['status'], [201, 100]))
        {
            // its OK
        }
        // TODO: throw Exception
    }

    public function createTask(Order $order)
    {
        $options = [
            'form_params' => $order->getTookanParameters()
        ];
        $response = $this->post('create_task', $options);
        return $this->validate($response);
    }

    public function createAgent(User $user)
    {
        $options = [
            'form_params' => $user->getTookanParameters()
        ];
        $response = $this->post('add_agent', $options);
        return $response;
    }

    public function getTasks($orderID)
    {
        $options = [
            'form_params' => [
                "order_ids" => [
                    "order-{$orderID}"
                ],
                "include_task_history" => 0
            ]
        ];
        $response = $this->post('get_job_details_by_order_id', $options);
        return $this->validate($response);
    }
    public function getTask($taskID)
    {
        $options = [
            'form_params' => [
                "job_id"=> $taskID,
//                "include_task_history" => 0
            ]
        ];
        $response = $this->post('get_task_details', $options);
        return $this->validate($response);
    }
    public function updateTaskStatus($taskID, $attributes)
    {
        $options = [
            'form_params' => [
                "job_id"=> $taskID,
                "job_status" => "7"
            ]
        ];
        $response = $this->post('update_task_status', $options);
        return $this->validate($response);
    }

    public function deleteTask($taskID)
    {
        $options = [
            'form_params' => [
                "job_id"=> $taskID
            ]
        ];
        $response = $this->post('delete_task', $options);
        return $this->validate($response);
    }
}
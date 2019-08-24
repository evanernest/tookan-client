<?php


namespace App\Tookan\Traits;


trait TasksOperation {

    public function createTask(Order $order)
    {
        $options = [
            'form_params' => $order->getTookanParameters()
        ];
        $response = $this->post('create_task', $options);
        return $this->validate($response);
    }



    public function getJobDetailsByOrderId($orderID)
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
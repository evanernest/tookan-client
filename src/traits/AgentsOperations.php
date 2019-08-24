<?php


namespace Obiefy\Tookan\Traits;


trait AgentsOperations {

    /**
     * @param $data
     * @return mixed
     */
    public function addAgent($data)
    {
        return $this->post('add_agent', $data);
    }
}
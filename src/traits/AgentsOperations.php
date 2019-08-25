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

    /**
     * @param $data
     * @return mixed
     */
    public function editAgent($data)
    {
        return $this->post('edit_agent', $data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function blockAndUnblockAgent($data)
    {
        return $this->post('block_and_unblock_agent', $data);
    }
}
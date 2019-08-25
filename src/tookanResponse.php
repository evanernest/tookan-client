<?php


namespace Obiefy\Tookan;


class tookanResponse {
    public $tookan;
    public $status;

    public function __construct($tookan)
    {
        $this->tookan = $tookan;
        return $this;
    }
}
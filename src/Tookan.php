<?php


namespace Obiefy\Tookan;


use Illuminate\Support\Facades\Facade;

class Tookan extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'tookan';
    }
}
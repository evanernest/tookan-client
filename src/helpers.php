<?php

function tookan()
{
    return app('tookan');
}

function create_task(){
    return tookan()->createTask();
}
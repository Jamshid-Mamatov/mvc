<?php

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        require_once(ROOT_PATH.'/app/Views/'.$view.'.php');
    }
}
<?php

namespace Src;

class BaseController
{

    /**
     * @var Database
     */
    public $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Render a view and return it as a string.
     * @param $view
     * @param $data
     * @return false|string
     */
    public function views($view, $data=[], $isString=false){
        if($isString){
            ob_start();
            extract($data);
            if(!@include('views/' . $view . '.php')) throw new Exception("Failed to include ".$view.".php");
            return ob_get_clean();
        }else{
            extract($data);
            include('views/' . $view . '.php');
        }
    }
}
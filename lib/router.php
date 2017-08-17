<?php
namespace lib;
class router
{
    public $controller;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
            $path = $_SERVER['PATH_INFO'];
            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0]))
            {
                $this->controller = strtolower($patharr[0]);
                unset($patharr[0]);
            }
            if(isset($patharr[1]))
            {
                $this->action = strtolower($patharr[1]);
                unset($patharr[1]);
            }else{
                $this->action = 'index';
            }
            if(!empty($patharr))
            {
                $i=2;
                while($i<count($patharr)+2)
                {
                    if (isset($patharr[$i+1]))
                    {
                        $_GET[$patharr[$i]] = $patharr[$i+1];
                    }
                    $i = $i+2;
                }
            }
        } else {
            $this->controller = 'index';
            $this->action = 'index';
        }
    }
}
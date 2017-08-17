<?php

namespace core;
/**
 * 框架引导类
 */
class MyFrame
{
    public static $classNames = array();

    static public function start()
    {
        session_start();
        spl_autoload_register('self::load');
        $route = new \lib\router();
        $action = $route->action;
        $controller = $route->controller;
        $control_file = APP.'/Controller/'.$controller.'.php';
        if(file_exists($control_file))
        {
            $control_path = '\\'.MODULE.'\\'.'Controller'.'\\'.$controller;
            $con = new $control_path();
            $con->$action();
        }else{
            throw new \Exception('Cannot find this Controller');
        }
    }

    /*
     *自动加载类
    */
    static public function load($class)
    {
        $name = str_replace('\\', '/', $class);
        if (!in_array($name, self::$classNames)) {
            if (@file_exists(MYFRAME . $name . '.php')) {
                require_once MYFRAME . $name . '.php';
                self::$classNames[$name] = $name;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
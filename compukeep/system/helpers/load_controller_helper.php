<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('load_controller'))
{
    function load_controller($controller, $method = 'index', $argument=NULL)
    {
        require_once(FCPATH . APPPATH . 'controllers/' . $controller . '.php');

        $controller = new $controller();

        if (isset($argument)) {
        	return $controller->$method($argument);
        }
        else {
        	return $controller->$method();
        }
        
    }
}


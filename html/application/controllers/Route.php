<?php
/**
 * @property class Route
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 24.09.17
 * Time: 21:28
 */

namespace application\controllers;

use application\models;
use application\views;


class Route
{
    static function start()
    {
        /** controller and default action */
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        /** get controller name */
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        /** get action name */
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        if ( !empty($routes[3]) )
        {
            $param = $routes[3];
        }

        $model_name = "models\\".$controller_name;

        $model_file = strtolower($model_name).'.php';
        $model_path = "models/".$model_file;
        if(file_exists($model_path))
        {
            include "models/".$model_file;
        }


        $controller_path = "application\\controllers\\".$controller_name;

        /** creating controller */
        $controller = new $controller_path;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            /** starting controller */
            $controller->$action($param);
        }
        else
        {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location: ../Main/getError');
    }
}
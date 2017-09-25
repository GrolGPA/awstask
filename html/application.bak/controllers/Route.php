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
        // controller and default action
        //$controller_name = 'Main';
        //$action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get controller name
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // get action name
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = "models\\".$controller_name;
//        $controller_name = 'controllers\\'.$controller_name;
        //$action_name = 'action/'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "models/".$model_file;
        if(file_exists($model_path))
        {
            include "models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        //$controller_file = strtolower($controller_name).'.php';
        //$controller_path = "application/controllers/".$controller_file;
//        if(file_exists($controller_path))
//        {
//            include "application/controllers/".$controller_file;
//        }
//        else
//        {
//            /*
//            правильно было бы кинуть здесь исключение,
//            но для упрощения сразу сделаем редирект на страницу 404
//            */
//            Route::ErrorPage404();
//        }

        // создаем контроллер
        echo $controller_name;
//        $controller = new $controller_name;
//        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
//        else
//        {
//            // здесь также разумнее было бы кинуть исключение
//            Route::ErrorPage404();
//        }
//
//    }

//    function ErrorPage404()
//    {
//        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');
    }
}
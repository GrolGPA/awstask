<?php
/**
 * @property class Login
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 15:23
 */

namespace application\controllers;

use application\models;


class Login extends Controller
{


    public function __construct()
    {
        $this ->model = new models\Login();
    }


    /**
     * Calling to the getLogin() function of model Login and storing it value
     */
    public function invoke()
    {
        $result = $this->model->run();


        if (models\Session::get('loggedIn') == true )
        {

            include 'application/views/AfterLogin.php';
        }
        else
        {
            include 'application/views/Login.php';
        }


    }
}
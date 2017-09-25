<?php
/**
 * @property class Main
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 15:11
 */

namespace application\controllers;

use application\models;

class Main extends Controller
{
    public function __construct() {
        parent::__construct();
        models\Session::init();
        $logged = models\Session::get('loggedIn');
        if($logged == false) {
            models\Session::destroy();
           // header('Location: ../Main');
           // include 'application/views/Login.php';
//            exit();
        }
    }


    public function logout() {
        models\Session::destroy();
        header('Location: ../Main');
        //include 'application/views/Login.php';
        //exit();

    }

    /**
     *
     */
    function index()
    {

        $this->view->generate('Diary.php', 'Template.php');

        $login = new Login();
        $login->invoke();
    }

}
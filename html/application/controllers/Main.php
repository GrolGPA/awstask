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
    public function __construct()
    {
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


    /**
     * Logout user and destroy session
     */
    public function logout()
    {
        models\Session::destroy();
        header('Location: ../Main');

    }

    /**
     *
     */
    function addUser()
    {
        $this->view->generate('Registration.php', 'Template.php');
        $registration = new Registration;
        $registration->run();
    }


    /**
     * Generate views and show login form
     */
    function index()
    {

        $this->view->generate('Content.php', 'Template.php');
        if (\application\models\Session::get('loggedIn') == true )
        {
            $diary = new Diary();
            $diary->run();
        }
        $login = new Login();
        $login->invoke();
    }


    function getError()
    {
        echo "ERROR 404";
    }



}
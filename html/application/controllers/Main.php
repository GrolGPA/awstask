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

    /**
     * Main constructor. Init session
     */
    public function __construct() {
        parent::__construct();
        models\Session::init();
        $logged = models\Session::get('loggedIn');
        if($logged == false) {
            models\Session::destroy();
            //header('Location: ../login');
            exit();
        }
    }

    public function logout() {
        models\Session::destroy();
        include 'application/views/Login.php';
        exit();
    }


    /**
     *
     */
    function action_index()
    {
        $this->view->generate('Main.php', 'Template.php');

        //Show login form
        $login = new Login();
        $login->invoke();
    }

}
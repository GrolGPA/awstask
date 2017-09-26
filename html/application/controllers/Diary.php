<?php
/**
 * @property class Diary
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 24.09.17
 * Time: 21:41
 */

namespace application\controllers;

use application\models;

class Diary extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new models\Diary();

    }

    public function vievTasks()
    {


    }


    public function addTask()
    {
        $this->model->addTask();

        //header('Location: ../Main');
    }

}
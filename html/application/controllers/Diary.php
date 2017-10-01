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

    public function getTasks()
    {
       $tasks = $this->model->getData();
       return $tasks;
    }


    /**
     *  Add task to DB
     */
    public function addTask()
    {
        $this->model->addTask();
        //header('Location: ../Main');
    }

    public function run()
    {
        $tasks=self::getTasks();

        include_once ('application/views/Diary.php');

    }

}
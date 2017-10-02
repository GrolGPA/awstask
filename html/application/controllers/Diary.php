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
    private $permis;

    /**
     * Diary constructor.
     */
    function __construct()
    {
        parent::__construct();
        $arigth = new Permissions();
        $this->permis = $arigth->getPermis();
        $this->model = new models\Diary();
    }

    /**
     * Default action of Diary class
     */
    public function run()
    {
        $tasks=self::getTasks();
        include_once ('application/views/Diary.php');
    }

    /**
     * @return array
     */
    public function getTasks()
    {

        /** TESTS */
        print_r($this->permis);
//        echo $this->permis[upload];


       /** Show tasks if user have permission to view */
       if ($this->permis['view'])
       {
           $tasks = $this->model->getData();
           return $tasks;
       }
       else
       {
           echo "You don't have permissions to view diary";
           echo "<br><br><a href=\"/Main\">Back to the diary</a>";
       }
    }


    /**
     *  Add task to DB
     */
    public function addTask()
    {
        if(is_uploaded_file($_FILES['upfile']['tmp_name']))
        {
            if ($this->permis['upload'])
            {
                $this->model->addTask($_FILES);
            }
            else
            {
                echo " You don't have permissions to uploading files";
                echo "<br><br><a href=\"/Main\">Back to the diary</a>";
            }

        }
        else
        {
            $this->model->addTask();
            header("location: /Main");
        }

    }


    /**
     * Make status done
     *
     * @param $task_id
     */
    public function makeDone ($task_id)
    {
        if ($this->permis['done'])
        {
            $this->model->makeDone($task_id);
            header("location: /Main");
        }
        else
        {
            echo "You don't have permissions to make DONE";
            echo "<br><br><a href=\"/Main\">Back to the diary</a>";
        }
    }

    /**
     * Distribute tasks
     *
     * @param $task_id
     */
    public function chgDoer($task_id)
    {

        $chk_perm = $this->permis['distrib'];


        if ($this->permis['distrib'])
        {
            $params = array(
                "taskID" => $task_id,
                "doer" => $_POST['doer']
            );
            $this->model->chgDoer($params);
            header("location: /Main");
        }
        else
        {
            echo "You don't have permission to distribute of tasks!";
            echo $chk_perm;
            echo "<br><br><a href=\"/Main\">Back to the diary</a>";
        }
    }

}
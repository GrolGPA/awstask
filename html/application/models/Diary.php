<?php
/**
 * @property class Diary
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 24.09.17
 * Time: 21:42
 */

namespace application\models;

use application\exceptions;


class Diary extends Model
{

    /**
     * Get all list of tasks
     *
     * @return array
     */
    public function getData()
    {
        $sql = 'SELECT `taskID`, `task`, `category`, `done`, `filePath` FROM `tasks` JOIN `categories` ON tasks.taskDistrib = categories.categoryID';
        $data = parent::getData($sql);
        return $data;
    }


    function addTask()
    {

        $file_path = UpFile::upload($_FILES);

        $sql = "INSERT INTO tasks (`taskDistrib`, `task`, `filePath`) VALUES (:taskDistrib, :task, :filePath)";
        $args = array(
            ":task" => $_POST['task'],
            ":filePath" => $file_path,
            ":taskDistrib" => $_POST['taskDistrib']
        );
        parent::run($sql, $args);

    }

    function makeDone($task_id)
    {
        $sql = "UPDATE `tasks` SET `done` = 'yes' WHERE taskID = :taskID";
        $args = array(
            ":taskID" => $task_id
        );
        parent::run($sql,$args);
    }

    function chgDoer($params)
    {
        $sql = "UPDATE `tasks` SET `taskDistrib` = :doer WHERE taskID = :taskID";
        $args = array(
            ":taskID" => $params['taskID'],
            ":doer" => $params['doer']
        );
        parent::run($sql,$args);
    }


}
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

    function uplFile()
    {
        //uploading file

        if($_FILES["filename"]["size"] > 1024*5*1024)
        {
            throw new exceptions\FileException("File size exceeds 5 megabytes");
        }
        if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
        {

            echo "!!!!";
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную
            move_uploaded_file($_FILES["filename"]["tmp_name"], ".".$_FILES["filename"]["name"]);
        } else {
            echo("Ошибка загрузки файла");

        }



//        $uploaddir = '/var/www/uploads/';
//        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//            echo "Файл корректен и был успешно загружен.\n";
//        } else {
//            echo "Возможная атака с помощью файловой загрузки!\n";
//        }

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);

    }

    function addTask()
    {
        $file = $this->uplFile();

//        $sql = "INSERT INTO tasks (taskDistrib, task, filePath) VALUES (:taskDistrib, :task, :filePathategoryID)";
//        $args = array(
//            ":task" => $_POST['task'],
//            ":filePath" => $_POST['filePath'],
//            ":taskDistrib" => $_POST['taskDistrib']
//        );
//        parent::run($sql, $args);




    }


}
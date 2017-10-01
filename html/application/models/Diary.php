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
        $sql = 'SELECT `task`, `category`, `done`, `filePath` FROM `tasks` JOIN `categories` ON tasks.taskDistrib = categories.categoryID';
        $data = parent::getData($sql);
        return $data;
    }

    function uplFile()
    {
        //uploading file

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);


        //header('Content-Type: text/plain; charset=utf-8');

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FLES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                //throw new exceptions\RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new exceptions\RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new exceptions\RuntimeException('Exceeded filesize limit.');
                default:
                    throw new exceptions\RuntimeException('Unknown errors.');
            }

            // You should also check filesize here.
            if ($_FILES['upfile']['size'] > 1000000) {
                throw new exceptions\RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
//            $finfo = finfo_open(FILEINFO_MIME_TYPE);
//            if (false === $ext = array_search(
//                    $finfo->($_FILES['upfile']['tmp_name']),
//                    array(
//                        'jpg' => 'image/jpeg',
//                        'png' => 'image/png',
//                        'gif' => 'image/gif',
//                    ),
//                    true
//                ))
//                {
//                    throw new exceptions\RuntimeException('Invalid file format.');
//                }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
//            $fpath = sprintf('./uploads/%s.%s',
//                sha1_file($_FILES['upfile']['tmp_name']), "jpg"/** $ext */);
            $fpath = $_FILES['upfile']['tmp_name'];
            if (!move_uploaded_file($_FILES['upfile']['tmp_name'], $fpath))
            {
                throw new exceptions\RuntimeException('Failed to move uploaded file.');
            }

            echo 'File is uploaded successfully.';

        }
        catch (exceptions\RuntimeException $e)
        {

            echo $e->getMessage();

        }
        echo $_FILES['userfile']['error'];
        return $fpath;

//        if($_FILES["filename"]["size"] > 1024*5*1024)
//        {
//            throw new exceptions\FileException("File size exceeds 5 megabytes");
//        }
//        if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
//        {
//
//            // Если файл загружен успешно, перемещаем его
//            // из временной директории в конечную
//            move_uploaded_file($_FILES["filename"]["tmp_name"], ".".$_FILES["filename"]["name"]);
//        } else {
//            echo("Ошибка загрузки файла");
//
//        }




//
//        $uploaddir = '/var/www/uploads/';
//        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//        if(is_uploaded_file($_FILES['userfile']['tmp_name']))
//        {
//            echo "Загрузка удалась";
//        }
//
//        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//            echo "Файл корректен и был успешно загружен.\n";
//        } else {
//            echo "Возможная атака с помощью файловой загрузки!\n";
//        }



    }

    function addTask()
    {
        $fpath = $this->uplFile();

//        $sql = "INSERT INTO tasks (taskDistrib, task, filePath) VALUES (:taskDistrib, :task, :filePathategoryID)";
        $sql = "INSERT INTO tasks (`taskDistrib`, `task`, `filePath`) VALUES (:taskDistrib, :task, :filePath)";
        $args = array(
            ":task" => $_POST['task'],
            ":filePath" => $fpath,
            ":taskDistrib" => $_POST['taskDistrib']
        );
        parent::run($sql, $args);

    }


}
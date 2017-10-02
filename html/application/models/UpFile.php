<?php
/**
 * @property class UpFile
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 02.10.17
 * Time: 5:51
 */

namespace application\models;

use application\exceptions;

class UpFile
{


    function __construct()
    {
    }

    public static function upload($file)
    {
        //uploading file

        echo 'Некоторая отладочная информация:';
        print_r($file);


        //header('Content-Type: text/plain; charset=utf-8');

        try
        {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if
            (
                !isset($file['upfile']['error']) ||
                is_array($file['upfile']['error'])
            )
            {
                //throw new exceptions\RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($file['upfile']['error'])
            {
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
            if ($file['upfile']['size'] > 1000000)
            {
                throw new exceptions\RuntimeException('Exceeded filesize limit.');
            }

                // Check MIME Type
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
                $fpath = $file['upfile']['tmp_name'];
                if (!move_uploaded_file($file['upfile']['tmp_name'], $fpath))
                {
                    throw new exceptions\RuntimeException('Failed to move uploaded file.');
                }

                echo 'File is uploaded successfully.';

            }
        catch (exceptions\RuntimeException $e)
        {

            echo $e->getMessage();

        }
        return $fpath;

    }
}


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

    /**
     * @param array $file
     * @return mixed
     */
    public static function upload($file)
    {

            /** Undefined | Multiple Files | $_FILES Corruption Attack
             If this request falls under any of them, treat it invalid. */
            if(!isset($file['upfile']['error']) || is_array($file['upfile']['error']))
            {
                throw new exceptions\RuntimeException('Invalid parameters.');
            }

            /** Checking $_FILES['upfile']['error'] value. */
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

            /** Сheckштп filesize. Max 5Mb */
            if ($file['upfile']['size'] > 5242880)
            {
                throw new exceptions\RuntimeException('Exceeded filesize limit.');
            }

                /** Checking MIME Type */
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $file['upfile']['tmp_name']);

            if (false === $ext = array_search($mimetype,
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif'),
                    true))
                {
                    throw new exceptions\RuntimeException('Invalid file format.');
                }
                $upfile = $file['upfile']['name'];

                /** Getting name file without file extension and generate file path */
                preg_match("/(.*)\.?(\w{3,4})$/", $upfile, $origname);
                $fpath = sprintf('./uploads/%s%s', $origname[1], $ext);

                if (!move_uploaded_file($file['upfile']['tmp_name'], $fpath))
                {
                    throw new exceptions\RuntimeException('Failed to move uploaded file.');
                }

                echo 'File is uploaded successfully.';

                header("location: ../Main");

        return $fpath;

    }
}


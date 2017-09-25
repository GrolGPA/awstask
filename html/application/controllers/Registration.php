<?php
/**
 * @property Registration
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 25.09.17
 * Time: 17:46
 */

namespace application\controllers;


class Registration
{
    public $model;

    public function __construct()
    {
        $this ->model = new models\Registration();
    }

    public function addUser ()
    {


    }
}
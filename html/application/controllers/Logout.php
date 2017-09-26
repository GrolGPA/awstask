<?php
/**
 * @property ${CLASS_NAME}
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 25.09.17
 * Time: 15:19
 */

namespace application\controllers;


use application\models\Session;

class Logout
{

    public function __construct()
    {

        Session::destroy();

    }
}
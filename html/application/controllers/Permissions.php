<?php
/**
 * @property class Permissions
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 02.10.17
 * Time: 22:27
 */

namespace application\controllers;

use application\models;
use application\exceptions;

class Permissions
{

    /**
     * Function geting permission for the members of family
     *
     * @return array
     */
    public function getPermis()
    {
        $member = intval(models\Session::get('member'));


        if($member=="1")
        {
            $permis = array(
                "view" => true,
                "done" => true,
                "distrib" => true,
                "upload" => false
            );
        }
        elseif($member=="2")
        {
            $permis = array(
                "view" => true,
                "done" => true,
                "distrib" => false,
                "upload" => true
            );
        }
        else
        {
            $permis = array(
                "view" => true,
                "done" => true,
                "distrib" => false,
                "upload" => false
            );
        }
        return $permis;
    }
}
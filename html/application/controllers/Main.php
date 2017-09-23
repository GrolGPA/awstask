<?php
/**
 * @property class Main
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 15:11
 */

namespace application\controllers;


class Main extends Controller
{

    /**
     *
     */
    function action_index()
    {
        $this->view->generate('Main.php', 'Template.php');
    }

}
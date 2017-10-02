<?php

/**
 * @property class View
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 14:19
 */
namespace application\views;

class View
{

    //public $template_view; //

    function generate($content_view, $template_view, $data = null)
    {


        include 'application/views/'.$template_view;

    }

    function genLogForm($auth_view, $template_view)
    {
        include 'application/views/'.$auth_view;
    }

    function genRegForm($auth_view, $template_view)
    {
        include 'application/views/'.$auth_view;
    }

}

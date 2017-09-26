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

    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'application/views/'.$template_view;

    }

    function genRegForm($content_view, $template_view)
    {
        include 'application/views/'.$template_view;
    }

}

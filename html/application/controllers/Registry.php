<?php
/**
 * @property class Registry
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 22.09.17
 * Time: 21:27
 */

namespace application\controllers;

use application\exceptions;


class Registry
{
    /**
     * @var
     */
    protected static $instance;
    /**
     * @var array
     */
    protected $resources = array();


    /**
     * Registry constructor is protected.
     */
    protected function __construct()
    {
    }

    /**
     * Function clone is protected
     */
    protected function __clone()
    {
    }

    /**
     * @return Registry
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }

    /**
     * Function set parametrs to registry. If need replace resource what has already been set, set paranetr "force_refresh" to flag TRUE
     *
     * @param $key
     * @param $value
     * @param bool $force_refresh
     * @throws exceptions\RuntimeException
     */
    public function setResource($key, $value, $force_refresh = false)
    {
        if (!$force_refresh && isset($this->resources[$key])) {
            throw new exceptions\RuntimeException('Resource ' . $key . ' has already been set. If you really '
                . 'need to replace the existing resource, set the $force_refresh '
                . 'flag to true.');
        }
        else {
            $this->resources[$key] = $value;
        }
    }


    /**
     * @param $key
     * @return mixed
     * @throws exceptions\RuntimeException
     */
    public function getResource($key)
    {
        if (!isset($this->resources[$key]))
        {
            throw new exceptions\RuntimeException ('Resource ' . $key . ' not found in the registry');
        }
        else
        {
            return $this->resources[$key];
        }

    }

}
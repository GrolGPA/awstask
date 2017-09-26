<?php
/**
 * @property class Config
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 22.09.17
 * Time: 22:42
 */

namespace application\models;

use application\controllers;
use application\exceptions;

class Config
{
    //protected $configPath =  './application/config/config.json';
    protected $config;

    /**
     * Temp config. Need remove after finish json config loading
     */
    function __construct()
    {
        //Setting parametrs of Database
        $this->config = array(
            'host' => 'db', //value overridden in models/DB.php
            'dbname' => 'local',
            'username' => 'local',
            'password' => 'local');
    }


    /**
     * Function open config file and read path configs to array $config
     *
     * @throws FileException
     * @throws JsonException
     */


    protected function openJson()
    {
        if (!file_exists($this->configPath))
        {
            throw new exceptions\FileException('The configuration file is corrupted or don\'t exist' );
        }
        else
        {
            $json = file_get_contents($this->configPath);
            $this->config = json_decode($json, TRUE);
            if ($error = json_last_error_msg())
            {
                throw new exceptions\JsonException (sprintf("Failed to parse json string '%s', error: '%s'", $this->config, $error));
            }
        }
    }


    public function setRegistry()
    {
        $reg = controllers\Registry::getInstance();
        foreach ($this->config as $key => $value) {
            $reg->setResource($key, $value);
        }
    }





}
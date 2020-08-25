<?php

namespace App\Service;

Use Doctrine\DBAL\Configuration;

class Conexion
{

    var $url = '';

    public function __construct($url)
    {
        $this->url = $url['url'];
    }

    public function getConexion(){

        // configuration parameters
        $config =  new Configuration();

        $connectionParams = array(
             'url' => $this->url,
         );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
         return $conn;
    }
}
?>
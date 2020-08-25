<?php

namespace App\Entity;

class BaseService
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db->getConexion();
    }
}
?>
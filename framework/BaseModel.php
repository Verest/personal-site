<?php 

namespace Framework;

class BaseModel
{
    protected $db = null;

    public function __construct()
    {
        if (DatabaseConnection::$dbConnection) {
            $this->db = clone DatabaseConnection::$dbConnection;    
        }
    }
}
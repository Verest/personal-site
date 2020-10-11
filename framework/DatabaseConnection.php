<?php 

namespace Framework;

use PDO;
use PDOException;

class DatabaseConnection
{
    public static $dbConnection = null;

    public function __construct()
    {
        $env = config('env');
        
        $dbName = $env['DB_Name'] ?? null;
        $dbUser = $env['DB_User'] ?? null;
        $dbPass = $env['DB_Pass'] ?? '';

        if ($dbName && $dbUser) {
            $this->connectToDB($dbName, $dbUser, $dbPass);
        }
    }

    private function connectToDB($dbName, $dbUser, $dbPass)
    {
        try {
            $dbConnection = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$dbConnection = $dbConnection;
        } catch(PDOException $e) {
            //todo: throw custom exception here.
        }
    }
}
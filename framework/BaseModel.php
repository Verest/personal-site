<?php 

namespace Framework;

class BaseModel
{
    protected $db = null;

    protected $table = null;

    public function __construct()
    {
        if (DatabaseConnection::$dbConnection) {
            $this->db = DatabaseConnection::$dbConnection;    
        }
    }

    public function getTable()
    {
        return $this->table;
    }

    public function all()
    {
        if (!$this->db || !$this->table) {
            return false;
        }

        $results = [];
        foreach ($this->db->query("SELECT * FROM $this->table") as $row) {
            $row = array_filter($row, fn($key) => !is_numeric($key), ARRAY_FILTER_USE_KEY);
            $model = new $this;

            // todo: swap these from object properties to a custom wrapper.
            foreach ($row as $columnName => $value) {
                $model->$columnName = $value;
            }

            $results[] = $model;
        }

        return $results;
    }
}
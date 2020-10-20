<?php 

namespace Framework;

class BaseModel
{
    protected $db = null;

    protected $table = null;

    protected $attributes = [];

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

    public function select($fields = '*')
    {
        if (!$this->db || !$this->table) {
            return false;
        }

        $fields = is_array($fields) ? $fields : [$fields];

        $sql = 'SELECT ';
        foreach ($fields as $field) {
            $sql .= "`$field`, ";
        }

        $sql = rtrim($sql, ', ');
        $sql .= " FROM {$this->table}";

        return $this->query($sql);
    }

    public function all()
    {
        if (!$this->db || !$this->table) {
            return false;
        }

        return $this->query("SELECT * FROM $this->table");
    }

    public function query($sql)
    {
        $results = [];
        foreach ($this->db->query($sql) as $row) {
            $results[] = $this->parseRowIntoModel($row);
        }

        return $results;
    }

    private function parseRowIntoModel($row)
    {
        $row = array_filter($row, fn($key) => !is_numeric($key), ARRAY_FILTER_USE_KEY);
        $model = new $this;

        foreach ($row as $columnName => $value) {
            $model->attributes[$columnName] = $value;
        }

        return $model;
    }
}
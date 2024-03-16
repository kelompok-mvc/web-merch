<?php

class Model
{
    protected $database;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    public function __construct()
    {
        $this->database = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if ($this->database->connect_error) {
            die ("Connection failed: " . $this->database->connect_error);
        }
    }

    public function getAll($table)
    {
        $result = $this->database->query("SELECT * FROM $table");

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}
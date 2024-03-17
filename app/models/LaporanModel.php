<?php

class LaporanModel
{
    private $db;
    private $table = 'transaction';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLaporan()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN customer ON transaction.id_customer = customer.id_customer');
        return $this->db->resultSet();
    }    
}

<?php

class AdminModel
{
    private $db;
    private $table = 'admin';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAdmin()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAdminById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_admin = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addAdmin($data)
    {
        $query = "INSERT INTO $this->table (name_admin, username, password, created_at) VALUES (:name_admin, :username, :password, NOW())";

        $this->db->query($query);
        $this->db->bind('name_admin', $data['name_admin']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUser($username, $password)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username AND password = :password');
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        return $this->db->resultSet();
    }

    public function updateAdmin($data)
    {
        $query = "UPDATE $this->table SET name_admin = :name_admin, username = :username, password = :password WHERE id_admin = :id_admin";

        $this->db->query($query);
        $this->db->bind('name_admin', $data['name_admin']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);  
        $this->db->bind('id_admin', $data['id_admin']);      // Menambahkan binding untuk id

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteAdmin($id)
    {
        $query = "DELETE FROM $this->table WHERE id_admin = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

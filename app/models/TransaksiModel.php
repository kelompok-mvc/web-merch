<?php

class TransaksiModel
{
    private $db;
    private $table = 'transaction';
    private $table2 = 'order_detail';
    private $table3 = 'product';
    private $table4 = 'membership';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrderDetail($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' INNER JOIN product ON order_detail.id_product = product.id_product WHERE kode_penjualan = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    public function getAllTransaction()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getAllProduct()
    {
        $this->db->query('SELECT * FROM ' . $this->table3);
        return $this->db->resultSet();
    }
    public function getAllCustomer()
    {
        $this->db->query('SELECT * FROM ' . $this->table4 . ' INNER JOIN customer ON membership.id_membership = customer.id_membership');
        return $this->db->resultSet();
    }

    public function getOrderById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE id_order = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addOrderList($data)
    {
        $query = "INSERT INTO $this->table2 (id_product, qty, kode_penjualan) VALUES (:id_product, :qty, :kode_penjualan)";

        $this->db->query($query);
        $this->db->bind('id_product', $data['id_product']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('kode_penjualan', $data['kode_penjualan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function addTransaction($data)
    {
        $query = "INSERT INTO $this->table (id_admin, kode_penjualan, id_customer, total, transaction_date) VALUES (:id_admin, :kode_penjualan, :id_customer, :total, NOW())";

        $this->db->query($query);        
        $this->db->bind('id_admin', $data['id_admin']);
        $this->db->bind('kode_penjualan', $data['kode_penjualan']);
        $this->db->bind('id_customer', $data['id_customer']);
        $this->db->bind('total', $data['total']);

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

    public function deleteOrder($id)
    {
        $query = "DELETE FROM $this->table2 WHERE id_order = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

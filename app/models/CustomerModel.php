<?php

class CustomerModel
{

  private $table = 'customer';
  private $table2 = 'membership';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllCustomer()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN membership ON customer.id_membership = membership.id_membership');
    return $this->db->resultSet();
  }

  public function getAllMembership()
  {
    $this->db->query('SELECT * FROM ' . $this->table2);
    return $this->db->resultSet();
  }

  public function getCustomerById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN membership ON customer.id_membership = membership.id_membership WHERE id_customer = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function addCustomer($data)
  {
    $query = "INSERT INTO $this->table ( id_membership, name_customer, address) VALUES (:id_membership, :name_customer, :address)";

    $this->db->query($query);
    $this->db->bind('id_membership', $data['id_membership']);
    $this->db->bind('name_customer', $data['name_customer']);
    $this->db->bind('address', $data['address']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateCustomer($data)
  {
    $query = "UPDATE $this->table SET id_membership = :id_membership, name_customer = :name_customer, address = :address WHERE id_customer = :id";

    $this->db->query($query);
    $this->db->bind('name_customer', $data['name_customer']);
    $this->db->bind('id_membership', $data['id_membership']);
    $this->db->bind('address', $data['address']);
    $this->db->bind('id', $data['id']); // Menambahkan binding untuk id

    $this->db->execute();

    return $this->db->rowCount();
  }


  public function deleteCustomer($id)
  {
    $query = "DELETE FROM customer WHERE id_customer = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}

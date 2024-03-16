<?php

class ProductModel
{

  private $table = 'product';
  private $table2 = 'category';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllProduct()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN category ON product.id_category = category.id_category');
    return $this->db->resultSet();
  }

  public function getAllCategory()
  {
    $this->db->query('SELECT * FROM ' . $this->table2);
    return $this->db->resultSet();
  }

  public function getProductById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN category ON product.id_category = category.id_category WHERE id_product = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function addProduct($data)
  {
    $query = "INSERT INTO $this->table (name_product, id_category, description, price, stock) VALUES (:name_product, :id_category, :description, :price, :stock)";

    $this->db->query($query);
    $this->db->bind('name_product', $data['name_product']);
    $this->db->bind('id_category', $data['id_category']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('price', $data['price']);
    $this->db->bind('stock', $data['stock']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateProduct($data)
  {
    $query = "UPDATE $this->table SET name_product = :name_product, id_category = :id_category, description = :description, price = :price, stock = :stock WHERE id_product = :id";

    $this->db->query($query);
    $this->db->bind('name_product', $data['name_product']);
    $this->db->bind('id_category', $data['id_category']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('price', $data['price']);
    $this->db->bind('stock', $data['stock']);
    $this->db->bind('id', $data['id']); // Menambahkan binding untuk id

    $this->db->execute();

    return $this->db->rowCount();
  }


  public function deleteProduct($id)
  {
    $query = "DELETE FROM product WHERE id_product = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}

<?php

class ProductModel
{
  private $table = "product";
  private $db;
  public function __construct()
  {
    $this->db = new Database;
    //data source name
  }

  public function getAllProduct()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultAll();
  }
}

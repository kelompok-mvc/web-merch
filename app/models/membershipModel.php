<?php
class membershipModel
{

  private $table = 'membership';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMembership () { 
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
}

public function getMembershipById($id) {
    $this->db->query("SELECT * FROM " . $this->table . ' WHERE id_membership = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
}
public function addMembership($data) {
  
  $query = "INSERT INTO membership VALUES ('', :type, :discon)";
  $this->db->query($query);
  $this->db->bind('type', $data['type']);
  $this->db->bind('discon', $data['discon']);
  $this->db->execute();

  return $this->db->rowCount();
}

public function updateMembership($data)
{
    $query = "UPDATE membership SET
    type = :type, 
    discon = :discon
    WHERE id_membership = :id";
    $this->db->query($query);
    $this->db->bind('type', $data['type']);
    $this->db->bind('discon', $data['discon']);
    $this->db->bind('id', $data['id']); // Menambahkan binding untuk id
    $this->db->execute();
    
    return $this->db->rowCount();
}


public function deleteMembership($id)
{
  $query = "DELETE FROM membership WHERE id_membership = :id";
  $this->db->query($query);
  $this->db->bind('id', $id);

  $this->db->execute();

  return $this->db->rowCount();
}

}

?>
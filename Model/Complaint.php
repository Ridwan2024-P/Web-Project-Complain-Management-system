<?php
include_once "DB.php";

class Complaint {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->openConnection();
    }

    
    public function getComplaintsByUser($user_id) {
        $sql = "SELECT * FROM complaints WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    
    public function deleteComplaint($id) {
        $sql = "DELETE FROM complaints WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    
}

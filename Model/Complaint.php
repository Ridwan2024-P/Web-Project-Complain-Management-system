<?php
include_once "DB.php";

class Complaint {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->openConnection();
    }

    public function getComplaintsByUser($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM complaints WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getComplaintById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM complaints WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addComplaint($user_id, $title, $description, $status = "Pending") {
        $stmt = $this->conn->prepare("INSERT INTO complaints (user_id, title, description, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $title, $description, $status);
        return $stmt->execute();
    }

    public function updateComplaint($id, $title, $description) {
        $stmt = $this->conn->prepare("UPDATE complaints SET title=?, description=? WHERE id=?");
        $stmt->bind_param("ssi", $title, $description, $id);
        return $stmt->execute();
    }

    public function deleteComplaint($id) {
        $stmt = $this->conn->prepare("DELETE FROM complaints WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

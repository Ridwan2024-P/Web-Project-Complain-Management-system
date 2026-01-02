<?php
class DatabaseConnection {

    function openConnection() {
        $conn = new mysqli("localhost", "root", "", "complaint_system");
        if ($conn->connect_error) {
            die("Database connection failed");
        }
        return $conn;
    }

    function signup($conn, $name, $email, $password, $role) {
        $sql = "INSERT INTO users (name,email,password,role)
                VALUES ('$name','$email','$password','$role')";
        return $conn->query($sql);
    }

    function signin($conn, $email, $password, $role) {
        $sql = "SELECT * FROM users
                WHERE email='$email'
                AND password='$password'
                AND role='$role'";
        return $conn->query($sql);
    }
    function getAllUser($conn) {
        $sql = "SELECT * FROM users"; 
        return $conn->query($sql);
    }
    function deleteUser($conn, $id) {
        $sql = "DELETE FROM users WHERE id='$id'";
        return $conn->query($sql);
    }
      function getAllComplaints($conn) {
        $sql = "SELECT * FROM complaints"; 
        return $conn->query($sql);
    }
function updateUser($conn, $id, $name, $email, $role) {
        $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id='$id'";
        return $conn->query($sql);
    }
    function updateComplaintStatus($conn, $id, $status) {
        $sql = "UPDATE complaints SET status='$status' WHERE id='$id'";
        return $conn->query($sql);
    }
}

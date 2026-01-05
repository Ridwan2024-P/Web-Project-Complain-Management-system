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
     function getUserByEmail($conn, $email) {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Update user profile
  public function updateProfile($conn, $id, $name, $email, $password = null) {

    if (!empty($password)) {
       
        $sql = "UPDATE users SET name=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $password, $id);

    } else {
        
        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);
    }

    return $stmt->execute();
}



    
    
    
}

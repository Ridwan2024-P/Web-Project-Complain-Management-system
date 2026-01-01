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
}

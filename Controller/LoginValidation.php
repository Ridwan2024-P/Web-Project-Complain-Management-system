<?php
session_start();
include "../Model/DB.php";

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$role = $_POST["type"] ?? "";

$errors = [];

if (!$email) $errors["email"] = "Email required";
if (!$password) $errors["password"] = "Password required";
if (!$role) $errors["type"] = "Select role";

if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    $_SESSION["previousValues"] = $_POST;
    header("Location: ../View/login.php");
    exit;
}

$db = new DatabaseConnection();
$conn = $db->openConnection();

$result = $db->signin($conn, $email, $password, $role);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    $_SESSION["isLoggedIn"] = true;
    $_SESSION["name"] = $user["name"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["role"] = $user["role"];

    header("Location: ../View/Admin/adminDashboard.php");
} else {
    $_SESSION["loginErr"] = "Email or Password incorrect";
    header("Location: ../View/login.php");
}

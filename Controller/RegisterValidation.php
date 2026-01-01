<?php
session_start();
include "../Model/DB.php";

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$role = $_POST["type"] ?? "";

$errors = [];

if (!$name) $errors["name"] = "Name required";
if (!$email) $errors["email"] = "Email required";
if (!$password) $errors["password"] = "Password required";
if (!$role) $errors["type"] = "Select role";

if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("Location: ../View/register.php");
    exit;
}

$db = new DatabaseConnection();
$conn = $db->openConnection();

$db->signup($conn, $name, $email, $password, $role);
$_SESSION["successMsg"] = "Account created successfully. Please login.";

header("Location: ../View/login.php");

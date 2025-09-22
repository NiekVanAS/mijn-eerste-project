<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!isset ($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['country'], $_POST['city'], $_POST['house_number'], $_POST['zipcode'])) {
        die('Please fill all required fields!');
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $house_number = $_POST['house_number'];
    $zipcode = $_POST['zipcode'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    if ($password !== $confirm_password) {
        header("Location: register.php?error=password_mismatch");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Addresses (country, city, street, house_number, zipcode) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$country, $city, $street, $house_number, $zipcode]);
    $address_id = $conn->lastInsertId();

    if($is_admin == 1 && isset($_SESSION['admin_id'])) {
        $stmt = $conn->prepare("INSERT INTO Administrators (start_date) VALUES (NOW())");
        $stmt->execute();
        $admin_id = $conn->lastInsertId();
    }
    else {
        $admin_id = null;
        $stmt = $conn->prepare("INSERT INTO Customers (creation_date) VALUES (NOW())");
        $stmt->execute();
        $customer_id = $conn->lastInsertId();

    }
    $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, password, address_id, admin_id, customer_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $email, $hashed_password, $address_id, $admin_id, $customer_id]);

    header("Location: login.php?success=registered");
    exit();
}
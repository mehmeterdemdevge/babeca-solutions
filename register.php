<?php
require_once 'UserRegistration.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userRegistration = new UserRegistration('users.txt');
    $userRegistration->registerUser($email, $password);

    echo "Registration successful! Welcome, $email.";
}
?>

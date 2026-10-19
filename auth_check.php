<?php
// config/auth_check.php - Protects pages requiring authentication
require_once __DIR__ . "/config.php";


if (!isset($_SESSION['user_id'])) {
    $errors[] = "You are not logged in";
    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit();
}

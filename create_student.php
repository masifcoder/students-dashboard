<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/db.php";


$errors = [];
if ($_SERVER['REQUEST_METHOD']  == "POST") {


    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $roll_number = trim($_POST['roll_number']);
    $class = trim($_POST['class']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $status = trim($_POST['status']);


    // email and password fields are requried
    if (
        empty($first_name) || empty($last_name) || empty($email)
        || empty($phone) || empty($roll_number) || empty($class)
        || empty($gender) || empty($dob) || empty($status)
    ) {
        $errors[] = "All fields are required";
    }

    // validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $errors[] = "Email address is incorrect";
    }

    // errors then return back to form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: student-create.php");
        exit;
    }

    // create student record in students info table 
    $stmt = mysqli_prepare($conn, "INSERT INTO students_info (first_name, last_name, email, phone) VALUES(?, ?, ?, ?) ");
    mysqli_stmt_bind_param($stmt, 'ssss', $first_name, $last_name, $email, $phone);
    mysqli_stmt_execute($stmt);

    $student_id = mysqli_insert_id($conn);

    $stmt2 = mysqli_prepare($conn, "INSERT INTO students_academics (student_id, roll_number, class, gender, dob, status) VALUES(?, ?, ?, ?,?,?) ");
    mysqli_stmt_bind_param($stmt2, 'isssss', $student_id, $roll_number, $class, $gender, $dob, $status);
    mysqli_stmt_execute($stmt2);


    $_SESSION['success'] = "Student record created successfully";
    header("Location: student-create.php");
    exit;
}

<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/db.php";
require_once __DIR__ . "/auth_check.php";


$errors = [];
if ($_SERVER['REQUEST_METHOD']  == "POST") {


    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;

    $student_id = $_POST['student_id'];
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
        empty($first_name) || empty($first_name) || empty($last_name) || empty($email)
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
        header("Location: student-edit.php");
        exit;
    }

    //UPDATE `students_info` SET `first_name` = 'ali', `last_name` = 'Alvarado', `email` = 'mysulfypub@mailinator.com' WHERE `students_info`.`student_id` = 3;

    // update student record
    $stmt = mysqli_prepare($conn, "UPDATE `students_info` SET `first_name` = ?, `last_name` = ?, `email` = ?, `phone` = ? WHERE `student_id` = ?");
    mysqli_stmt_bind_param($stmt, 'ssssi', $first_name, $last_name, $email, $phone, $student_id);
    mysqli_stmt_execute($stmt);

    $stmt2 = mysqli_prepare($conn, "UPDATE `students_academics` SET `roll_number` = ?, `class` = ?, `gender` = ?, `dob` = ?, `status` = ? WHERE `student_id` = ?;");
    mysqli_stmt_bind_param($stmt2, 'sssssi', $roll_number, $class, $gender, $dob, $status, $student_id);
    mysqli_stmt_execute($stmt2);

    $_SESSION['success'] = "Student record updated successfully";
    header("Location: students.php");
    exit;
}

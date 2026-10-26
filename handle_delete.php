<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/db.php";
require_once __DIR__ . "/auth_check.php";


$errors = [];

$student_id = $_GET['id'];

// email and password fields are requried
if (empty($student_id)) {
    $errors[] = "student id is required";
}


// errors then return back to form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: students.php");
    exit;
}

// check this id has registered student
// cehck email is already used or not ?
$stmt = mysqli_prepare($conn, "SELECT * FROM students_info WHERE student_id = ?");
mysqli_stmt_bind_param($stmt, 'i', $student_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) == 0) {
    $errors[] = "Student not found";
    $_SESSION['errors'] = $errors;
    header("Location: students.php");
    exit;
}

// student found and delete from both tables

$stmt2 = mysqli_prepare($conn, "DELETE FROM students_info WHERE student_id=? ");
mysqli_stmt_bind_param($stmt2, 'i', $student_id);
mysqli_stmt_execute($stmt2);

$stmt3 = mysqli_prepare($conn, "DELETE FROM students_academics WHERE student_id=? ");
mysqli_stmt_bind_param($stmt3, 'i', $student_id);
mysqli_stmt_execute($stmt3);


$_SESSION['success'] = "Student deleted successfully";
header("Location: students.php");
exit;

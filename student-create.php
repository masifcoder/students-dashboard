<?php
require_once __DIR__ . "/config.php";

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$sucess = $_SESSION['success'] ?? null;
unset($_SESSION['success']);


// echo "<pre>";
// print_r($errors);
// echo "</pre>";
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="app-container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <a href="dashboard.html" class="sidebar-brand">
                <i class="bi bi-mortarboard-fill fs-3 text-primary"></i>
                <span>EduClass</span>
            </a>

            <ul class="sidebar-menu">
                <li class="nav-label">Main Menu</li>
                <li>
                    <a href="dashboard.html" class="nav-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="students.html" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="student-create.html" class="nav-link active">
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Add Student</span>
                    </a>
                </li>

                <li class="nav-label mt-3">Administration</li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="bi bi-calendar3"></i>
                        <span>Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="bi bi-journal-check"></i>
                        <span>Examinations</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-user">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&crop=faces" class="avatar-sm" alt="Teacher">
                <div class="flex-grow-1 overflow-hidden">
                    <h6 class="mb-0 text-truncate fs-6 fw-semibold">Sarah Jenkins</h6>
                    <small class="text-muted text-truncate d-block">Class Teacher</small>
                </div>
                <a href="login.html" class="text-danger p-1" title="Log Out">
                    <i class="bi bi-box-arrow-right fs-5"></i>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="main-wrapper">
            <!-- Top Header Navbar -->
            <header class="top-navbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-light d-lg-none p-2 border" id="sidebarToggle">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="dashboard.html" class="text-decoration-none text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="students.html" class="text-decoration-none text-muted">Students</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="students.html" class="btn btn-sm btn-outline-secondary d-none d-sm-inline-flex align-items-center gap-1">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </header>

            <!-- Form Body -->
            <main class="content-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-9">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <h4 class="fw-bold mb-1">Create Student Profile</h4>
                                <p class="text-muted small mb-0">Fill in the fields below to enroll a new student in your class</p>
                            </div>
                        </div>

                        <?php if (!empty($errors)) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error) { ?>
                                        <li><?= $error ?></li>
                                    <?php } ?>
                                </ul>

                            </div>

                        <?php } ?>

                        <?php if ($sucess) { ?>
                            <div class="alert alert-success">
                                <?php echo $sucess ?>
                            </div>
                        <?php } ?>

                        <form action="create_student.php" method="POST">
                            <!-- Basic Information Card -->
                            <div class="card-custom mb-4">
                                <div class="card-header">
                                    <span class="text-dark fw-bold"><i class="bi bi-person me-2 text-primary"></i>Personal Information</span>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label for="firstName" class="form-label small fw-semibold text-secondary">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="e.g. Liam">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="lastName" class="form-label small fw-semibold text-secondary">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="e.g. Vance" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="studentEmail" class="form-label small fw-semibold text-secondary">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="studentEmail" placeholder="e.g. liam.v@school.edu" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="phone" class="form-label small fw-semibold text-secondary">Phone Number</label>
                                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="+1 (555) 000-0000">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Academic Info Card -->
                            <div class="card-custom mb-4">
                                <div class="card-header">
                                    <span class="text-dark fw-bold"><i class="bi bi-mortarboard me-2 text-primary"></i>Academic & Class Details</span>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label for="rollNumber" class="form-label small fw-semibold text-secondary">Roll Number</label>
                                            <input type="text" name="roll_number" class="form-control" id="rollNumber" placeholder="e.g. 1028" required>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="studentClass" class="form-label small fw-semibold text-secondary">Class / Grade</label>
                                            <select name="class" class="form-select" id="studentClass" required>
                                                <option value="" selected disabled>Select Class</option>
                                                <option value="10-A">Grade 10-A</option>
                                                <option value="10-B">Grade 10-B</option>
                                                <option value="11-A">Grade 11-A</option>
                                                <option value="11-B">Grade 11-B</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="gender" class="form-label small fw-semibold text-secondary">Gender</label>
                                            <select name="gender" class="form-select" id="gender">
                                                <option value="" selected disabled>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="dob" class="form-label small fw-semibold text-secondary">Date of Birth</label>
                                            <input name="dob" type="date" class="form-control" id="dob">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="status" class="form-label small fw-semibold text-secondary">Enrollment Status</label>
                                            <select name="status" class="form-select" id="status">
                                                <option value="active" selected>Active</option>
                                                <option value="pending">Pending</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex align-items-center justify-content-end gap-2 mb-5">
                                <a href="students.html" class="btn btn-light border px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4 d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-check-lg"></i>
                                    <span>Save Student</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>
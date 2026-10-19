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
    <title>Register - Student Dashboard</title>
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

    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="text-center mb-4">
                <div class="auth-brand mx-auto">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <h4 class="fw-bold mb-1">Create Account</h4>
                <p class="text-muted small">Set up teacher / staff dashboard access</p>
            </div>

            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li><?=  $error ?></li>
                        <?php } ?>
                    </ul>

                </div>

            <?php } ?>

            <?php if ($sucess) { ?>
                <div class="alert alert-success">
                    <?php echo $sucess ?>
                </div>
            <?php } ?>

            <form action="handle_register.php" method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label small fw-semibold text-secondary">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" class="form-control border-start-0 ps-0" id="fullname" placeholder="Prof. Jane Doe" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                        <input type="text" name="email" class="form-control border-start-0 ps-0" id="email" placeholder="jane.doe@school.edu" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-semibold text-secondary">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control border-start-0 ps-0" id="password" placeholder="At least 8 characters" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label small fw-semibold text-secondary">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-shield-check"></i></span>
                        <input type="password" name="confirm_password" class="form-control border-start-0 ps-0" id="confirmPassword" placeholder="Repeat password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-arrow-right-circle"></i> Create Account
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="small text-muted mb-0">Already have an account? <a href="login.php" class="fw-semibold text-primary text-decoration-none">Sign In</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
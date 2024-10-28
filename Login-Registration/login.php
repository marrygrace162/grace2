<?php 
session_start();

if (isset($_SESSION['auth_user']))
 {
    // If already logged in, redirect to dashboard
    $_SESSION['status'] = "You are already logged in.";
    header("Location: dashboard.php");
    exit(0);
}

$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5" style="background: #f8f9fa; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                
                <!-- Display status message if exists -->
                <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= htmlspecialchars($_SESSION['status']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                
                <!-- Login Card -->
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Login to Your Account</h3>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Login Form -->
                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="login_now_btn" class="btn btn-primary btn-lg">Login Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <small>Don't have an account? <a href="register.php" class="text-primary">Register here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

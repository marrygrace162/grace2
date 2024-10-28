<?php 
$page_title = "Home Page";
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Hero Section -->
<div class="hero" style="background: linear-gradient(to bottom right, #ff7e9b, #ff1493); height: 100vh; position: relative; color: #fff;"> <!-- Adjusted Gradient Colors -->
    <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);"></div>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center position-relative">
        <h1 class="display-4 fw-bold">Welcome to Our System</h1>
        <h5 class="mt-3">Login and Registration System in PHP</h5>
        <h6>With Email Verification</h6>
        <div class="mt-4">
            <a href="login.php" class="btn btn-light btn-lg mx-2">Login</a>
            <a href="register.php" class="btn btn-outline-light btn-lg mx-2">Register</a>
        </div>
    </div>
</div>

<!-- Benefits Section -->
<div class="py-5" style="background: linear-gradient(to right, #ff8daA, #ff4081);"> <!-- Adjusted Gradient Colors -->
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-4">Why Choose Us?</h2>
                <p class="lead">Our application is designed with security and ease of use in mind. Here are some of the benefits:</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h5 class="card-title">Secure Login</h5>
                        <p class="card-text">Access your account safely with our secure authentication system.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h5 class="card-title">Easy Registration</h5>
                        <p class="card-text">Sign up quickly with our simple and intuitive registration process.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h5 class="card-title">Email Verification</h5>
                        <p class="card-text">Receive verification emails to ensure your account's safety.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
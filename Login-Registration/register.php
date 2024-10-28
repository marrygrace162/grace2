<?php
session_start();

$page_title = "Registration Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5" style="background: linear-gradient(to right, #ffb6c1, #ff69b4); min-height: 100vh;"> <!-- Updated to Light Pink Gradient -->
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card shadow-lg rounded-lg border-0">
                    <div class="card-header text-center" style="background: linear-gradient(to right, #ff4081, #ff69b4); color: white;">
                        <h3>Register Your Account</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #ff69b4; color: white;"><i class="fas fa-user"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required style="border-radius: 30px;"/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #ff69b4; color: white;"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required style="border-radius: 30px;"/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #ff69b4; color: white;"><i class="fas fa-envelope"></i></span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required style="border-radius: 30px;"/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #ff69b4; color: white;"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required style="border-radius: 30px;"/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #ff69b4; color: white;"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm your password" required style="border-radius: 30px;"/>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="register_btn" class="btn btn-danger btn-lg" style="border-radius: 30px; transition: 0.3s;">Register Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <small>Already have an account? <a href="login.php" class="text-primary">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
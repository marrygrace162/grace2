<?php 
session_start();
include('authentication.php'); // Ensure this file handles session initiation and user authentication
include('db.php');

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');

// Check if the user is logged in
if (!isset($_SESSION['auth_user'])) {
    // Redirect to login page or show an error
    header("Location: login.php");
    exit();
}

$user = $_SESSION['auth_user']; // Fetch user data from session

?>

<div class="py-5" style="background: linear-gradient(to right, #ff7e7e, #ffb3b3); min-height: 100vh;"> <!-- Light Pink Gradient Background -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- User Information Card -->
                <div class="card shadow-lg rounded-lg mb-4 border-0">
                    <div class="card-header text-center" style="background: linear-gradient(to right, #ff4d94, #ff99cc); color: white;"> <!-- Darker Pink Gradient Header -->
                        <h3><i class="fas fa-user-shield me-2"></i> Access Details</h3>
                    </div>
                    <div class="card-body" style="background-color: #fff;">
                        <h4 class="text-center"><i class="fas fa-lock me-2"></i> You are logged in securely!</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <h5><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></h5>
                            </div>
                            <div class="col-md-6 text-center">
                                <h5><strong>Email ID:</strong> <?= htmlspecialchars($user['email']); ?></h5>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 text-center">
                                <h5><strong>Phone No.:</strong> <?= htmlspecialchars($user['phone']); ?></h5>
                            </div>
                            <div class="col-md-6 text-center">
                                <h5><strong>Logged In At:</strong> <?= date('Y-m-d H:i:s'); ?></h5>
                            </div>
                        </div>
                    </div>

                    <!-- Display Status Message -->
                    <?php if (isset($_SESSION['status'])): ?>
                        <div class="alert alert-success alert-dismissible fade show mx-3 my-3" role="alert">
                            <strong>Success!</strong> <?= htmlspecialchars($_SESSION['status']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['status']); ?>
                    <?php endif; ?>
                </div>

                <!-- Welcome Message Section -->
                <div class="card shadow-lg rounded-lg mb-4 border-0">
                    <div class="card-body text-center" style="background-color: #ffebee;"> <!-- Very Light Pink Background -->
                        <h4 class="mb-4 text-danger"><i class="fas fa-user-circle me-2"></i> Welcome, <?= htmlspecialchars($user['username']); ?>!</h4>
                        <p class="lead"><i class="fas fa-envelope me-2"></i> Email: <?= htmlspecialchars($user['email']); ?></p>

                        <!-- Profile and Settings Buttons -->
                        <div class="row text-center mt-4">
                            <div class="col-md-6">
                                <a href="profile.php" class="btn btn-outline-danger btn-lg rounded-pill"><i class="fas fa-user me-2"></i> Profile</a> <!-- Red Button -->
                            </div>
                            <div class="col-md-6">
                                <a href="settings.php" class="btn btn-outline-danger btn-lg rounded-pill"><i class="fas fa-cog me-2"></i> Settings</a> <!-- Red Button -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
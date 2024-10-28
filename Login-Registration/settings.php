<?php 
session_start();
$page_title = "Settings";
include('includes/header.php');
include('includes/navbar.php');

// Sample User Data (In a real scenario, this would be fetched from the database)
$user_username = ""; // Empty username field
$user_email = ""; // Empty email field
$dark_mode_enabled = false; // Sample dark mode preference

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update Username
    if (isset($_POST['update_username'])) {
        $user_username = $_POST['username'];
        // Update username logic here
        $_SESSION['status'] = "Username updated successfully!";
    }

    // Update Email
    if (isset($_POST['update_email'])) {
        $user_email = $_POST['email'];
        // Update email logic here
        $_SESSION['status'] = "Email updated successfully!";
    }

    // Update Password
    if (isset($_POST['update_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            // Update password logic here
            $_SESSION['status'] = "Password updated successfully!";
        } else {
            $_SESSION['status'] = "Passwords do not match!";
        }
    }

    // Update Dark Mode Preference
    if (isset($_POST['update_dark_mode'])) {
        $dark_mode_enabled = isset($_POST['dark_mode']) ? true : false;
        // Update dark mode preference logic here
        $_SESSION['status'] = "Dark mode preference updated!";
    }

    header("Location: settings.php");
    exit();
}

// Skip button functionality to redirect back to dashboard or another page
if (isset($_POST['skip'])) {
    header("Location: dashboard.php"); // Change 'dashboard.php' to any other target page
    exit();
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-user-cog me-2"></i> Account Settings</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo "<div class='alert alert-success text-center'>".$_SESSION['status']."</div>";
                        unset($_SESSION['status']);
                    }
                    ?>
                    
                    <form action="settings.php" method="POST">
                        <!-- Update Username -->
                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="" required>
                            <div class="text-end mt-2">
                                <button type="submit" name="update_username" class="btn btn-primary">Update Username</button>
                            </div>
                        </div>

                        <hr>

                        <!-- Update Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" value="" required>
                            <div class="text-end mt-2">
                                <button type="submit" name="update_email" class="btn btn-primary">Update Email</button>
                            </div>
                        </div>

                        <hr>

                        <!-- Change Password -->
                        <div class="mb-4">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                            
                            <label for="confirm_password" class="form-label mt-3">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            <div class="text-end mt-2">
                                <button type="submit" name="update_password" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>

                        <hr>

                        <!-- Dark Mode Preference -->
                        <div class="mb-4">
                            <label for="dark_mode" class="form-label">Dark Mode</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="dark_mode" id="dark_mode" <?php echo $dark_mode_enabled ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="dark_mode">Enable Dark Mode</label>
                            </div>
                            <div class="text-end mt-2">
                                <button type="submit" name="update_dark_mode" class="btn btn-primary">Save Preference</button>
                            </div>
                        </div>

                        <hr>

                        <!-- Skip Button -->
                        <div class="text-center">
                            <button type="submit" name="skip" class="btn btn-secondary">Skip</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

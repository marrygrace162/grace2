<?php 
session_start();
$page_title = "Profile";
include('includes/header.php');
include('includes/navbar.php');

// Sample User Data (In a real scenario, this would be fetched from the database)
$user_name = "";
$user_email = "";
$user_phone = "";
$user_profile_pic = "path/to/profile-pic.jpg"; // Replace with actual path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Here you would normally validate and update user data in the database
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];

    // Handle file upload (example logic)
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $uploads_dir = 'uploads/'; // Make sure this directory exists and is writable
        $tmp_name = $_FILES['profile_pic']['tmp_name'];
        $name = basename($_FILES['profile_pic']['name']);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $user_profile_pic = "$uploads_dir/$name"; // Update the profile picture path
    }

    // Normally you'd also add code here to update this information in your database
    $_SESSION['status'] = "Profile updated successfully!";
    header("Location: profile.php");
    exit();
}
?>

<div class="py-5" style="background: #f8f9fa; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h3><i class="fas fa-user-circle me-2"></i> Your Profile</h3>
                    </div>
                    <div class="card-body p-5">
                        <?php
                        if(isset($_SESSION['status'])) {
                            echo "<div class='alert alert-success'>".$_SESSION['status']."</div>";
                            unset($_SESSION['status']);
                        }
                        ?>
                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $user_name; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_email; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $user_phone; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="profile_pic">Profile Picture</label>
                                <input type="file" id="profile_pic" name="profile_pic" class="form-control-file">
                                <small class="form-text text-muted">Upload a new profile picture (optional).</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                        <hr>
                        <h5>Current Profile Picture:</h5>
                        <img src="<?php echo $user_profile_pic; ?>" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

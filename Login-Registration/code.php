<?php
session_start();
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)

{
    
    $mail = new PHPMailer(true);

    
    //Server settings
      //  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Disable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = ('capesosmarrygrace162@gmail.com');                     //SMTP username
        $mail->Password   = ('dcib knxx zlgz xqcl');                                 //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
        $mail->setFrom('capesosmarrygrace162@gmail.com', 'Grace');  // Fixed this line
        $mail->addAddress($email, $name);     // Fixed this line (removed incorrect 'address:' and 'name:')

    //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Grace';
        $email_template = "
                <h1>You have Registered with Grace</h1>
                <h5>Verify your Email address to Login with the link below:</h5>   
                <br><a href='http://localhost/capesos/Login-Registration/verify_email.php?token=$verify_token'>Click here to verify</a> 
            ";

        $mail->Body    = $email_template;   // Fixed this line to use correct variable name
        $mail->AltBody = 'Verify email address to complete the registration';

        $mail->send();
        echo 'Message has been sent';
  
}

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());
    
   
    // Check if email exists
    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email Id already Exists.";
        header("Location: register.php");
        exit();
    } else {
        // Insert user data
        $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name','$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            sendemail_verify($name, $email, $verify_token);
            $_SESSION['status'] = "Registration Successful. Please Verify your Email Address.";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION['status'] = "Registration failed";
            header("Location: register.php");
            exit();
        }
    }
}
?>

<?php
session_start();
include('dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)

{
    
    $mail = new PHPMailer(true);

    try {
    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = ('capesosmarrygrace162@gmail.com');                     //SMTP username
        $mail->Password   = ('dcib knxx zlgz xqcl');                                 //SMTP password
        $mail->SMTPSecure = ssl;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
        $mail->setFrom(address: getenv(name:'SMTP_USERNAME'), name: Mailer);
        $mail->addAddress(address: $email, name: $name);     //Add a recipient
       
    
    //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Grace';
        $email_template = "
                <h1>You have Registered with Grace</h1>
                <h5>Verify your Email address to Login with the link bellow:</h5>
                <br><a> href= 'http://localhost/capesos/Login-Registration/verify_email.php?token=$verify_token'>Click here to verify</a>
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
}       catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Failed to send email verification.';
    }
}

if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    $check_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0 ){
            $_SESSION['status'] = "Email Id already Exists.";
            header("Location: register.php");
            exit();
    } else {
        $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name','$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);// Fixed Function call

        if ($query_run){
            sendemail_verify($name, $phone, $email, $verify_token);
            $_SESSION['status'] = "Registration successfull please verify your Email Address.";
            header("Location: register.php");
            exit();
        }else{
            $_SESSION['status'] = "Registration  failed";
            header("Location: register.php");
            exit();
         }
    }
    

}
?>
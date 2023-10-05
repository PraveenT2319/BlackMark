
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";


// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  
  
  $mail = new PHPMailer(true);

  try {
    // Configure the SMTP settings
    $mail->isSMTP();
    $mail->Host ='';
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Your Gmail email address
    $mail->Password = ''; // Your Gmail password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Set the sender and recipient
    $mail->setFrom('',$name);
    $mail->addAddress(''); // Recipient email address

    // Set email content
    $mail->isHTML(true);
    $mail->Subject = $comments;
    $mail->Body = "<h3>Message from $name &nbsp; ($email)</h3><p>First Name : $name &nbsp;<br>Phone :  $phone<br></p><p>Message : $message</p>";
 

    // Send the email
    $mail->send();

    echo 'Email sent successfully!';
  } catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";

  }
}



?>
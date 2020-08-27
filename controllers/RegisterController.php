<?php

namespace app\controllers;

use app\db\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ . '/../db/Database.php';
$config=require_once __DIR__ . '/../db/config.php';

function getBody()
{
    foreach ($_POST as $key => $value) {
        $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $data;
}

    $data = getBody();
    $errors = [];
    $input = new database();
    $email_used = $input->get_email($data['email']);

    if (!$data['firstname']) {
        $errors['firstname'] = "first name is required";
    }
    if (!$data['lastname']) {
        $errors['lastname'] = "last name is required";
    }
    if (!$data['email']) {
        $errors['email'] = "email is required";
    }
    if ($email_used) {
        $errors['email'] = "email already in use";
    }

    $params = [
        'errors' => $errors,
        'data' => $data
    ];

    if (empty($errors)) {
        $input->register($data['firstname'], $data['lastname'], $data['email']);

        echo "<p class='success'>";
        echo "success!";
        echo "</p>";

        $mail = new PHPMailer(false);
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $config['mail_host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $config['mail_username'];                     // SMTP username
        $mail->Password   = $config['mail_password'];                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->setFrom('AzaelBlog@gmail.com', 'New Account Creation');
        $mail->addAddress($data['email']);
        $mail->isHTML(true);
        $mail->Subject = 'You have been signed up to Azael-s website';
        $mail->AltBody = "Here are your credentials <br> email :" . $data["email"] . "<br>" . "first name : " . $data['firstname'] ."<br>". "last name : " . $data['lastname'] . "<br> Thank You!";
        $mail->Body = "Here are your credentials <br> email :" . $data["email"] . "<br>" . "first name : " . $data['firstname'] ."<br>". "last name : " . $data['lastname'] . "<br> Thank You!";
        $mail->send();

    }
    else {
        foreach ($errors as $error){
            echo "<p class='error'>";
            echo $error;
            echo "</p>";
        }
    }

<?php

use app\db\Database;

require_once __DIR__ . '/../db/Database.php';
require_once __DIR__ . '/../db/config.php';

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

        mail("test@developers-alliance.com","signup_kakabadze",
            "Here are your credentials <br> email :" . $data["email"] . "<br>" .
            "first name : " . $data['firstname'] ."<br>".
            "last name : " . $data['lastname'] . "<br> Thank You!");

        echo "<p class='success'>";
        echo "success!";
        echo "</p>";
    }
    else {
        foreach ($errors as $error){
            echo "<p class='error'>";
            echo $error;
            echo "</p>";
        }
    }

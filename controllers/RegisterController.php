<?php

use app\db\Database;

require_once __DIR__ .'/../db/Database.php';
require_once __DIR__ .'/../db/config.php';
function getBody()
    {
        foreach ($_POST as $key => $value) {
            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $data;
    }
if(isset($_POST['signup-btn'])) {
    $data = getBody();
    $errors = [];
    $input = new database();
    $email_used = $input->get_email($data['email']);

    if (!$data['firstname']) {
        $errors['firstname'] = "required field";
    }
    if (!$data['lastname']) {
        $errors['lastname'] = "required field";
    }
    if (!$data['email']) {
        $errors['email'] = "required field";
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


    }
}
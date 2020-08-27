<?php

namespace app\db;
use \PDO;


class Database
{

    public PDO $pdo;
    public function __construct()
    {
        $config = require __DIR__ . '/config.php';

        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        $this->pdo = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
    }


    public function register($firstname,$lastname,$email){

        $statement = $this->pdo->prepare("insert into users (firstname,lastname,email) 
                                                    Values (:firstname,:lastname,:email)");
        $statement->bindParam(':firstname',$firstname);
        $statement->bindParam(':lastname',$lastname);
        $statement->bindParam(':email',$email);
        return $statement->execute();
    }

    public function get_email($email){
        $statement = $this->pdo->prepare("SELECT * FROM users where email = :email");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $user =  $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($user)){
            return true;
        }else return false;
    }

    public function get_full_name($full_name){
        $statement = $this->pdo->prepare("SELECT * FROM users where full_name = :full_name");
        $statement->bindValue(':full_name',$full_name);
        $statement->execute();
        $user =  $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($user)){
            return true;
        }else return false;
    }


}
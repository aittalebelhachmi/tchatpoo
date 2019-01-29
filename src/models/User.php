<?php
    //namespace Models;

    class User {
        private $id;
        private $username;
        private $email;
        private $password;
        public $db;

        public function __construct() {
            
        }

        public function getId()
        {
            return $this->id;
        }
    
        public function getEmail()
        {
            return $this->email;
        }
    
        public function setEmail($email)
        {
            $this->email = $email;
        }
    
        public function getUsername()
        {
            return $this->username;
        }
    
        public function setUsername($username)
        {
            $this->username = $username;
        }
    
        public function getPassword()
        {
            return $this->password;
        }
    
        public function setPassword($password)
        {
            $this->password = $password;
        }

        public static function isLogged(){
            if(isset($_SESSION['tchat'])){
                $logged = 1;
            }else{
                $logged = 0;
            }
            return $logged;
        }
        public static function get_membres(){
            global $db;
            try {
                // var_dump($db);
                if ($db) {
                    $req = $db->query("SELECT * FROM users");
                    $results = array();
                    while($rows = $req->fetchObject()){
                        $results[] = $rows;
                    }
                    return $results;
                }
            }
            catch(PDOexception $e){
            }
        }
        public static function email_taken($email){
            global $db;
            try {
                if ($db) {
                    $e = array('email' => $email);
                    $sql = 'SELECT * FROM users WHERE email = :email';
                    $req = $db->prepare($sql);
                    $req->execute($e);
                    $free = $req->rowCount($sql);
                    return $free;
                }
            }
            catch(PDOexception $e){

            }

        }

        public static function register($name, $email, $password){
            global $db;
            try {
                if ($db!==null) {
                    $r = array(
                        'name'=>$name,
                        'email'=>$email,
                        'password'=>$password
                    );
                    $sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";
                    $req = $db->prepare($sql);
                    $req->execute($r);
                }
                else{var_dump($db);}
            }
            catch(PDOexception $e){

            }
        }
        public static function user_exist($email,$password){
            global $db;
            try {
                if ($db) {
                    $u = array(
                        'email'=>$email,
                        'password'=>$password
                    );
                    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
                    $req = $db->prepare($sql);
                    $req->execute($u);
                    $exist = $req->rowCount($sql);
                    return $exist;
                }
            }
            catch(PDOexception $e){

            }

        }
        public static function checkUser(){
            global $db;
            $e = array('user' => $_GET['user'], 'session'=>$_SESSION['tchat']);
            $sql = "SELECT * FROM users WHERE email =:user AND email != :session";
            $req = $db->prepare($sql);
            $req->execute($e);
            $exist = $req->rowCount($sql);
            return $exist;
        }
        public static function get_user(){
            global $db;
            $req = $db->query("SELECT * FROM users WHERE email = '{$_SESSION['user']}'");
            $user = array();
            while($row = $req->fetchObject()){
                $user[] = $row;
            }
            return $user;

        }





    }

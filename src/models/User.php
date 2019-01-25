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

        public function getId(): ?int
        {
            return $this->id;
        }
    
        public function getEmail(): ?string
        {
            return $this->email;
        }
    
        public function setEmail(string $email): self
        {
            $this->email = $email;
    
            return $this;
        }
    
        public function getUsername(): ?string
        {
            return $this->username;
        }
    
        public function setUsername(string $username): self
        {
            $this->username = $username;
    
            return $this;
        }
    
        public function getPassword(): ?string
        {
            return $this->password;
        }
    
        public function setPassword(string $password): self
        {
            $this->password = $password;
    
            return $this;
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
            $req = $db->query("SELECT * FROM users");
            $results = array();
            while($rows = $req->fetchObject()){
                $results[] = $rows;
            }
            return $results;
        }
        public static function email_taken($email){
            global $db;
            $e = array('email' => $email);
            $sql = 'SELECT * FROM users WHERE email = :email';
            $req = $db->prepare($sql);
            $req->execute($e);
            $free = $req->rowCount($sql);

            return $free;
        }

        public static function register($name, $email, $password){
            global $db;
            $r = array(
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            );
            $sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";
            $req = $db->prepare($sql);
            $req->execute($r);
        }
        public static function user_exist($email,$password){
            global $db;
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

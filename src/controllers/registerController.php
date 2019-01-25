<?php
include 'src/models/user.php';
    if(isset($_POST['submit'])){
        $user = new User();
        $user->setUsername(htmlspecialchars(trim($_POST['name'])));
        $user->setEmail(htmlspecialchars(trim($_POST['email'])));
        $user->setPassword(sha1(htmlspecialchars(trim($_POST['password']))));

        if(User::email_taken($user->getEmail()) == 1){
            $error_email = "L'adresse email est déjà utilisée...";
        }else{
            user::register($user->getUsername(), $user->getEmail(), $user->getPassword());
            $_SESSION['tchat'] = $user->getEmail();
            header("Location:index.php?page=membres");
        }
    }
?>
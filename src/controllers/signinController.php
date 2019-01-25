<?php
    include 'src/models/user.php';
    if(isset($_POST['submit'])){
        $email = htmlspecialchars(trim($_POST['email']));
        $password = sha1(htmlspecialchars(trim($_POST['password'])));

        if(User::user_exist($email,$password) == 1){
            $_SESSION['tchat'] = $email;
            header("Location:index.php?page=membres");
        }else{
            $error_user_not_found = "L'adresse email ou le mot de passe est incorrect";
        }
    }
?>
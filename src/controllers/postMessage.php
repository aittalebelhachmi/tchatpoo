<?php

    include '../../conf/connexion.php';
    include '../src/models/message.php';
    /*$m = new Message();
    $msg = $m->setMessage(htmlspecialchars(trim($_POST['message'])));
    $user = $m->setReciever($_SESSION['user']);
    $membre = $m->setSender($_SESSION['tchat']);
    */
    $user = $_SESSION['user'];
    $membre = $_SESSION['tchat'];
    $message = htmlspecialchars(trim($_POST['message']));

    $i = array(
        'sender' => $membre,
        'receiver' =>$user,
        'message'=>$message
    );
    $sql = "INSERT INTO messages(sender,receiver,message,date) VALUES(:sender,:receiver,:message,NOW())";
    $req = $db->prepare($sql);
    $req->execute($i);
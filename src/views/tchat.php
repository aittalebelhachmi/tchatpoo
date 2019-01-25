<?php

include 'src/models/user.php';
    if(!isset($_GET['user']) || User::isLogged() == 0 || User::checkUser() != 1){
        header("Location:index.php?page=home");
    }

    $_SESSION['user'] = $_GET['user'];

    foreach(User::get_user() as $user){
        ?>
            <h2 class="header"><?= $user->name; ?></h2>

            <div class="messages-box"></div>

            <div class="bottom">
                <div class="field field-area">
                    <label for="message" class="field-label">Votre message</label>
                    <textarea name="message" id="message" rows="2" class="field-input field-textarea"></textarea>
                </div>
                <button type="submit" id="send" class="send">
                    <span class="i-send"></span>
                </button>

            </div>
        <?php
    }
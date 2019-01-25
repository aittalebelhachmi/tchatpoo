<?php
// include 'src/models/user.php';
    if(isLogged() == 1){
        header("Location:index.php?page=membres");
    }
    // header("Location:index.php?page=membres");
?>

<h2 class="header header-form">S'inscrire</h2>

<?php
include 'src/controllers/registerController.php';
    // controller sign in (subscribcontroller) la vue viewregister.php (include la classe sub... autoload):
?>

<form method="post" id="regForm">

    <div class="field">
        <label class="field-label" for="name">Votre nom</label>
        <input class="field-input" type="text" name="name" id="name"/>
    </div>

    <div class="field">
        <label class="field-label" for="email">Votre adresse email</label>
        <input class="field-input" type="email" name="email" id="email"/>
    </div>

    <div class="field">
        <label class="field-label" for="password">Votre mot de passe</label>
        <input class="field-input" type="password" name="password" id="password"/>
    </div>
    <p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
    <button type="submit" name="submit">S'inscrire</button>

</form>
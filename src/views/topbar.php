<div class="topbar">
    <a class="app-name" href="index.php">Tchat</a>
    <span class="menu">
        <?php
            //if(0 == 1){
            if(isLogged() == 1){
                ?>
                    <a href="index.php?page=membres" class="">Membres</a>
                    <a href="index.php?page=logout">Déconnexion</a>
                <?php
            }else{
                ?>
                    <a href="index.php?page=register" class="">S'inscrire</a>
                    <a href="index.php?page=signin" class="">Se connecter</a>
                <?php
            }
        ?>
    </span>
</div>
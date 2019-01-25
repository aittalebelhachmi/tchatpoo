<?php

    include 'conf/connexion.php';

    $pages = scandir('src/views/');

    if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = 'home';
    }

    $pages_functions = scandir('src/controllers/');

    if(in_array($page.'.func.php',$pages_functions)){
        include 'src/controllers/'.$page.'.func.php';
    }

?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Application web de tchat</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <?php
            include 'src/views/topbar.php';
        ?>
        <div class="container">
            <?php
                include 'src/views/'.$page.'.php';
            ?>
        </div>
        <script src="js/jquery.js"></script>
        <?php
        
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script src="js/<?= $page ?>.func.js"></script>
                <?php
            }
        
        ?>
    </body>
</html>
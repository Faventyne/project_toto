<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);



require_once __DIR__ .'/../inc/config.php';

if(isset($_POST['disconnect']))
    {   session_destroy();
        header("Location: index.php");
        print_r($_SESSION);

    }

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/home.php';
require_once __DIR__ .'/../view/footer.php';



 ?>

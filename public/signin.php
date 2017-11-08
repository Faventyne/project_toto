<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$key = '$ùµ§toto';
if(isset($_POST['signin'])){

    if (isset($_POST['email'],$_POST['pwd'])){
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];

        $sql = 'SELECT usr_id,usr_email,usr_password,usr_role
        FROM user
        WHERE usr_email =:email';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

        $pdoStatement->execute();
        $user= $pdoStatement->fetch(PDO::FETCH_ASSOC);

        $ip_address= $_SERVER['REMOTE_ADDR'];

        if(empty($user)){
            echo "Adresse email non valide. Veuillez vérifier votre adresse ou vous inscrire";
        }
        else{
            if($user['usr_password'] == md5($pwd.'$ùµ§toto')){
                print_r($user);

                echo "Votre adresse IP est". $ip_address;

                $_SESSION['id']=$user['usr_id'];
                $_SESSION['role']=$user['usr_role'];
                //print_r($_SESSION);
            } else {
                echo "Le mot de passe saisi est incorrect. Veuillez vous assurer du mot de passe";
            }

        }

    }

}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signin.php';
require_once __DIR__ .'/../view/footer.php';

?>

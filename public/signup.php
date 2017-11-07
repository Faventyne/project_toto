<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
require_once __DIR__ .'/../inc/config.php';

$trig=0;
$pwd1=$pwd2='';
$mailExists = false;
//$pattern = '^(?=.*?[A-Z])(?=.*?[0-9])[\w]{8,}$';
//If form has been submitted
if(isset($_POST['insert'])){
//Check if fields are filled
    if(isset($_POST['email'],$_POST['pwd1'],$_POST['pwd2'])){
        //check if email is correct
        $mail= trim(strip_tags($_POST['email']));


        if(filter_var($mail,FILTER_VALIDATE_EMAIL)){


            //Check if email exists
            $sql = "SELECT usr_email FROM user";
            $pdoStatement = $pdo->prepare($sql);
            $pdoStatement->execute();
            //$allEmails=array('email'=>array());
            $allEmails= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($allEmails as $value) {
                if($value['usr_email'] == $mail){
                    $mailExists = true;
                    break;
                }
            }

            if ($mailExists == false){
                $pwd1=$_POST['pwd1'];
                $pwd2=$_POST['pwd2'];


                //preg_match($pattern,$password);
                //check if passwords are similar and long enough
            if(strlen($pwd1)>=8 && $pwd1==$pwd2 /*&& preg_match($pattern,$pwd1)==1*/){
                    $key = '$ùµ§toto';
                    $sql="INSERT INTO user(usr_email,usr_password)
                    VALUES (:email,:pwd)";
                    $pdoStatement=$pdo->prepare($sql);
                    $encPwd=md5($pwd1.$key);
                    $pdoStatement->bindValue(':email',$mail, PDO::PARAM_STR);
                    $pdoStatement->bindValue(':pwd', $encPwd, PDO::PARAM_STR);
                    $pdoStatement->execute();
                    $trig=1;
                }
            }

            /*
            else if($pwd1!=$pwd2){
                echo "Erreur ! Les mots de passe sont différents";
            } else if(strlen($pwd1)<6){
                echo "Veuillez saisir un mot de passe supérieur à 6 caracteres !!";
            }
            */
        } else{
            echo "Désolé, nous ne reconnaissons pas ce format d'adresse email";
        }
    }
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/signup.php';
require_once __DIR__ .'/../view/footer.php';

?>

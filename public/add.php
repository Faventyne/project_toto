<?php require_once __DIR__ .'/../inc/config.php';

if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
    $sql="SELECT cit_id, cit_name FROM city";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    $allcities = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    $sql="SELECT tra_id, tra_name, ses_id, ses_start_date, ses_end_date FROM training
    INNER JOIN session ON tra_id = session.training_tra_id ORDER BY ses_id";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute();
    print_r($_POST);
    $allsessions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    $lastname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $firstname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $birthdate = isset($_POST['bdate']) ? $_POST['bdate'] : '';
    $email = isset($_POST['usermail']) ? $_POST['usermail'] : '';
    $friendliness = isset($_POST['friendly']) ? $_POST['friendly'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $session = isset($_POST['session']) ? $_POST['session'] : '';

    // Traiter les données
    $lastname = strtoupper(trim(strip_tags($lastname))); // retire les espaces au debut et à la fin
    $firstname = ucfirst(trim(strip_tags($firstname)));


    // Validation des données
    $formOk = true;
    if (empty($lastname)) {
        echo 'Nom vide<br>';
        $formOk = false;
    }
    else if (strlen($lastname) < 2) {
        echo 'Nom incorrect (trop court)<br>';
        $formOk = false;
    }

    if (empty($firstname)) {
        echo 'Prénom vide<br>';
        $formOk = false;
    }
    else if (strlen($firstname) < 2) {
        echo 'Prénom incorrect (trop court)<br>';
        $formOk = false;
    }

    if (empty($friendliness)) {
        echo 'Niveau de sympathie vide<br>';
        $formOk = false;
    }
    else if (is_int($friendliness) && 1<$friendliness &&  $friendliness<= 5) {
        echo 'Niveau de sympathie incorrect (indiquer un niveau entre 1 et 5)<br>';
        $formOk = false;
    }

    if (empty($city)) {
        echo 'Précisez la ville <br>';
        $formOk = false;
    }
    if (empty($session)) {
        echo 'Précisez la session <br>';
        $formOk = false;
    }



    // Si aucune erreur
    if ($formOk) {
        $sql="INSERT INTO student(stu_firstname,stu_lastname,stu_birthdate,stu_email,stu_friendliness,city_cit_id,session_ses_id)
        VALUES (:firstname,:lastname,:birthdate,:email,:friendliness,:city,:session)";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':birthdate', $birthdate, PDO::PARAM_INT);
        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':friendliness', $friendliness, PDO::PARAM_INT);
        $pdoStatement->bindValue(':city', $city, PDO::PARAM_INT);
        $pdoStatement->bindValue(':session', $session, PDO::PARAM_INT);

        $pdoStatement->execute();
        $lastId = $pdo->lastInsertId();
        header("Location: student.php?id=".$lastId);
        echo "Data sent";
        exit;
    }

}else{
    header("Location: 404.php");
}

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/add.php';
require_once __DIR__ .'/../view/footer.php';
?>

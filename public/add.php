<?php require_once __DIR__ .'/../inc/config.php';

$lastname = isset($_POST['lname']) ?? '';
$firstname = isset($_POST['fname']) ?? '';

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

// Si aucune erreur
if ($formOk) {
    $sql="INSERT INTO student(stu_firstname,stu_lastname)
    VALUES (". $firstname ."," . $lastname . ")";
    $pdo->exec($sql);
    }




//$pdoStatement = $pdo->prepare($sql);
//$pdoStatement->bindValue(':queryname','Tasch', PDO::PARAM_STR);
//$pdoStatement->execute();


require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/add.php';
require_once __DIR__ .'/../view/footer.php';
?>

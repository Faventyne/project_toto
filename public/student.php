


<?php require_once __DIR__ .'/../inc/config.php';

    $sql='SELECT *
    FROM student
    LEFT OUTER JOIN city
    ON student.city_cit_id = city.cit_id
    LEFT OUTER JOIN  session
    ON student.session_ses_id = session.ses_id
    LEFT OUTER JOIN  training
    ON session.training_tra_id = training_tra_id
    WHERE stu_id = ' .$_GET["id"];

//print_r($sql);

$pdoStatement = $pdo->prepare($sql);
//$pdoStatement->bindValue(':queryname','Tasch', PDO::PARAM_STR);
$pdoStatement->execute();
$result= $pdoStatement->fetch();

$date = new DateTime($result['stu_birthdate']);
$now = new DateTime();
$interval = $now->diff($date);
$age = $interval->y;


require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/student.php';
require_once __DIR__ .'/../view/footer.php';
?>

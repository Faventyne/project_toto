<?php
require_once __DIR__ .'/../inc/config.php';
if (isset($_POST['nbResults'])){
    $step = $_POST['nbResults'];
} else{
    $step = 5;
}
//$step=5;

if (isset($_GET['page'])){
    $offset = $_GET['page'];
} else {
    $offset = 1;
}

$sql='SELECT * FROM student LIMIT '.$step .' OFFSET '. ($offset-1)*$step;
$pdoStatement = $pdo->prepare($sql);
//$pdoStatement->bindValue(':queryname','Tasch', PDO::PARAM_STR);
$pdoStatement->execute();
$results= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);



require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/list.php';
require_once __DIR__ .'/../view/footer.php';

 ?>

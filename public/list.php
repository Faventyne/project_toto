<?php
require_once __DIR__ .'/../inc/config.php';



$sql='SELECT * FROM student';
$pdoStatement = $pdo->prepare($sql);
//$pdoStatement->bindValue(':queryname','Tasch', PDO::PARAM_STR);
$pdoStatement->execute();
$results= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);



require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/list.php';
require_once __DIR__ .'/../view/footer.php';

 ?>

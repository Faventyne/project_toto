<pre>

<?php
require_once __DIR__ .'/../inc/config.php';


//If form has been submitted
if (!empty($_POST)){

//print_r($_POST);
//$_FILES are displayed uploaded files
// ! WARNING ! Files are submitted iif form has the attribute enctype="multipart/form-data"
//print_r($_FILES);

	//If files have been sent
    if(isset($_POST['upload']) && $_POST['upload']){

        if (!empty($_FILES)){
            $formOK=true;
            $allowedExtensions=array('csv');
            $fileForm=isset($_FILES['fileForm']) ? $_FILES['fileForm'] : array('');

            //Check MIME type
            $allowedMIMEtype=array('text/csv','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/octet-stream');

            foreach ($allowedMIMEtype as $key => $value) {
                if ($fileForm['type']==$value){
                    $k=$key;
                    break;
                }
            }
            if ($k<sizeof($allowedMIMEtype)){
                //Check extension
                $dotPos=strpos($fileForm['name'],'.');
                $extension=substr($fileForm['name'],$dotPos+1);

                if(!in_array($extension,$allowedExtensions)){
        			echo "Extension incorrecte<br>";
        			$formOK=false;
        		}
            }

        } else{
                echo "Fichier incorrect";
                $formOK=false;
        }

        if ($formOK){
            $newFilename=md5(uniqid().'*+project-toto-wf3').'.'.$extension;
            if(move_uploaded_file($fileForm['tmp_name'], __DIR__.'./resources/uploads//'.$newFilename)){

                echo "Upload OK";
                $allData = array('lastname' =>array(),
                                'firstname' =>array(),
                                'email'=>array(),
                                'friendliness'=>array(),
                                'birthdate'=>array()
                            );
                $k=0;
                //Reading CSV
                $handle = fopen(__DIR__.'./resources/uploads//'.$newFilename, "r");
                if (!empty($handle)){
                    while (!feof($handle)){
                    $currLine = fgets($handle);
                    $data = explode(";",$currLine);
                    $allData['lastname'][$k]=$data[0];
                    $allData['firstname'][$k]=$data[1];
                    $allData['email'][$k]=$data[2];
                    $allData['friendliness'][$k]=$data[3];
                    $allData['birthdate'][$k]=$data[4];
                    $k++;
                    }
                fclose($handle);
                }
                $sql="INSERT INTO student (stu_firstname,stu_lastname,stu_email,stu_friendliness,stu_birthdate,city_cit_id,session_ses_id)
                VALUES (:firstname,:lastname,:email,:friendliness,:birthdate,'Luxembourg',1)";
                $pdoStatement=$pdo->prepare($sql);

                $i=0;

                while($i<$k){
                    $d=0;

                    //Test

                    $dataOk = true;
                    if (empty($allData['lastname'][$i])) {
                        echo 'Nom vide<br>';
                        $dataOk = false;
                    }
                    else if (strlen($allData['lastname'][$i]) < 2) {
                        echo 'Nom incorrect (trop court)<br>';
                        $dataOk = false;
                    }

                    if (empty($allData['firstname'][$i])) {
                        echo 'Prénom vide<br>';
                        $dataOk = false;
                    }
                    else if (strlen($allData['firstname'][$i]) < 2) {
                        echo 'Prénom incorrect (trop court)<br>';
                        $dataOk = false;
                    }

                    if ($allData['friendliness'][$i]=='') {
                        echo 'Niveau de sympathie vide<br>';
                        $dataOk = false;
                    }
                    else if (is_int($allData['friendliness'][$i]) && 1<$allData['friendliness'][$i] &&  $allData['friendliness'][$i]<= 5) {
                        echo 'Niveau de sympathie incorrect (indiquer un niveau entre 1 et 5)<br>';
                        $dataOk = false;
                    }

                    if($dataOk=true){
                        $pdoStatement->bindValue(':firstname', $allData['firstname'][$i], PDO::PARAM_STR);
                        $pdoStatement->bindValue(':lastname', $allData['lastname'][$i], PDO::PARAM_STR);
                        $pdoStatement->bindValue(':email', $allData['email'][$i], PDO::PARAM_STR);
                        $pdoStatement->bindValue(':friendliness', $allData['friendliness'][$i], PDO::PARAM_INT);
                        $pdoStatement->bindValue(':birthdate', $allData['birthdate'][$i], PDO::PARAM_STR);
                        $pdoStatement->execute();
                    }
                    else{
                        echo "La ligne". $i+1 ."ne sera pas insérée dans la base de données";
                        $d++;
                    }
                    $i++;
                }
                echo $k;
                echo "Insertion terminée. ". ($k-$d) ." lignes insérées sur ". $k;
            }
            else {
                echo "ARF :( <br>";
            }
        }
    }
    else if (isset($_POST['export']) && $_POST['export']){

        $sql="SELECT stu_firstname,stu_lastname,stu_email,stu_friendliness,stu_birthdate
        FROM student";

        /*First. way*/

        $pdoStatement=$pdo->prepare($sql);
        $pdoStatement->execute();
        $allData = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $handle=fopen('./resources/exports/export-'.date('Ymd').'.csv', 'w');

        foreach ($allData as $fields) {
            fputcsv($handle, $fields,';');
        }
        fclose($handle);

        /*Second way*/
        $pdoStatement=$pdo->query($sql);
        if($pdoStatement && $pdoStatement->rowCount() > 0){
            $handle=fopen('./resources/exports/export-'.date('Ymd').'.csv', 'w');
            while(($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) !== false){
                $line=implode(';', $row);
                //PHP_EOL means make a line break
                fwrite($handle, $line.PHP_EOL);
            }
            fclose($handle);
        }


    } else {
        echo "False";
    }
}

 ?>
</pre>

<?php

require_once __DIR__ .'/../view/header.php';
require_once __DIR__ .'/../view/upload.php';
require_once __DIR__ .'/../view/footer.php';

?>

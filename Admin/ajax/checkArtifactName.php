<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");


if(isset($_POST['artName'])){
    $name = $_POST['artName'];
    $do = $db->prepare("select artifactName from artifacts where artifactName = :name ");
    $do->bindParam(':name', $name);
    $do->execute();
    $count = $do->rowCount();

    if($count > 0){
        echo "Artifact Name already exists";
    }
    else{
        echo "";
    }
    exit();
}
?>

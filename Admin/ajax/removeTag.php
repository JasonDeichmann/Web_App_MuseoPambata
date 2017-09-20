<?php
    include '../funcs.php';
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    if(isset($_POST['code']) && $_POST['type'] == 1){
        $retrieve = $db->prepare("DELETE FROM outsourcingTags WHERE tagCode=:tagCode AND companyCode=:code;");
        $retrieve->bindParam(':tagCode', $_POST['tagCode']);
        $retrieve->bindParam(':code', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
        }
    else if(isset($_POST['code']) && $_POST['type'] == 2){
        $retrieve = $db->prepare("DELETE FROM employeeTags WHERE tagCode=:tagCode AND employeeNumber=:code;");
        $retrieve->bindParam(':tagCode', $_POST['tagCode']);
        $retrieve->bindParam(':code', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    }
    else if(isset($_POST['code']) && $_POST['type'] == 3){
        $retrieve = $db->prepare("DELETE FROM artifactTags WHERE tagCode=:tagCode AND artifactCode=:code;");
        $retrieve->bindParam(':tagCode', $_POST['tagCode']);
        $retrieve->bindParam(':code', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    }

?>

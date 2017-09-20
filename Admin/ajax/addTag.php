<?php
    include '../funcs.php';
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    if(isset($_POST['companyCode']) && $_POST['type'] == 1)
            {
                $response="";
                $retrieve = $db->prepare("INSERT INTO outsourcingTags VALUES (:tagCode, :companyCode);");
                $retrieve->bindParam(':tagCode', $_POST['tagCode']);
                $retrieve->bindParam(':companyCode', $_POST['companyCode']);
                $retrieve->execute();
                $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

                $response.= '<span class="badge badge-success" id="'.'pill-'.$_POST['tagCode'].$_POST['companyCode'].'">'.get_tagName($_POST['tagCode']).'<button type="button" onclick="tangalTag('.$_POST['tagCode'].','.$_POST['companyCode'].
                    ')" class="close">x'.'</button>'.'</span>';
                echo $response;
            }
    else if(isset($_POST['code']) && $_POST['type'] == 2){
        $response="";
        $retrieve = $db->prepare("INSERT INTO employeeTags VALUES (:tagCode, :code);");
        $retrieve->bindParam(':tagCode', $_POST['tagCode']);
        $retrieve->bindParam(':code', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

        $response.= '<span class="badge badge-success" id="'.'pill-'.$_POST['tagCode'].$_POST['code'].'">'.get_tagName($_POST['tagCode']).'<button type="button" onclick="tangalTag('.$_POST['tagCode'].','.$_POST['code'].
            ')" class="close">x'.'</button>'.'</span>';
        echo $response;
    }
    else if(isset($_POST['code']) && $_POST['type'] == 3){
        $response="";
        $retrieve = $db->prepare("INSERT INTO artifactTags VALUES (:tagCode, :code);");
        $retrieve->bindParam(':tagCode', $_POST['tagCode']);
        $retrieve->bindParam(':code', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

        $response.= '<span class="badge badge-success" id="'.'pill-'.$_POST['tagCode'].$_POST['code'].'">'.get_tagName($_POST['tagCode']).'<button type="button" onclick="tangalTag('.$_POST['tagCode'].','.$_POST['code'].
            ')" class="close">x'.'</button>'.'</span>';
        echo $response;
    }

?>

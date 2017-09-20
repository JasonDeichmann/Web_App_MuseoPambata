<?php
    include '../funcs.php';
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    if(isset($_POST['companyCode']) && $_POST['type'] == 1)
            {
                $compCD = $_POST['companyCode'];
                $response="";
                $response.='<div id="etits" ><input type="hidden" id="boboKa" value="'.$_POST['companyCode'].'" >';
                $retrieve = $db->prepare("SELECT * FROM tags t  WHERE t.tagCode NOT IN (SELECT ot.tagCode FROM outsourcingTags ot join outsourcing o on ot.companyCode = o.companyCode WHERE ot.companyCode = :companyCode);");
                $retrieve->bindParam(':companyCode', $_POST['companyCode']);
                $retrieve->execute();
                $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

                foreach ($retrieve as $rows){
                    $response.= '<span class="badge badge-success" id="'.'pill-'.$rows['tagCode'].'">'.$rows['tagName'].'<button type="button" onclick="dagdagTag('.$rows['tagCode'].','.$compCD.')" class="close">+'.'</button>'.'</span>';
                }
                $response.='</div>';
                echo $response;
            }
    else if(isset($_POST['employeeNumber']) && $_POST['type'] == 2){
        $compCD = $_POST['employeeNumber'];
        $response="";
        $response.='<div id="etits" ><input type="hidden" id="empTag" value="'.$_POST['employeeNumber'].'" >';
        $retrieve = $db->prepare("SELECT * FROM tags t  WHERE t.tagCode NOT IN (SELECT ot.tagCode FROM employeeTags ot join employees o on ot.employeeNumber = o.employeeNumber WHERE ot.employeeNumber = :employeeNumber);");
        $retrieve->bindParam(':employeeNumber', $_POST['employeeNumber']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

        foreach ($retrieve as $rows){
            $response.= '<span class="badge badge-success" id="'.'pill-'.$rows['tagCode'].'">'.$rows['tagName'].'<button type="button" onclick="dagdagTag('.$rows['tagCode'].','.$compCD.')" class="close">+'.'</button>'.'</span>';
        }
        $response.='</div>';
        echo $response;
    }
    else if(isset($_POST['code']) && $_POST['type'] == 3){
        $compCD = $_POST['code'];
        $response="";
        $response.='<div id="etits" ><input type="hidden" id="empTag" value="'.$_POST['code'].'" >';
        $retrieve = $db->prepare("SELECT * FROM tags t  WHERE t.tagCode NOT IN (SELECT ot.tagCode FROM artifactTags ot join artifacts o on ot.artifactCode = o.artifactCode WHERE ot.artifactCode = :artifactCode);");
        $retrieve->bindParam(':artifactCode', $_POST['code']);
        $retrieve->execute();
        $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

        foreach ($retrieve as $rows){
            $response.= '<span class="badge badge-success" id="'.'pill-'.$rows['tagCode'].'">'.$rows['tagName'].'<button type="button" onclick="dagdagTag('.$rows['tagCode'].','.$compCD.')" class="close">+'.'</button>'.'</span>';
        }
        $response.='</div>';
        echo $response;
    }


?>

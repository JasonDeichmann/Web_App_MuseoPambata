<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");


if(isset($_POST['artifactName'])){

    $html = "<table class=\"table\">";
    $html .="<thead class=\"thead-inverse\">";
    $html .="<tr>";
    if($_POST['repairType'] == 1)
        $html .="<th>Repairee Name</th>";
    else if($_POST['repairType'] == 2)
        $html .="<th>Company Name</th>";
    $html .="<th></th>";
    $html .="</tr>";
    $html .="</thead>";
    $html .="<tbody>";

    //Get artifact Code
    $artifactName = $_POST['artifactName'];
    $do = $db->prepare('SELECT artifactCode FROM artifacts WHERE artifactName = :artifactName');
    $do->bindParam(':artifactName', $artifactName);
    $do->execute();
    $count = $do->rowCount();

    if($count > 0) {
        $getArtifactCode = $do->fetchAll(PDO::FETCH_ASSOC);
        $artifactCode = $getArtifactCode[0];
        $artCode = $artifactCode['artifactCode'];

        //Get artifact tags
        $getArtifactTags = $db->prepare('SELECT tagCode FROM artifactTags WHERE artifactCode = :artifactCode');
        $getArtifactTags->bindParam(':artifactCode', $artCode);
        $getArtifactTags->execute();
        $count = $getArtifactTags->rowCount();

        if($count > 0){
            //Artifact tags
            $artifactTags = $getArtifactTags->fetchAll(PDO::FETCH_ASSOC);

            if($_POST['repairType'] == 1) {
                //Get employee tags
                $getEmployeeTags = $db->prepare('SELECT tagCode, employeeNumber FROM employeeTags');
                $getEmployeeTags->execute();

                //All employee tags with employeeNumber
                $employeeTags = $getEmployeeTags->fetchAll(PDO::FETCH_ASSOC);

                //Match tags
                $retrievedNames = "";
                foreach ($artifactTags AS $artifactTag) {
                    foreach ($employeeTags AS $employeeTag) {
                        if ($artifactTag['tagCode'] == $employeeTag['tagCode']) {
                            //Get employee name
                            $getEmployeeName = $db->prepare('SELECT employeeName FROM employees WHERE employeeNumber = :employeeNumber');
                            $getEmployeeName->bindParam(':employeeNumber', $employeeTag['employeeNumber']);
                            $getEmployeeName->execute();
                            $employeeName = $getEmployeeName->fetchAll(PDO::FETCH_ASSOC);
                            $empName = $employeeName[0];

                            if (strpos($retrievedNames, $empName['employeeName']) == false) {
                                $retrievedNames = $retrievedNames . ' ' . $empName['employeeName'];
                                $html .= "<tr><td>" . $empName['employeeName'] . "</td><td> <button type=\"button\" class=\"btn btn-info btn-circle\"><i class=\"glyphicon glyphicon-ok\"></i></button> </td></tr>";
                            }
                        }
                    }
                }
                $html .= "</tbody>";
                $html .= "</table>";
                echo $html;
            }
            else if($_POST['repairType'] == 2){
                //Get company tags
                $getCompanyTags = $db->prepare('SELECT tagCode, companyCode FROM outsourcingTags');
                $getCompanyTags->execute();

                //All company tags with company code
                $companyTags = $getCompanyTags->fetchAll(PDO::FETCH_ASSOC);

                //Match tags
                $retrievedNames = "";
                foreach($artifactTags AS $artifactTag){
                    foreach($companyTags AS $companyTag){
                        if($artifactTag['tagCode'] == $companyTag['tagCode']){
                            //Get company name
                            $getCompanyName = $db->prepare('SELECT * FROM outsourcing WHERE companyCode = :companyCode');
                            $getCompanyName->bindParam(':companyCode', $companyTag['companyCode']);
                            $getCompanyName->execute();
                            $companyName = $getCompanyName->fetchAll(PDO::FETCH_ASSOC);
                            $compName = $companyName[0];

                            if(strpos($retrievedNames, $compName['companyName']) == false){
                                $retrievedNames = $retrievedNames . ' ' . $compName['companyName'];
                                $html .= "<tr><td>" . $compName['companyName'] . "</td><td> <button type=\"button\" class=\"btn btn-info btn-circle\"><i class=\"glyphicon glyphicon-ok\"></i></button> </td></tr>";
                            }
                        }
                    }
                }
                $html .= "</tbody>";
                $html .= "</table>";
                echo $html;
            }
        }
    }
    else
        echo "No such artifact";
    exit();
}
?>
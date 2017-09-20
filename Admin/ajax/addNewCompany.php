<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");


if(isset($_POST['companyName']) AND isset($_POST['specializationTags'])){
    $companyName = $_POST['companyName'];
    $specializationTags = $_POST['specializationTags'];

    //Inset new company into outsourcing table
    $do = $db->prepare('INSERT INTO outsourcing(companyName) VALUES (:companyName)');
    $do->bindParam('companyName', $companyName);
    $do->execute();

    $do = $db->prepare('SELECT * FROM outsourcing WHERE companyName = :companyName');
    $do->bindParam(':companyName', $companyName);
    $do->execute();
    $getCompanyCode = $do->fetchAll(PDO::FETCH_ASSOC);
    $companyCode = $getCompanyCode[0];

    //Insert outsourcing tags into db
    $ctr = 0;
    while(count($specializationTags) >$ctr) {
        $do = $db->prepare('INSERT INTO outsourcingTags(tagCode, companyCode) VALUES (:tagCode, :companyCode)');
        $do->bindParam('tagCode', $specializationTags[$ctr]);
        $do->bindParam(':companyCode', $companyCode['companyCode']);
        $do->execute();
        $ctr++;
    }
}
?>
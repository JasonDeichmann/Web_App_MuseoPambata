<?php
include '../funcs.php';
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");


if(isset($_POST['tagName']) && $_POST['type'] == 1){
    $tagName = $_POST['tagName'];
    $response="";
    $response.='<div id="etits" ><input type="hidden" id="boboKa" value="'.$_POST['companyCode'].'" >';
    //Inset new tag into tags table
    $do = $db->prepare('INSERT INTO tags(tagName) VALUES (:tagName)');
    $do->bindParam(':tagName', $tagName);
    $do->execute();
    $response.= '<span class="badge badge-success" id="'.'pill-'.get_tagCode($tagName).'">'.$tagName.'<button type="button" onclick="dagdagTag('.get_tagCode($tagName).','.$_POST['companyCode'].')" class="close">+'.'</button>'.'</span>';
    $response.='</div>';
    echo $response;
    exit();

}
else if(isset($_POST['tagName']) && $_POST['type'] == 2){

    $tagName = $_POST['tagName'];
    $response="";
    $response.='<div id="etits" ><input type="hidden" id="boboKa" value="'.$_POST['code'].'" >';
    //Inset new tag into tags table
    $do = $db->prepare('INSERT INTO tags(tagName) VALUES (:tagName)');
    $do->bindParam(':tagName', $tagName);
    $do->execute();
    $response.= '<span class="badge badge-success" id="'.'pill-'.get_tagCode($tagName).'">'.$tagName.'<button type="button" onclick="dagdagTag('.get_tagCode($tagName).','.$_POST['code'].')" class="close">+'.'</button>'.'</span>';
    $response.='</div>';
    echo $response;
    exit();
}
else if(isset($_POST['tagName']) && $_POST['type'] == 3){

    $tagName = $_POST['tagName'];
    $response="";
    $response.='<div id="etits" ><input type="hidden" id="boboKa" value="'.$_POST['code'].'" >';
    //Inset new tag into tags table
    $do = $db->prepare('INSERT INTO tags(tagName) VALUES (:tagName)');
    $do->bindParam(':tagName', $tagName);
    $do->execute();
    $response.= '<span class="badge badge-success" id="'.'pill-'.get_tagCode($tagName).'">'.$tagName.'<button type="button" onclick="dagdagTag('.get_tagCode($tagName).','.$_POST['code'].')" class="close">+'.'</button>'.'</span>';
    $response.='</div>';
    echo $response;
    exit();
}
else if(isset($_POST['tagName']) && $_POST['type'] == 4){
        $tagName = $_POST['tagName'];

        //Inset new tag into tags table
        $do = $db->prepare('INSERT INTO tags(tagName) VALUES (:tagName)');
        $do->bindParam(':tagName', $tagName);
        $do->execute();
        exit();
}
?>


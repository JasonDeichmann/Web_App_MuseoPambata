<?php

include '../funcs.php';
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");

if(isset($_POST['repairCode'])){

    $formValue = getOngoingRepairDetails($_POST['repairCode']);
    $html = "";
    $html .='<div class="form-group">';
    $html .='<label>Artifact Name: </label>';
    $html .='<label id="artifactName">'.$formValue["artifactName"].'</label><br>';
    $html .='<label>Starting Date:</label>';
    $html .='<label id="startDate">'.date('Y/m/d', strtotime($formValue['startDate'])).'</label><br>';
    $html .='<label>Ending Date:</label>';
    $html .='<label id="startDate">'.date('Y/m/d', strtotime($formValue['endDate'])).'</label><br>';
    $html .='<div>';
    $html .='<label> Reason for Repair:</label>';
    $html .='<textarea class="form-controlz" rows="3" id="textarea" name="textarea" disabled>'.$formValue['reasonForRepair'].'</textarea><br>';
    $html .='<label>Repairees: </label>';
    $html .='<label id="repairees">'.getRepaireeOngoing($_POST['repairCode']).'</label>';
    $datediff = strtotime($formValue['endDate']) - strtotime(date('Y/m/d'));
    $datediff = ($datediff / (60 * 60 * 24));
    $html .='<input name="dateDiff" id="dateDiff" value="'.$datediff.'" hidden>';
    $html .='<input name="repairFormNumber" value="'.$_POST['repairCode'].'" hidden>';
    $html .='</div>';
    echo $html;
}
?>
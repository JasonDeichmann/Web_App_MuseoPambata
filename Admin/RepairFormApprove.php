<!DOCTYPE html>
<html>
<?php
include 'funcs.php';
session_start();
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
if($_SESSION['userType'] == 2){
    header('Location:HomepageAdmin.php');
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Maintenance Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="shortcut icon" href="../images/Museo%20Pambata%20logo.png" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        <?php
        if($_SESSION['userType'] == 3){
            echo 'option:before { content: "☐ " }';
            echo 'option:checked:before { content: "☑ " }';
        }
        ?>
        body{

            font-family: "TW Cen MT", sans-serif;
            font-family: "TW Cen MT", sans-serif;
            background-color: azure;
            padding-top: 5%;
            padding-left: 3%;

        }

        .panel{

            width: 98%;
            padding: 3% 3% 3% 3%;

        }

        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: #E0E0E0;
        }

        .navbar-default .navbar-header .navbar-brand:hover, .navbar-default .navbar-header .navbar-brand:focus {
            color: beige;
            font-family: "Wisdom Script Regular";
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
            color: #E0E0E0;
            background-color: #042E58 ;
        }

        .navbar-default {
            background-color: #064789;
            border-color: #030033;
            position: fixed;
        }

        .navbar-default .navbar-header .navbar-brand {
            color: white;
            font-family: "Wisdom Script Regular";
        }

        .navbar-default .navbar-nav > li > a {
            color: white;
        }
        .form-horizontal{
            text-align: left;
            padding: 3% 3% 3% 3%;
        }
        .form-group{

            text-align: left;
            padding: 3;
            padding-bottom: 1.5em;
            padding-left: 1em;
            padding-top: 0.5em;


        }

        .form-control{

            width: 75%;

        }
        .form-control1{

            width: 30%;

        }
        .form-control2{

            width: 32%;

        }
        .col-sm-5{
            padding: 3% 3% 3% 3%
        }


        .images{

            display: inline;
            margin: 0px;
            padding: 0px;

        }

        content {


            display: block;
            margin: 0px;
            padding: 0px;
            position: fixed;
            top: 90px;
            height: auto;
            max-width: auto;
            overflow-y: hidden;
            overflow-x:auto;
            white-space:nowrap;

        }

        /** .my-wrapper{
             background-color: #202020;
             width: 9%;
         }

         .my-wrapper:hover img{
             opacity: 0.2;
         }**/
        tbody{
            overflow:scroll;
            white-space:nowrap;
        }
        th{
            text-align: center;
        }
        tr:hover {
            background-color: #f5f5f5
        }
    </style>


</head>
<body>
    <div class="container">
        <div class="form-group" >
            <div class="col-md-12" style="background-color:	white;">

                <form name="submit" method="post" class="form-horizontal"><!--  backend post here JSON -->
                     <!-- Form Name -->
                        <legend align="center"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<b> <?php if($_SESSION['userType'] == 1){echo 'REPAIR FORM APPROVAL ';} else if($_SESSION['userType'] == 3){echo 'ASSISTANCE REPAIR FORM APPROVAL ';}?><span class="glyphicon glyphicon-user" style="color: green"></span></b></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Text input-->

                                <label class=" control-label" ><b>Created By:</b></label><label id="author"></label>
                                <input type="text" class="form-control" name="author" id="author" value="<?php if(isset($_POST['submitButton'])){echo getEmployeeAuthor($_POST['repairCode']);}?>"readonly>

                                    <label class=" control-label" ><b>Repair Number:</b></label><label id="repairCode"></label>
                                    <input type="text" class="form-control" name="repairCode" id="repairCode" value="<?php if(isset($_POST['submitButton'])){echo $_POST['repairCode'];}?>"readonly>

                                    <label class=" control-label">Artifact Name:</label><label id="artifactName"></label>
                                    <input type="text" class="form-control" name="artifactName" id="artifactName" value="<?php if(isset($_POST['submitButton'])){$details = getArtifactDetails($_POST['repairCode']); echo $details['artifactName'];}?>"readonly>

                                    <label class=" control-label" for="deaccession number">Start Date:</label><input type=text class="form-control" style="width: auto;" value="<?php if(isset($_POST['submitButton'])){$details = getArtifactDetails($_POST['repairCode']); $startDate = date('Y/m/d', strtotime($details['startDate'])); echo $startDate;}?>" id="startDate" readonly><!-- post mo lang sa value attrib para ma change input-->

                                    <label class=" control-label" for="deaccession number" >End Date:</label><input type="text"  style=" width: auto;" class=" form-control" value="<?php if(isset($_POST['submitButton'])){$details = getArtifactDetails($_POST['repairCode']); $endDate = date('Y/m/d', strtotime($details['endDate'])); echo $endDate;}?>" id="endDate" readonly>
                                    <hr>
                                    <label>Reason of Repair <span class="glyphicon glyphicon-exclamation-sign"></span></label><br>
                                    <textarea class="form-control" rows="4" id="reasonForRepair" name="reasonForRepair" readonly><?php if(isset($_POST['submitButton'])){$details = getArtifactDetails($_POST['repairCode']); echo $details['reasonForRepair'];}?></textarea>


                            </div>
                            <div class="col-md-6">


                                    <div class="well">
                                        <label id="repair" name="repair"><?php if($_SESSION['userType'] == 1){echo "Repairees Chosen:";} else{echo "Choose Maintenance Personnel:";}?></label>  <br>
                                        <center>
                                            <select class="form-control" id="emp" name="emp[]" width="15%" <?php if($_SESSION['userType'] == 1 ){echo "readonly";}?> multiple>
                                                <?php
                                                if(isset($_POST['repairCode']) && $_SESSION['userType'] == 1) {
                                                    $repairees = getRepairees($_POST['repairCode']);
                                                    foreach ($repairees as $repairee)
                                                        echo '<option name="repairee" class="repairee" value="'.$repairee['employeeNumber'].'">'.$repairee['employeeName'].'</option>';
                                                    $companies = getCompanyName($_POST['repairCode']);
                                                    foreach ($companies as $company) {
                                                        echo '<option name="company" class="company" value="' . $company['companyCode'] . '">' . $company['companyName'] . '</option>';
                                                        echo '<script>document.getElementById("repair").innerHTML = "Outsourcing Company Chosen:";</script>';
                                                    }
                                                }
                                                else if(isset($_POST['repairCode']) && $_SESSION['userType'] == 3){
                                                    $repairees = getMaintenance();
                                                    foreach ($repairees as $repairee)
                                                        echo '<option name="repairee" class="repairee" value="'.$repairee['employeeNumber'].'">'.$repairee['employeeName'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </center>
                                    </div>
                                <center>

                                    <button type="submit" name="approve" id="approve" class="btn btn-success" style="width: 40%; "><span class="glyphicon glyphicon-ok-circle"></span>&nbsp<?php if($_SESSION['userType'] == 1){echo 'Approve';} else{echo 'Send Assistance';}?></button>
                                    <button type="submit" name="reject" id="reject" class="btn btn-danger" style="width: 40%; "><span class="glyphicon glyphicon-remove-circle"></span>&nbspReject</button>
                                </center>
                            </div>
                        </div>
                        </form>
                    </div>
        </div>
    </div>

<?php
require_once ('navbar.php');
?>


<script>
    $(document).on('ready', function() {
        $("#input-folder-1").fileinput({
            browseLabel: 'Select Folder...'
        });
    });

    $('option').mousedown(function(e) {
        e.preventDefault();
        $(this).prop('selected', !$(this).prop('selected'));
        return false;
    });

</script>
</center>
</body>

<?php
if($_SESSION['userType'] == 1) {
    if (isset($_POST['approve'])) {
        if (isset($_POST['repairCode'])) {
            approveRepairForm($_POST['repairCode']);
            echo '<script> location.replace("HomepageAdmin.php"); </script>';
        }
    } else if (isset($_POST['reject'])) {
        if (isset($_POST['repairCode'])) {
            denyRepairForm($_POST['repairCode']);
            echo '<script> location.replace("HomepageAdmin.php"); </script>';
        }
    }
}
else if($_SESSION['userType'] == 3) {
    if (isset($_POST['approve'])) {
        if (isset($_POST['repairCode'])) {
            assistRepairForm($_POST['repairCode'], $_POST['emp']);
            echo '<script> location.replace("HomepageAdmin.php"); </script>';
        }
    } else if (isset($_POST['reject'])) {
        if (isset($_POST['repairCode'])) {
            denyRepairForm($_POST['repairCode']);
            echo '<script> location.replace("HomepageAdmin.php"); </script>';
        }
    }
}

?>
</html>
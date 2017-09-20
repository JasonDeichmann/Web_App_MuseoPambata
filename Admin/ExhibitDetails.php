<?php
//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}

include 'funcs.php';
$form=0;
if (isset($_POST['artNm'])){
    $art = retrieveRow($_POST['artNm']);

    $form = chkForm($_POST['artNm']);

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Artifacts Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="shortcut icon" href="../images/Museo%20Pambata%20logo.png" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet"> <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>



<style>
    body{

        font-family: "TW Cen MT", sans-serif;
        background-color: azure;
        padding-top: 5%;
        padding-left: 3%;

    }

    .panel{

        width: 98%;
        padding: 3% 3% 3% 3%;


    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
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

    .form-group{

        text-align: right;

    }

    .form-control{

        width: 40%;
        padding-left: 2%;
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


</head>     <body>


<center>
    <div class="panel">

        <div id="content"><br>
            <h2><b> <?php if(isset($_POST['artNm'])){echo $art['artifactName'];}else{echo "NULL";}?></b></h2>
            <hr>
            <form action="NewRepairForm.php" method="post">
                <div class ="container">
                    <div class="row">
                        <div class = "col-md-6">
                            <center>
                                <img src="<?php  echo $art['artifactImagePath']?>" alt="description here" width="450" height="350" />
                            </center>
                        </div>
                        <div class = "col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>DETAILS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr><td>
                                        <b>Artifact Name: </b><class id="M2"><?php  echo $art['artifactName']?></class></td></tr>
                                <tr><td>
                                        <b>Artifact Status: </b><class id="M3"><?php  echo chkSTAT($art['artifactStatus']);?></class></td></tr>
                                <tr><td>
                                        <b>Mode of Acquisition: </b><class id="M6"><?php  echo chkMOA($art['modeOfAcquisition']);?></class></td></tr>
                                <tr><td>
                                        <b>Details: </b> <class id="M7"><?php  echo $art['comments']?></class></td></tr>
                                <tr><td>
                                        <b>Location: </b><class id="M8"><?php  echo chkLocation($art['location']);?></class></td></tr>
                                <tr><td>
                                        <b>Date Acquired: </b><class id="M8"><?php  echo $art['acquisitionDate'];?></class></td></tr>
                                <tr><td>
                                        <b>Form: </b><class id="M9"> <a href="#"><?php   if ($form==0){ echo "NULL";} else {echo $form['formFilePath'];}?></a></class></td></tr>

                                <tr><td>
                                        <br>
                                        <div align="right">
                                            <button type="button" type="submit" class="btn btn-warning" data-dismiss="modal">Schedule Repair</button>   <!-- Add dito!! -->
                                            <button class = "btn btn-primary" id="cmd">Save as PDF</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>


            <!-- end of form -->
        </div></div>
</center>


<?php
require_once ('navbar.php');
?>

<script>
    $(document).ready(function(){
        $('#my-modal').modal('show');
    });



</script>



</body>
</html>
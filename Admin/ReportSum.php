<?php
include 'funcs.php';

//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}

if($_SESSION['userType'] > 2) {
    header('Location:HomepageAdmin.php');
}
$type = NULL;
if(isset($_POST['SumType'])){
    $type = $_POST['SumType'];
    $stD = $_POST['startD'];
    $enD = $_POST['endD'];

    $data = get_typeQuerySummary($type,$stD,$enD);

}
else{
    header('Location: HomepageAdmin.php');
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Generate Reports Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">


    <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">


    </script>
</head>


<style>
    body{

        font-family: "TW Cen MT", sans-serif;
        background-color: azure;
        padding-top: 5%;
        padding-left: 3%;

    }
    box{
        box-shadow: 10px 10px 5px #888888;
        padding: 5%;
    }
    .container{


    }
    .panel{

        width: 98%;
        padding: 3% 3% 3% 3%;

    }
    .panel-default{
        width: 98%;
        padding: 0% 0% 0% 0%;
    }
    .modal-dialog  {
        width:55%;
    }
    .panel-body{

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
    form-group{

        text-align: left;
        padding: 3;
        padding-bottom: 1.5em;
        padding-left: 1em;
        padding-top: 0.5em;


    }

    .modal-dialog{

        width: 100%;

    }

    .modal-dialog2{

        width: inherit;
    }
    .form-control{

        width: 75%;

    }
    .form-controlz{
        width: 95%
    }
    .form-control1{

        width: 30%;

    }
    .form-control2{

        width: 100%;

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

    .col-lg-4{

        border-right: 2px;
        border-right-color: aliceblue;

    }
    .inline{display:inline}

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

<body onLoad="$('#my-modal').modal('show');">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"><span class="glyphicon glyphicon-search"></span>&nbsp;COMPANY INFORMATION &nbsp;</h2>
            </div>
            <div class="modal-body">
                <div class="container">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <?php
                        switch ($type){

                            case '2':?> <!-- Completed Report-->
                                <thead>
                                <tr>
                                    <th>Repair Code</th>
                                    <th>Artifact Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Repairees</th>
                                </tr>
                                </thead>
                                <tbody id="a">

                                </tbody>
                                <?php break; case '5':?> <!-- Needed Report-->
                            <thead>
                            <tr>
                                <th>Repair Code</th>
                                <th>Artifact Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Repairees</th>
                            </tr>
                            </thead>
                            <tbody id="b">

                            </tbody>
                            <?php break;} ?>
                    </table>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>


<center>
    <div class="container"  style="background-color: white; box-shadow: 10px 10px 5px #888888;">
        <div class="form-group" >

            <div class="col-md-12" style="padding: 10%">

                <!-- Form Name -->
                <div class="row">
                    <div class="col-lg-6">
                        <legend align="left"> &nbsp; <?php
                            switch ($type){

                                case '2':
                                    echo " <span style=\"color: orange;\" class="."'glyphicon glyphicon-wrench'"."></span>";
                                    break;

                                case '5':
                                    echo " <span style=\"color: gray;\" class="."'glyphicon glyphicon-alert'"."></span>";
                                    break;
                            }
                            ?>
                            <b style="color: darkblue;"><?php if($type==2){ echo "Repaired Summary " ;}else if($type==5){ echo "Need For Repair Summary " ;}?></b>Report </legend>
                    </div>
                    <div class="col-lg-6">
                        <legend align="right"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<b> For <?php echo date('F d Y ', strtotime($stD));
                                ?>    <span class="glyphicon glyphicon glyphicon-arrow-right"></span>  <?php echo date('F d Y ', strtotime($enD));
                                ?> </b></legend>
                    </div>
                </div>
                <div class="row">
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <?php
                        switch ($type){

                            case '2':?> <!-- Completed Report-->
                                <thead>
                                <tr>
                                    <th>Artifact Code</th>
                                    <th>Artifact Name</th>
                                    <th>Repair Count</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($data as $rows){ ;?>

                                    <tr>
                                        <td><a href="#" data-toggle="modal" name = "bboboka" data-target="#myModal" onclick="gamolComp(this, <?php echo $rows['artifactCode'];?>,'<?php echo $stD;?>','<?php echo $enD;?>')"><?php echo $rows['artifactCode'];?></a></td>
                                        <td><?php echo $rows['artifactName'];?></td>
                                        <td><?php echo $rows['RepCnt']?></td>
                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                            case '5':?> <!-- Needed Report-->
                                <thead>
                                <tr>
                                    <th>Artifact Code</th>
                                    <th>Artifact Name</th>
                                    <th>Repair Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>
                                        <td><a href="#" data-toggle="modal" name = "bboboka" data-target="#myModal" onclick="gamolNeed(this, <?php echo $rows['artifactCode'];?>,'<?php echo $stD;?>','<?php echo $enD;?>')"><?php echo $rows['artifactCode'];?></a></td>
                                        <td><?php echo $rows['artifactName'];?></td>
                                        <td><?php echo $rows['RepCnt']?></td>

                                    </tr>
                                    <?php ;} ?>

                                </tbody>

                                <?php break;
                        }
                        ?>
                    </table>
                    <form>
                        <center><b> - - - - - - - END OF REPORT  - - - - - - </b></center>
                    </form>

                </div>
            </div>
        </div>


</body>

<?php
require_once ('navbar.php');
?>

<script>
    function checkDate(){

    }

    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $(document).ready(function() {
        $('#example1').DataTable();
    } );


    $(document).ready(function(){
        $('#my-modal').modal('show');
    });
    function displayContComp(artifactCode, stD, enD){

        if(artifactCode)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/dispCompCont.php',
                data: {
                    artifactCode: artifactCode,
                    stD: stD,
                    enD: enD

                },
                success: function (response) {
                    $('#a').remove();
                    $('#example').append(response);

                }
            });
        }
        else
        {
            return false;
        }
    }
    function displayContNeed(artifactCode, stD, enD){
        if(artifactCode)
        {

            $.ajax({
                type: 'POST',
                url: 'ajax/dispNeedCont.php',
                data: {
                    artifactCode: artifactCode,
                    stD: stD,
                    enD: enD

                },
                success: function (response) {
                    $('#b').remove();
                    $('#example').append(response);

                }
            });
        }

    }
    function gamolComp(a, artifactCode,stD,enD){
        //var name = $(a).closest("tr").find("td:eq(0)").text();
        //console.log($(a).text());
        console.log(artifactCode);
        console.log(stD);
        console.log(enD);
        displayContComp(artifactCode, stD, enD);
        /*$("#artNm").val(name2);*/

    }
    function gamolNeed(a, artifactCode,stD,enD){
        console.log(artifactCode);
        console.log(stD);
        console.log(enD);
        //var name = $(a).closest("tr").find("td:eq(0)").text();
        //console.log($(a).text());
        displayContNeed(artifactCode, stD, enD);
        /*$("#artNm").val(name2);*/

    }
</script>
</center>
</body>
</html>
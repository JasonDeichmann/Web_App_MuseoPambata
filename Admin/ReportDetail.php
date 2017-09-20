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

if(isset($_POST['type'])){
    $type = $_POST['type'];
    $stD = $_POST['stD'];
    $enD = $_POST['enD'];
    $data = get_typeQuery($type,$stD,$enD);

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

        width: 61%;

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


<center>
    <div class="container"  style="background-color: white; box-shadow: 10px 10px 5px #888888;">
        <div class="form-group" >

            <div class="col-md-12" style="padding: 10%">

                <!-- Form Name -->
                <div class="row">
                    <div class="col-lg-6">
                        <legend align="left"> &nbsp; <?php
                            switch ($type){
                                case '1':
                                    echo " <span style=\"color: blue;\" class="."'glyphicon glyphicon-plus'"."></span>";
                                    break;
                                case '2':
                                    echo " <span style=\"color: orange;\" class="."'glyphicon glyphicon-wrench'"."></span>";
                                    break;
                                case '3':
                                    echo " <span style=\"color: red;\" class="."'glyphicon glyphicon-trash'"."></span>";
                                    break;
                                case '4':
                                    echo " <span style=\"color: gray;\" class="."'glyphicon glyphicon-alert'"."></span>";
                                    break;
                            }
                            ?>
                            <b style="color: darkblue;"><?php get_typeSTR($type);?> </b> Report </legend>
                    </div>
                    <div class="col-lg-6">
                        <legend align="right"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<b> For <?php echo date('F d Y ', strtotime($stD));
                                ?>    <span class="glyphicon glyphicon glyphicon-arrow-right"></span>  <?php echo date('F d Y ', strtotime($enD));
                                ?> </b></legend>
                    </div>
                </div>
                <div class="row">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <?php
                        switch ($type){

                            case '1':?> <!-- Acquisition Report-->
                                <thead>
                                <tr>
                                    <th>Artifact Name</th>
                                    <th>Acquisition Date</th>
                                    <th>Status</th>
                                    <th>Acquisition Mode</th>
                                    <th>Patron Name</th>
                                    <th>Location</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>
                                        <td><?php echo $rows['artifactName']?></td>
                                        <td><?php echo $rows['acquisitionDate']?></td>
                                        <td><?php chkSTAT($rows['artifactStatus']);?></td>
                                        <td><?php echo chkMOA($rows['modeOfAcquisition']);?></td>
                                        <td><?php echo get_patronName($rows['artifactCode']);?></td>
                                        <td><?php chkLocation($rows['location']);?></td>
                                        <td><?php echo $rows['comments']?></td>

                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                            case '2':?> <!-- Maintenance Report-->
                                <thead>
                                <tr>
                                    <th>Repair Code</th>
                                    <th>Artifact Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Finished Date</th>
                                    <th>Repairees</th>
                                    <th>Lead Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>
                                        <td><?php echo $rows['repairCode']?></td>
                                        <td><?php echo $rows['artifactName'];?></td>
                                        <td><?php echo $rows['startDate']?></td>
                                        <td><?php echo $rows['endDate']?></td>
                                        <td><?php echo $rows['finishedDate']?></td>
                                        <td><?php
                                            if ($rows['companyCode']==NULL)
                                                echo $rows['Repairee/s'];
                                            else
                                                echo get_companyNm($rows['companyCode']);
                                            ?></td>
                                        <td><?php
                                            $dat = date('Y-m-d', strtotime(str_replace('-','/', $rows['endDate'])));
                                            $dat.= "";
                                            $date1=date("Y-m-d");

                                            $curr=date_create($date1);
                                            $end=date_create($dat);

                                            $diff=date_diff($curr,$end);

                                            $echo = $diff->format("%R%d");
                                            echo $echo;
                                            ?></td>
                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                            case '5':?> <!-- Need for Repair-->
                                <thead>
                                <tr>
                                    <th>Repair Code</th>
                                    <th>Artifact Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Repairees</th>
                                    <th>Lead Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>
                                        <td><?php echo $rows['repairCode']?></td>
                                        <td><?php echo $rows['artifactName'];?></td>
                                        <td><?php echo $rows['startDate']?></td>
                                        <td><?php echo $rows['endDate']?></td>
                                        <td><?php
                                            if ($rows['companyCode']==NULL)
                                                echo $rows['Repairee/s'];
                                            else
                                                echo get_companyNm($rows['companyCode']);
                                            ?></td>
                                        <td><?php
                                            $dat = date('Y-m-d', strtotime(str_replace('-','/', $rows['endDate'])));
                                            $dat.= "";
                                            $date1=date("Y-m-d");

                                            $curr=date_create($date1);
                                            $end=date_create($dat);

                                            $diff=date_diff($curr,$end);

                                            $echo = $diff->format("%R%d");
                                            echo $echo;
                                            ?></td>
                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                            case '4':?> <!-- Exception Report-->
                                <thead>
                                <tr>
                                    <th>Repair Code</th>
                                    <th>Artifact Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Concluded Date</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>

                                        <td><?php echo $rows['repairCode']?></td>
                                        <td><?php echo get_artifactName($rows['artifactCode']);?></td>
                                        <td><?php echo $rows['startDate'];?></td>
                                        <td><?php echo $rows['endDate'];?></td>
                                        <td><?php echo $rows['finishedDate'];?></td>
                                        <td><?php chkRemStat($rows['remStatus']);?></td>
                                        <td><?php echo $rows['remarks'];?></td>
                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                            case '3':?> <!-- Disposal Report -->
                                <thead>
                                <tr>
                                    <th>Artifact Name</th>
                                    <th>Disposal Mode</th>
                                    <th>Deaccession Date</th>
                                    <th>Reasons For Disposal</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $rows){ ;?>
                                    <tr>
                                        <td><?php echo get_artifactName($rows['artifactCode'])?></td>
                                        <td><?php chkMOD($rows['modeOfDisposal']);?></td>
                                        <td><?php echo $rows['dateOfAccession']?></td>
                                        <td><?php
                                            $a = explode(',',explodeRSN($rows['reasonsForDisposal']));
                                            foreach ($a as $r){
                                                echo "->".$r."<br>";
                                            }
                                            ?></td>
                                        <td><?php echo $rows['comments']?></td>
                                    </tr>
                                    <?php ;} ?>

                                </tbody>
                                <?php break;
                        }
                        ?>
                    </table>
                    <center><b> - - - - - - - END OF REPORT  - - - - - - </b></center>
                    <?php if ($type == 5 OR $type == 2){?>
                        <form method="post" action="ReportSum.php">
                            <input type="hidden" name="startD" value="<?php echo $stD;?>">
                            <input type="hidden" name="endD" value="<?php echo $enD;?>">
                            <input type="hidden" name="SumType" value="<?php echo $type;?>">

                            <center>&nbsp<button type="submit" class="btn btn-default">VIEW SUMMARY</button>   <button type="button" class = "btn btn-primary" id="cmd">SAVE AS PDF</button></center>
                        </form>
                    <?php }else{?>
                        <center><button class = "btn btn-primary" id="cmd">SAVE AS PDF</button></center>
                    <?php }?>

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

    $(document).ready(function(){
        $('#my-modal').modal('show');
    });

    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });
</script>
</center>
</body>
</html>
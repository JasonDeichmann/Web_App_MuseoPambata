<?php
//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}

include 'funcs.php';
$db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

/* - Schedule For Approval (RS.Status) 1,2
 * - On-going Repairs (RS.Status) 3
 * - Recently Repairs (RS.Status) 4
 */
$data1 = get_forApproval();
$data2 = get_onGoing();
$data3 = get_recentlyCompleted();

?>
<!DOCTYPE html>
<html>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
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

<center>
    <div class="container" >
        <div class ="col-sm-1" style="background-color: white;"></div>

        <div class="col-md-9" style="background-color:	white; box-shadow: 10px 10px 5px #888888;">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend align="center"><b><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp; SCHEDULES FOR APPROVAL</b></legend>
                    <!-------- Schedule For Approval -------->
                    <!-- Text input-->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>RCD</th>
                            <th>Start Date</th>
                            <TH>End Date</TH>
                            <th>Lead<br>Days</th>
                            <th>Reason For Repair</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data1 as $rows){?>
                            <tr>
                                <td><?php echo $rows['repairCode']?></td>
                                <td><?php echo $rows['startDate']?></td>
                                <td><?php echo $rows['endDate']?></td>
                                <?php if(get_leadTime($rows['endDate'])>0){
                                    $str = substr(get_leadTime($rows['endDate']), 1);
                                    ?>
                                    <td><?php echo $str?></td>
                                <?php }else{?>
                                    <td><font color="red"><b><?php if(get_leadTime($rows['endDate'])==1){echo "1";}else{echo "0";}?><span class="glyphicon glyphicon-exclamation-sign"></span></td>
                                <?php }?>
                                <td><?php  echo $rows['reasonForRepair'];?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>

                    <!-------- On Going Repairs -------->
                    <!-- Form Name -->
                    <legend align="center"><b><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;ON GOING REPAIRS</b></legend>

                    <!-- Text input-->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>RCD</th>
                            <th>Start Date</th>
                            <TH>End Date</TH>
                            <th>Lead<br>Days</th>
                            <th>Reason For Repair</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data2 as $rows){?>
                            <tr>
                                <td><?php echo $rows['repairCode']?></td>
                                <td><?php echo $rows['startDate']?></td>
                                <td><?php echo $rows['endDate']?></td>

                                <?php if(get_leadTime($rows['endDate'])>1){
                                    $str = substr(get_leadTime($rows['endDate']), 1);
                                    ?>
                                    <td><?php echo $str?></td>
                                <?php }else{?>
                                    <td><font color="red"><b><?php if(get_leadTime($rows['endDate'])==1){echo "1";}else{echo "0";}?><span class="glyphicon glyphicon-exclamation-sign"></span></td>
                                <?php }?>
                                <td><?php echo $rows['reasonForRepair'];?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    <!-------- Recently Completeled -------->
                    <!-- Form Name -->
                    <legend align="center"><b><span class="glyphicon glyphicon-ok"></span> COMPLETED REPAIRS</b></legend>

                    <!-- Text input-->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>RCD</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Date Finished</th>
                            <th>Reason For Repair</th>
                            <th>Repair Status</th>
                            <th>Repair<br>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data3 as $rows){?>
                            <?php if($rows["finishedDate"] != "" || isset($rows["finishedDate"])){;?>
                            <tr>
                                <td><?php echo $rows['repairCode']?></td>
                                <td><?php echo $rows['startDate']?></td>
                                <td><?php echo $rows['endDate']?></td>
                                <td><?php echo $rows['finishedDate']?></td>
                                <td><?php echo $rows['reasonForRepair'];?></td>
                                <td><?php get_repairRemarksRS($rows['remStatus'])?></td>
                                <td><?php echo $rows['remarks'];?></td>
                            </tr>
                                <?php }?>
                        <?php }?>
                        </tbody>
                    </table>

        </div></center>
<?php
require_once ('navbar.php');
?>


<script>
    $(document).on('ready', function() {
        $("#input-folder-1").fileinput({
            browseLabel: 'Select Folder...'
        });
    });
</script>
</center>
</body>
</html>
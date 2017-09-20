<?php
include 'funcs.php';
$db = new PDO('mysql:host=127.0.0.1;dbname=deichmannDB', 'root', 'root');
$artifactsArr = retrieveArtifacts();
$dataZ = get_agedrepraised();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Maintenance Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- datepicker -->
    <!-- Date Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        body{

            font-family: "TW Cen MT", sans-serif;
            background-color: azure;
            padding-top: 5%;
            padding-left: 3%;

        }
        #chartdiv {
            width	: 100%;
            height	: 500px;
        }
        .panel{

            width: 98%;
            padding: 1% 3% 3% 3%;
        }
        .panel-info{
            width: 98%;
            padding: 0% 0% 0% 0%;
            background-color: white;
            box-shadow: 1.5px 3px 3px 1.5px #888888;
        }
        .panel-heading{
            padding: 3% 5% 5% 5%;
        }
        .panel-body{
            padding: 3% 0% 5% 0%
        }
        .panel-primary{
            padding: 0% 0% 0% 0%

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

            text-align: left;
            padding: 3;
            padding-bottom: 1.5em;
            padding-left: 1em;
            padding-top: 0.5em;


        }
        /**** fieldset ****/
        fieldset.scheduler-border {
            border: solid 1px #DDD !important;
            padding: 0 10px 10px 10px;
            border-bottom: none;
        }

        legend.scheduler-border {
            width: auto !important;
            border: none;
            font-size: 14px;
        }

        /**** NEW CSS V ****/
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .btn-circle.btn-lg {
            width: 50px;
            height: 50px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 25px;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 35px;
        }
        /**********/

        .form-control{

            width: 75%;

        }
        .form-control1{

            width: 75%;

        }
        .form-control3{
            width: 15%
        }
        .form-control21{
            width: auto;
        }
        .form-control2{

            width: 50%;

        }
        .form-control4{
            width: auto;
        }
        .form-control5{
            width: 14%;
        }
        .col-sm-5{
            padding: 0% 3% 3% 3%
        }
        .images{

            display: inline;
            margin: 0px;
            padding: 0px;

        }
        .btn-primary{
            width: 80%
            text-align: center;

        }
        h3{
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


<body onLoad="$('#my-modal').modal('show');">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <span class="glyphicon glyphicon-search" style="display:inline-block"></span>&nbsp;<h4 class="modal-title">SEARCH ARTIFACT - Choose Artifact</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">

                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <!-- PLEASE UPDATE DIS MODAERPAKER -->
                                        <th>Artifact Name</th>
                                        <th>Location</th>
                                        <th>Status</th>

                                        </thead>
                                        <tbody>
                                        <?php  foreach ($artifactsArr as $rows) { ?>
                                            <tr>
                                                <td><a href="" type="submit" class="submit" data-dismiss="modal" onclick="gamol(this);"><?php  echo $rows['artifactName']?></a></h4></td>
                                                <td><?php  chkLocation($rows['location']); ?></td>
                                                <td><?php  chkSTAT($rows['artifactStatus']);?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
<!-- chart starts here -->
<?php
$ctr=1;
$ctrStop=31;
$data = NULL;
$anal = NULL;
$rap = NULL;
$beh = NULL;
$repPts = 0;
$tA=0;
$tB=0;
$tC=0;
$rapType=NULL;

if (isset($_POST['submit1']) OR isset($_POST['submit2']) OR isset($_POST['submit4'])){
    if (isset($_POST['submit1'])) {
        $a = explode('/', $_POST['d8']);

        $data = get_repraisalMONTH($_POST['d8'], get_artifactCode($_POST['artN'])); // input for artifact code
        $anal = get_repCntMNTH($_POST['d8'], get_artifactCode($_POST['artN']));
        //echo count($data);
        //echo "<br>MONTHLY GADDI";
        $rapType = 1;
    }
    else if (isset($_POST['submit2'])) {
        $data = get_repraisalYEAR($_POST['year'], get_artifactCode($_POST['artNN']) ); // input for artifact code
        $anal = get_repCntYR($_POST['year'], get_artifactCode($_POST['artNN']));
        //echo count($data);
        //echo "<br>YEARLY GADDI";
        $rapType = 2;
    }

    else if (isset($_POST['submit4'])) {
        $data = get_repraisalSET($_POST['sd'],$_POST['ed'], get_artifactCode($_POST['artNNN'])); // input for artifact code
        $anal = get_repCntSET($_POST['sd'],$_POST['ed'], get_artifactCode($_POST['artNNN']));
        //echo count($data);
        //echo "<br>SET GADDI";
        $rapType = 3;
    }
    ?>
    <div id="chartz" class="container" style="background-color: white;box-shadow: 10px 10px 5px #888888;">
        <div  class="row">
            <button type="button" onclick="toggle()" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
            <h3 align="center" id="chartd" >Repairs Conducted For <b> -
                    <?php
                    if(isset($_POST['artN'])) {
                        echo $_POST['artN'];
                    }
                    else if(isset($_POST['artNN'])) {
                        echo $_POST['artNN'];
                    }
                    else if(isset($_POST['artNNN'])) {
                        echo $_POST['artNNN'];
                    }
                    ?></b>
                on
                <?php
                if(isset($_POST['artN'])) {

                    $a = explode('/', $_POST['d8']);
                    echo jdmonthname($a[1],3). " - " . $a[1];
                }
                else if(isset($_POST['artNN'])) {
                    echo $_POST['year'];
                }
                else if(isset($_POST['artNNN'])) {
                    echo $_POST['sd']." - ".$_POST['ed'];
                }
                ?>
            </h3>

            <div id="chartdiv" >

            </div>
        </div>
        <hr>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <center> <h3 align="center" ><b><span class="glyphicon glyphicon-list-alt "></span> Reappraisal Inspection </b></h3></center>

            <div class="well">
                <?php
                foreach ($anal as $lyze){
                    switch ($lyze['repairType']){
                        case 1:
                            $tA++;
                            $repPts+=1;
                            break;
                        case 2:
                            $tB++;
                            $repPts+=3;
                            break;
                        case 3:
                            $tC++;
                            $repPts+=5;
                            break;
                    }
                }
                ?>
                <dl class="dl-horizontal">

                    <dt>Total Repair Count</dt>
                    <dd><?php echo count($anal);?></dd>
                    <dt>Type A Repairs[1 RP]:</dt>
                    <dd><?php echo $tA;?></dd>
                    <dt>Type B Repairs[3 RP]:</dt>
                    <dd><?php echo $tB;?></dd>
                    <dt>Type C Repairs[5 RP]:</dt>
                    <dd><?php echo $tC;?></dd>
                    <dt>Total Reappraisal Pts: </dt>
                    <dd><?php echo $repPts;?></dd>

                </dl><!-- monthly, yearly, set -->
                <div class="panel panel-info">
                    <div class="panel-heading"><b>RECOMMENDED ACTION</b></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php if ($rapType == 1) { ?>
                                <?php if ($repPts >= 0 AND $repPts < 5 ){ ?>
                                    <div class="alert alert-success">
                                        <strong>Normal</strong> Artifact is fit for display.
                                    </div>
                                <?php }
                                else if ($repPts >= 5 AND $repPts < 10) { ?>
                                    <div class="alert alert-warning">
                                        <strong>Caution</strong> Artifact is still fit for display but proceed
                                        with care.
                                    </div>
                                <?php } else if ($repPts >= 10) { ?>
                                    <div class="alert alert-warning">
                                        <strong>Hazard</strong> Artifact had severe or conducted plenty repairs.
                                        Fit for disposal.
                                    </div>
                                <?php }
                            }?>
                            <?php if ($rapType == 2) { ?>
                                <?php if ($repPts >= 1 AND $repPts < 19  ){ ?>
                                    <div class="alert alert-success">
                                        <strong>Normal</strong> Artifact is fit for display.
                                    </div>
                                <?php }
                                else if ($repPts >= 20 AND $repPts < 39) { ?>
                                    <div class="alert alert-warning">
                                        <strong>Caution</strong> Artifact is still fit for display but proceed
                                        with care.
                                    </div>
                                <?php } else if ($repPts >= 40) { ?>
                                    <div class="alert alert-warning">
                                        <strong>Strongly Advised To Dispose</strong> Artifact had severe or conducted plenty repairs.
                                        Fit for disposal.
                                    </div>
                                <?php }
                            }?>
                            <?php if ($rapType == 3) {
                                $rapa = 0;
                                $dat = date('Y-m-d', strtotime(str_replace('-','/', $_POST['ed'])));
                                $dat.= "";
                                $date1=date('Y-m-d', strtotime(str_replace('-','/', $_POST['sd'])));
                                $date1.="";
                                $curr=date_create($date1);
                                $end=date_create($dat);

                                $diff=date_diff($curr,$end);

                                $echo = $diff->format("%R%d");

                                if ($echo >=1 AND $echo <=7){
                                    $rapa = 1;
                                }

                                else if ($echo >=8 AND $echo <=10){
                                    $rapa = 2;
                                }

                                else if ($echo >=11){
                                    $rapa = 3;
                                }
                                if($rapa == 1){
                                    if ($repPts >= 0 AND $repPts < 5){ ?>
                                        <div class="alert alert-success">
                                            <strong>Normal</strong> Artifact is fit for display.
                                        </div>
                                    <?php }
                                    else if ($repPts >= 5 AND $repPts < 10) { ?>
                                        <div class="alert alert-warning">
                                            <strong>Caution</strong> Artifact is still fit for display but proceed
                                            with care.
                                        </div>
                                    <?php } else if ($repPts >= 10) { ?>
                                        <div class="alert alert-warning">
                                            <strong>Hazard</strong> Artifact had severe or conducted plenty repairs.
                                            Fit for disposal.
                                        </div>
                                    <?php }?>

                                    <?php if($rapa == 2){
                                        if ($repPts >= 0 AND $repPts < 5){ ?>
                                            <div class="alert alert-success">
                                                <strong>Normal</strong> Artifact is fit for display.
                                            </div>
                                        <?php }
                                        else if ($repPts >= 5 AND $repPts < 10) { ?>
                                            <div class="alert alert-warning">
                                                <strong>Caution</strong> Artifact is still fit for display but proceed
                                                with care.
                                            </div>
                                        <?php } else if ($repPts >= 10) { ?>
                                            <div class="alert alert-warning">
                                                <strong>Hazard</strong> Artifact had severe or conducted plenty repairs.
                                                Fit for disposal.
                                            </div>
                                        <?php }?>
                                    <?php }?>

                                    <?php if($rapa == 3){
                                        if ($repPts >= 0 AND $repPts < 5){ ?>
                                            <div class="alert alert-success">
                                                <strong>Normal</strong> Artifact is fit for display.
                                            </div>
                                        <?php }
                                        else if ($repPts >= 20 AND $repPts < 39) { ?>
                                            <div class="alert alert-warning">
                                                <strong>Caution</strong> Artifact is still fit for display but proceed
                                                with care.
                                            </div>
                                        <?php } else if ($repPts >= 40) { ?>
                                            <div class="alert alert-warning">
                                                <strong>Hazard</strong> Artifact had severe or conducted plenty repairs.
                                                Fit for disposal.
                                            </div>
                                        <?php }?>
                                    <?}?>
                                <?php }?>
                            <?php }?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <hr style="border-top: dotted 1px;" />
<?php }?>
<!-- chart starts here -->

<div class="container" style="background-color: white; box-shadow: 10px 10px 5px #888888;">

    <h2 align="center" ><b><span class="glyphicon glyphicon-equalizer"></span> REAPPRAISAL ANALYSIS </b></h2>
    <hr>
    <div class="col-md-8" style="background-color:white;">
        <div class="row">
            <div class="col-md-3">
                <h3 style="color: blue; text-align: right;"><b>ARTIFACT</b></h3>
            </div>
            <div class="col-md-9">
                <br>
                <div class="input-group" style="width: auto;">

                              <span class="input-group-btn">
                                <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>
                              </span>
                    <input id="artNm" name="artNm"  data-toggle="tooltip" data-placement="top" title="gago ka ba waaha!" type="text" class="form-control input-md" disabled/><br>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3">
                <hr>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><b>MONTHLY <i style="color: brown" class="glyphicon glyphicon-hourglass"></i></b></legend>


                    <form action="" method="post">
                        <!-- Date input -->
                        <input class="form-control" style="width: 100%" id="month" name="month" placeholder="MM/YYYY" type="text"/>
                        <hr>

                        <input type="hidden" name="rapbeh" id="rapbeh" value="">
                        <input type="hidden" name="artN" id="artN" value="">
                        <input type="hidden" name="d8" id="d8" value="">
                        <button type="submit" id="sumbit1" name ="submit1" style="display: none;" ></button>

                    </form>
                    <center>
                        <button type="button" class="btn btn-info btn-sm" onclick="pasok(1);" data-validate="contact-form" ><i class="glyphicon glyphicon-ok"></i> Generate</button>
                    </center>
                </fieldset>


            </div>
            <div class="col-md-3">
                <hr>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><b>YEARLY </b> <i style="color: brown" class="glyphicon glyphicon-hourglass"></i></legend>

                    <form action="" method="post">
                        <!-- Date input -->
                        <input class="form-control" style="width: 100%; " id="year" name="year" placeholder="YYYY" type="text"/>
                        <hr>
                        <input type="hidden" name="rapbeh" id="rapbeh" value="">
                        <input type="hidden" name="artNN" id="artNN" value="">
                        <input type="hidden" name="d8" id="d8" value="">
                        <button type="submit" id="sumbit2" name ="submit2" style="display: none;" ></button>
                    </form>
                    <center>
                        <button type="button" class="btn btn-info btn-sm" onclick="pasok(2);" data-validate="contact-form" ><i class="glyphicon glyphicon-ok"></i> Generate</button>
                    </center>
                </fieldset>

            </div>

            <div class="col-md-6">
                <hr>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><b>SPECIFIED<i style="color: brown" class="glyphicon glyphicon-hourglass"></i></b></legend>


                    <form action="" method="post">
                        <!-- Date input -->
                        <div>
                            <input class="form-control" style="width: 45%;float:left; font-size: 12px;" id="dateSet1" name="date" placeholder="START-MM/DD/YYYY" type="text"/>&nbsp;

                            <input class="form-control" style="width: 45%; display: inline; font-size: 12px" id="dateSet2" name="date" placeholder="END-MM/DD/YYYY" type="text"/>
                        </div>

                        <input type="hidden" name="rapbeh" id="rapbeh" value="">
                        <input type="hidden" name="artNNN" id="artNNN" value="">
                        <input type="hidden" name="sd" id="sd" value="">
                        <input type="hidden" name="ed" id="ed" value="">
                        <hr>
                        <button type="submit" id="sumbit4" name ="submit4" style="display: none;" data-validate="contact-form" ></button>
                    </form>

                    <center>
                        <button type="button" class="btn btn-info btn-sm" onclick="pasok(4);" ><i class="glyphicon glyphicon-ok"></i> Generate</button>
                    </center>
                </fieldset>
            </div>
        </div>
        <hr>
    </div>

    <div class="col-md-4 ">
        <div class="panel panel-info">
            <div class="panel-heading"> <center><b>REAPPRAISAL DUE TO AGE</b></center>
            </div>
            <div class="panel-body" style="max-height: 200px; overflow-y: scroll;">
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Artifact Name</th>
                        <th>Acquisiton Date</th>
                    </tr>

                    </thead>
                    <tbody>

                    <!-- backend mo to  -->
                    <?php foreach ($dataZ as $rows){?>
                        <tr><td><?php echo $rows['artifactName']?></td><td> <?php echo $rows['acquisitionDate']?> </td></tr>
                    <?php }?>
                    <!-- wahahah -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="HomepageAdmin.html">Museo Pambata</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Maintenance Module:</a></li>
            <li><a href="UpdateLogAdmin.html"><span class="glyphicon glyphicon-comment"></span>&nbsp; Update Log</a></li>
            <li><a href="../LoginMock.html"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Sign Out</a></li>
        </ul>
    </div>
</nav>


<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <li>hi</li>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="HomepageAdmin.html">HOME<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>

                <li class="dropdown">
                    <a href="AdminModule.html" class="dropdown-toggle" data-toggle="dropdown">EMPLOYEES <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="AdminModule.html">Add New Employee</a></li>
                        <li><a href="ListofEmployees.html">List of Employees</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="SearchExhibit.html" class="dropdown-toggle" data-toggle="dropdown">ARTIFACTS <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="SearchExhibitAdmin.html">Artifact Catalog</a></li>
                        <li><a href="EditInfoAdmin.php">Edit Artifact Info</a></li>
                    </ul>
                </li>

                <li ><a href="AcquisitionAdmin.html">ACQUISITION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-plus-sign"></span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="NewRepairForm.php">New Repair Schedule</a></li>
                        <li><a href="RecentRepairSchedule.php">Recent Repair Schedules</a></li>
                        <li><a href="RepraisalArtifactAdmin.php">Repraisal Artifact Module</a></li>
                        <li><a href="CompleteRepairSched.html"> Complete Repair Schedule</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">DISPOSAL <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-trash"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="DeaccessionAdmin.html">Deaccession of Item</a></li>
                        <li><a href="ViewDeaccessionAdmin.html">View Deaccession Records</a></li></li>
                    </ul>
                </li>

                <li><a href="FileRepositoryAdmin.html">FILE REPOSITORY<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>

                <li><a href="GenerateReports.php">GENERATE REPORTS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>

            </ul>
        </div>
    </div>
</nav>
<script>

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
    $(document).ready(function(){
        var date_input=$('input[name="month"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/yyyy',
            viewMode: "months",
            minViewMode: "months",
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });
    $(document).ready(function(){
        var date_input=$('input[name="year"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy',
            viewMode: "years",
            minViewMode: "years",
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });

    function toggle(){
        document.getElementById('chartz').hidden = true;
    }
    function pasok(a){
        console.log('pumasok');
        var txt = 0+a;
        switch(txt) {
            case 1:
                if(document.getElementById('month').value == "" || document.getElementById('artNm').value == "" ){
                    alert('gago mali');
                }
                else {
                    document.getElementById('artN').value = document.getElementById('artNm').value.valueOf();
                    document.getElementById('d8').value = document.getElementById('month').value.valueOf();
                    $('#sumbit1').click();
                }
                break;
            case 2:
                if(document.getElementById('year').value == "" || document.getElementById('artNm').value == ""){
                    alert('gago mali');
                }
                else{
                    document.getElementById('artNN').value = document.getElementById('artNm').value.valueOf();
                    document.getElementById('d8').value = document.getElementById('year').value.valueOf();
                    $('#sumbit2').click();
                }
                break;

            case 4:
                if(document.getElementById('dateSet1').value.valueOf() == "" || document.getElementById('dateSet2').value.valueOf() == "" || document.getElementById('artNm').value == ""){
                    alert('gago mali');
                }
                else{
                    console.log(document.getElementById('dateSet1').value.valueOf() + " , " + document.getElementById('dateSet2').value.valueOf());
                    $end = document.getElementById('dateSet2').value.valueOf();
                    $start = document.getElementById('dateSet1').value.valueOf();
                    console.log($end);
                    console.log($start);

                    if($start > $end && $end!="" && $start !=""){
                        alert('CANT HIGHER DATE THEN LOWERDATE');
                        document.getElementById('enD').value = document.getElementById('stD').value.valueOf();
                    }
                    else {
                        document.getElementById('artNNN').value = document.getElementById('artNm').value.valueOf();
                        document.getElementById('sd').value = document.getElementById('dateSet1').value.valueOf();
                        document.getElementById('ed').value = document.getElementById('dateSet2').value.valueOf();
                        $('#sumbit4').click();
                    }
                }
                break;
        }

    }
    function gamol(a){

        var name = $(a).closest("tr").find("td:eq(0)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/

        $("#artNm").val(name);
        /*$("#artNm").val(name2);*/

    }

    $(document).ready(function() {
        $('#example').DataTable();
    });
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [
            <?php  if(isset($_POST['rapbeh'])){

            foreach ($data as $rows) {
            //while ($rows['startDate'] != ){
            //}
            ?>
            {

                "artName":"<?php
                    if(isset($_POST['artN'])) {
                        echo $_POST['artN'];
                    }
                    else if(isset($_POST['artNN'])) {
                        echo $_POST['artNN'];
                    }
                    else if(isset($_POST['artNNN'])) {
                        echo $_POST['artNNN'];
                    }

                    ?>",
                <?php if ($rows['RepCnt']>0){?>
                "customBullet":"https://www.amcharts.com/lib/3/images/redstar.png",
                <?php }?>
                "date": "<?php echo $rows['RepDate'];?>",
                "value": '<?php echo $rows['RepCnt'];?>'
            },

            <?php
            }
            }
            ?>
            /* {
                "date": "2017-10-26",
                "value": 12,
                "customBullet": "https://www.amcharts.com/lib/3/images/redstar.png"
            }, {
                "date": "2017-10-27",
                "value": 13
            }, {
                "date": "2017-10-30",
                "value": 13
            }, {
                "date": "2017-11-01",
                "value": 13
            }, {
                "date": "2017-11-02",
                "value": 13
            }, {
                "date": "2017-11-03",
                "value": 14
            }, {
                "date": "2017-11-04",
                "value": 15
            }*/
        ],
        "valueAxes": [{
            "axisAlpha": 0,
            "dashLength": 4,
            "position": "left"
        }],
        "graphs": [{

            "fillColorsField": "lineColor",
            "lineColorField": "lineColor",
            "bulletSize": 14,
            "bullet": "round",
            "customBulletField": "customBullet",
            "valueField": "value",
            "balloonText":"<div style='margin:10px; text-align:left;'><span style='font-size:13px'>[[category]]</span><br><span style='font-size:18px'>Number of Repairs:[[value]]</span><?php echo "";?><br><span style='font-size:10px'>Artifact Name: </span><b style='font-size:13px'>[[artName]]</b>",
        }],
        "marginTop": 20,
        "marginRight": 70,
        "marginLeft": 40,
        "marginBottom": 20,
        "chartCursor": {
            "graphBulletSize": 1.5,
            "zoomable":false,
            "valueZoomable":true,
            "cursorAlpha":0,
            "valueLineEnabled":true,
            "valueLineBalloonEnabled":true,
            "valueLineAlpha":0.2
        },
        "autoMargins": false,
        "dataDateFormat": "YYYY-MM-DD",
        "categoryField": "date",
        "valueScrollbar":{
            "offset":30
        },
        "categoryAxis": {
            "parseDates": true,
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": true,
            "tickLength": 0
        },
        "export": {
            "enabled": true
        }
    });


</script>

</body>
</html>
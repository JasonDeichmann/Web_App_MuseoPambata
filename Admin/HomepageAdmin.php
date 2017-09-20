<!DOCTYPE html>
<?php
include 'funcs.php';
//Start session
session_start();
$dataZ = get_agedrepraised();
$dataX = recentAddedArtifact();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
?>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MUSEO PAMBATA | Admin Homepage</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
    
        <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
        <link href ="../CSS/mostviewedArtifact.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
        
        <style>
            body{
                
                font-family: "TW Cen MT", sans-serif;
                background-color: azure;
                padding-top: 5%;
                padding-left: 3%;
                font-size: 15px;
                
            }
            .link-button {
                background: none;
                border: none;
                color: royalblue;
                text-decoration: underline;
                cursor: pointer;
                font-size: 1em;
                font-family: serif;
            }
            .link-button:focus {
                outline: none;
            }
            .link-button:active {
                color:red;
            }

            .panel-entirebody{
                padding-left: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 10px;
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
            #table-wrapper {
                position:relative;
                padding-left: 20px;
                padding-bottom: 20px;
                padding-right: 20px;
            }
            
            #table-scroll { /**DESIGN NG MISMONG SCROLL - KUNG KAILAN MAGKAKARON NG SCROLL**/
                height:100px;
                overflow:auto;  
                margin-top:20px;
                
            }
            
            #table-wrapper table { /**WIDTH NG TABLE NA MAY SCROLL**/
                width:100%;

            }
            
            #table-wrapper table * { /**BORDER DESIGN PARA SA SCROLL BAR**/
                background: #e6f0ff;
                border-bottom:1px solid #b3d1ff;
            }
            
        </style>
    
<body>
    <div class="container">
        <div class ="row">
            <div class="panel panel-default">
                <?php
                if($_SESSION['userType'] == 1)
                    echo '<h2 align = "center"><B>WELCOME, ADMIN!</B></h2><body onload="startTime()">';
                else if($_SESSION['userType'] == 2)
                    echo '<h2 align = "center"><B>WELCOME, USER!</B></h2><body onload="startTime()">';
                else if($_SESSION['userType'] == 3)
                    echo '<h2 align = "center"><B>WELCOME, USER!</B></h2><body onload="startTime()">';
                ?>
                <H4 align = "center"><label id="stringDate"></label> &nbsp;&nbsp; | &nbsp;&nbsp;<label id="txt" align="center"><p class="bg-info"></p>
</b></H4>
                <HR>

                <div class ="panel-body">
                        <div class = "col-lg-6">
                            <?php
                            if($_SESSION['userType'] == 1 || $_SESSION['userType'] == 3) {
                                echo '<div class="panel panel-info">';
                                echo '<div class="panel-heading">';
                                echo '<span class="glyphicon glyphicon-comment"></span>&nbsp; <big><b>Repair Schedules for Approval</b></big>';
                                echo '</div>';
                                echo '<div id="table-wrapper">';
                                echo '<div id="table-scroll">';
                                if ($_SESSION['userType'] == 1) {
                                    $repairSchedules = getRepairSchedulesAdmin();
                                    foreach ($repairSchedules as $repairSchedule) {
                                        $repairSched = $repairSchedule[0];
                                        $once = 0;
                                        $repairCodes = getRepairCodePending();
                                        foreach ($repairCodes AS $repairCode) {
                                            if ($repairCode['repairCode'] == $repairSched AND $once == 0) {
                                                echo '<form method="post" action="RepairFormApprove.php" class="inline">';
                                                echo '<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp';
                                                echo '<input type="hidden" name="repairCode" value="' . $repairSchedule[0] . '">';
                                                echo '<button type="submit" name="submitButton" value="" class="link-button">';
                                                echo 'Repair Form ' . $repairSchedule[0];
                                                echo '</button><br>';
                                                echo '</form>';
                                                $once = 1;
                                            }
                                        }
                                        $repairCodes = getRepairCodePendingOutsource();
                                        foreach ($repairCodes AS $repairCode) {
                                            if ($repairCode['repairCode'] == $repairSched AND $once == 0) {
                                                echo '<form method="post" action="RepairFormApprove.php" class="inline">';
                                                echo '<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp';
                                                echo '<input type="hidden" name="repairCode" value="' . $repairSchedule[0] . '">';
                                                echo '<button type="submit" name="submitButton" value="" class="link-button">';
                                                echo 'Repair Form ' . $repairSchedule[0];
                                                echo '</button><br>';
                                                echo '</form>';
                                                $once = 1;
                                            }
                                        }
                                    }
                                } else if ($_SESSION['userType'] == 3) {
                                    $repairSchedules = getRepairSchedulesMaintenance();
                                    foreach ($repairSchedules as $repairSchedule) {
                                        $repairSched = $repairSchedule[0];
                                        $once = 0;
                                        $repairCodes = getRepairCodePending();
                                        foreach ($repairCodes AS $repairCode) {
                                            if ($repairCode['repairCode'] == $repairSched AND $once == 0) {
                                                echo '<form method="post" action="RepairFormApprove.php" class="inline">';
                                                echo '<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp';
                                                echo '<input type="hidden" name="repairCode" value="' . $repairSchedule[0] . '">';
                                                echo '<button type="submit" name="submitButton" value="" class="link-button">';
                                                echo 'Repair Form ' . $repairSchedule[0];
                                                echo '</button><br>';
                                                echo '</form>';
                                                $once = 1;
                                            }
                                        }
                                    }
                                }
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }?>

                        </div>
                    <div class="col-md-6 ">
                        <div class="panel panel-info">
                            <div class="panel-heading"> <b style="color: red;"> REAPPRAISAL DUE to AGE</b>
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
                <div class = "row">
                    <div class = "col-md-12">

                        <div class = "col-md-6">
                            <div class="panel panel-info">

                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-heart-empty"></span>&nbsp; <big><b>Most Viewed Artifact</b></big>
                                </div>

                                <div class ="panel-entirebody">
                                    <div class="slideshow-container">

                                        <div class="mySlides fade">
                                            <center>
                                            <img src="../images/museo-pambata-20140426-05.jpg" style="width:100%">
                                                <div class="text"><big><b>Old Manila</b></big></div>
                                        </div>

                                        <div class="mySlides fade">
                                            <center>
                                            <img src="../images/img1.jpg" style="width:100%">
                                                <div class="text"><big><b>Singing People</b></big></div>
                                        </div>

                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                        </center></center></div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        <div class = "col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; <big><b>List of New Artifacts of the Month</b></big>
                                </div>
                                <div class ="panel-entirebody">
                                    <img src="../images/img4.jpg" style="width:100%">
                                    <div id="table-wrapper">
                                            <div id="table-scroll">
                                                <table>
                                                    <?php foreach($dataX as $rows){ ?>
                                                        <tbody>
                                                            <tr><td><p><span class="glyphicon glyphicon-certificate"><a href="#"></span><?php  echo $rows['artifactName']; ?></td></tr></a>
                                                        </tbody>
                                                    <?php }?>
                                                </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
    </div>
    </div>
            </big></big>

<?php
require_once ('navbar.php');
?>
    
<script>

    x = new Date();
    document.getElementById("stringDate").innerHTML = x.toDateString();

    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    
    function startTime() {
                                var today = new Date();
                                var h = today.getHours();
                                var m = today.getMinutes();
                                var s = today.getSeconds();
                                m = checkTime(m);
                                s = checkTime(s);
                                
                                if (today.getHours() > 12){
                                    
                                    h = h - 12;
                                    s = s + " PM";
                                    
                                }else{
                                    s = s + " AM";
                                }
                                
                                
                                document.getElementById('txt').innerHTML =
                                h + ":" + m + ":" + s;
                                var t = setTimeout(startTime, 500);
                            }
                            function checkTime(i) {
                                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                                return i;
                            }
                            
</script>
    </body>
</html>
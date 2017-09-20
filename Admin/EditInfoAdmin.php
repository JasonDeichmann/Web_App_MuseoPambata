<!DOCTYPE html>
<?php
//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
header('Location:../LoginMock.php');
}
if($_SESSION['userType'] != 1){
header('Location:HomepageAdmin.php');
} include 'funcs.php';
$db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');
$artifactsArr = retrieveArtifacts();

if(isset($_POST['artNm'])){
    echo $_POST['artNm'];
    echo $_POST['locNm'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Artifacts Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Date Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <!-- Select Picker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
    <script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap Date -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{

            font-family: "TW Cen MT", sans-serif;
            background-color: azure;
            padding-top: 5%;
            padding-left: 3%;

        }
        .panel{

            width: 98%;
            padding: 1% 3% 3% 3%;
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
        .modal-dialog{
            width: 65%
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
                                        <?php foreach ($artifactsArr as $rows) { ?>
                                            <tr>
                                                <td><a href="" type="submit" class="submit" data-dismiss="modal" onclick="gamol(this);"><?php echo $rows['artifactName']?></a></h4></td>
                                                <td><?php chkLocation($rows['location']); ?></td>
                                                <td><?php chkSTAT($rows['artifactStatus']);?></td>
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

<center>
    <div class="container" >
        <div class ="col-sm-1" style="background-color: white;"></div>
        <div class="col-md-9" style="background-color:	white; box-shadow: 10px 10px 5px #888888;">

            <form method="POST" action="">
                <legend align="center"><b>EDIT ARTIFACT LOCATION</b></legend>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <div class="input-group">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>
                                  </span>
                            <input id="artNm" name="artNm"  data-toggle="tooltip" data-placement="top" title="gago ka ba waaha!" type="text" class="form-control input-md" disabled/><br>
                            <input type="hidden" name="M1" id="m1" value="">
                        </div>
                        <input type="text" placeholder="Artifact Location" id="locNm" name="locNm" class="form-control input-md" value="" disabled/><br>
                        <input type="hidden" name="M2" id="m2" value="">
                        <br>
                        <?php
                        if(isset($_POST['M1'])){
                            update_artLoc(get_artifactCode($_POST['M1']),$_POST['loc12']);
                            echo '<script> location.replace("HomepageAdmin.php");</script>';
                        }
                        ?>
                        <label for="loc12">Choose New Location</label>
                        <select name="loc12" class="selectpicker" id="loc12" data-style="btn-info">
                            <option value="1">Kalikasan</option>
                            <option value="2">Katawan Ko</option>
                            <option value="3"><span class="glyphicon glyphicon-warning-sign" style="color: coral"> Pamilihang Bayan</option>
                            <option value="4" ><span class="glyphicon glyphicon-alert" style="color: darkred"> Maynila Noon</option>
                            <option value="5"><span class="glyphicon glyphicon-folder-close" style="color: darkred"> Tuklas </option>
                            <option value="6"><span class="glyphicon glyphicon-cog" style="color: green"> Traveling Exhibit</option>
                            <option value="7"><span class="glyphicon glyphicon-warning-sign" style="color: coral"> Paglaki Ko</option>
                            <option value="8" ><span class="glyphicon glyphicon-alert" style="color: darkred"> Bata Sa Mundo</option>
                            <option value="9"><span class="glyphicon glyphicon-folder-close" style="color: darkred"> Other Areas</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submitBtn" id="submitBtn" style="display:none;"  data-validate="contact-form">Hidden Button</button>
                <div class="row">
                    <br>
                    <center>
                        <button type = "button" id="submit" name="submit" onclick="validata()" class="btn btn-success btn-lg" >Update Location</button>
                    </center>
                    <br>
                </div>
            </form>
        </div>
    </div>
</center>

<?php
require_once ('navbar.php');
?>

<script>

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $(document).ready(function(){
        $('#modal2').modal('show');
    });

    $(document).ready(function(){
        $('#my-modal').modal('show');
    });
    $(document).on('ready', function() {
        $("#input-folder-1").fileinput({
            browseLabel: 'Select Folder...'
        });
    });
    function gamol(a){

        var name = $(a).closest("tr").find("td:eq(0)").text();
        var loc = $(a).closest("tr").find("td:eq(1)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/


        $("#artNm").val(name);
        $("#locNm").val(loc);

        $("#m1").val(name);
        $("#m2").val(document.getElementById("loc12").innerHTML);

        console.log(document.getElementById("loc12"));
        console.log(name);
        console.log(loc);

    }
    function validata(){
        var flag=true;

        if (document.getElementById("artNm").value.valueOf() === ""){
            flag=false;
        }

        if (flag) {
            alert('Update Complete!');
            $('#submitBtn').click();
        }
        else {
            alert('INCOMPLETE FORM!');
        }
    }
</script>

</body>
</html></html>
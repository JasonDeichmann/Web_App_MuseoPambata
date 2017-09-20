<?php
include 'funcs.php';

//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
if($_SESSION['userType'] > 2){
    header('Location:HomepageAdmin.php');
}

$db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');
$artifactsArr = retrieveArtifacts();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Disposal Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/Museo Pambata Logo.png"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

    function explodeUGH(values)
    {

        if(values)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/checkdata.php',
                data: {
                    values:values
                },
                success: function (response) {
                    $( '#M4' ).html(response);

                }
            });
        }
        else
        {
            $( '#M4' ).html("");
            return false;
        }
    }

</script>

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
    .modal-dialog{
        min-width: 50%;
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
                                                <td><a href="" type="submit" class="submit" data-dismiss="modal" onclick="postTable(this);"><?php echo $rows['artifactName']?></a></h4></td>
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

<body onLoad="$('#modal2').modal('show');">
<!-- Modal -->
<div id="Modal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div id="content">
                <div class="modal-header">
                    <h4 class="modal-title" align="center"> DEACCESSION FORM SUMMARY &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</h4>
                </div>
                <form action="DeaccessionAdmin.php" method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <br>
                                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <th>DEACCESSION</th>
                                                <th>RECORD</th>
                                                </thead>

                                                <tr>
                                                    <td><label for="M1">Artifact Name:  </label></td>
                                                    <td><h7 id="M1">Old Header</h7></td>
                                                    <input type="hidden" name="M1" id="m1" value="">
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Date: </label></td>
                                                    <td><h7 id="M3">Old Header</h7></td>
                                                    <input type="hidden" name="M3" id="m3" value="">
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Reasons for Disposal:</label></td>
                                                    <td><h7 id="M4">Old Header</h7></td>
                                                    <input type="hidden" name="M4" id="m4" value="">
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Mode Of Disposal: </label></td>
                                                    <td><h7 id="M5">Old Header</h7></td>
                                                    <input type="hidden" name="M5" id="m5" value="">
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Details: </label></td>
                                                    <td><h7 id="M6">Old Header</h7></td>
                                                    <input type="hidden" name="M6" id="m6" value="">
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"  name="submit" >CONFIRM</button>
                <button class = "btn btn-primary" id="cmd">Save as PDF</button>
            </div>
            </form>

        </div>
    </div>
</div>
</body>
<center>
    <div class="container">

        <div class="form-group" >
            <div class="col-sm-1" style="background-color:white;">


            </div>
            <div class="col-md-9" style="background-color:	white;">
                <form class="form-horizontal">
                    <fieldset>

                        <!-- Form Name -->
                        <legend align="center"><b>CREATE DEACCESSION RECORD</b></legend>

                        <!-- Text input-->
                        <div class="row">

                            <div class="form-group">

                                <div class="col-md-7">

                                    <a href="#" data-toggle="tooltip" data-placement="top" title="gago ka ba waaha!"> <h2><b>ARTIFACT NAME</b></h2> </a><br>

                                    <div class="input-group">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>
                                          </span>
                                        <input id="artNm" name="deaccession number"  data-toggle="tooltip" data-placement="top" title="gago ka ba waaha!" type="text" class="form-control input-md" disabled/><br>

                                    </div>
                                     </div>
                                <div class="col-md-5">
                                    <div align='center'><h4><?php echo date('Y-m-d');?></h4> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">   <hr>
                            <!-- Multiple Checkboxes -->
                            <div class="col-md-6" style="background-color:white;">
                                <div class="form-group">

                                    <label class="col-md-6 control-label" class="Check" for="check">Reasons for Disposal </label>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label for="check-0">
                                                <input type="checkbox" name="check"  class="Check" id="check-0" value="1">
                                                Deteriorated beyond usefulness
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-1">
                                                <input type="checkbox" name="check" class="Check" id="check-1" value="2">
                                                Lacks physical integrity
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-2">
                                                <input type="checkbox" name="check" class="Check" id="check-2" value="3">
                                                Out of Scope/Inappropriate
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-3">
                                                <input type="checkbox" name="check" class="Check" id="check-3" value="4">
                                                Double Entry/is a duplicate
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-5">
                                                <input type="checkbox" name="check"  class="Check" id="check-5" value="6">
                                                Cannot Preserve properly
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-6">
                                                <input type="checkbox" name="check" class="Check" id="check-6" value="7">
                                                More than 4 years in possession
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-7">
                                                <input type="checkbox" name="check" class="Check" id="check-7" value="8">
                                                Lease Ended
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="check-7">
                                                <input type="checkbox" name="check" class="Check" id="check-7" value="8">
                                                Artifact Lost
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Multiple Radios -->
                            <div class="col-md-6" style="background-color:white;">
                                <div class="form-group">
                                    <form id="myForm">
                                        <label class="col-md-6 control-label" for="radios">Mode of Disposal
                                            <br><br><br><br><br><br><br><br>
                                            <label for="textarea">More Details</label>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="radio">
                                                <label for="radios-0">
                                                    <input type="radio" name="radios" id="radios-0" value="1" >
                                                    Donated
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-1">
                                                    <input type="radio" name="radios" id="radios-1" value="2">
                                                    Salvaged
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-2">
                                                    <input type="radio" name="radios" id="radios-2" value="3">
                                                    Sold
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-3">
                                                    <input type="radio" name="radios" id="radios-3" value="4">
                                                    Returned
                                                </label>

                                            </div>
                                    </form>
                                </div>

                                <div align="right">
                                    <br><br>
                                    <textarea class="form-control" id="desc" placeholder="the artifact.." rows="4" name="textarea" required></textarea>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- Textarea -->


            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4" for="singlebutton"></label>
                <div class="col-md-4">
                    <button type = "button" id="asd" name="singlebutton" class="btn btn-warning btn-lg"  onCLick="postModal()">Dispose Artifact</button>
                    <button type="button" id="submitBtn" style="display:none;" onclick="dateFunction()" data-toggle="modal" data-target="#Modal2" data-validate="contact-form">Hidden Button</button>

                </div>
            </div>

            </fieldset>
            </form>

            <div class="col-sm5" style="background-color:white;">

            </div>

        </div></center>
</div>
</div>

    <?php
    require_once ('navbar.php');
    ?>

<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });

    function Post() {
        var ask = window.confirm("Confirm Artifact Disposal?");
        if (ask) {
            window.alert("This Artifact is deaccessioned, it can be viewed at View Deaccessioned Records.");
        }
    }
    function postModal(){
        var checked = $('.Check:checked').map(function() {return this.value;}).get().join(',');
        var mode = $('input[name=radios]:checked').val();

        var flag=true;
        if (document.getElementById("artNm").value.valueOf() === ""){
            flag=false;
        }
        if (checked === ""){
            flag=false;
        }
        if (mode === undefined){
            flag=false;
        }
        console.log(document.getElementById("artNm").value.valueOf());
        console.log(checked);
        console.log(mode);

        if (flag)
            $('#submitBtn').click();
        else
            alert('INCOMPLETE FORM!');

    }
    function dateFunction(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        }
        if(mm<10){
            mm='0'+mm;
        }
        var today = dd+'/'+mm+'/'+yyyy;

        var checked = $('.Check:checked').map(function() {return this.value;}).get().join(',');
        var mode = $('input[name=radios]:checked').val();

        document.getElementById("M1").innerHTML = document.getElementById("artNm").value.valueOf();
        document.getElementById("M3").innerHTML = today;
        document.getElementById("M4").innerHTML = checked;
        document.getElementById("M5").innerHTML = mode;
        document.getElementById("M6").innerHTML = document.getElementById("desc").value;

        document.getElementById("m1").value = document.getElementById("artNm").value.valueOf();
        document.getElementById("m3").value = today;
        document.getElementById("m4").value = checked;
        document.getElementById("m5").value = mode;
        document.getElementById("m6").value = document.getElementById("desc").value;

    }
    function postTable(a){

        var name = $(a).closest("tr").find("td:eq(0)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/

        $("#artNm").val(name);
        /*$("#artNm").val(name2);*/
        console.log(name);

    }

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
</script>
</center>

<?php
if(isset($_POST['submit'])){

    $artifactCode = get_artifactCode($_POST['M1']);
    echo $artifactCode;

    $do = $db->prepare("select artifactCode from artifacts where artifactCode = :artifactCode");
    $do->bindParam(':artifactCode',$artifactCode);

    $do->execute();
    $count = $do->rowCount();
    $row = $do->fetch();
    $rsn = explode(',',$_POST['M4']);
    $a="";
    $ctr=0;
    for($i=0;$i<count($rsn);$i++){
        $rsn[$i]= chkRSN($rsn[$i]);
    }
    $rsn = implode(',', $rsn);
    $date = date('Y-m-d H:i:s');
    $insert = $db->prepare("insert into deaccession(artifactCode, dateOfAccession, reasonsForDisposal, modeOfDisposal, comments) VALUES (:artifactCode,:dateOfAccession,:reasonsForDisposal,:modeOfDisposal,:comments) ");

    $insert->bindParam(':artifactCode',$artifactCode);
    $insert->bindParam(':dateOfAccession',$date);
    $insert->bindParam(':reasonsForDisposal',$rsn);
    $insert->bindParam(':modeOfDisposal',$_POST['M5']);
    $insert->bindParam(':comments',$_POST['M6']);
    $insert->execute();

    $update = $db->prepare("UPDATE artifacts
                                      SET artifactStatus = 3
                                      WHERE artifactCode = :artifactCode;");
    $update->bindParam(':artifactCode',$artifactCode);
    $update->execute();
    echo "<script>alert('Artifact Deacccessed')</script>";
}
?>
</body>
</html>

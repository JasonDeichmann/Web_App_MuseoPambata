<!DOCTYPE html>
<?php
include 'funcs.php';
session_start();
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}

if($_SESSION['userType'] != 1) {
    header('Location:HomepageAdmin.php');
}
// Connect to db
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Employee Management Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>
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

        width: 80%;

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
<body onLoad="$('#my-modal').modal('show');">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"><span class="glyphicon glyphicon-search"></span>&nbsp;EMPLOYEE INFORMATION &nbsp;</h2>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2" align="right" style="background-color:white;">
                            <h5>Employee Name:</h5><br>
                        </div>
                        <div class="col-sm-3" style="background-color:white;">
                            <input type="text" id="i1" class="form-control" readonly/><br>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4><span class="glyphicon glyphicon-tags"></span>&nbsp;ASSIGN TAGS</h4>
                            <div id="tag-table" class="well" style="max-height: 200px; overflow-y: scroll;">
                                <div id="etits">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                ADD NEW TAGS
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" name="newTagBtn" id="newTagBtn" onclick="dagdagBagoTag();"><span class="glyphicon glyphicon-plus-sign"></span></button>
                  </span>
                    <input id="newTag" name="newTag" value="" maxlength="45" size="4" placeholder="New Artifact Tag" type="text" class="form-control" />
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<center>
    <div class="container">
        <div class="col-md-12" style="background-color:	white;">
            <button><span class="glyphicon glyphicon-info-sign" ></span></button>
            <form class="form-horizontal">
                <center><h2><b>LIST OF EMPLOYEES</b></h2></center>
                <hr>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Shift</th>
                        <th>Specialization/s</th>
                        <th>Contact Number</th>
                        <th>E-Mail Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $TagsEmployee = "";
                    $do = $db->prepare('SELECT * FROM employees');
                    $do->execute();
                    $getEmployee = $do->fetchAll(PDO::FETCH_ASSOC);
                    $counter = 0;
                    foreach ($getEmployee AS $employee) {

                        $one = 0;
                        echo '<tr>';
                        if($employee['employeeType'] == 2)
                            echo '<td><a href="#" data-toggle="modal" id="empTag" name = "empTag" data-target="#myModal" onclick="gamol(this, '.$employee["employeeNumber"].')">'.$employee["employeeName"].'</a></td>';
                        else
                            echo '<td>'.$employee["employeeName"].'</td>';
                        $employeeTypeVal = $employee['employeeType'];
                        if ($employeeTypeVal == 1)
                            echo "<td> Exhibits Head </td>";
                        else if ($employeeTypeVal == 2)
                            echo "<td> Exhibits Employee </td>";
                        else if ($employeeTypeVal == 3)
                            echo "<td> Maintenance Head </td>";
                        else if ($employeeTypeVal == 4)
                            echo "<td> Maintenance Employee </td>";
                        echo "<td>" . $employee['shiftStart'] . " - " . $employee['shiftEnd'] . "</td>";

                        $names = "";
                        $do = $db->prepare('SELECT T.tagCode, tagName FROM tags T JOIN employeeTags ET ON T.tagCode = ET.tagCode  WHERE ET.employeeNumber = :employeeNumber');
                        $do->bindParam(':employeeNumber', $employee['employeeNumber']);
                        $do->execute();
                        $getTagNames = $do->fetchAll(PDO::FETCH_ASSOC);
                        echo '<td id="totkan-'.$employee["employeeNumber"].'">';
                        foreach ($getTagNames AS $tagName) {
                            if($counter == 5) {
                                echo '<br><br>';
                                $counter = 0;
                            }
                            $counter++;
                            echo '<span class="badge badge-pill badge-primary" id="pill-'.$tagName["tagCode"].$employee["employeeNumber"].'">'.$tagName["tagName"].'<button type="button" id="'.$tagName["tagName"].'-'.$tagName["tagCode"].'" class="close" onclick="removeTag('.$tagName["tagCode"].','.$employee["employeeNumber"].')">x</button></span>';
                        }
                        echo "</td>";
                        echo "<td>" . $employee['contactNumber'] . "</td>";
                        echo "<td>" . $employee['emailAddress'] . "</td>";
                    }
                    echo '</tr>';
                    ?>

                    </tbody>
                </table>

            </form>

        </div>
    </div></center></body>

<?php
require_once ('navbar.php');
?>

<script>

    function removeTag(tagCode,employeeNumber)
    {
        console.log("pumasok aq sa ajax mo");
        var type = 2;
        if(tagCode)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/removeTag.php',
                data: {
                    tagCode:tagCode,
                    code:employeeNumber,
                    type:type
                },
                success: function (response) {
                    $( "#pill-"+tagCode+""+employeeNumber).remove();
                    return true;
                }
            });
        }
        else
        {
            return false;
        }
    }

    function gamol(a,code){
        var name = $(a).closest("tr").find("td:eq(0)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/
        console.log($(a).text());
        $("#i1").val(name);
        displayTags(code)
        /*$("#artNm").val(name2);*/

    }
    function displayTags(code){
        console.log("dito aq");
        var type = 2;
        if(code)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/displayTags.php',
                data: {
                    employeeNumber:code,
                    type:type
                },
                success: function (response) {
                    $( '#etits').remove();
                    $( '#tag-table').append(response);

                    return true;
                }
            });
        }
        else
        {
            return false;
        }
    }
    function dagdagBagoTag(){

        var tagName = document.getElementById('newTag').value.valueOf();
        var code = document.getElementById('empTag').value.valueOf();
        var type = 2;
        $.ajax({
            type: 'POST',
            url: 'ajax/addNewTag.php',
            data: {
                tagName:tagName,
                code:code,
                type:type
            },
            success: function (response){
                $('#etits').append(response);
                document.getElementById('newTag').value= "";

            }

        });
    }

    function dagdagTag(tagCode,code){
        var type = 2;
        if(tagCode)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/addTag.php',
                data: {
                    tagCode:tagCode,
                    code:code,
                    type:type
                },
                success: function (response) {

                    $("#pill-"+tagCode).remove();
                    $("#totkan-"+""+code).append(response);
                    return true;
                }
            });
        }
        else
        {
            return false;
        }
    }

    $(document).ready(function() {
        $('#example').DataTable();
    } );


    $(document).ready(function(){
        $('#my-modal').modal('show');
    });

    function Post() {
        var ask = window.confirm("Are you sure you want to delete account?");
        if (ask) {
            window.alert("Account deleted.");

            document.location.href = "HomepageAdmin.html";/*LOCATION D2!!*/

        }
    }
    $(document).ready(function() {
        $('#example').DataTable();
    } );


    $(document).ready(function(){
        $('#my-modal').modal('show');
    });


</script>
</center>
</body>
</html>
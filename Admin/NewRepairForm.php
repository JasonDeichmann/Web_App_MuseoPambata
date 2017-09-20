<!DOCTYPE html>
<?php
include 'funcs.php';

$artifactsArr = retrieveArtifacts();
session_start();
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
if($_SESSION['userType'] > 2){
    header('Location:HomepsgeAdmin.php');
}

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Maintenance Module</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />
<script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

</head>

<style>
    option:before { content: "☐ " }
    option:checked:before { content: "☑ " }
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
    .panel-default{
        width: 98%;
        padding: 0% 0% 0% 0%;
    }
    .panel-info{
        width: 98%;
        padding: 0% 0% 0% 0%;
        background-color: white;
        box-shadow: 1.5px 3px 3px 1.5px #888888;
    }
    .modal-dialog  {
        width:55%;
    }
    .panel-body{

        padding: 3% 3% 3% 3%;
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
    .btn-xl {
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 10px;
        width:50%;    //Specify your width here
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

<!-- // FORM MODAL -->

<body onLoad="$('#modal2').modal('show');">
<!-- Modal -->
<div id="Modal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div id="content">
                <div class="modal-header">
                    <h4 class="modal-title" align="center"> REPAIR SCHEDULE SUMMARY &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</h4>
                </div>
                <form name="newRepairSched" id="newRepairSched" action="" method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="custom-search-input">
                                        <div class="input-group col-md-12">
                                            <br>
                                            <table class="table"  background-color="dddddd">
                                                <thead>
                                                <th>NEW</th>
                                                <th>REPAIR SCHEDULE</th>
                                                </thead>
                                                <tr>
                                                    <td><label for="usr">Created By:  </label></td>
                                                    <td><label id="author"><?php echo getEmployeeName($_SESSION['userID']);?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Artifact Name:  </label></td>
                                                    <td><label id="artifactNameMod"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Status Tag: </label></td>
                                                    <td><label id="statusMod"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Start Date - End Date:</label></td>
                                                    <td><label id="startDateMod"></label> - <label id="endDateMod"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Repair Reason/Description: </label></td>
                                                    <td><label id="descriptionMod"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="usr">Repair Mode:</label></td>
                                                    <td><label id="repairModeMod"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label id="repairTypeMod" for="usr"></label></td>
                                                    <td><label id="repaireeMod"></label></td>
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
                <button type="submit" name="submitButton" class="btn btn-primary">CONFIRM</button>
                <button class = "btn btn-primary" id="cmd">Save as PDF</button>

            </div>

        </div>
    </div>
</div>
</body>

<!-- // SEARCH MODAL -->

<body onLoad="$('#my-modal').modal('show');">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">SEARCH ARTIFACT &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</h2>
            </div>
            <div class="modal-body" align="center">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-6">

                            <div id="custom-search-input">
                                <div class="input-group col-md-12">

                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Artifact Name</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                        </tr>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
        </div>

    </div>
</div>
</body>

<!-- // DATA INPUT -->

<center>
    <div class="container" >

        <div class="form-group" >

            <div class="col-md-12" style="background-color:	white; box-shadow: 10px 10px 5px #888888; padding: 5%;">

                    <!-- Form Name -->
                    <legend align="center"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;<b>NEW REPAIR SCHEDULE FORM</b></legend>

                    <!-- Text input-->
                    <div class="row" >
                        <div class="col-md-4">
                                    <!-- Choose Artifact -->
                                    <b>ARTIFACT NAME</b><br><br>
                                    <div class="input-group">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal" onkeyup="recommendedEmployees();" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></button>
                                          </span>
                                        <input id="artifactName" name="artifactName" value="" type="text" class="form-control" onclick="recommendedEmployees();" readonly />
                                    </div>
                                    <br>
                                    <!-- Status -->
                                    <label>Update Status</label>
                                    <select class="form-control" id="status" name="status" width="15%">
                                        <option value="1">On-Display</option>
                                        <option value="2">Inventory-Stashed</option>
                                    </select>

                                     <!-- Date Picker -->
                                    <div class="bootstrap-iso">
                                            <label class="control-label" for="date">Start Date    <span class="glyphicon glyphicon-triangle-left"></span><span class="glyphicon glyphicon-calendar"></span></label>
                                            <input class="form-control" id="startDate" name="startDate" style="width: 50%" value="<?php echo date("m/d/Y");?>" placeholder="mm/d/YYYY" type="text" readonly/>
                                            <label class="control-label" for="date">End Date   <span class="glyphicon glyphicon-calendar"></span><span class="glyphicon glyphicon-triangle-right"></span></label>
                                            <input class="form-control" id="endDate" name="endDate" style="width: 50%" value="" placeholder="mm/dd/YYYY" type="text"/>
                                    </div>

                                    <label>Reason/Description of Repair: </label>
                                    <textarea class="form-control" rows="4" style="width: 98%;"id="description" placeholder="add description"  name="description" value=""></textarea><br>
                        </div>
                        <div class="col-md-5" >

                                <div class="panel panel-default">
                                    <div class="panel-heading">CHOOSE REPAIREES</div>
                                    <div class="panel-body">
                                        <div name="listEmployees" id="listEmployees">
                                            <label>Exhibits Employees:</label>
                                            <select class="form-control" id="repairees" name="repairees[]" width="15%" onclick="var maintenance = document.getElementById('repairees'); var company = document.getElementById('outsourceCompanies'); addRecommend(maintenance, company);" multiple>
                                                <?php
                                                $employees = getExhibitsEmployees();
                                                foreach ($employees as $employee)
                                                    echo '<option value="'.$employee['employeeNumber'].'">'.$employee['employeeName'].'</option>';
                                                ?>
                                            </select>
                                        </div>
                                        <input type="checkbox" name="requestHelp1" id="requestHelp1" value="1" onchange="changeRepairMaintenance()"> Request Help From Maintenance
                                        <br>
                                        <input type="checkbox" name="requestHelp2" id="requestHelp2"  value="2" onchange="changeRepairOutsource()"> Outsource Repair
                                        <br>
                                        <div id="outsourceDiv" hidden>
                                            <br>
                                            <label>Outsourced Companies</label><br>
                                            <select class="form-control" id="outsourceCompanies" name="outsourceCompanies[]" width="15%" onclick="var maintenance = document.getElementById('repairees'); var company = document.getElementById('outsourceCompanies'); addRecommend(maintenance, company);" multiple>
                                                <?php
                                                $companies = getCompanies();
                                                foreach ($companies as $company){
                                                    echo '<option name="company" class="company" value="' . $company['companyCode'] . '">' . $company['companyName'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <label id="outsourceLabel"></label>
                                            <br>

                                            <div class="input-group">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" name="addOutsource" id="addOutsource" onclick="var outsourcedCompanies = document.getElementById('outsourceCompanies'); var outsourcedSpecialization = document.getElementById('outsourceSpecialization'); addNewOutsource(outsourcedCompanies, outsourcedSpecialization);"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                              </span>
                                              <input id="newOutsource" name="newOutsource" value="" placeholder="Organization's Name" type="text"  class="form-control" />
                                            </div>

                                            <!-- <input type="text" name="newOutsource" id="newOutsource" value="" placeholder="Enter outsourcing organization's name"><br><button type="button" name="newOutsource" id="newOutsource" onclick="var outsourcedCompanies = document.getElementById('outsourceCompanies'); var outsourcedSpecialization = document.getElementById('outsourceSpecialization'); addNewOutsource(outsourcedCompanies, outsourcedSpecialization);">Enter</button> -->

                                            <label>Select Specialization(s) for new Outsourcing company</label>
                                            <select class="form-control" id="outsourceSpecialization" name="outsourceSpecialization[]" width="15%" multiple="">
                                                <?php
                                                $tags = getTags();
                                                foreach ($tags as $tag)
                                                    echo '<option name="outsourceTags" class="outsourceTags" value="'.$tag['tagCode'].'">'.$tag['tagName'].'</option>';
                                                ?>
                                            </select>
                                            <br>
                                            <label>Add New Specialization Tag:</label> <br>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" name="newTagButton" id="newTagButton" onclick="var specializationTags = document.getElementById('outsourceSpecialization'); addNewTag(specializationTags);"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                </span>
                                                <input name="newTag" id="newTag" placeholder="Specialization Tag Name" class="form-control">
                                            </div>
                                                <br>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3">

                            <div class="panel panel-info">
                                <div id="nameRecommend" name="nameRecommend" class="panel-heading">Recommended Repairees</div>
                                <div class="panel-body" style="max-height: 200px; overflow-y: scroll;" id="recommendedTable">
                                </div>
                                <div class="panel-footer">
                                    <b>Based on tags</b>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-3">

                            <div class="panel panel-info">
                                <div id="addName" class="panel-heading">Chosen Repairees</div>
                                <div class="panel-body" style="max-height: 200px; overflow-y: scroll;" id="chosenTable">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="form-group">
                            <div align="center"><button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#Modal2" onclick="var maintenance = document.getElementById('repairees'); var company = document.getElementById('outsourceCompanies'); checkAndModal(maintenance, company);">Submit</button> </div>
                        </div>
                    </div>
                </form>
            </div></center>
</div>
</center>
</body>

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

    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $(document).ready(function(){
        $('#modal2').modal('show');
    });

    $(document).ready(function(){
        $('#my-modal').modal('show');
    });

    $(document).ready(function(){
        if($('input[name="endDate"]'))
            var date_input=$('input[name="endDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            dateFormat: 'mm/dd/YYYY',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });





    // Change repair request to maintenance employees
    function changeRepairMaintenance(){
        if (document.getElementById('requestHelp1').checked) {
            document.getElementById('outsourceDiv').style.display = 'none';
            document.getElementById('listEmployees').style.display = 'inline';
            document.getElementById('requestHelp2').checked = false;
            document.getElementById('nameRecommend').innerHTML = "Recommended Repairees";
            document.getElementById('addName').innerHTML = "Chosen Repairees";
            document.getElementById('chosenTable').innerHTML = "";
            recommendedEmployees();
        }
        var maintenance = document.getElementById('repairees');
        var company = document.getElementById('outsourceCompanies');
        addRecommend(maintenance, company);
    }
    // Change repair request to outsource
    function changeRepairOutsource(){
        if(document.getElementById('requestHelp2').checked) {
            document.getElementById('outsourceLabel').innerHTML = "Add New Outsourcing Company:";
            document.getElementById('outsourceDiv').style.display = 'inline';
            document.getElementById('listEmployees').style.display = 'none';
            document.getElementById('requestHelp1').checked = false;
            document.getElementById('nameRecommend').innerHTML = "Recommended Companies";
            document.getElementById('addName').innerHTML = "Chosen Company";
            document.getElementById('chosenTable').innerHTML = "";
            recommendedEmployees();
        }
        else{
            document.getElementById('outsourceDiv').style.display = 'none';
            document.getElementById('listEmployees').style.display = 'inline';
            document.getElementById('nameRecommend').innerHTML = "Recommended Repairees";
            document.getElementById('addName').innerHTML = "Chosen Repairees";
            document.getElementById('chosenTable').innerHTML = "";
            recommendedEmployees();
        }
        var maintenance = document.getElementById('repairees');
        var company = document.getElementById('outsourceCompanies');
        addRecommend(maintenance, company);
    }

    // Modal and error checking
    function checkAndModal(select1, select2){

        //ERROR CHECKING
        var flagError = 0;

        if(flagError == 0) {
            //MODALS
            var artifactName = document.getElementById('artifactName').valueOf().value;
            var startDate = document.getElementById('startDate').valueOf().value;
            var endDate = document.getElementById('endDate').valueOf().value;
            var status = document.getElementById('status').valueOf().value;
            var description = document.getElementById('description').valueOf().value;

            var repairType = 0;
            if(document.getElementById('requestHelp1').checked){
                repairType = 1;
            }
            else if(document.getElementById('requestHelp2').checked){
                repairType = 2;
            }

            var select;
            var repairMode = "";
            if (repairType == 0 || repairType == 1) {
                select = select1;
                if (repairType == 0)
                    repairMode = "In-house";
                else if(repairType == 1)
                    repairMode = "In-house w/ Maintenance Assistance"
            }
            else if (repairType == 2) {
                repairMode = "Outsource"
                select = select2;
            }
            var result = [];
            var options = select && select.options;
            var opt;
            for (var i = 0, iLen = options.length; i < iLen; i++) {
                opt = options[i];
                if (opt.selected) {
                    result.push(opt.innerHTML || opt.text);
                }
            }
            var repair = result;

            var statusDisplay = "";
            if(status == 1)
                statusDisplay = "In-Display";
            else if(status == 2)
                statusDisplay = "Inventory-Stashed";

            var repairTypeDisplay = "";
            if(repairType == 0 || repairType == 1)
                repairTypeDisplay = "Exhibits Repairees:";
            else if(repairType == 2)
                repairTypeDisplay = "Outsourcing Company:";
            //Set modal values
            document.getElementById('artifactNameMod').innerHTML = artifactName;
            document.getElementById('statusMod').innerHTML = statusDisplay;
            document.getElementById('startDateMod').innerHTML = startDate;
            document.getElementById('endDateMod').innerHTML = endDate;
            document.getElementById('descriptionMod').innerHTML = description;
            document.getElementById('repairModeMod').innerHTML = repairMode;
            document.getElementById('repairTypeMod').innerHTML = repairTypeDisplay;
            document.getElementById('repaireeMod').innerHTML = repair;
        }
    }

    function addNewTag(select) {

        var result = [];
        var options = select && select.options;
        var opt;
        var newTag = document.getElementById('newTag').valueOf().value;
        var exists = 0;
        var highestVal = 0;
        for (var i = 0, iLen = options.length; i < iLen; i++) {
            opt = options[i];
            if (opt.text == newTag) {
                exists = 1;
            }
            highestVal = options[i].value;
        }
        if(exists == 1){
            type='text/javascript'>alert('The entered specialization tag already exists');
        }
        else{
            alert(highestVal);
            var num = parseInt(highestVal, 10);
            num++;
            var count = options.length;
            var addTag = document.createElement('option');
            addTag.value = num;
            addTag.innerHTML = newTag;
            select.appendChild(addTag);
            type='text/javascript'>alert('New specialization tag added');
            document.getElementById('newTag').valueOf().value = "";
            if (newTag){
                var valueType= 4;
                $.ajax({
                    type: 'POST',
                    url: 'ajax/addNewTag.php',
                    data:{
                        tagName:newTag,
                        type:valueType
                    },
                });
            }
        }
    }

    function addNewOutsource(select, select2){
        var options = select && select.options;
        var opt;
        var newOutsource = document.getElementById('newOutsource').valueOf().value;
        var exists = 0;
        var highestVal = 0;

        for (var i = 0, iLen = options.length; i < iLen; i++) {
            opt = options[i];
            if (opt.text == newOutsource) {
                exists = 1;
            }

            if(opt.value >= highestVal){
                highestVal = opt.value;
            }
        }
        if(exists == 1){
            type='text/javascript'>alert('The entered company already exists');
        }
        else{
            var num = parseInt(highestVal, 10);
            num++;
            var addOutsource = document.createElement('option');
            addOutsource.value =num;
            addOutsource.innerHTML = newOutsource;
            select.appendChild(addOutsource);
            type='text/javascript'>alert('New Company added');
            document.getElementById('newOutsource').valueOf().value = "";

            //Get new company tags
            options = select2 && select2.options;
            count = 0;
            for (var i = 0, iLen = options.length; i < iLen; i++) {
                opt = options[i];
                if (opt.selected) {
                    count++;
                }
            }
            var arrayTag = new Array(count);
            for (var i = 0, iLen = options.length; i < iLen; i++) {
                opt = options[i];
                if (opt.selected) {
                    arrayTag[i] = opt.value;
                }
            }
            if (newOutsource, arrayTag){
                $.ajax({
                    type: 'POST',
                    url: 'ajax/addNewCompany.php',
                    data:{
                        companyName:newOutsource,
                        specializationTags:arrayTag
                    },
                });
            }
        }
    }
    function gamol(a){
        recommendedEmployees();
        var name = $(a).closest("tr").find("td:eq(0)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/


        $("#artifactName").val(name);
        /*$("#artNm").val(name2);*/
        recommendedEmployees();

    }

    function recommendedEmployees(){
        var artifactName = document.getElementById('artifactName').valueOf().value;
        var repairType = 1;
        if(document.getElementById('requestHelp2').checked){
            repairType = 2;
        }
        else
            repairType = 1;
        if (artifactName, repairType){
            $.ajax({
                type: 'POST',
                url: 'ajax/recommendEmployees.php',
                data:{
                    artifactName:artifactName,
                    repairType:repairType
                },
                success:function(response){
                    $('#recommendedTable').html(response);
                    if(response=='OK') {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
            });
        }
    }

    function checkDate(endDate){
        var date = new Date(endDate);
        var dayOfWeek = date.getDay();

        var date1 = new Date(document.getElementById('startDate').valueOf().value);
        var date2 = new Date(endDate);
        var timeDiff = (date2.getTime() - date1.getTime());

        if(timeDiff < 0){
            alert('End date can not be before the start date');
            document.getElementById('endDate').valueOf().value = "";
        }
        if(dayOfWeek == 0 || dayOfWeek == 6){
            alert('End date can not be a weekend');
            document.getElementById('endDate').valueOf().value = "";
        }
    }

    function addRecommend(select1, select2){
        $('#chosenTable').html("");
        var repairType = 1;
        var select;
        if(document.getElementById('requestHelp2').checked){
            repairType = 2;
        }

        var html = "<table class=\"table\">";
        html = html + "<thead class=\"thead-inverse\">";
        html = html + "<tr>";
        if(repairType == 1) {
            select = select1;
            html = html + "<th>Repairee Name</th>";
        }
        else if(repairType == 2) {
            select = select2;
            html = html + "<th>Company Name</th>";
        }
        html = html + "<th></th>";
        html = html + "</tr>";
        html = html + "</thead>";
        html = html + "<tbody>";

        var options = select && select.options;
        var opt;
        for (var i = 0, iLen = options.length; i < iLen; i++) {
            opt = options[i];
            if (opt.selected) {
                html = html + "<tr><td>"+opt.text+"</td><td> <button type=\"button\" class=\"btn btn-info btn-circle\"><i class=\"glyphicon glyphicon-ok\"></i></button> </td></tr>";
            }
        }
        html = html + "</tbody>";
        html = html + "</table>";
        $('#chosenTable').html(html);
    }

    $('#endDate').datepicker()
        .on("change", function (e) {
            checkDate(document.getElementById('endDate').valueOf().value);
            $('.datepicker').hide();
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

if(isset($_POST['submitButton'])){

    //INSERT REPAIR SCHEDULE   (REPAIR STATUS: 1-Pending for head, 2-pending for exhibits, 3-ongoing, 4-completed)
    //Get artifact code
    $artifactName = $_POST['artifactName'];
    $artifactCode = get_artifactCode($artifactName);

    //Check for pending assistance
    if(isset($_POST['requestHelp1']))
        $status = 2;
    else
        $status = 1;

    if($status == 1 && $_SESSION['userType'] == 1)
        $status = 3;

    $startDate = $_POST['startDate']." 00:00:00";
    $endDate = $_POST['endDate']." 00:00:00";

    $startDate = date('Y-m-d', strtotime($startDate));
    $endDate = date('Y-m-d', strtotime($endDate));

    $now = strtotime($startDate); // or your date as well
    $your_date = strtotime($endDate);
    $datediff = abs($now - $your_date);

    $datediff = abs($datediff / (60 * 60 * 24));

    $repairType = 0;
    if($datediff < 3)
        $repairType = 1;
    else if($datediff < 11)
        $repairType = 2;
    else
        $repairType = 3;

    $reasonForRepair = $_POST['description'];

    //INSERT REPAIR SCHEDULE
    insertRepairSchedule($artifactCode, $status, $startDate, $endDate, $repairType, $reasonForRepair, $_SESSION['userID']);

    //ARTIFACT LOCATION
    $status = $_POST['status'];
    if($status == 2) {
        $location = 7;
        updateLocation($location, $artifactCode);
    }

    //INSERT REPAIR DETAILS
    //Get repair code
    $repairCode = getRepairCode($artifactCode);

    $repairSelected = 0;
    //Check for pending assistance
    if(isset($_POST['requestHelp2']))
        $repairSelected = 2;
    else
        $repairSelected = 1;

    if($repairSelected == 0 || $repairSelected == 1) {
        $employees = $_POST['repairees'];
        insertRepairDetailsEmployees($repairCode, $employees);
    }
    else if($repairSelected == 2){
        $outsourcing = $_POST['outsourceCompanies'];
        insertRepairDetailsOutsource($repairCode, $outsourcing);
    }
}
?>
</html>
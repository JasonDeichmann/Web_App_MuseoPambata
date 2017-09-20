<?php
include 'funcs.php';
session_start();
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
if($_SESSION['userType'] != 1) {
    header('Location:HomepageAdmin.php');
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MUSEO PAMBATA | Employee Management Module</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
    
        <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head> 
        <style>
            option:before { content: "☐ " }
            option:checked:before { content: "☑ " }
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SEARCH ARTIFACT</h4>
              </div>
              <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Accession Code</h2>
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" placeholder="code here" id="searchMod" />
                                        <span class="input-group-btn">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="gamol()">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
</body>
        <div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
                <h3 class="dark-grey"><b><span class="glyphicon glyphicon-pencil"></span> &nbsp;EMPLOYEE REGISTRATION</b></h3>
				<hr>
                <form name="employeeForm" method="post">
                    <div class="form-group col-lg-8">
                        <label>Employee Name</label>
                        <input type="" name="employeeName" class="form-control" id="" value="" />
                            <br><label>Email Address</label>
                            <input type="" name="emailAddress" class="form-control" id="" value="" />
                            <br><label>Contact Number</label>
                            <input type="" name="contactNumber" class="form-control" id="" value="" />
                        <br> <label class="control-label" for="date" hidden>Shift Start    <span class="glyphicon glyphicon-triangle-left" hidden></span><span class="glyphicon glyphicon-calendar"></span></label>
                        <input id="shiftStart" name="shiftStart" value="9999-09-09 10:00:00" placeholder="HH:mm:ss" type="text" hidden >
                        <br> <label class="control-label" for="date" hidden>End Shift   <span class="glyphicon glyphicon-calendar"></span><span class="glyphicon glyphicon-triangle-right" hidden></span></label>
                        <input id="shiftEnd" name="shiftEnd" value="9999-09-09 10:00:00" placeholder="HH:mm:ss" type="text" hidden >
                        <br>
                        <label>Employee Type:</label>
                    <select class="form-control8" name="employeeType" id="employeeType" width="50%" onchange="checkAccount(this.value);">
                        <option value="0">select</option>
                        <option value="1">Exhibits Head</option>
                        <option value="2">Exhibits Employee</option>
                        <option value="3">Maintenance Head</option>
                        <option value="4">Maintenance Employee</option>
                    </select>
                    </div>

                    <div class="form-group col-lg-8" id="specialization" name="specialization" hidden>Select Specialization:
                        <br>
                        <select class="form-control" id="employeeSpecialization" name="employeeSpecialization[]" width="15%" multiple>
                            <?php
                            $tags = getTags();
                            foreach ($tags as $tag)
                                echo '<option name="employeeTags" class="employeeTags" value="'.$tag['tagCode'].'">'.$tag['tagName'].'</option>';
                            ?>
                        </select>
                        <br>
                        <label>Add New Specialization Tag:</label> <br> <input name="newTag" id="newTag"> <button type="button" name="newTagButton" id="newTagButton" onclick="var specializationTags = document.getElementById('employeeSpecialization'); addNewTag(specializationTags);">Enter</button>
                    </div>

                    <div id="createAccount" name="createAccount" hidden>
				<div class="form-group col-lg-8">
					<label>Username</label>
					<input type="" name="username" class="form-control" id="" value="" />
				</div>
				<div class="form-group col-lg-6">
					<label>Password</label>
					<input maxlength="50" type="password" name="password" class="form-control" id="" value="" />
				</div>
				<div class="form-group col-lg-6">
					<label>Repeat Password</label>
					<input type="password" name="repeatPassword" class="form-control" id="" value="" />
				</div>
                    </div>
				<div class="form-group col-lg-6">
                    <button type="submit" name="submit" class="btn btn-primary" onclick="prevent();">Register Employee</button>

				</div>
                </form>
				
				
			
			</div>
		
			<div class="col-md-6">
				<h3 class="dark-grey">MUSEO PAMBATA</h3>
                <img src="../images/mplogo.png">
			</div>
		</div>
	</section>
</div>



  <?php
  require_once ('navbar.php');
  ?>

       
<script>



function checkAccount(value){

    if (value == 0) {
        document.getElementById('createAccount').style.display = 'none';
        document.getElementById('specialization').style.display = 'none';
    }
    else if (value == 1) {
        document.getElementById('createAccount').style.display = 'inline';
        document.getElementById('specialization').style.display = 'none';
    }
    else if (value == 2) {
        document.getElementById('createAccount').style.display = 'inline';
        document.getElementById('specialization').style.display = 'none';
        document.getElementById('specialization').style.display = 'inline';
    }
    else if (value == 3) {
        document.getElementById('createAccount').style.display = 'inline';
        document.getElementById('specialization').style.display = 'none';
    }
    else if (value == 4) {
        document.getElementById('createAccount').style.display = 'none';

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
        highestVal = opt.value;
    }

    if(exists == 1){
        type='text/javascript'>alert('The entered specialization tag already exists');
    }
    else{
        var num = parseInt(highestVal, 10);
        num++;
        alert(num);
        var count = options.length;
        var addTag = document.createElement('option');
        addTag.value = num;
        addTag.innerHTML = newTag;
        select.appendChild(addTag);
        type='text/javascript'>alert('New specialization tag added');
        document.getElementById('newTag').valueOf().value = "";
        var valueType = 4;

        if (newTag){
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
$('option').mousedown(function(e) {
    e.preventDefault();
    $(this).prop('selected', !$(this).prop('selected'));
    return false;
});
function prevent() {
    e.preventDefault();
}
</script>
 
    </body>

<?php

if(isset($_POST['submit'])){

    $employeeName = $_POST['employeeName'];
    $employeeType = $_POST['employeeType'];
    $shiftStart = $_POST['shiftStart'];
    $shiftEnd = $_POST['shiftEnd'];
    $emailAddress = $_POST['emailAddress'];
    $contactNumber = $_POST['contactNumber'];
    $flagInvalidEmployee = 0;

    // Check if employee name is valid
    if($employeeName == ""){
        echo "<script type='text/javascript'>alert('Please enter a name for the Employee');</script>";
        $flagInvalidEmployee = 1;
    }
    else if(strlen($employeeName) > 50){
        echo "<script type='text/javascript'>alert('Employee Name cannot exceed 50 characters');</script>";
        $flagInvalidEmployee = 1;
    }
    else if(preg_match('/^[A-Za-z ]+$/', $employeeName) == false){
        echo "<script type='text/javascript'>alert('Invalid employee name');</script>";
        $flagInvalidEmployee = 1;
    }
    else if($employeeName == ""){
        echo "<script type='text/javascript'>alert('Please enter employee name');</script>";
        $flagInvalidEmployee = 1;
    }
    else if($emailAddress == ""){
        echo "<script type='text/javascript'>alert('Please enter an email address');</script>";
        $flagInvalidEmployee = 1;
    }
    else if(preg_match('/^[A-Za-z0-9@.]+$/', $emailAddress) == false){
        echo "<script type='text/javascript'>alert('Invalid email address. Contains special characters');</script>";
        $flagInvalidEmployee = 1;
    }
    else if($contactNumber == ""){
        echo "<script type='text/javascript'>alert('Please enter a contact number');</script>";
        $flagInvalidEmployee = 1;
    }
    else if(preg_match('/^[0-9]+$/', $contactNumber) == false){
        echo "<script type='text/javascript'>alert('Contact number should only contains numbers');</script>";
        $flagInvalidEmployee = 1;
    }
    else if($employeeType == 0){
        echo "<script type='text/javascript'>alert('Please select an employee type');</script>";
        $flagInvalidEmployee = 1;
    }

    // Check if employee name already exists
    if($flagInvalidEmployee == 0){
        $count = checkEmployeeName($employeeName);
        if($count != 0 ){
            echo "<script type='text/javascript'>alert('Employee Name already exists');</script>";
            $flagInvalidEmployee = 1;
        }
    }
    // Check if address exists
    if($flagInvalidEmployee == 0){
        $count = checkEmail($emailAddress);
        if($count != 0 ){
            echo "<script type='text/javascript'>alert('Email address already exist');</script>";
            $flagInvalidEmployee = 1;
        }
    }
    // Check if contact number exists
    if($flagInvalidEmployee == 0){
        $count = checkContactNumber($contactNumber);
        if($count != 0 ){
            echo "<script type='text/javascript'>alert('Contact Number already exists');</script>";
            $flagInvalidEmployee = 1;
        }
    }

    // Account creation for employee types 1,2,3
    if($flagInvalidEmployee == 0 AND $employeeType != 4){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rePassword = $_POST['repeatPassword'];
        $userType = $_POST['employeeType'];

        if($username == ""){
            echo "<script type='text/javascript'>alert('Please enter a username');</script>";
            $flagInvalidEmployee = 1;
        }
        else if(preg_match('/^[A-Za-z0-9]+$/', $username) == false){
            echo "<script type='text/javascript'>alert('Username should only contain letters and number');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($password == ""){
            echo "<script type='text/javascript'>alert('Please enter a password');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($rePassword == ""){
            echo "<script type='text/javascript'>alert('Please enter a repeat password);</script>";
            $flagInvalidEmployee = 1;
        }
        else if($password != $rePassword){
            echo "<script type='text/javascript'>alert('Password and repeat password do not match');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($rePassword == ""){
            echo "<script type='text/javascript'>alert('Password does not match');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($password != $rePassword){
            echo "<script type='text/javascript'>alert('Password does not match');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($emailAddress == ""){
            echo "<script type='text/javascript'>alert('Please enter an email address');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($emailAddress > 50){
            echo "<script type='text/javascript'>alert('Email address cannot exceed 50 characters');</script>";
            $flagInvalidEmployee = 1;
        }
        else if(preg_match('/^[A-Za-z0-9@._]+$/', $emailAddress) == false){
            echo "<script type='text/javascript'>alert('Invalid email address. Contains special characters');</script>";
            $flagInvalidEmployee = 1;
        }
        else if($contactNumber == ""){
            echo "<script type='text/javascript'>alert('Please enter a contact number');</script>";
            $flagInvalidEmployee = 1;
        }
        else if(strlen($contactNumber) > 20){
            echo "<script type='text/javascript'>alert('Contact number must not exceed 20 numbers');</script>";
            $flagInvalidEmployee = 1;
        }
        else if(preg_match('/^[0-9]+$/', $contactNumber) == false){
            echo "<script type='text/javascript'>alert('Contact number should only contains numbers');</script>";
            $flagInvalidEmployee = 1;
        }

        // Check if username exists
        if($flagInvalidEmployee == 0){
            $count = checkUsername($username);
            if($count != 0 ){
                echo "<script type='text/javascript'>alert('Username already exists');</script>";
                $flagInvalidEmployee = 1;
            }
        }
    }

    // Enter new employee into db
    if($flagInvalidEmployee == 0){

        insertEmployee($employeeName, $employeeType, $shiftStart, $shiftEnd, $emailAddress, $contactNumber);

        //Get employee code
        $employeeNumber = getEmployeeNumber($employeeName);

        //Insert account
        if($employeeType != 4){

            insertAccount($employeeNumber, $username, $password, $userType);
            echo "<script type='text/javascript'>alert('Success: Employee and account added');</script>";
        }
        //Insert employee tags
        if($employeeType == 2){
            $employeeTags = $_POST['employeeSpecialization'];

            //Insert to employeeTags table
            insertEmployeeTags($employeeTags, $employeeNumber);
        }
    }
}
?>
</html>
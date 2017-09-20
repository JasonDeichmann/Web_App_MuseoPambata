<!DOCTYPE html>
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
?>
<html>
<head>
<script type="text/javascript">

    </script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MUSEO PAMBATA | Acquisition Module</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        
    <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href ="../CSS/sidebarFixed.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
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
            img{
                max-width:300px;
                max-height: 300px;
                min-width:0px;
                min-height: 0px;
            }
            .panel{
                
                width: 98%;
                padding: 3% 3% 3% 3%;
            }
            .panel-heading{
                padding: 3% 5% 5% 5%;
            }
            .panel-body{
                padding: 3% 5% 5% 5% 
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
            h4 {
                background-color: lightgray;
                text-align: center;
            }

            h4 {
                margin: 0;
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
        <form  name="acquisitionForm" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" name="submitMod" id="submitMod" method="post" action="">
                <div id="content">
              <div class="modal-header">
                    <h4 class="modal-title" align="center"> ACQUISITION FORM SUMMARY &nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</h4>
              </div>
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
                                                    <th>ACQUISITION</th>
                                                </thead>
                                            <tr>
                                                <td><label for="artifactName">Artifact Name:  </label></td>
                                                <td><label name="artifactNameMod" id="artifactNameMod" ></label></td>
                                            </tr>
                                            <tr>
                                                <td><label for="location">Location: </label></td>
                                                <td><label name="locationMod"id="locationMod"></label></td>
                                            </tr>
                                            <tr>    
                                                <td><label for="tag">Status Tag: </label></td>
                                                <td><label name="tagMod" id="tagMod"></label><td>
                                            </tr>
                                            <tr>
                                                <td><label for="acquisitionMode">Mode of Acquisition:</label></td>
                                                <td><label  name="acquisitionModeMod" id="acquisitionModeMod"></label><td>
                                            </tr>
                                            <tr>    
                                                <td><label for="details">Artifact Details: </label></td>
                                                <td><label name="detailsMod" id="detailsMod"></label></td>
                                            </tr>
                                            <tr>    
                                                <td><label for="usr">Tags:</label></td>
                                                <td><label name="artifactTagsM" id="artifactTagsM"></label></td>
                                            </tr>
                                            <tr>
                                                    <td><label for="quantity" hidden></label></td>
                                                    <td><label name="quantityMod" id="quantityMod" value="1" hidden></label></td>
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
                  <button name="submitMod" id="submitMod"  type="submit"  class="btn btn-primary"> CONFIRM </button>
                <button class = "btn btn-primary" id="cmd">Save as PDF</button>  
            </div>
            </div>
        </div>
        </div>
</body>
        
        <div class="container">
        <div class="panel panel-default">
            
            <h3 align="center" ><b><span class="glyphicon glyphicon-plus-sign"></span>  NEW ACQUISITION </b></h3>
            <hr>


            <div class="panel-body">
                <div class="col-md-7">
                    
                    <h4><span class="glyphicon glyphicon-th-large"></span>  ARTIFACT DETAILS</h4><br>
                    <div>
                    <label for="artifactName">Artifact Name:</label>
                    <input name="artifactN" type="artifactName" class="form-control" id="artifactN" placeholder="fill up" onkeyup='checkArtifactName();' required/>
                        <span id="art_status"></span>
                   
                    <br>
                    </div> 
                            
                            <label for="location">Location:</label>

                            <select name="location" class="form-control2" id="location" width="50%">
                                <option name="location" value="1">Kalikasan</option>
                                <option name="location" value="2">Bayan Ko</option>
                                <option name="location" value="3">Pamana</option>
                                <option name="location" value="4">Old Manila</option>
                                <option name="location" value="5">Body Works</option>
                                <option name="location" value="6">Global Village</option>
                                <option name="location" value="7">Storage</option>

                          </select> 
                        <br><br>
                    
                    <label for="quantity" hidden></label>
                        <input name= "quantity" type="quantity" class="form-control3" id="quantity" value="1" placeholder="fill up" value="" hidden>
                    <br>
                        <br><label for="tag">Status Tag:</label>
                        <label class="radio-inline" name="tag">
                            <input type="radio" name="tag" value="1" id="tag" checked>  On-Display &nbsp;
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="tag" value="2" id="tag">  Inventory Stashed &nbsp;
                        </label>
                        <hr>
                        <label for="sel1">Mode of Acquisition Category:
                        </label>
                    
                        <select class="form-control4" name="acquisitionMode" id="acquisitionMode" width="50%" onchange="changeAcquisition(this.value)">
                            <option value="0">select</option>
                            <option value="1">Fabricated</option>
                            <option value="2">On Loan</option>
                            <option value="3">Donation</option>
                            <option value="4">Purchased</option>
                
                        </select>

                        <br>
                        <label name="acquisitionText" id="acquisitionText" class="form-control5"></label>
                        
                        <input name="acquisitionName" type="acquisitionName" class="form-control1" id="acquisitionName" placeholder="enter name" hidden><br>
                        
                       

                    <label for="sel1">Upload Form File</label>
                    <input type="file" name="photo" id="fileSelect"
                    <input type="submit" name="submit" value="Upload">
                    <br>
                        <div align="right"><button type ="button" onclick="
                                                   var artTags = document.getElementById('artifactTagsSelect');
                                                   validityCheck(artTags);" name = "submit" value = "submit" id = "submit"class = "btn btn-primary btn-lg"  >Submit &nbsp;<span class="glyphicon glyphicon-check"></span></button> </div>
                    </div>
                    


                <div class="col-md-5" style="background-color:white;">
                   <div ><br><br>
                       <label for="sel1">Upload Artifact Image</label><br>
                       <input type='file' name='artPhoto' id="fileSelect2" onchange="showArtImage(this);" />
                       <img id="artImage" src="" alt="" max-width="300px" max-height="300px" min-width="0px" min-height="0px" />

                    </div>    
                    <br>
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" rows="4" id="description"></textarea>

                    <div name="listEmployees" id="listEmployees" >
                        <br><label>Select Artifact tags:</label>
                        <select class="form-control" id="artifactTagsSelect" name="artifactTagsSelect[]" width="15%" multiple>
                            <?php
                            $tags = getTags();
                            foreach ($tags as $tag)
                                echo '<option name="artifactTags" class="artifactTags" value="'.$tag['tagCode'].'">'.$tag['tagName'].'</option>';
                            ?>
                        </select>
                        <label>Add New Artifact Tag:</label> <br>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button type="button" name="newTagButton" id="newTagButton" onclick="var artifactTags = document.getElementById('artifactTagsSelect'); addNewTag(artifactTags);">AasdasdDD! <span class="glyphicon glyphicon-plus-sign"></span>  </button>
                            </span>
                            <input name="newTag" id="newTag" placeholder="Artifact Tag Name">
                        </div>
                        <br>
                    </div>
         
            </div>
            </div>
            </form>
        </div>
        </div>

       <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="HomepageAdmin.html">Museo Pambata</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Acquisition Module</a></li>
                <li><a href="UpdateLogAdmin.html"><span class="glyphicon glyphicon-comment"></span>&nbsp; Update Log</a></li>
                <li><a href="../LoginMock.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Sign Out</a></li>
            </ul>
          </div>
        </nav>

    <?php
    require_once ('navbar.php');
    ?>
    </body>


<script type="text/javascript">

function modals(select){

    //INIT
    var locationDig = document.getElementById('location').valueOf().value;
    var location = '';
    var tagDig = document.getElementById('tag').valueOf().value;
    var tag = '';
    var acquisitionModeDig = document.getElementById('acquisitionMode').valueOf().value;
    var acquisitionMode = '';

    var result = [];
    var options = select && select.options;
    var opt;


    // Artifact tag names
    for (var i=0, iLen=options.length; i<iLen; i++) {
        opt = options[i];
        if (opt.selected) {
            result.push(opt.innerHTML || opt.text);
        }
    }

    var displayTags = result;


    //LOCATION

    if(locationDig == 1)
        location='Kalikasan';
    else if(locationDig == 2)
        location='Bayan Ko';
    else if(locationDig == 3)
        location='Pamana';
    else if(locationDig == 4)
        location='Old Manila';
    else if(locationDig == 5)
        location='Body Works';
    else if(locationDig == 6)
        location='Global Village';
    else if(locationDig == 7)
        location='Storage';

    //Status Tag

    if(tagDig == 1)
        tag='On-display';
    else if(tagDig == 2)
        tag='Inventory Stashed';

    //MODE OF ACQUISITION

    if(acquisitionModeDig == 1)
        acquisitionMode='Fabricated';
    else if(acquisitionModeDig == 2)
        acquisitionMode='On Loan';
    else if(acquisitionModeDig == 3)
        acquisitionMode='Donation';
    else if(acquisitionModeDig == 4)
        acquisitionMode='Purchased';

    //MODAL VALUE ASSIGNMENT

    document.getElementById('artifactNameMod').innerHTML = document.getElementById('artifactN').valueOf().value;
    document.getElementById('locationMod').innerHTML = location;
    document.getElementById('quantityMod').innerHTML = document.getElementById('quantity').valueOf().value;
    document.getElementById('tagMod').innerHTML = tag;
    document.getElementById('acquisitionModeMod').innerHTML = acquisitionMode;
    document.getElementById('detailsMod').innerHTML = document.getElementById('description').valueOf().value;
    document.getElementById('artifactTagsM').innerHTML = displayTags;

}

//Check if artifact name does not exist
function checkArtifactName(){
    var name = document.getElementById('artifactN').valueOf().value;
    if (name){
        $.ajax({
            type: 'POST',
            url: 'ajax/checkArtifactName.php',
            data:{
                artName:name
            },
            success:function(response){
                $('#art_status').html(response);
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
//Check validity of data entered
function validityCheck(select) {
    var tagSelect = select;

    var name = document.getElementById('artifactN').valueOf().value;
    var quantity = document.getElementById('quantity').valueOf().value;
    var acquisition = document.getElementById('acquisitionMode').valueOf().value;
    var description = document.getElementById('description').valueOf().value;
    var imgForm = document.getElementById('fileSelect').valueOf().value;
    var imgArtifact = document.getElementById('fileSelect2').valueOf().value;

    var errorFlag = 0;

    // Check if variables are not null

    if (document.getElementById('art_status').valueOf().innerHTML == "Artifact Name already exists"){
        errorFlag = 1;
        type = 'text/javascript' > alert('Artifact Name already exists');
    }
    else if (name == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('Please enter a name for the artifact');
    }
    else if (name.length > 50) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Name should not exceed 50 characters');
    }
    else if (quantity == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('Please enter Quantity of the artifact');
    }
    else if (name == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('Invalid Artifact Name');
    }
    else if (quantity == '' || /^\d+$/.test(quantity) == false) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Invalid Quantity');
    }
    else if (acquisition == 0) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Invalid Mode of Acquisition');
    }
    else if (quantity == 0) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Quantity cannot be zero');
    }
    else if (quantity > 100) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Quantity cannot exceed 100 units');
    }
    else if (acquisitionName == ''){
        errorFlag = 1;
        type = 'text/javascript' > alert('Please enter Patron Name');
    }
    else if (acquisitionName > 50){
        errorFlag = 1;
        type = 'text/javascript' > alert('Patron Name cannot exceed 50 characters');
    }
    else if (description == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('Please enter a description for the artifact');
    }
    else if (description.length > 1000) {
        errorFlag = 1;
        type = 'text/javascript' > alert('Description should not exceed 1000 characters');
    }
    else if (imgForm == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('No form was uploaded');
    }
    else if (imgArtifact == '') {
        errorFlag = 1;
        type = 'text/javascript' > alert('No artifact image was uploaded');
    }

    if (errorFlag == 0) {
        $('#myModal').modal('show');
        event.preventDefault();
        modals(tagSelect);
    }
}

// Acquisition Mode change
function changeAcquisition(value) {

    if (value == 0) {
        document.getElementById('acquisitionText').innerHTML = "";
        document.acquisitionForm.elements.acquisitionName.hidden = true;
        document.getElementById('acquisitionName').valueOf().value = "";
        $("#acquisitionName").prop('readonly', false);

    }
    else if (value == 1) {
        document.getElementById('acquisitionText').innerHTML = "Fabricator:";
        document.getElementById('acquisitionName').valueOf().value = "Museo Pambata";
        document.getElementById('acquisitionName').readOnly = "true";
        document.acquisitionForm.elements.acquisitionName.hidden = false;
    }
    else if (value == 2) {
        document.getElementById('acquisitionText').innerHTML = "Loaner:";
        document.acquisitionForm.elements.acquisitionName.hidden = false;
        document.getElementById('acquisitionName').valueOf().value = "";
        $("#acquisitionName").prop('readonly', false);
    }
    else if (value == 3) {
        document.getElementById('acquisitionText').innerHTML = "Donor:";
        document.acquisitionForm.elements.acquisitionName.hidden = false;
        document.getElementById('acquisitionName').valueOf().value = "";
        $("#acquisitionName").prop('readonly', false);
    }
    else if (value == 4) {
        document.getElementById('acquisitionText').innerHTML = "Seller:";
        document.acquisitionForm.elements.acquisitionName.hidden = false;
        document.getElementById('acquisitionName').valueOf().value = "";
        $("#acquisitionName").prop('readonly', false);
    }
}

function showArtImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#artImage')
                .attr('src', e.target.result).style="disptlay: inline;"
            ;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function addNewTag(select) {

    var result = [];
    var options = select && select.options;
    var opt;

    var newTag = document.getElementById('newTag').valueOf().value;
    var exists = 0;
    var empty = 0;
    var highestVal = 0;

    for (var i = 0, iLen = options.length; i < iLen; i++) {
        opt = options[i];

        if(newTag == ""){
            empty = 1;
        }
        else if (opt.text == newTag && empty != 1) {
            exists = 1;
        }

        highestVal = opt.value;
    }

    if(empty == 1){
        type='text/javascript'>alert('Enter a tag name');
    }
    else if(exists == 1){
        type='text/javascript'>alert('The entered artifact tag already exists');
    }
    else{
        var num = parseInt(highestVal, 10);
        num++;
        var count = options.length;
        var addTag = document.createElement('option');
        addTag.value = num;
        addTag.innerHTML = newTag;
        select.appendChild(addTag);
        type='text/javascript'>alert('New artifact tag added');
        document.getElementById('newTag').valueOf().value = "";
        var type = 4;

        if (newTag){
            $.ajax({
                type: 'POST',
                url: 'ajax/addNewTag.php',
                data:{
                    tagName:newTag,
                    type:type
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

</script>

<?php

//ENTER ACQUISITION TO DATABASE AND UPLOAD IMAGE TO uploads FOLDER
if(isset($_POST['submitMod'])) {

    $artifactName = $_POST['artifactN'];
    $artifactStatus = $_POST['tag'];
    $location = $_POST['location'];
    $quantity = $_POST['quantity'];
    $acquisitionMode = $_POST['acquisitionMode'];
    $acquisitionName = $_POST['acquisitionName'];
    $acquisitionDate = date('Y-m-d H:m:s');
    $description = $_POST['description'];
    $artifactTagsSelected = $_POST['artifactTagsSelect'];

    include('upload.php');

    $artifactImagePath = "uploads/" . $_FILES["artPhoto"]["name"];

    // Insert new artifact into artifacts table
    insertArtifact($artifactName, $artifactStatus, $quantity, $location, $acquisitionMode, $acquisitionDate, $description, $artifactImagePath);

    // Get artifact code of the new acquisition
    $artifactCode = get_artifactCode($artifactName);

    $formFilePath = "uploads/" . $_FILES["photo"]["name"];

    insertIntoForms($artifactCode, $acquisitionName, $acquisitionDate, $formFilePath);

    // Insert artifact tags into artifactTags table
    insertArtifactTags($artifactTagsSelected, $artifactCode);
}
?>
</html>
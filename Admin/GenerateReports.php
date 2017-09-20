<!DOCTYPE html>
<?php
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"/>

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
            .form-group{
                
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
<body onLoad="$('#my-modal2').modal('show');">
        <!-- Modal -->
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog2">

            <!-- Modal content-->
             <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button><center>
                  <h4 class="modal-title">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<b>MAINTENANCE REPORTS FOR JUNE 2016</b></h4></center>
              </div>
              <div class="modal-body">
                  <center>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Repair Number </th>
                                                        <th>Accession Number</th>
                                                        <th>Artifact Name</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                        <th>Date Accomplished</th>
                                                        <th>Remarks</th>
                                                        <th>Description</th>
                                                        <th>Repairee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>R123</td>
                                                        <td>KAL234 </td>
                                                        <td>Childrens Painting</td>
                                                        <td>06/10/2016</td>
                                                        <TD>06/13/2016</TD>
                                                        <td>Completed</td>
                                                        <td>06/12/2016</td>
                                                        <td>Completed on time</td>
                                                        <td>Broken borders of painting.</td>
                                                        <td>Menard</td>
                                                    </tr>
                                                    <tr>
                                                        <td>R101</td>
                                                        <td>BOD201 </td>
                                                        <td>Kamagong Painting</td>
                                                        <td>06/8/2016</td>
                                                        <TD>06/14/2016</TD>
                                                        <td>Completed</td>
                                                        <td>06/15/2016</td>
                                                        <td>Completed late</td>
                                                        <td>Broken borders of painting.</td>
                                                        <td>Menard, Archie</td>
                                                    </tr>
                                                    <tr>
                                                        <td>R001</td>
                                                        <td>PAM234 </td>
                                                        <td>Giant Mouth</td>
                                                        <td>06/10/2016</td>
                                                        <TD>06/12/2016</TD>
                                                        <td>Cancelled</td>
                                                        <td>06/12/2016</td>
                                                        <td>Financial Constraints</td>
                                                        <td>Broken borders of painting.</td>
                                                        <td>Fiscal Industries, Inc.</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </center>
                    </div>
                </div>
              <div class="modal-footer">
                  
                <button type="button" class="btn btn-default">Save as PDF</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
              </div>
            </div>

          </div>
        </div>
</body>
        
<body onLoad="$('#my-modal1').modal('show');">
        <!-- Modal -->
        <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
             <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button><center>
                  <h4 class="modal-title">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<b>DISPOSAL REPORTS FOR JUNE 2016</b></h4></center>
              </div>
              <div class="modal-body">
                  <center>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Accession Code</th>
                                                        <th>Reasons</th>
                                                        <th>Mode of Disposal</th>
                                                        <th>More Details</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                        <td>KAL-234 </td>
                                                        <td>Deteriorated beyond usefulness.</td>
                                                        <td>Donated</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>PAM-224 </td>
                                                        <td>Lacks physical integrity.</td>
                                                        <td>Salvaged</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>BOD-333 </td>
                                                        <td>Out of Scope/Inappropriate</td>
                                                        <td>Sold</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>KAL-1234 </td>
                                                        <td>Double Entry</td>
                                                        <td>Donated</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>BOD-1224 </td>
                                                        <td>Cannot Preserve properly</td>
                                                        <td>Returned</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </center>
                    </div>
                </div>
              <div class="modal-footer">
                  
                <button type="button" class="btn btn-default">Save as PDF</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
              </div>
            </div>

          </div>
        </div>
</body>
        
        
<body onLoad="$('#my-modal').modal('show');">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
             <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button><center>
                  <h4 class="modal-title">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<b>ACQUISITION REPORTS FOR JUNE 2016</b></h4></center>
              </div>
              <div class="modal-body">
                  <center>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Accession Code</th>
                                                        <th>Artifact Name</th>
                                                        <th>Exhibit Category</th>
                                                        <th>Location</th>
                                                        <th>Quantity</th>
                                                        <th>Status</th>
                                                        <th>Mode of Acquisition</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                        <td>KAL-234 </td>
                                                        <td>Childrens Painting</td>
                                                        <td>Painting</td>
                                                        <td>Kalikasan</td>
                                                        <td>1</td>
                                                        <TD>On-Display</TD>
                                                        <td>Fabricated</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>PAM-224 </td>
                                                        <td>Kamagong Painting</td>
                                                        <td>Painting</td>
                                                        <td>Pamana</td>
                                                        <td>1 </td>
                                                        <TD>Pulled-out For Repair</TD>
                                                        <td>On Loan</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>BOD-333 </td>
                                                        <td>Long Tongue</td>
                                                        <td>Sculpture</td>
                                                        <td>Kalikasan</td>
                                                        <td>1</td>
                                                        <TD>On-Display</TD>
                                                        <td>Donation</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>KAL-1234 </td>
                                                        <td>Intestine Food</td>
                                                        <td>Sculpture</td>
                                                        <td>Kalikasan</td>
                                                        <td>1</td>
                                                        <TD>Inventory Stashed</TD>
                                                        <td>Purchased</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>BOD-1224 </td>
                                                        <td>Pictures Body</td>
                                                        <td>Signages & Posters</td>
                                                        <td>Body Works</td>
                                                        <td>1</td>
                                                        <TD>On-Display</TD>
                                                        <td>Donation</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </center>
                    </div>
                </div>
              <div class="modal-footer">
                  
                <button type="button" class="btn btn-default">Save as PDF</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
              </div>
            </div>

          </div>
        </div>
</body>

<center>
    <div class="container"  style="background-color: white; box-shadow: 10px 10px 5px #888888;">
        <div class="form-group" >
            <div class="col-sm-1" style="background-color:white;">
            </div>
            <div class="col-md-10" style="padding: 	5%;">
                <fieldset>
                    <!-- Form Name -->
                    <legend align="center"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<b>GENERATE REPORTS</b></legend>
                    <!-- Text input-->
                    <div class="col-lg-12" align="center" style="background-color: white">

                        <div class="well">
                            <form method="post" action="ReportDetail.php">

                                <center> <b style="display: inline; color: darkslateblue">
                                        CHOOSE MODULE:</b> <select name="type" class="selectpicker" data-style="btn-info">


                                        <optgroup label="Acquisition">
                                            <option value="1"><span class="glyphicon glyphicon-download-alt" style="color: blue"></span> Acquired Artifacts</option>
                                        </optgroup>
                                        <optgroup label="Maintenance">
                                            <option value="2"><span class="glyphicon glyphicon-cog" style="color: green"> Completed Repairs</option>
                                            <option value="4"><span class="glyphicon glyphicon-warning-sign" style="color: coral"> Exceptions</option>
                                            <option value="5" ><span class="glyphicon glyphicon-alert" style="color: darkred"> Need Repairs</option>
                                        </optgroup>
                                        <optgroup label="Disposal">
                                            <option value="3"><span class="glyphicon glyphicon-folder-close" style="color: darkred"> Disposed Artifacts</option>
                                        </optgroup>
                                    </select>


                                    <!--
                                    <select class="form-control2" name="type" id="Loc" width="50%">
                                        <option name="typez" value="1">Acquisition</option>
                                        <option name="typez" value="2">Maintenance</option>
                                        <option name="typez" value="3">Disposal</option>
                                        <option name="typez" value="4">Exception</option>
                                    </select>
                                    -->
                                    <br><br>

                                    <div class="form-group" style="text-align: center;"> <!-- Date input -->
                                        <label class="control-label" for="date">START DATE<span class="glyphicon glyphicon-triangle-left"></span><span class="glyphicon glyphicon-calendar"></span></label>
                                        <input class="form-control" id="stD"  style="display: inline;" onchange="checkDate()" name="date" placeholder="MM/DD/YYYY" type="text"/>
                                        <input type="hidden" value="" id="std" name="stD">
                                        <br><br>

                                        <label class="control-label" for="date" >END DATE <span class="glyphicon glyphicon-calendar"></span><span class="glyphicon glyphicon-triangle-right"></span></label>
                                        <input class="form-control" id="enD" onchange="checkDate()" name="date" placeholder="MM/DD/YYYY" style="display: inline;" type="text"/>
                                        <input type="hidden" value="" id="end" name="enD">
                                    </div>
                                </center>
                        </div>

                        <center><button type = "button" id="asd" name="singlebutton" onclick="dateWarning();" class="btn btn-warning btn-lg" >GENERATE DETAILED REPORT</button>

                            <button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>
                        </center>


                        </form>


                    </div>
            </div></div></div>
</center>
    </body>
            
<?php
require_once ('navbar.php');
?>

 <script>

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

     function dateWarning(){
         $end = document.getElementById('enD').value.valueOf();
         $start = document.getElementById('stD').value.valueOf();

         var flag=true;
         if($start == $end){
             flag=true;
         }
         if ($end === ""){
             flag=false;
         }
         if ($start === ""){
             flag=false;

         }

         if (flag) {

             document.getElementById('std').value = document.getElementById('stD').value.valueOf();
             document.getElementById('end').value = document.getElementById('enD').value.valueOf();

             $('#submitBtn').click();
             return true;
         }

         else {
             event.preventDefault();
             alert('INCOMPLETE, PLEASE FILL OUT DATES.');
             return false;
         }
     }
     function checkDate(){
         $end = document.getElementById('enD').value.valueOf();
         $start = document.getElementById('stD').value.valueOf();
         console.log($end);
         console.log($start);

         if($start > $end && $end!="" && $start !=""){
             alert('Start date cannot pass the ending date.');
             document.getElementById('enD').value = document.getElementById('stD').value.valueOf();
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
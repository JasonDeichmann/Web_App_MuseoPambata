<!DOCTYPE html>
<?php
include 'funcs.php';
//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}
if($_SESSION['userType'] != 1){
    header('Location:HomepageAdmin.php');
}

?>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MUSEO PAMBATA | Maintenance Module</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
    
        <link rel="icon" type="image/png" href="../images/Museo Pambata Logo.png"/>
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
        
            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <script src="https: //code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
            
    
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
             .form-controlz{
                
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
    <body onLoad="$('#my-modal').modal('show');">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
             <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <form method="post" name="submit" action="CompleteRepairSched.php" class="form-horizontal">
                         <h4 class="modal-title"><label id="repairFormNumber"></label><span class="glyphicon glyphicon-search"></span>&nbsp;
                         <div id="modalContents">
                         </div>
                         <label> Remarks:</label>
                         <textarea class="form-control" rows="3" id="remarks" name="remarks" ></textarea><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="complete" name="complete"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;COMPLETE REPAIR</button>
                            <button type="submit" class="btn btn-danger" id="cancel" name="cancel"><span class="glyphicon glyphicon-remove"></span>&nbsp;CANCEL REPAIR</button>
                              
                        </div>
                         </h4>
                        </form>
                  <?php
                  if(isset($_POST['complete'])){
                      completeRepairForm($_POST['repairFormNumber'], $_POST['remarks'], $_POST['dateDiff']);
                  }
                  else if(isset($_POST['cancel'])){
                      cancelRepairForm($_POST['repairFormNumber'], $_POST['remarks']);
                  }

                  ?>
              </div>
              <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
 
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
       
        <div class="container">
                <div class ="col-sm-1" style="background-color: white;"></div>
            
                <div class="col-md-9" style="background-color:	white;">
                        <form class="form-horizontal">
                                
                        <fieldset>
                            
                        <!-- Form Name -->
                            <legend align="center"><b><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;PENDING FOR COMPLETION</b></legend><body onload="startTime()">
                            <span class="glyphicon glyphicon-time"></span>&nbsp; <big><big><b>Time Check</b></big></big>
                        <big><p id="stringDate"></p></big>
                            <big><label id="txt" align="left"><p class="bg-info"></p></label></big>
                        <hr> 


          
                    <div class="input-group col-md-12">
                        
                        <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                              <tr>
                                <th>Repair Form Number</th>
                                  <th>Artifact Name</th>
                                  <th>Repairee</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Status</th>
                                  <th>Lead Days Remaining</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $ongoingRepairs = getOngoingRepairs();
                              foreach($ongoingRepairs AS $ongoingRepair){
                                  $datediff = strtotime($ongoingRepair['endDate']) - strtotime(date('Y/m/d'));
                                  //$datediff = strtotime($ongoingRepair['endDate']) - strtotime("2017-07-31 00:00:00"); //Test with lead time
                                  $datediff = ($datediff / (60 * 60 * 24));
                                  if($datediff < 0){
                                      $datediff = 0;
                                  }
                                  if($datediff >= 2) {
                                      echo '<tr>';
                                      echo '<td><a href="" data-toggle="modal" data-target="#myModal" onclick="repairSched('.$ongoingRepair["repairCode"].');">' . $ongoingRepair['repairCode'] . '</a></td>';
                                      echo '<td>' . $ongoingRepair['artifactName'] . '</td>';
                                      echo '<td>'.getRepaireeOngoing($ongoingRepair['repairCode']).'</td>';
                                      echo '<td>' . date('Y/m/d', strtotime($ongoingRepair['startDate'])) . '</td>';
                                      echo '<td>' . date('Y/m/d', strtotime($ongoingRepair['endDate'])) . '</td>';
                                      echo '<td>' . $ongoingRepair['status'] . '</td>';
                                      echo '<td>' . $datediff . '</td>';
                                      echo '</tr>';
                                  }
                                  else if($datediff <= 1){
                                      echo '<tr>';
                                      echo '<td><b><font color="red"><a href="" data-toggle="modal" data-target="#myModal" onclick="repairSched('.$ongoingRepair["repairCode"].');">' . $ongoingRepair['repairCode'] . '</a></td>';
                                      echo '<td><b><font color="red">' . $ongoingRepair['artifactName'] . '</td>';
                                      echo '<td><b><font color="red">'.getRepaireeOngoing($ongoingRepair['repairCode']).'</td>';
                                      echo '<td><b><font color="red">' . date('Y/m/d', strtotime($ongoingRepair['startDate'])) . '</td>';
                                      echo '<td><b><font color="red">' . date('Y/m/d', strtotime($ongoingRepair['endDate'])) . '</td>';
                                      echo '<td><b><font color="red">' . $ongoingRepair['status'] . '</td>';
                                      echo '<td><b><font color="red">' . $datediff . '<span class="glyphicon glyphicon-exclamation-sign"></span></td>';
                                      echo '</tr>';
                                  }
                              }
                              ?>
                            </tbody>
                            </table>         
                        </div>
                    </div>
                        <!-- Text 
                        <table class="table table-striped">
                            
input-->
                    </div>
                        <!-- Text input-->
                            </fieldset>
                    </form>
            </div>
            </div>
                    </center>

    <?php
    require_once ('navbar.php');
    ?>
       
     
<script>
    x = new Date();
    document.getElementById("stringDate").innerHTML = x.toDateString();

$(document).ready(function() {
    $('#example').DataTable();
});
        
$(document).ready(function(){
$('#modal2').modal('show');
});     
    
$(document).ready(function(){
$('#my-modal').modal('show');
});  
        
$(document).ready(function() {
        $('.deleteRowButton').click(DeleteRow);
      });

    function DeleteRow()
    {
      $(this).parents('tr').first().remove();
    }    
$(document).on('ready', function() {
    $("#input-folder-1").fileinput({
        browseLabel: 'Select Folder...'
    });
});
    
function repairSched(repairCode){
    document.getElementById('repairFormNumber').innerHTML = "REPAIR FORM " + repairCode;
    if (repairCode){
        $.ajax({
            type: 'POST',
            url: 'ajax/completeRepairFormValues.php',
            data:{
                repairCode:repairCode
            },
            success:function(response){
                $('#modalContents').html(response);
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

    var d = new Date();
    document.getElementById("demo").innerHTML = 'Thu September 13, 2017' + ' (9/13/2017)';

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
        </center>
    </body>

</html>
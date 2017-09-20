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
        <title>MUSEO PAMBATA | File Repository Module</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
    
    <link rel="shortcut icon" href="../images/Museo%20Pambata%20logo.png" type="image/png">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href ="../CSS/sidebarFixed.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
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
            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
                
                text-align: right;
                
            }
            
            .form-control{
                
                width: 40%;
                padding: 0;
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
        
        <center>
            <div align="center"><h2><b>FILE REPOSITORY</b></h2></div>
            
        <div class="panel">
            <div class="form-group" >
                <div align="right">
                    <label for="username">SEARCH:</label>
                    <input type="username" class="form-control" id="username" placeholder="Enter field" align="right">
                    <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span>
                </div>
            </div>
            
            <strong>LEGEND: LOAF</strong> - LOAN AGREEMENT FORM, <strong>ACQF</strong> - ACQUISITION FORM, <strong>CONP</strong> - CONCEPT PAPER<hr>
            
<table class="table table-striped" width="80%" height="80%"  background-color="dddddd">
  
    <thead>

    <th>Category</th>
    <th>Accession Code</th>
    <th>File</th>
    <th>Date Created</th> 
    </thead>
<tr>
    <td align="center">LOAF</td>
    <td>KAL-1200</td>
    <td><a href="#">AIR-ASIA-AGREEMENT.docx</a></td>
    <td>June 16, 2012</td>
</tr>
<tr>
    <td align="center">ACQF</td>
    <td>LSP-US2Q</td>
    <td><a href="#">REYES-FOUND-AGREEMENT.jpg</a></td>
    <td>May 16, 2017</td>
</tr>
<tr>
    <td align="center">CONP</td>
    <td>CHK-2G00</td>
    <td><a href="#">BODY-WORKS-CONCEPT.pdf</a></td>
    <td>Feb 20, 2016</td>
</tr>
</table>

            </center>


   <?php
   require_once ('navbar.php');
   ?>

    </body>
</html>
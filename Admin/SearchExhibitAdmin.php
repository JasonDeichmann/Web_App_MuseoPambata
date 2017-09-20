<?php
//Start session
session_start();
//Check if session is valid
if(!isset($_SESSION['userType'])){
    header('Location:../LoginMock.php');
}


    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    if(isset($_POST['bot'])){
        $_SESSION['ab']=$_POST['bot'];
        echo $_SESSION['ab'];

        $retrieve = $db->prepare("select * from artifacts where location = :location");
$retrieve->bindParam(':location', $_POST['bot']);
$retrieve->execute();
$retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

}
else{
$retrieve = $db->prepare("select * from artifacts");
$retrieve->execute();
$count = $retrieve->rowCount();
$retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

}

include 'funcs.php';
/*
<td><center><img src="<? echo $rows['artifactImageURL']?>"  alt="" width="100" height="100"></center></td>
*/

?>

<!DOCTYPE html>
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
        padding-left: 2%;
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"><span class="glyphicon glyphicon-search"></span>&nbsp;ARTIFACT INFORMATION &nbsp;</h2>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2" align="right" style="background-color:white;">
                            <h5>Artifact Name:</h5><br>


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
                    <button class="btn btn-default" type="button" name="newTagBtn" id="newTagBtn" onclick="dagdagBagoTag()"><span class="glyphicon glyphicon-plus-sign"></span></button>
                  </span>
                    <input id="newTag" name="newTag" value="" maxlength="45" size="4" placeholder="New Artifact Tag" type="text" class="form-control" />
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<body>

<center>
    <div class="panel">

        <div id="content">

            <center><B>View all exhibits per category:</B></center>
            <form method="post" id="botz" name="botcha "action="">
                <button value="1" name="bot" type="submit" ><img src="../images/Kalikasan.png" alt="Kalikasan" class="images" title = "Kalikasan" />&nbsp;</button>
                <button name="bot" type="submit" value="2"><img src="../images/KatawanKo.png" alt="KatawanKo" class="images" title = "Katawan Ko" />&nbsp;</button>
                <button name="bot" type="submit" value="3"><img src="../images/PamilihangBayan.png" alt="PamilihangBayan" class="images" title = "Pamilihang Bayan"  /></button>
                <button name="bot" type="submit" value="4"><img src="../images/MaynilaNoon.png" alt="MaynilaNoon" class="images" title = "Maynila Noon"  />&nbsp;</button>
                <button name="bot" type="submit" value="5" ><img src="../images/Tuklas.png" alt="Tuklas" class="images" title = "Tuklas" />&nbsp;</button>
                <button name="bot" type="submit" value="6"><img src="../images/TravelingExhibit.png" alt="Traveling" class="images" title = "Traveling Exhibit" />&nbsp;</button>
                <button name="bot" type="submit" value="7"><img src="../images/PaglakiKo.png" alt="Paglaki" class="images" title = "Paglaki Ko"  />&nbsp;</button>
                <button name="bot" type="submit" value="8"><img src="../images/BataSaMundo.png" alt="Bata" class="images" title = "Bata Sa Mundo"  />&nbsp;</button>
                <button name="bot" type="submit" value="9"><img src="../images/OtherAreas.png" alt="Other" class="images" title = "Other Areas"  />&nbsp;</button>
            </form>
            <hr>

            <div id="custom-search-input">
                <div class="input-group col-md-12">

                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Artifact Name</th>
                            <th>Location</th>
                            <th>Tags</th>
                            <th>Mode of Acquisition</th>
                            <th>Acquisition Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($retrieve as $rows){ $ctr = 0;?>
                        <tr>
                            <form method="post" id="botz" id="<?php echo 'botcha'.$rows['artifactCode'];?>" name="botcha" action="ExhibitDetails.php">
                                <td><h4><a href="javascript:;" type="submit" class="submit"  onclick="$('<?php echo "#submitBtn".$rows['artifactCode'];?>').click();"><?php  echo $rows['artifactName']?></a></h4>
                                <?php if($_SESSION['userType'] == 1){;?>
                                    <a href="#" data-toggle="modal" name = "empTag" data-target="#myModal" onclick="gamol(this, <?php echo $rows['artifactCode'];?>)">Add tag</a>
                                <?php }?>
                                </td>
                                <td><?php chkLocation($rows['location']); ?></td>

                                <td id="totkan-<?php echo $rows['artifactCode']?>">
                                    <?php $tags = getArtifactTag($rows['artifactCode']);
                                    foreach ($tags as $tag){
                                        $tagCD = $tag['tagCode'];
                                        $compCD = $rows['artifactCode'];

                                        $ctr++;
                                        if($ctr>=5){
                                            echo"<br><br>";
                                            $ctr=0;
                                        }
                                        ?>
                                        <?php if($_SESSION['userType'] == 1){;?>
                                        <span class="badge badge-pill badge-primary" id="pill-<?php echo $tag['tagCode'].$rows['artifactCode'];?>"><?php echo $tag['tagName']?><button type="button" id="<?php echo $tag['tagName']?>-<?php echo $tag['tagCode']?>" class="close" onclick="tangalTag(<?php echo $tagCD;?>,<?php echo $compCD;?>)">x</button></span>
                                        <?php }
                                        else{;?>
                                            <span class="badge badge-pill badge-primary" id="pill-<?php echo $tag['tagCode'].$rows['artifactCode'];?>"><?php echo $tag['tagName']?></span>
                                            <?php }?>
                                    <?php }?>

                                </td>

                                <td><?php echo chkMOA($rows['modeOfAcquisition']); ?></td>
                                <td><?php echo $rows['acquisitionDate']?></td>
                                <td><?php chkSTAT($rows['artifactStatus']);?>
                                    <button type="submit" id="<?php echo "submitBtn".$rows['artifactCode'];?>" style="display:none;" data-validate="contact-form">Hidden Button</button>
                                </td>
                                <input type="hidden" name="artNm" value="<?php echo $rows['artifactCode'];?>">
                            </form>
                        </tr>
                        <?php ;} ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- end of form -->
    </div></div>
</center>

<?php
require_once ('navbar.php');
?>

<script>

    function tangalTag(tagCode,code)
    {
        console.log("pumasok aq sa ajax mo");
        var type = 3;
        if(tagCode)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/removeTag.php',
                data: {
                    tagCode:tagCode,
                    code:code,
                    type:type
                },
                success: function (response) {
                    $( "#pill-"+tagCode+""+code).remove();
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
        var type = 3;
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
        console.log("dito add ng tag");
        var type = 3;
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
    function displayTags(code){
        var type = 3;
        if(code)
        {
            $.ajax({
                type: 'POST',
                url: 'ajax/displayTags.php',
                data: {
                    code:code,
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

    function gamol(a,code){

        var name = $(a).closest("tr").find("td:eq(0)").text();
        /*var name2 = $(a).closest("tr").find("td:eq(2)").text();*/
        console.log($(a).text());
        $("#i1").val(name);
        displayTags(code)
        /*$("#artNm").val(name2);*/


    }

    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function ab(){

        window.open('NewRepairForm.html');
    }


</script>

</body>
</html>
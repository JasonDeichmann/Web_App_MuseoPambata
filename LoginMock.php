<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=museoDB","root","song");
session_start();
include_once('Admin/funcs.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUSEO PAMBATA | Login Page</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="icon" type="image/png" href="images/Museo Pambata Logo.png"/>
    <link href ="CSS/Login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href ="/css/sidebarFixed.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/Museo%20Pambata%20logo.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-headingz">
                    <div class="panel-heading">
                        <div class="row-fluid user-row"><center>
                                <img src="images/mplogo1.png" width="40%" height="40%" onContextMenu="return false;">
                                <img src="images/mplogo-down.PNG" width="100%" height="100%" onContextMenu="return false;">
                            </center>
                        </div></div>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" class="form-signin" method="post" action="">
                        <fieldset>
                            <label class="panel-login">
                                <div class="login_result"> USERNAME:</div>
                            </label>
                            <input class="form-control" placeholder="Username" id="userid" type="text" name="username">
                            <label class="panel-login">
                                <div class="login_result"> PASSWORD:</div>
                            </label>
                            <input class="form-control" placeholder="Password" id="pswrdid" type="password" name="password">
                            <br><center>
                                <button type="buttonLogin" class="btn btn-info btn-md" name="submit"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</button>
                                &nbsp; &nbsp; &nbsp; <b>OR </b> &nbsp; &nbsp; &nbsp;

                                <a href="SearchExhibitViewer.html" class="btn btn-info btn-md"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; Proceed as Viewer</a></center>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php

if(isset($_POST['submit'])){;

    $username = $_POST['username'];
    $password = $_POST['password'];


    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];


    }
    $do = getAccount($username, $password);
    $count = $do->rowCount();
    $userTypes = $do->fetchAll();
    $userType = $userTypes[0];

    if($count == 1){
        $_SESSION['userType'] = $userType['userType'];
        $_SESSION['userID'] = $userType['employeeNumber'];
        header('Location:Admin/HomepageAdmin.php');
    }else{
        echo "<script type='text/javascript'>alert('INVALID USERNAME/PASSWORD');</script>";
    }

}

?>
</html>

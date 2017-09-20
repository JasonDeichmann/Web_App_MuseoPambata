<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="HomepageAdmin.php">Museo Pambata</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if($_SESSION['userType'] == 1)
                echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Admin Homepage</a></li>';
            else if($_SESSION['userType'] == 2)
                echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Exhibits Homepage</a></li>';
            else if($_SESSION['userType'] == 3)
                echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Maintenance Homepage</a></li>';
            ?>
            <li><a href=""><span class="glyphicon glyphicon-comment"></span>&nbsp; Update Log</a></li>
            <li><a href="Signout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Sign Out</a></li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <li>hi</li>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="HomepageAdmin.php">HOME<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>

                <?php
                    if($_SESSION['userType'] == 1) {
                        $html = "";
                        $html .= '<li class="dropdown" >';
                        $html .= '<a href = "#" class="dropdown-toggle" data-toggle = "dropdown" > EMPLOYEES <span class="caret" ></span ><span style = "font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user" ></span ></a>';
                        $html .= '<ul class="dropdown-menu forAnimate" role = "menu" >';
                        $html .= '<li ><a href = "AdminModule.php" > Add New Employee </a ></li >';
                        $html .= '<li ><a href = "ListofEmployees.php" > List of Employees </a ></li >';
                        $html .= '</ul >';
                        $html .= '</li >';
                        echo $html;
                    }
                ?>

                <li class="dropdown" >
                <a href = "#" class="dropdown-toggle" data-toggle = "dropdown" > ARTIFACTS <span class="caret" ></span ><span style = "font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search" ></span ></a >
                <ul class="dropdown-menu forAnimate" role = "menu" >
                <li ><a href = "SearchExhibitAdmin.php" > Artifact Catalog </a ></li >

                <?php
                if($_SESSION['userType'] < 3)
                    echo '<li ><a href = "EditInfoAdmin.php" > Edit Artifact Info </a ></li >';
                ?>

                </ul>
                </li >

                <?php
                // ARTIFACT ACQUISITION
                if($_SESSION['userType'] < 3)
                    echo '<li ><a href="AcquisitionAdmin.php">ACQUISITION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-plus-sign"></span></a></li>';
                ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <?php
                        if($_SESSION['userType'] < 3)
                            echo '<li><a href="NewRepairForm.php">New Repair Schedule</a></li>';
                            echo '<li><a href="RecentRepairSchedule.php">Recent Repair Schedules</a></li>';
                            echo '<li><a href="RepraisalArtifactAdmin.php">Reappraisal Artifact Module</a></li>';

                        if($_SESSION['userType'] == 1){
                            echo '<li><a href="CompleteRepairSched.php"> Complete Repair Schedule</a></li>';
                            echo '<li><a href="ListOutsourcing.php"> List of Outsourcing Companies</a></li>';
                        }
                        ?>
                    </ul>
                </li>

                <?php
                if($_SESSION['userType'] < 3){
                    $html = "";
                    $html .='<li class="dropdown">';
                        $html .='<a href="#" class="dropdown-toggle" data-toggle="dropdown">DISPOSAL <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-trash"></span></a>';
                        $html .='<ul class="dropdown-menu forAnimate" role="menu">';
                            $html .='<li><a href="DeaccessionAdmin.php">Deaccession of Item</a></li>';
                            $html .='</ul>';
                        $html .='</li>';

                    $html .= '<li><a href="FileRepositoryAdmin.php">FILE REPOSITORY<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>';

                    $html .= '<li><a href="GenerateReports.php">GENERATE REPORTS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>';
                    echo $html;
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<?php
    include '../funcs.php';

    if(isset($_POST['values']))
        {
            $i=0;
            $val=$_POST['values'];
            $a = explode(',',$val);
            $balnk = "";
            foreach ($a as $rows){
                if ($i!=0)
                    $balnk.= ','.chkRSN($rows);
                else
                    $balnk.=chkRSN($rows);
                $i++;
            }
            echo "$balnk";

            exit();
        }

?>

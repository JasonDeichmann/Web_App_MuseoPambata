<?php
if(isset($_POST['artifactCode']))
{
    $response="";
    $response.='<tbody id="b">';
    $a = explode('/',$_POST['stD']);
    $b = explode('/',$_POST['enD']);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');
    $retrieve = $db->prepare("select rs.repairCode, a.artifactName, rs.startDate, rs.endDate, o.companyName, GROUP_CONCAT(e.employeeName SEPARATOR ', ') as 'Repairee/s'
					 from repairSchedules rs join repairDetails rd 
								 on rs.repairCode = rd.repairCode 
											 left OUTER join employees e 
								 on rd.employeeNumber = e.employeeNumber
								            LEFT OUTER JOIN  OUTSOURCING o
                                 on rd.companyCode = o.companyCode
											 join artifacts a
								 on a.artifactCode = rs.artifactCode
								 WHERE rs.finishedDate IS NULL AND DATE(rs.endDate) >= :startDate AND DATE(rs.endDate) <= :endDate and a.artifactCode = :artifactCode AND rs.status = 3
                                 GROUP BY rs.repairCode, a.artifactName,rs.startDate,rs.endDate, rd.companyCode;");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->bindParam(':artifactCode',$_POST['artifactCode']);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    foreach ($retrieve as $rows){

        $response.="<tr>";
        $response.="<td>".$rows['repairCode']."</td>";
        $response.="<td>".$rows['artifactName']."</td>";
        $response.="<td>".$rows['startDate']."</td>";
        $response.="<td>".$rows['endDate']."</td>";
        if ($rows['companyName']== NULL)
            $response.= "<td>".$rows['Repairee/s']."</td>";
        else
            $response.= "<td>".$rows['companyName']."</td>";
        $response.="</tr>";
    }
    $response.='</tbody>';
    echo $response;
}
/*
 <tr>
    <td><?php echo $rows['repairCode']?></td>
    <td><?php echo $rows['artifactName'];?></td>
    <td><?php echo $rows['startDate']?></td>
    <td><?php echo $rows['endDate']?></td>
    <td><?php
        if ($rows['companyCode']==NULL)
            echo $rows['Repairee/s'];
        else
            echo $rows['companyCode'];
        ?></td>
    <td><?php
        $dat = date('Y-m-d', strtotime(str_replace('-','/', $rows['endDate'])));
        $dat.= "";
        $date1=date("Y-m-d");

        $curr=date_create($date1);
        $end=date_create($dat);

        $diff=date_diff($curr,$end);

        $echo = $diff->format("%R%d");
        echo $echo;
        ?></td>
</tr>
*/
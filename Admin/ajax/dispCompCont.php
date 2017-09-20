<?php
if(isset($_POST['artifactCode']))
{
    $response="";
    $response.='<tbody id="a">';
    $a = explode('/',$_POST['stD']);
    $b = explode('/',$_POST['enD']);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');
    $retrieve = $db->prepare("select rd.repairCode, a.artifactName, rs.startDate, rs.endDate, o.companyName, GROUP_CONCAT(e.employeeName SEPARATOR ', ') as 'Repairee/s'
                                        from repairSchedules rs LEFT join repairDetails rd
                                            on rs.repairCode = rd.repairCode
                                          join artifacts a
                                            on a.artifactCode = rs.artifactCode
                                          LEFT OUTER JOIN  OUTSOURCING o
                                            on rd.companyCode = o.companyCode
                                          left OUTER JOIN  employees e
                                            on rd.employeeNumber = e.employeeNumber
                                        WHERE DATE(rs.finishedDate) >= :startDate AND DATE(rs.finishedDate) <= :endDate and a.artifactCode = :artifactCode AND rs.status = 4
                                        GROUP BY rs.repairCode, a.artifactName,rs.startDate,rs.endDate, rd.companyCode;
                              ;");
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
        if ($rows['companyName']==NULL)
            $response.= "<td>".$rows['Repairee/s']."</td>";
        else
            $response.= "<td>".$rows['companyName']."</td>";
        $response.="</tr>";
    }
    $response.='</tbody>';
    echo $response;
}
<?php
    global $db;
    $db= new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

function retrieveRow($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from artifacts where artifactCode = :artifactCode");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve[0];

}
function get_tagName($tagCode){

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select tagName from tags where tagCode=:tagCode;");
    $retrieve->bindParam(':tagCode', $tagCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    $res = $retrieve[0];
    return $res['tagName'];
}
function get_tagCode($tagName){

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select tagCode from tags where tagName=:tagName;");
    $retrieve->bindParam(':tagName', $tagName);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    $res = $retrieve[0];
    return $res['tagCode'];
}
function get_tags(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from tags t;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_outsourcingComps(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select o.* from outsourcing o;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_outsourcingCompsTags($compCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select ot.tagCode, t.tagName  from outsourcingTags ot JOIN tags t on ot.tagCode = t.tagCode
                              WHERE ot.companyCode = :compCode;");
    $retrieve->bindParam(':compCode', $compCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_patronName($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from forms where artifactCode = :artifactCode");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $ctr = $retrieve->rowCount();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    if($ctr==0){
        return "Null";

    }
    else{
        $retrieve = $retrieve[0];
        return $retrieve['patronName'];

    }
}

function get_artifactName($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select artifactName from artifacts where artifactCode = :artifactCode");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    $retrieve=$retrieve[0];

    return $retrieve['artifactName'];
}

function get_typeSTR($type){
    switch($type){
        case '1':
            echo "ACQUISITION";
            break;

        case '2':
            echo "MAINTENANCE";
            break;

        case '3':
            echo "DISPOSAL";
            break;
        case '4':
            echo "EXCEPTION";
            break;
        case '5':
            echo "NEED FOR REPAIRS";
            break;
    }
}

function get_typeQuery($type,$stD,$enD){
    switch($type){
        case '1':
            return get_accessioneportGEN($stD,$enD);
            break;
        case '2':
            return get_repairedReport($stD,$enD);
            break;
        case '3':
            return get_deaccessionReportGEN($stD,$enD);
            break;
        case '4':
            return get_ExceptionReport($stD,$enD);
            break;
        case '5':
            return get_NeedRepairedReport($stD,$enD);
            break;
    }
}

function get_repraisalMONTH($month, $artifactCode){

    $a = explode('/',$month);

    $month = $a[1].'-'.$a[0].'-'.'01';

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT (:month + INTERVAL t.n - 1 DAY ) as 'RepDate', IF(rs.artifactCode = :artifactCode, rs.artifactCode, NULL) as 'etits' , IF(rs.artifactCode = :artifactCode, count(rs.repairCode), 0) as 'RepCnt'  FROM tally t
                                        LEFT JOIN repairSchedules rs on DATE(rs.startDate) = (:month + INTERVAL t.n - 1 DAY ) 
                                        WHERE (t.n <= DATEDIFF(LAST_DAY(:month), :month) + 1) 
                                        Group by 1,rs.artifactCode;
                                        ");
    $retrieve->bindParam(':month', $month);
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_repraisalYEAR($year, $artifactCode){
    $year = $year.'-01'.'-01';

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT DISTINCT(:YEAR + INTERVAL t.n - 1 MONTH ) as 'RepDate' ,rs.artifactCode, IF(rs.artifactCode = :artifactCode, count(rs.repairCode), 0) as 'RepCnt'  
                                        FROM tallyMonth t
                                        LEFT JOIN repairSchedules rs on MONTH(rs.startDate) = MONTH(:YEAR + INTERVAL t.n - 1 MONTH ) 
                                        AND YEAR(rs.startDate) = YEAR(:YEAR + INTERVAL t.n - 1 MONTH )
                                        WHERE (t.n <= DATEDIFF(LAST_DAY(:YEAR), :YEAR) + 1)  AND (rs.artifactCode ='1' OR rs.artifactCode is NULL)
                                        Group by 1,rs.artifactCode;
                                        ");
    $retrieve->bindParam(':YEAR', $year);
    $retrieve->bindParam(':artifactCode',$artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_repraisalSET($startDate, $endDate, $artifactCode){
    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];


    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT (:startDate + INTERVAL t.n - 1 DAY ) as 'RepDate', IF(rs.artifactCode = :artifactCode, rs.artifactCode, NULL) as 'etits' , IF(rs.artifactCode = :artifactCode, count(rs.repairCode), 0) as 'RepCnt'  FROM tally t
                                        LEFT JOIN repairSchedules rs on DATE(rs.startDate) = (:startDate + INTERVAL t.n - 1 DAY ) 
                                        WHERE (t.n <= DATEDIFF(:endDate, :startDate) + 1) 
                                        Group by 1,rs.artifactCode;
                                        ");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->bindParam(':artifactCode',$artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_repCntMNTH($month, $artifactCode){

    $a = explode('/',$month);

    $month = $a[1].'-'.$a[0].'-'.'01';

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT rs.artifactCode ,  count(rs.repairCode) as 'RepCnt', rs.repairCode, rs.repairType FROM tally t
                                        LEFT JOIN repairSchedules rs on DATE(rs.startDate) = (:month + INTERVAL t.n - 1 DAY ) 
                                        WHERE rs.artifactCode = :artifactCode AND (t.n <= DATEDIFF(LAST_DAY(:month), :month) + 1) 
                                        Group by rs.artifactCode, rs.repairCode;
                                      ");
    $retrieve->bindParam(':month', $month);
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_minArtDate(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT DATE(MIN(acquisitionDate)) as 'MinDate' from artifacts;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    $mind = $retrieve[0];
    return $mind['MinDate'];

}
function get_repCntYR($year, $artifactCode){

    $year = $year.'-01'.'-01';

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT rs.artifactCode, count(rs.repairCode) as 'RepCnt',rs.repairCode, rs.repairType   
                                        FROM tallyMonth t
                                        LEFT JOIN repairSchedules rs on MONTH(rs.startDate) = MONTH(:YEAR + INTERVAL t.n - 1 MONTH ) 
                                        AND YEAR(rs.startDate) = YEAR(:YEAR + INTERVAL t.n - 1 MONTH )
                                        WHERE (t.n <= DATEDIFF(LAST_DAY(:YEAR), :YEAR) + 1)  AND (rs.artifactCode ='1' OR rs.artifactCode is NULL) AND rs.artifactCode= :artifactCode
                                        Group by 1,rs.artifactCode, rs.repairCode;
                                        ");
    $retrieve->bindParam(':YEAR', $year);
    $retrieve->bindParam(':artifactCode',$artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_repCntSET($startDate, $endDate, $artifactCode){
    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];


    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("SELECT (:startDate + INTERVAL t.n - 1 DAY ) as 'RepDate', rs.repairCode,rs.repairType ,IF(rs.artifactCode = :artifactCode, rs.artifactCode, NULL) as 'etits' , IF(rs.artifactCode = :artifactCode, count(rs.repairCode), 0) as 'RepCnt'  FROM tally t
                                        LEFT JOIN repairSchedules rs on DATE(rs.startDate) = (:startDate + INTERVAL t.n - 1 DAY ) 
                                        WHERE (t.n <= DATEDIFF(:endDate, :startDate) + 1) AND rs.artifactCode = :artifactCode
                                        Group by 1,rs.repairCode,rs.artifactCode;
                                        ");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->bindParam(':artifactCode',$artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_NeedRepairedReport($startDate, $endDate){

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');

    $retrieve = $db->prepare("select rs.repairCode, a.artifactName, rs.startDate, rs.endDate, rd.companyCode, GROUP_CONCAT(e.employeeName SEPARATOR ', ') as 'Repairee/s'
					 from repairSchedules rs join repairDetails rd 
								 on rs.repairCode = rd.repairCode 
											 left OUTER join employees e 
								 on rd.employeeNumber = e.employeeNumber
											 join artifacts a
								 on a.artifactCode = rs.artifactCode
								 WHERE rs.finishedDate IS NULL AND DATE(rs.endDate) >= :startDate AND DATE(rs.endDate) <= :endDate AND rs.status = 3
                                 GROUP BY rs.repairCode, a.artifactName,rs.startDate,rs.endDate, rd.companyCode;");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_repairedReport($startDate, $endDate){

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];


    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');

    $retrieve = $db->prepare("select rd.repairCode, a.artifactName, rs.startDate, rs.endDate, rs.finishedDate, rd.companyCode, GROUP_CONCAT(e.employeeName SEPARATOR ', ') as 'Repairee/s'
					 from repairSchedules rs join repairDetails rd 
								 on rs.repairCode = rd.repairCode 
											 left OUTER join employees e 
								 on rd.employeeNumber = e.employeeNumber
											 join artifacts a
								 on a.artifactCode = rs.artifactCode
								 WHERE rs.finishedDate IS NOT NULL AND DATE(rs.finishedDate) >= :startDate AND DATE(rs.finishedDate) <= :endDate AND rs.status = 4
                                 GROUP BY rs.repairCode, a.artifactName,rs.startDate,rs.endDate, rd.companyCode, e.employeeName;");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_agedrepraised(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    $retrieve = $db->prepare("SELECT *, floor(datediff(curdate(),acquisitionDate) / 365) FROM artifacts where floor(datediff(curdate(),acquisitionDate) / 365) >=4;");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;

}

function get_ExceptionReport($startDate, $endDate){

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $retrieve = $db->prepare("select * from repairRemarks join repairSchedules on repairRemarks.repairCode = repairSchedules.repairCode where repairSchedules.finishedDate IS NOT NULL AND repairRemarks.remStatus>=2 AND DATE(repairSchedules.finishedDate) >= :startDate AND DATE(repairSchedules.finishedDate) <= :endDate ");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $ctr = $retrieve->rowCount();
    echo $ctr;
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);


    return $retrieve;
}

function get_deaccessionReportGEN($startDate, $endDate){

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from deaccession where DATE(deaccession.dateOfAccession) >= :startDate AND DATE(deaccession.dateOfAccession) <= :endDate");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_accessionReportGEN($startDate, $endDate){

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from artifacts where DATE(artifacts.acquisitionDate) >= :startDate AND DATE(artifacts.acquisitionDate) <= :endDate");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_artifactCode($artifactName){

    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $retrieve = $db->prepare("select * from artifacts where artifactName = :artifactName");
    $retrieve->bindParam(':artifactName', $artifactName);
    $retrieve->execute();

    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    $retrieved = $retrieve[0];
    $retrieved = $retrieved['artifactCode'];

    return $retrieved;
}

function retrieveArtifacts(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $retrieve = $db->prepare("select * from artifacts WHERE artifactStatus != '3'");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    return $retrieve;
}

function chkForm($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select * from forms where artifactCode = :artifactCode");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    return $retrieve[0];
}

function get_repType($dig){
    switch ($dig){
        case 1:
            echo "A";
            break;
        case 2:
            echo "B";
            break;
        case 3:
            echo "C";
            break;
    }
}

function get_monthCtr($monthNum){
    switch ($monthNum){
        case 1:
            return 31;
            break;
        case 2:
            return 28;
            break;
        case 3:
            return 31;
            break;
        case 4:
            return 30;
            break;
        case 5:
            return 31;
            break;
        case 6:
            return 30;
            break;
        case 7:
            return 31;
            break;
        case 8:
            return 31;
            break;
        case 9:
            return 30;
            break;
        case 10:
            return 31;
            break;
        case 11:
            return 30;
            break;
        case 12:
            return 31;
            break;
    }
}

function chkLocation($dig) {
    switch ($dig){
        case 1:
            echo "Kalikasan";
            break;
        case 2:
            echo "Katawan Ko";
            break;
        case 3:
            echo "Pamilihang Bayan";
            break;
        case 4:
            echo "Maynila Noon";
            break;
        case 5:
            echo "Tuklas";
            break;
        case 6:
            echo "Traveling Exhibit";
            break;
        case 7:
            echo "Paglaki Ko";
            break;
        case 8:
            echo "Bata Sa Mundo";
            break;
        case 9:
            echo "Other Areas";
            break;
    }
}
function explodeRSN($str){
    $i=0;
    $val=$str;
    $a = explode(',',$val);
    $balnk = "";
    foreach ($a as $rows){
        if ($i!=0)
            $balnk.= ','.chkRSN($rows);
        else
            $balnk.=chkRSN($rows);
        $i++;
    }
    return $balnk;
}

function chkMOA($dig){
    switch ($dig){
        case 1:
            return "Fabricated";
            break;
        case 2:
            return "On-loan";
            break;
        case 3:
            return "Donation";
            break;
        case 4:
            return "Purchased";
            break;
    }
}
function chkRSN($dig){
    switch ($dig){
        case 1:
            return "Deteriorated beyond usefulness";
            break;
        case 2:
            return "Lacks physical integrity";
            break;
        case 3:
            return "Out of Scope/Inappropriate";
            break;
        case 4:
            return "Double Entry/is a duplicate";
            break;
        case 5:
            return "Cannot Preserve properly";
            break;
        case 6:
            return "More than 4 years in possession";
            break;
        case 7:
            return "Lease Ended";
            break;
        case 8:
            return "Artifact Lost";
            break;
    }
}

function chkMOD($dig){
    switch ($dig){
        case 1:
            echo "Donated";
            break;
        case 2:
            echo "Salvaged";
            break;
        case 3:
            echo "Sold";
            break;
        case 3:
            echo "Returned";
            break;
    }
}

function chkRemStat($dig) {
    switch ($dig){
        case 1:
            echo "On-Time";
            break;
        case 2:
            echo "Late";
            break;
        case 3:
            echo "Cancelled";
            break;
    }
}

function chkSTAT($dig) {
    switch ($dig){
        case 1:
            echo "On-Display";
            break;
        case 2:
            echo "Inventory Stashed";
            break;
        case 3:
            echo "Deaccessed";
            break;
    }
}

function getTags(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getTags = $db->prepare("SELECT tagCode, tagName FROM tags");
    $getTags->execute();
    $tags = $getTags->fetchAll(PDO::FETCH_ASSOC);
    return $tags;
}

function insertArtifact($artifactName, $artifactStatus, $quantity, $location, $acquisitionMode, $acquisitionDate, $description, $artifactImagePath){
    // Insert new artifact into artifacts table
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('INSERT INTO  artifacts(artifactName, artifactStatus, quantity, location, modeOfAcquisition, acquisitionDate, comments, artifactImagePath) VALUES (:artifactName, :artifactStatus, :quantity, :location, :modeOfAcquisition, :acquisitionDate, :comments, :artifactImagePath)');
    $do->bindParam(':artifactName', $artifactName);
    $do->bindParam(':artifactStatus', $artifactStatus);
    $do->bindParam(':quantity', $quantity);
    $do->bindParam(':location', $location);
    $do->bindParam(':modeOfAcquisition', $acquisitionMode);
    $do->bindParam(':acquisitionDate', $acquisitionDate);
    $do->bindParam(':comments', $description);
    $do->bindParam(':artifactImagePath', $artifactImagePath);
    $do->execute();
}

function insertArtifactTags($artifactTagsSelected, $artifactCode){
    $ctr = 0;
    while(count($artifactTagsSelected) >$ctr) {
        $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
        $do = $db->prepare('INSERT INTO artifactTags(tagCode, artifactCode) VALUES (:tagCode, :artifactCode)');
        $do->bindParam('tagCode', $artifactTagsSelected[$ctr]);
        $do->bindParam(':artifactCode', $artifactCode);
        $do->execute();
        $ctr++;
    }
}

function checkEmployeeName($employeeName){
    // Check if employee name already exists
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT employeeName FROM employees WHERE employeeName = :employeeName");
    $do->bindParam(':employeeName', $employeeName);
    $do->execute();
    $count = $do->rowCount();
    return $count;
}
function recentAddedArtifact(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT * FROM artifacts WHERE year(acquisitionDate) = year(curdate()) and  month(acquisitionDate) = month(curdate()) ;");
    $do->execute();
    $retrieve = $do->fetchAll(PDO::FETCH_ASSOC);
    return $retrieve;
}
function checkUsername($username){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT username FROM accounts WHERE username = :username");
    $do->bindParam(':username', $username);
    $do->execute();
    $count = $do->rowCount();
    return $count;
}

function checkEmail($emailAddress){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT emailAddress FROM accounts WHERE emailAddress = :emailAddress");
    $do->bindParam(':emailAddress', $emailAddress);
    $do->execute();
    $count = $do->rowCount();
    return $count;
}

function checkContactNumber($contactNumber){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT contactNumber FROM accounts WHERE contactNumber = :contactNumber");
    $do->bindParam(':contactNumber', $contactNumber);
    $do->execute();
    $count = $do->rowCount();
    return $count;
}

function insertEmployee($employeeName, $employeeType, $shiftStart, $shiftEnd, $emailAddress, $contactNumber){
    //Insert employee
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('INSERT INTO  employees(employeeName,employeeType,shiftStart,shiftEnd, emailAddress, contactNumber) VALUES (:employeeName,:employeeType, :shiftStart, :shiftEnd, :emailAddress,:contactNumber )');
    $do->bindParam(':employeeName', $employeeName);
    $do->bindParam(':employeeType', $employeeType);
    $do->bindParam(':shiftStart', $shiftStart);
    $do->bindParam(':shiftEnd', $shiftEnd);
    $do->bindParam(':emailAddress', $emailAddress);
    $do->bindParam('contactNumber', $contactNumber);
    $do->execute();
}

function getEmployeeNumber($employeeName){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('SELECT * FROM employees WHERE employeeName = :employeeName');
    $do->bindParam(':employeeName', $employeeName);
    $do->execute();
    $getEmployeeNumber = $do->fetchAll(PDO::FETCH_ASSOC);
    return $getEmployeeNumber[0];
}

function insertAccount($employeeNumber, $username, $password, $userType){



    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');


    $do = $db->prepare("INSERT INTO accounts(employeeNumber,username,password,userType) VALUES (:employeeNumber,:username,:password,:userType);");
    $do->bindParam(':employeeNumber', $employeeNumber['employeeNumber']);
    $do->bindParam(':username', $username);
    $do->bindParam(':password', $password);
    $do->bindParam(':userType', $userType);
    $do->execute();
}

function insertEmployeeTags($employeeTags, $employeeNumber){
    $ctr = 0;
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    while(count($employeeTags) >$ctr) {
        $do = $db->prepare('INSERT INTO employeeTags(tagCode, employeeNumber) VALUES (:tagCode, :employeeNumber)');
        $do->bindParam('tagCode', $employeeTags[$ctr]);
        $do->bindParam(':employeeNumber', $employeeNumber['employeeNumber']);
        $do->execute();
        $ctr++;
    }
}

function getExhibitsEmployees(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getEmployees = $db->prepare("SELECT employeeNumber, employeeName FROM employees WHERE employeeType = 2");
    $getEmployees->execute();
    $employees = $getEmployees->fetchAll();
    return $employees;
}

function getCompanies(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getCompanies = $db->prepare("SELECT companyCode, companyName FROM outsourcing");
    $getCompanies->execute();
    $companies = $getCompanies->fetchAll();
    return $companies;
}

function insertRepairSchedule($artifactCode, $status, $startDate, $endDate, $repairType, $reasonForRepair, $employeeNumber){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('INSERT INTO repairSchedules(artifactCode, status, startDate, endDate, repairType, reasonForRepair, author) VALUES (:artifactCode, :status, :startDate, :endDate, :repairType, :reasonForRepair, :author)');
    $do->bindParam(':artifactCode', $artifactCode);
    $do->bindParam(':status', $status);
    $do->bindParam(':startDate', $startDate);
    $do->bindParam(':endDate', $endDate);
    $do->bindParam(':repairType', $repairType);
    $do->bindParam(':reasonForRepair', $reasonForRepair);
    $do->bindParam(':author', $employeeNumber);
    $do->execute();
}

function updateLocation($location, $artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('UPDATE artifacts SET location = :location WHERE artifactCode = :artifactCode');
    $do->bindParam(':location', $location);
    $do->bindParam(':artifactCode', $artifactCode);
    $do->execute();
}

function getRepairCode($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('SELECT * FROM repairSchedules WHERE artifactCode = :artifactCode ORDER BY repairCode DESC');
    $do->bindParam(':artifactCode', $artifactCode);
    $do->execute();
    $getRepairCode = $do->fetchAll(PDO::FETCH_ASSOC);
    return $getRepairCode[0];
}

function insertRepairDetailsEmployees($repairCode, $employees){
    $ctr = 0;
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    while (count($employees) > $ctr) {
        //Insert repair details
        $do = $db->prepare('INSERT INTO repairDetails(repairCode, employeeNumber) VALUES (:repairCode, :employeeNumber)');
        $do->bindParam('repairCode', $repairCode['repairCode']);
        $do->bindParam(':employeeNumber', $employees[$ctr]);
        $do->execute();
        $ctr++;
    }
}

function insertRepairDetailsOutsource($repairCode, $outsourcing){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('INSERT INTO repairDetails(repairCode, companyCode) VALUES (:repairCode, :companyCode)');
    $do->bindParam('repairCode', $repairCode['repairCode']);
    $do->bindParam(':companyCode', $outsourcing[0]);
    $do->execute();
}

function getAccount($username, $password){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("select userType, employeeNumber from accounts where username = :username AND password = :password");
    $do->bindParam(':username',$username);
    $do->bindParam(':password',$password);
    $do->execute();
    return $do;
}

function getRepairSchedulesAdmin(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getRepairSchedules = $db->prepare('SELECT repairCode FROM repairSchedules WHERE status = 1');
    $getRepairSchedules->execute();
    $repairSchedules = $getRepairSchedules->fetchAll();
    return $repairSchedules;
}

function getRepairSchedulesMaintenance(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getRepairSchedules = $db->prepare('SELECT repairCode FROM repairSchedules WHERE status = 2');
    $getRepairSchedules->execute();
    $repairSchedules = $getRepairSchedules->fetchAll();
    return $repairSchedules;
}

function getRepairCodePending(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getRepairCode = $db->prepare('SELECT * FROM repairDetails WHERE employeeNumber IS NOT NULL');
    $getRepairCode->execute();
    $repairCodes = $getRepairCode->fetchAll();
    return $repairCodes;
}

function getRepairCodePendingOutsource(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getRepairCode = $db->prepare('SELECT * FROM repairDetails WHERE companyCode IS NOT NULL');
    $getRepairCode->execute();
    $repairCodes = $getRepairCode->fetchAll();
    return $repairCodes;
}

function getArtifactDetails($repairCode){
    //Get artifact name, startDate, endDate, reasonForRepair, repair
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare("SELECT A.artifactName, startDate, endDate, reasonForRepair FROM repairSchedules R JOIN artifacts A ON R.artifactCode = A.artifactCode WHERE repairCode = :repairCode ");
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();
    $getDetails = $do->fetchAll(PDO::FETCH_ASSOC);
    $details = $getDetails[0];
    return $details;
}

function getRepairees($repairCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getRepairees = $db->prepare("SELECT E.employeeName, E.employeeNumber FROM repairDetails RD JOIN employees E ON RD.employeeNumber = E.employeeNumber WHERE repairCode = :repairCode ");
    $getRepairees->bindParam(':repairCode', $repairCode);
    $getRepairees->execute();
    $repairees = $getRepairees->fetchAll(PDO::FETCH_ASSOC);
    return $repairees;
}

function approveRepairForm($repairCode){
    $status = 3;
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('UPDATE repairSchedules SET status = :status WHERE repairCode = :repairCode');
    $do->bindParam(':status', $status);
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();
}
function denyRepairForm($repairCode){
    $status =5;
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('UPDATE repairSchedules SET status = :status WHERE repairCode = :repairCode');
    $do->bindParam(':status', $status);
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();
}

function getCompanyName($repairCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getCompanies = $db->prepare("SELECT C.companyCode, C.companyName FROM repairDetails RD JOIN outsourcing C ON RD.companyCode = C.companyCode WHERE repairCode = :repairCode");
    $getCompanies->bindParam(':repairCode', $repairCode);
    $getCompanies->execute();
    $companies = $getCompanies->fetchAll(PDO::FETCH_ASSOC);
    return $companies;
}

function getMaintenance(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getMaintenance = $db->prepare("SELECT employeeNumber, employeeName FROM employees WHERE employeeType = 4");
    $getMaintenance->execute();
    $maintenance = $getMaintenance->fetchAll(PDO::FETCH_ASSOC);
    return $maintenance;
}

function assistRepairForm($repairCode, $repairees){
    $status = 1;
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('UPDATE repairSchedules SET status = :status WHERE repairCode = :repairCode');
    $do->bindParam(':status', $status);
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();

    $ctr = 0;
    while (count($repairees) > $ctr) {
        //Insert repair details
        $do = $db->prepare('INSERT INTO repairDetails(repairCode, employeeNumber) VALUES (:repairCode, :employeeNumber)');
        $do->bindParam('repairCode', $repairCode);
        $do->bindParam(':employeeNumber', $repairees[$ctr]);
        $do->execute();
        $ctr++;
    }
}

function getOngoingRepairs(){
    //Get artifact name, startDate, endDate, reasonForRepair, repair
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getOngoingRepairs = $db->prepare("SELECT A.artifactName, repairCode, startDate, endDate, status FROM repairSchedules R JOIN artifacts A ON R.artifactCode = A.artifactCode WHERE R.status = 3");
    $getOngoingRepairs->bindParam(':repairCode', $repairCode);
    $getOngoingRepairs->execute();
    $ongoingRepairs = $getOngoingRepairs->fetchAll(PDO::FETCH_ASSOC);
    return $ongoingRepairs;
}

function getOutsourceOngoing($repairCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getOutsource = $db->prepare('SELECT C.companyName FROM repairDetails R JOIN outsourcing C ON R.companyCode = C.companyCode WHERE repairCode = :repairCode');
    $getOutsource->bindParam(':repairCode', $repairCode);
    $getOutsource->execute();
    $outsource = $getOutsource->fetchAll();
    return $outsource;
}
function getRepaireeOngoing($repairCode){
    //Employee
    $repairees = getRepairees($repairCode);
    $outsources = getOutsourceOngoing($repairCode);
    $repairNameDisplay = "";
    $one = 0;
    foreach($repairees AS $repairee){
        if($one == 0) {
            $repairNameDisplay = $repairNameDisplay . $repairee['employeeName'];
            $one++;
        }else
            $repairNameDisplay = $repairNameDisplay.', '.$repairee['employeeName'];
    }
    foreach($outsources AS $outsource){
        $repairNameDisplay = $repairNameDisplay.$outsource['companyName'];
    }
    return $repairNameDisplay;
}

function getOngoingRepairDetails($repairCode){
    //Get artifact name, startDate, endDate, reasonForRepair, repair
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $getOngoingRepairs = $db->prepare("SELECT A.artifactName, repairCode, startDate, endDate, status, reasonForRepair FROM repairSchedules R JOIN artifacts A ON R.artifactCode = A.artifactCode WHERE repairCode = :repairCode");
    $getOngoingRepairs->bindParam(':repairCode', $repairCode);
    $getOngoingRepairs->execute();
    $ongoingRepairs = $getOngoingRepairs->fetchAll(PDO::FETCH_ASSOC);
    return $ongoingRepairs[0];
}

function completeRepairForm($repairFormNumber, $remarks, $dateDiff){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $status = 4;
    $finishDate = date('Y-m-d');

    $do = $db->prepare('UPDATE repairSchedules SET status = :status, finishedDate = :finishDate WHERE repairCode = :repairCode');
    $do->bindParam(':status', $status);
    $do->bindParam(':finishDate', $finishDate);
    $do->bindParam(':repairCode', $repairFormNumber);
    $do->execute();

    //Insert repair remark
    $status = 1;
    if($dateDiff <= 0){
        $status = 2;
    }
    $do = $db->prepare('INSERT INTO repairRemarks(repairCode,remStatus,remarks) VALUES (:repairCode,:remStatus,:remarks)');
    $do->bindParam(':repairCode', $repairFormNumber);
    $do->bindParam(':remStatus', $status);
    $do->bindParam(':remarks', $remarks);
    $do->execute();
}

function cancelRepairForm($repairCode, $remarks){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $status = 4;
    $finishDate = date('Y-m-d');

    $do = $db->prepare('UPDATE repairSchedules SET status = :status, finishedDate = :finishDate WHERE repairCode = :repairCode');
    $do->bindParam(':status', $status);
    $do->bindParam(':finishDate', $finishDate);
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();

    $status = 3;
    $do = $db->prepare('INSERT INTO repairRemarks(repairCode,remStatus,remarks) VALUES (:repairCode,:remStatus,:remarks)');
    $do->bindParam(':repairCode', $repairCode);
    $do->bindParam(':remStatus', $status);
    $do->bindParam(':remarks', $remarks);
    $do->execute();
}


function get_forApproval(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    $retrieve = $db->prepare("SELECT * FROM repairSchedules WHERE status<=2;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;

}
function get_recentlyCompleted(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    $retrieve = $db->prepare("SELECT rs.*, rr.remStatus, rr.remarks FROM repairSchedules rs JOIN repairRemarks rr on rs.repairCode = rr.repairCode WHERE rs.status=4 AND rr.remStatus <= 2 ;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;

}
function get_onGoing(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');

    $retrieve = $db->prepare("SELECT * FROM repairSchedules WHERE status=3;");
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;

}
function get_leadTime($endDate){
    $dat = date('Y-m-d', strtotime(str_replace('-','/', $endDate)));
    $dat.= "";
    $date1=date("Y-m-d");

    $curr=date_create($date1);
    $end=date_create($dat);


    $diff=date_diff($curr,$end);

    $echo = $diff->format("%R%d");
    return $echo;
}
function get_repairRemarksRS($dig){
    switch ($dig){
        case 1:
            echo "On-time";
            break;
        case 2:
            echo "Late";
            break;
        case 3:
            echo "Cancelled";
            break;
    }
}
function update_artLoc($artifactCode,$newLoc){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root','song');
    $update = $db->prepare("UPDATE artifacts
                                      SET location = :newLoc
                                      WHERE artifactCode = :artifactCode;");
    $update->bindParam(':artifactCode',$artifactCode);
    $update->bindParam(':newLoc',$newLoc);
    $update->execute();
}

function chkLocationDig($dig) {
    switch ($dig){
        case "Kalikasan":
            return 1;
            break;
        case "Katawan Ko":
            return 2;
            break;
        case "Pamilihang Bayan":
            return 3;
            break;
        case "Maynila Noon":
            return 4;
            break;
        case "Tuklas":
            return 5;
            break;
        case "Traveling Exhibit":
            return 6;
            break;
        case "Paglaki Ko":
            return 7;
            break;
        case "Bata Sa Mundo":
            return 8;
            break;
        case "Other Areas":
            return 9;
            break;
    }
}

function insertIntoForms($artifactCode, $acquisitionName, $acquisitionDate, $formFilePath){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('INSERT INTO forms(artifactCode,patronName,dateReceived,formFilePath) VALUES (:artifactCode,:patronName,:dateReceived,:formFilePath)');
    $do->bindParam(':artifactCode', $artifactCode);
    $do->bindParam(':patronName', $acquisitionName);
    $do->bindParam(':dateReceived', $acquisitionDate);
    $do->bindParam(':formFilePath', $formFilePath);
    $do->execute();
}

function getEmployeeName($employeeNumber){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('SELECT employeeName FROM employees WHERE employeeNumber = :employeeNumber');
    $do->bindParam(':employeeNumber', $employeeNumber);
    $do->execute();
    $getEmployeeName = $do->fetchAll(PDO::FETCH_ASSOC);
    $employeeName = $getEmployeeName[0];
    return $employeeName['employeeName'];
}

function getEmployeeAuthor($repairCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');
    $do = $db->prepare('SELECT author FROM repairSchedules WHERE repairCode = :repairCode');
    $do->bindParam(':repairCode', $repairCode);
    $do->execute();
    $getEmployeeAuthor = $do->fetchAll(PDO::FETCH_ASSOC);
    $employeeAuthor = $getEmployeeAuthor[0];
    $employeeName = getEmployeeName($employeeAuthor['author']);
    return $employeeName;
}
function getArtifactTag($artifactCode){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museoDB', 'root', 'song');

    $retrieve = $db->prepare("select ot.tagCode, t.tagName  from artifactTags ot JOIN tags t on ot.tagCode = t.tagCode
                              WHERE ot.artifactCode = :artifactCode;");
    $retrieve->bindParam(':artifactCode', $artifactCode);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_typeQuerySummary($type,$stD,$enD){
    switch($type){
        case '2':
            return get_repairedSUMMARY($stD,$enD);
            break;
        case '5':
            return get_needRepairSUMMARY($stD,$enD);
            break;
    }
}
function get_repairedSUMMARY($startDate, $endDate){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $retrieve = $db->prepare("select   rs.artifactCode, a.artifactName, count(rs.repairCode) as 'RepCnt'
                                        FROM repairSchedules rs JOIN artifacts a
                                        ON rs.artifactCode = a.artifactCode
                                        WHERE rs.finishedDate IS NOT NULL AND rs.status = 4
                                        AND (DATE(rs.endDate) >= :startDate AND DATE(rs.endDate) <= :endDate)
                                        GROUP BY 1;");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}
function get_needRepairSUMMARY($startDate, $endDate){
    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');

    $a = explode('/',$startDate);
    $b = explode('/',$endDate);

    $startDate = $a[2].'-'.$a[0].'-'.$a[1];
    $endDate = $b[2].'-'.$b[0].'-'.$b[1];

    $retrieve = $db->prepare("select   rs.artifactCode, a.artifactName, count(rs.repairCode) as 'RepCnt'
                                        FROM repairSchedules rs JOIN artifacts a
                                        ON rs.artifactCode = a.artifactCode
                                        WHERE rs.finishedDate IS NULL AND rs.status = 3
                                        AND (DATE(rs.endDate) >= :startDate AND DATE(rs.endDate) <= :endDate)
                                        GROUP BY 1;");
    $retrieve->bindParam(':startDate', $startDate);
    $retrieve->bindParam(':endDate',$endDate);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);

    return $retrieve;
}

function get_companyNm($companyCd){

    $db = new PDO('mysql:host=127.0.0.1;dbname=museodb', 'root', 'song');

    $retrieve = $db->prepare("select companyName from outsourcing where companyCode = :companyCd");
    $retrieve->bindParam(':companyCd', $companyCd);
    $retrieve->execute();
    $retrieve = $retrieve->fetchAll(PDO::FETCH_ASSOC);
    $retrieve = $retrieve[0];

    return $retrieve['companyName'];
}
function get_reasonsDisposal(){

}
?>

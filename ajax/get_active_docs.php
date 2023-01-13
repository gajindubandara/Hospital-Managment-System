<?php
include '../config.php';
include '../repository/DoctorService.php';
$profiles = new DoctorService();
$result=$profiles->getActiveDoctors();
$arr = array();

foreach ($result as $row){
    $objArray = array('name'=>$row[0],'field'=>$row[1],'qual'=>$row[2],'rps'=>$row[3],'ppd'=>$row[4]);
//    $objArray =array();
//    for($i=0;$i<14;$i++){
//        array_push($objArray,$row[$i]);
//    }
    array_push($arr,$objArray);
}
//echo'<scipt>var hello='.'json_encode($arr)'.'</scipt>';
echo json_encode($arr);
//echo $arr;

?>


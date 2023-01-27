<?php
session_start();
include '../config.php';
include '../repository/DoctorService.php';
$conn = getCon();
if(!empty($_POST["option"])) {

    if ($_POST["option"]=="All"){
        //selected all

        $profiles = new DoctorService();
        $result=$profiles->getActiveDoctors();
        $arrAll = array();

        foreach ($result as $row){
            $objArray = array('name'=>$row[0],'field'=>$row[1],'qual'=>$row[2],'rps'=>$row[3],'ppd'=>$row[4],'imgUrl'=>$row[6]);
            array_push($arrAll,$objArray);
        }
        echo json_encode($arrAll);
    }
    else{
        $query = "SELECT `name`,`sField`, `qual`, `rps`, `ppd`, `state`,`imgUrl` FROM `doctor` WHERE`sField` ='" . $_POST["option"] . "' && `state`='active'";
        $result = $conn->query($query);
        $count = $result->rowCount();
        $arr = array();

         if($count>0) {
            foreach ($result as $row) {
                $objArray = array('name'=>$row['name'],'field'=>$row['sField'],'qual'=>$row['qual'],'rps'=>$row['rps'],'ppd'=>$row['ppd'],'imgUrl'=>$row['imgUrl']);
                array_push($arr,$objArray);
            }
             echo json_encode($arr);
        }

    }
}

?>

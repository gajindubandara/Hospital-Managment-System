<?php
interface IAppointment
{
    public function addAppointment(Appointment $ap);

    public function getAppointmentsForDay($nic);

    public function getAppointmentsByNic($nic);

    public function changeAppointmentState($id,$state);

    public function getTodayAppointments($nic);


}

class AppointmentService implements IAppointment
{

    public function addAppointment(Appointment $ap)
    {
        try {
            $conn = getCon();
            $pid=$ap->getPatientId();
            $did=$ap->getDoctorId();
            $date=$ap->getDate();
            $token=$ap->getTokenNo();




            $query = "INSERT INTO `bookings`( `pid`, `did`, `date`, `token`) 
                        VALUES (?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindValue(1, $pid, PDO::PARAM_STR);
            $st->bindValue(2, $did, PDO::PARAM_STR);
            $st->bindValue(3, $date, PDO::PARAM_STR);
            $st->bindValue(4, $token, PDO::PARAM_STR);
            $st->execute();
            return 1;
        }
        catch(SQLiteException $ex){
            return 0;
        }
    }

    public function getAppointmentsForDay($nic)
    {
     try{
         $conn=getCon();
         $changeDate = date("Y-m-d", strtotime($_POST['date']));
         $query = "SELECT `id`, `pid`, `date`, `token`, `did` FROM `bookings` WHERE `pid`=$nic AND `date`='" . $changeDate . "' AND `state`='active'";
         $result = $conn->query($query);
         $count = $result->rowCount();
         return $count;
     }catch(SQLiteException $ex){
         echo $ex;
     }
    }

    public function getAppointmentsByNic($nic)
    {
        try{
            $conn=getCon();
            $query = "SELECT `id`, `pid`, `date`, `token`, `did`,`state` FROM `bookings` WHERE `pid`=$nic AND `state`='active' ORDER BY `date`";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            echo $ex;
        }
    }

    public function changeAppointmentState($id,$state)
    {
        try {
            $conn = getCon();
            $query = "UPDATE `bookings` SET `state`=? WHERE `id` =$id";
            $st = $conn->prepare($query);
            $st->bindValue(1, $state, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }

    public function getTodayAppointments($nic)
    {
        try{
            $date = date("Y-m-d");
            $changeDate = date("Y-m-d", strtotime($date));
            $conn=getCon();
            $query = "SELECT `id`, `pid`, `date`, `token`, `did`,`state` FROM `bookings` WHERE `did`=$nic AND `date`='" . $changeDate . "' ";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            echo $ex;
        }
    }
}

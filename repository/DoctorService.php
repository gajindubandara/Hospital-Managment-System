<?php
session_start();
interface IDoctor
{
    public function addDoctor(Doctor $doctor);

    public function getDoctor($nic);

    public function updateDoctor(Doctor $doctor);

    public function deleteDoctor($doctorId);

    public function getAllDoctors();
    public function getActiveDoctors();

    public function checkLogin($nic,$pw);

    public function updateDocPassword($password,$nic);

    public function changeState($nic,$state);
}

class DoctorService implements IDoctor
{
    public function addDoctor(Doctor $doctor)
    {
        try{
            $conn = getCon();
            $id = $doctor->getId();
            $name = $doctor->getName();
            $nic = $doctor->getNic();
            $email = $doctor->getEmail();
            $password = $doctor->getPassword();
            $telNo = $doctor->getTelNo();
            $gender = $doctor->getGender();
            $specializedField = $doctor->getSpecializedField();
            $qualifications = $doctor->getQualifications();
            $address = $doctor->getAddress();
            $ratePerSession = $doctor->getRatePerSession();
            $noOfPatientsPerDay = $doctor->getNoOfPatientsPerDay();
            $availableDays = $doctor->getAvailableDays();
            $state = $doctor->getState();
            $imgUrl =$doctor->getImageUrl();

            $query = "INSERT INTO `doctor`(`name`, `nic`, `email`, `password`, `no`, `gender`, `sField`, `qual`, `address`, `rps`, `ppd`, `days`, `state`,`imgUrl`)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindValue(1, $name, PDO::PARAM_STR);
            $st->bindValue(2, $nic, PDO::PARAM_STR);
            $st->bindValue(3, $email, PDO::PARAM_STR);
            $st->bindValue(4, $password, PDO::PARAM_STR);
            $st->bindValue(5, $telNo, PDO::PARAM_STR);
            $st->bindValue(6, $gender, PDO::PARAM_STR);
            $st->bindValue(7, $specializedField, PDO::PARAM_STR);
            $st->bindValue(8, $qualifications, PDO::PARAM_STR);
            $st->bindValue(9, $address, PDO::PARAM_STR);
            $st->bindValue(10, $ratePerSession, PDO::PARAM_STR);
            $st->bindValue(11, $noOfPatientsPerDay, PDO::PARAM_STR);
            $st->bindValue(12, $availableDays, PDO::PARAM_STR);
            $st->bindValue(13, $state, PDO::PARAM_STR);
            $st->bindValue(14, $imgUrl, PDO::PARAM_STR);
            $st->execute();
            return 1;
        }catch (SQLiteException $ex){
            return 0;
        }
    }

    public function getDoctor($nic)
    {
        $conn = getCon();
        $query = "SELECT `name`, `nic`, `email`, `password`, `no`, `gender`, `sField`, `qual`, `address`, `rps`, `ppd`, `days`, `state`,`imgUrl` FROM `doctor` WHERE `nic` =$nic ";
        $result = $conn->query($query);
        return $result;
    }

    public function updateDoctor(Doctor $doctor)
    {
        try {
            $conn = getCon();
            $name = $doctor->getName();
            $nic = $doctor->getNic();
            $email = $doctor->getEmail();
            $telNo = $doctor->getTelNo();
            $gender = $doctor->getGender();
            $specializedField = $doctor->getSpecializedField();
            $qualifications = $doctor->getQualifications();
            $address = $doctor->getAddress();
            $ratePerSession = $doctor->getRatePerSession();
            $noOfPatientsPerDay = $doctor->getNoOfPatientsPerDay();
            $availableDays = $doctor->getAvailableDays();
            $img = $doctor->getImageUrl();

            $query = "UPDATE `doctor` SET `name`=?,`nic`=?,`email`=?,`no`=?,`gender`=?,`sField`=?,`qual`=?,`address`=?,`rps`=?,`ppd`=?,
                    `days`=?,`imgUrl`=? WHERE `nic` =$nic";
            $st = $conn->prepare($query);
            $st->bindValue(1, $name, PDO::PARAM_STR);
            $st->bindValue(2, $nic, PDO::PARAM_STR);
            $st->bindValue(3, $email, PDO::PARAM_STR);
            $st->bindValue(4, $telNo, PDO::PARAM_STR);
            $st->bindValue(5, $gender, PDO::PARAM_STR);
            $st->bindValue(6, $specializedField, PDO::PARAM_STR);
            $st->bindValue(7, $qualifications, PDO::PARAM_STR);
            $st->bindValue(8, $address, PDO::PARAM_STR);
            $st->bindValue(9, $ratePerSession, PDO::PARAM_STR);
            $st->bindValue(10, $noOfPatientsPerDay, PDO::PARAM_STR);
            $st->bindValue(11, $availableDays, PDO::PARAM_STR);
            $st->bindValue(12, $img, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }

    public function deleteDoctor($doctorId)
    {
        $conn = getCon();
        $query = "SELECT * FROM `doctor` WHERE `id` =$doctorId ";
        return $conn->query($query);
    }

    public function getAllDoctors()
    {
        $conn = getCon();
        $query = "SELECT * FROM `doctor`";
        return $conn->query($query);

    }

    public function checkLogin($nic,$pw)
    {
        try {
            $conn = getCon();
            $query = "SELECT `nic`,`name` FROM `doctor` WHERE `password`=? and `nic`=?";
            $st = $conn->prepare($query);
            $st->bindValue(1, $pw, PDO::PARAM_STR);
            $st->bindValue(2, $nic, PDO::PARAM_STR);
            $st->execute();
            $result = $st->fetch();
            return $result;
        }
        catch(SQLiteException $ex){
            return 0;
        }

    }

    public function updateDocPassword($password,$nic)
    {
        try {
            $conn = getCon();
            $query = "UPDATE `doctor` SET `password`=? WHERE `nic` =$nic";
            $st = $conn->prepare($query);
            $st->bindValue(1, $password, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }

    public function getActiveDoctors()
    {
        $conn = getCon();
        $query = 'SELECT `name`,`sField`, `qual`, `rps`, `ppd`, `state`,`imgUrl` FROM `doctor` WHERE `state`="active"';
        return $conn->query($query);
    }

    public function changeState($nic,$state)
    {
        try {
            $conn = getCon();
            $query = "UPDATE `doctor` SET `state`=? WHERE `nic` =$nic";
            $st = $conn->prepare($query);
            $st->bindValue(1, $state, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }
}

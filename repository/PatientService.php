<?php
session_start();

interface IPatient
{
    public function addPatient(Patient $patient);

    public function getPatient($nic);

    public function updatePatient(Patient $patient);

//    public function deletePatient($nic);

    public function getAllPatient();

    public function checkLogin($nic,$pw);

    public function updatePatPassword($password,$nic);
}

class PatientService implements IPatient
{

    public function addPatient(Patient $patient)
    {
        try {
            $conn = getCon();
            $name = $patient->getName();
            $nic = $patient->getNic();
            $email = $patient->getEmail();
            $password = $patient->getPassword();
            $no = $patient->getTelNo();
            $address = $patient->getAddress();
            $dob = $patient->getDob();
            $bloodGroup = $patient->getBloodGroup();
            $gender = $patient->getGender();

            $query = "INSERT INTO `patient`(`name`, `nic`, `email`, `password`, `no`, `address`, `dob`, `bg`, `gender`)
                        VALUES (?,?,?,?,?,?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindValue(1, $name, PDO::PARAM_STR);
            $st->bindValue(2, $nic, PDO::PARAM_STR);
            $st->bindValue(3, $email, PDO::PARAM_STR);
            $st->bindValue(4, $password, PDO::PARAM_STR);
            $st->bindValue(5, $no, PDO::PARAM_STR);
            $st->bindValue(6, $address, PDO::PARAM_STR);
            $st->bindValue(7, $dob, PDO::PARAM_STR);
            $st->bindValue(8, $bloodGroup, PDO::PARAM_STR);
            $st->bindValue(9, $gender, PDO::PARAM_STR);
            $st->execute();
            return 1;
        }
        catch(SQLiteException $ex){
            return 0;
        }

    }

    public function getPatient($nic)
    {
        try {
            $conn = getCon();
            $query = "SELECT `name`, `nic`, `email`, `password`, `no`, `address`, `dob`, `bg`, `gender` FROM `patient` WHERE `nic` =$nic";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            return null;
        }

    }

    public function updatePatient(Patient $patient)
    {
        try {
            $conn = getCon();
            $name = $patient->getName();
            $nic = $patient->getNic();
            $email = $patient->getEmail();
            $no = $patient->getTelNo();
            $address = $patient->getAddress();
            $dob = $patient->getDob();
            $bloodGroup = $patient->getBloodGroup();
            $gender = $patient->getGender();

            $query = "UPDATE `patient` SET `name`=?,`nic`=?,`email`=?,`no`=?,`address`=?,`dob`=?,
                     `bg`=?,`gender`=? WHERE `nic` =$nic";
            $st = $conn->prepare($query);
            $st->bindValue(1, $name, PDO::PARAM_STR);
            $st->bindValue(2, $nic, PDO::PARAM_STR);
            $st->bindValue(3, $email, PDO::PARAM_STR);
            $st->bindValue(4, $no, PDO::PARAM_STR);
            $st->bindValue(5, $address, PDO::PARAM_STR);
            $st->bindValue(6, $dob, PDO::PARAM_STR);
            $st->bindValue(7, $bloodGroup, PDO::PARAM_STR);
            $st->bindValue(8, $gender, PDO::PARAM_STR);
            $st->execute();
            return 1;
        }
        catch(SQLiteException $ex){
            return 0;
        }
    }

    public function getAllPatient()
    {
        $conn=getCon();
        $query = "SELECT `name`, `nic`, `email`, `no`, `address` FROM `patient`";
        $result = $conn->query($query);
        return $result;
    }

    public function checkLogin($nic,$pw)
    {
        try {
            $conn = getCon();
            $query = "SELECT `nic`,`name` FROM `patient` WHERE `password`=? and `nic`=?";
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

    public function updatePatPassword($password, $nic)
    {
        try {
            $conn = getCon();
            $query = "UPDATE `patient` SET `password`=? WHERE `nic` =$nic";
            $st = $conn->prepare($query);
            $st->bindValue(1, $password, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }
}

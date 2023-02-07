<?php
interface IStat
{
    public function getNoOfDocs();

    public function  getNoOfUsers();

    public function getNoOfAppointments();

}

class getStats implements IStat
{
    public function getNoOfDocs(): int
    {
        $conn = getCon();
        $query = "SELECT * FROM `doctor`";
        $result = $conn->query($query);
        return $result->rowCount();
    }

    public function getNoOfUsers(): int
    {
        $conn = getCon();
        $query = "SELECT * FROM `patient`";
        $result = $conn->query($query);
        return $result->rowCount();
    }

    public function getNoOfAppointments(): int
    {
        $conn = getCon();
        $query = "SELECT * FROM `bookings`";
        $result = $conn->query($query);
        return $result->rowCount();
    }
}


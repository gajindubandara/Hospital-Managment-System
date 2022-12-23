<?php
class Appointment
{
    private $id;
    private $patientId;
    private $doctorId;
    private $date;
    private $tokenNo;

    public function __construct(){}

    /**
     * Appointment constructor.
     * @param $id
     * @param $patientId
     * @param $doctorId
     * @param $date
     * @param $tokenNo
     */
    public function __construct_1($id, $patientId, $doctorId, $date, $tokenNo)
    {
        $this->id = $id;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->date = $date;
        $this->tokenNo = $tokenNo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * @param mixed $patientId
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;
    }

    /**
     * @return mixed
     */
    public function getDoctorId()
    {
        return $this->doctorId;
    }

    /**
     * @param mixed $doctorId
     */
    public function setDoctorId($doctorId)
    {
        $this->doctorId = $doctorId;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTokenNo()
    {
        return $this->tokenNo;
    }

    /**
     * @param mixed $tokenNo
     */
    public function setTokenNo($tokenNo)
    {
        $this->tokenNo = $tokenNo;
    }
}

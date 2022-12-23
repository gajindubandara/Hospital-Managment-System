<?php
class Diagnosis
{
    private $id;
    private $patientId;
    private $doctorId;
    private $date;
    private $causeOfDisease;
    private $medication;
    private $diagnosisRemarks;

    public function __construct(){}

    /**
     * Diagnosis constructor.
     * @param $id
     * @param $patientId
     * @param $doctorId
     * @param $date
     * @param $causeOfDisease
     * @param $medication
     * @param $diagnosisRemarks
     */
    public function __construct_1($id, $patientId, $doctorId, $date, $causeOfDisease, $medication, $diagnosisRemarks)
    {
        $this->id = $id;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->date = $date;
        $this->causeOfDisease = $causeOfDisease;
        $this->medication = $medication;
        $this->diagnosisRemarks = $diagnosisRemarks;
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
    public function getCauseOfDisease()
    {
        return $this->causeOfDisease;
    }

    /**
     * @param mixed $causeOfDisease
     */
    public function setCauseOfDisease($causeOfDisease)
    {
        $this->causeOfDisease = $causeOfDisease;
    }

    /**
     * @return mixed
     */
    public function getMedication()
    {
        return $this->medication;
    }

    /**
     * @param mixed $medication
     */
    public function setMedication($medication)
    {
        $this->medication = $medication;
    }

    /**
     * @return mixed
     */
    public function getDiagnosisRemarks()
    {
        return $this->diagnosisRemarks;
    }

    /**
     * @param mixed $diagnosisRemarks
     */
    public function setDiagnosisRemarks($diagnosisRemarks)
    {
        $this->diagnosisRemarks = $diagnosisRemarks;
    }
}

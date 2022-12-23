<?php

interface IDiagnosis
{
    public function addDiagnosis(Diagnosis $diag);

    public function getPatientDiagnosis($nic);

}
class DiagnosisService implements IDiagnosis
{


    public function addDiagnosis(Diagnosis $diag)
    {
        try {
            $conn = getCon();
            $pid=$diag->getPatientId();
            $did=$diag->getDoctorId();
            $date=$diag->getDate();
            $diagnosis=$diag->getCauseOfDisease();
            $medications=$diag->getMedication();
            $remarks=$diag->getDiagnosisRemarks();



            $query = "INSERT INTO `diagnosis`( `pid`, `did`, `date`, `diagnosis`, `med`, `remarks`) 
                        VALUES (?,?,?,?,?,?)";
            $st = $conn->prepare($query);
//            $st->bindValue(1, $id, PDO::PARAM_STR);
            $st->bindValue(1, $pid, PDO::PARAM_STR);
            $st->bindValue(2, $did, PDO::PARAM_STR);
            $st->bindValue(3, $date, PDO::PARAM_STR);
            $st->bindValue(4, $diagnosis, PDO::PARAM_STR);
            $st->bindValue(5, $medications, PDO::PARAM_STR);
            $st->bindValue(6, $remarks, PDO::PARAM_STR);
            $st->execute();

            return 1;
        }
        catch(SQLiteException $ex){
            return 0;
        }
    }

    public function getPatientDiagnosis($nic)
    {
        $conn=getCon();
        $query = "SELECT `pid`, `did`, `date`, `diagnosis`, `med`, `remarks` FROM `diagnosis` WHERE `pid`=$nic";
        $result = $conn->query($query);
        return $result;
    }
}

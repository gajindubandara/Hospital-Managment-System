<?php
interface IInquire
{
    public function addInquire(Inquire $i);

    public function getMyInquires($nic);

    public function getAllInquires();

    public function changeState($id,$state);

    public function getById($id);
}

class InquireService implements IInquire
{
    public function addInquire(Inquire $i)
    {
        try {
            $conn = getCon();
            $title=$i->getTitle();
            $dis=$i->getDescription();
            $date=$i->getDate();
            $pid=$i->getPid();
            $state=$i->getState();

            $query = "INSERT INTO `inquire`(`title`, `dis`, `date`, `pid`, `state`)
                        VALUES (?,?,?,?,?)";
            $st = $conn->prepare($query);
            $st->bindValue(1, $title, PDO::PARAM_STR);
            $st->bindValue(2, $dis, PDO::PARAM_STR);
            $st->bindValue(3, $date, PDO::PARAM_STR);
            $st->bindValue(4, $pid, PDO::PARAM_STR);
            $st->bindValue(5, $state, PDO::PARAM_STR);
            $st->execute();
            return 1;
        }
        catch(SQLiteException $ex){
            return 0;
        }
    }

    public function getMyInquires($nic)
    {
        try{
            $conn=getCon();

            $query = "SELECT `id`, `title`, `dis`, `date`, `pid`, `state` FROM `inquire` WHERE `pid`='" . $nic . "'";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            echo $ex;
        }
    }

    public function getAllInquires()
    {
        try{
            $conn=getCon();

            $query = "SELECT `id`, `title`, `dis`, `date`, `pid`, `state` FROM `inquire` ORDER BY `state`";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            echo $ex;
        }
    }

    public function changeState($id,$state)
    {
        try {
            $conn = getCon();
            $query = "UPDATE `inquire` SET `state`=? WHERE `id` =$id";
            $st = $conn->prepare($query);
            $st->bindValue(1, $state, PDO::PARAM_STR);
            $st->execute();
            return 1;
        } catch (SQLiteException $ex) {
            return 0;
        }
    }

    public function getById($id)
    {
        try{
            $conn=getCon();

            $query = "SELECT `id`, `title`, `dis`, `date`, `pid`, `state` FROM `inquire` WHERE `id` =$id";
            $result = $conn->query($query);
            return $result;
        }catch(SQLiteException $ex){
            echo $ex;
        }
    }
}
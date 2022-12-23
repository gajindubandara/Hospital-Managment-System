<?php
class Patient
{
    private $id;
    private $name;
    private $nic;
    private $email;
    private $password;
    private $telNo;
    private $address;
    private $dob;
    private $bloodGroup;
    private $gender;
    private $personalNotes;

    public function __construct(){}

    /**
     * Patient constructor.
     * @param $id
     * @param $name
     * @param $nic
     * @param $email
     * @param $password
     * @param $telNo
     * @param $address
     * @param $bloodGroup
     * @param $gender
     * @param $personalNotes
     */
    public function __construct_1($id, $name, $nic, $email, $password, $telNo, $address, $bloodGroup, $gender, $dob)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nic = $nic;
        $this->email = $email;
        $this->password = $password;
        $this->telNo = $telNo;
        $this->address = $address;
        $this->bloodGroup = $bloodGroup;
        $this->gender = $gender;
        $this->dob = $dob;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTelNo()
    {
        return $this->telNo;
    }

    /**
     * @param mixed $telNo
     */
    public function setTelNo($telNo)
    {
        $this->telNo = $telNo;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getBloodGroup()
    {
        return $this->bloodGroup;
    }

    /**
     * @param mixed $bloodGroup
     */
    public function setBloodGroup($bloodGroup)
    {
        $this->bloodGroup = $bloodGroup;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPersonalNotes()
    {
        return $this->personalNotes;
    }

    /**
     * @param mixed $personalNotes
     */
    public function setPersonalNotes($personalNotes)
    {
        $this->personalNotes = $personalNotes;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob): void
    {
        $this->dob = $dob;
    }


}

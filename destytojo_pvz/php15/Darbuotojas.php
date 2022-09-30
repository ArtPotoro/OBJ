<?php
class Darbuotojas{
    protected $name;
    protected $surname;
    protected $salary;

    /**
     * Darbuotojas constructor.
     * @param $name
     * @param $surname
     * @param $salary
     */
    public function __construct($name, $surname, $salary)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public final function getName()
    {
        return ucwords($this->name. " ".self::getTest()) ;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }

    public  function getIsmokamasAtlyginimas(){
        return $this->salary;
    }

    public static function getTest(){
        return "Labas";
    }


}
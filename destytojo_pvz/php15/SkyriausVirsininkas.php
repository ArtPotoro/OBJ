<?php
class SkyriausVirsininkas extends Darbuotojas {





    public function __construct($name, $surname, $salary, $darbuotojai=0)
    {
        parent::__construct($name, $surname, $salary);
        $this->darbuotojai=$darbuotojai;

    }

    public $darbuotojai=0;

    public static function getTest()
    {
        return Darbuotojas::getTest();
    }

    public function getIsmokamasAtlyginimas()
    {
        return ($this->salary*1.1+$this->darbuotojai*10).self::getTest();
    }


}
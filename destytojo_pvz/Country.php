<?php

class Country{
    public $id;
    public $code;
    public $name;
    public $region;
    public $population;

    /**
     * @var City[]
     */
    private  $cities=null;

    /**
     * Country constructor.
     * @param $code
     * @param $name
     * @param $region
     * @param $population
     */
    public function __construct($code, $name, $region, $population, $id=null)
    {
        $this->code = $code;
        $this->name = $name;
        $this->region = $region;
        $this->population = $population;
        $this->id=$id;
    }

    public function setName($name){
        $this->name=$name;
        return $this;
    }

    public function setPopulation($population){
        $this->population=$population;
        return $this;
    }

    public function save(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO countries (code, name, region, population) VALUES (?, ?, ?, ?)");
            $stm->execute([$this->code, $this->name, $this->region, $this->population ]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE countries SET code=?, name=?, region=?, population=? WHERE id=?");
            $stm->execute([$this->code, $this->name, $this->region, $this->population, $this->id ]);
        }

    }


    public function delete(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM countries WHERE id=?");
        $stm->execute([ $this->id ]);
    }

    public function add(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO countries (code, name, region, population) VALUES (?, ?, ?, ?)");
        $stm->execute([$this->code, $this->name, $this->region, $this->population ]);
        $this->id=$pdo->lastInsertId();
    }


    /**
     * @return City[]
     */
    public function getCities() {
        if ($this->cities==null){
            $this->cities=City::getCities($this->id);
        }

        return $this->cities;
    }


    public static function getCountry($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM countries WHERE id=?");
        $stm->execute([$id]);
        echo "SELECT * FROM countries WHERE id=$id <BR>";
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $country=new Country($c['code'],$c['name'],$c['region'],$c['population'],$id);
        return $country;
    }
    public static function getCountries(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM countries");
        $stm->execute([]);
        $countries=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $countries[]=new Country($c['code'],$c['name'],$c['region'],$c['population'],$c['id']);
        }
        return $countries;
    }

    public static function addCountry($code,$name,$region,$population){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO countries (code, name, region, population) VALUES (?, ?, ?, ?)");
        $stm->execute([$code, $name, $region, $population ]);
        $id=$pdo->lastInsertId();
        return self::getCountry($id);
    }
}
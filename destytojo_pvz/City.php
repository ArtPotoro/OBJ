<?php

class City{
    public $id;
    public $name;
    public $district;
    public $population;
    public $country_id;

    private $country;

    /**
     * City constructor.
     * @param $name
     * @param $district
     * @param $population
     * @param $country_id
     */
    public function __construct($name, $district, $population, $country_id, $id=null)
    {
        $this->name = $name;
        $this->district = $district;
        $this->population = $population;
        $this->country_id = $country_id;
        $this->id=$id;
    }

    public function getCountry(){
        if ($this->country==null){
            $this->country= Country::getCountry($this->country_id);
        }

        return  $this->country;
    }

    /**
     * @param null $id
     * @return City
     */
    public static function getCity($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM cities WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $city=new City($c['name'],$c['district'],$c['population'],$c['country_id'],$c['id']);
        return $city;

    }

    /**
     * @param null $country_id
     * @return City[]
     */
    public static function getCities($country_id=null){
        $pdo=DB::getPDO();
        if ($country_id!==null){
            $stm=$pdo->prepare("SELECT * FROM cities WHERE country_id=?");
            echo "SELECT * FROM cities WHERE country_id=$country_id <br>";
            $stm->execute([$country_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM cities ");
            $stm->execute([]);
        }
        $cities=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $cities[]=new City($c['name'],$c['district'],$c['population'],$c['country_id'],$c['id']);
        }
        return $cities;
    }
}
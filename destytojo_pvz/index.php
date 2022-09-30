<?php
include_once "DB.php";
include_once "Country.php";
include_once "City.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$contries=Country::getCountries();

if ($_GET['delete_id']){
    $contry=Country::getCountry($_GET['delete_id']);
    $contry->delete();
}

$blade=new BladeOne();
echo $blade->run("countries", ["title"=>"Naujas", "countries"=>$contries]);

/*
$c=Country::getCountry(20);
echo "Salis: $c->name, populiacija $c->population ";
$c->population=5;
$c->save();

$lie=Country::getCountry(28);
$lie->name="LIETUVA";
$lie->save();
*/
/*
$countries=Country::getCountries();
foreach ($countries as $country){
    if ($country->population>1000000){
        $country->name='Didele: '.$country->name;
        $country->save();
    }

    echo "$country->name <br>";
}*/

//$country=Country::getCountry(273);
//$country->delete();

//$newLand=Country::addCountry("NO8", "New Land 8", "East europe", 15000);
//echo $newLand->name;

//$oldLand=new Country("OL2","Old land 2", "East europe", 1000);
//$oldLand=Country::getCountry(280);

//$oldLand->setName("Old land 2022")->setPopulation(10)->save();

//$lt=Country::getCountry(128);

/*
$country=Country::getCountry(128);
echo sizeof($country->getCities());

$maxima=Company::getCompany();
$maxima->getCustomers()->conc

    $customer->getCompany();
    $customer->getConversations();

    $coversation->getCustomer()->getCompany()
foreach ($country->getCities() as $city){

}
*/
/*

foreach ($country->getCities() as $city){
    $city->population=100;
    $city->save();
}

$city=City::getCity(2447);

echo $city->getCountry()->population;
echo $city->getCountry()->name;
//echo "Miestas $city->name yra ".$city->getCountry()->name." šalyje";

print_r($city->getCountry()->getCities());

 $city=City::getCity(2447);

 $cities=City::getCities();
 foreach ($cities as $city){

 }


?>


<table border="1">
    <?php foreach (Country::getCountries() as $country){ ?>
    <tr>
        <td><?=$country->name?></td>
        <td><?=$country->region?></td>
        <td><?=$country->code?></td>
        <td><?=$country->population?></td>
        <td>
            <?php foreach($country->getCities() as $city) {
                echo $city->name." ";
            } ?>
        </td>
    </tr>
    <?php } ?>
</table>
*/

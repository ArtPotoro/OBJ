<?php
  include_once("Darbuotojas.php") ;
  include_once("SkyriausVirsininkas.php") ;
  include_once("Sargas.php") ;
  include_once("BandeliuSkyriausVirsininkas.php");





  function atspausdinkDarbuotoja(Darbuotojas $darbuotojas){
      echo $darbuotojas->getName()." uždriba: ".$darbuotojas->getIsmokamasAtlyginimas()." <br>";
  }


  $jonas=new Darbuotojas("jonas", "Jonaitis", 1500, 5);
   atspausdinkDarbuotoja($jonas);



  $petras=new SkyriausVirsininkas("petras", "Petraitis", 1500, 10);

  atspausdinkDarbuotoja($petras);



  $antanas=new BandeliuSkyriausVirsininkas("antanas", "Antanaitis", 1500, 5);
  $antanas->darbuotojai=5;
  echo $antanas->getName()." uždriba: ".$antanas->getIsmokamasAtlyginimas()." <br>";

  $gediminas=new Sargas("Gediminas", "Gricius", 1500);
  echo $gediminas->getName()." uždriba: ".$gediminas->getIsmokamasAtlyginimas()." <br>";
  atspausdinkDarbuotoja($gediminas);

  Darbuotojas::getTest();
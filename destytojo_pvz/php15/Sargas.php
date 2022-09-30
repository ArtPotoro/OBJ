<?php
 class Sargas extends  Darbuotojas{


     public function getIsmokamasAtlyginimas()
     {
         return $this->getSalary()*0.9;
     }
 }
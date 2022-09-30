<?php




final class BandeliuSkyriausVirsininkas extends SkyriausVirsininkas{



    public function getIsmokamasAtlyginimas()
    {

        return parent::getIsmokamasAtlyginimas()*1.1;
    }
}
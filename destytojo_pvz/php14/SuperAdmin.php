<?php
/**
 * Created by PhpStorm.
 * User: ggric
 * Date: 27/09/2022
 * Time: 09:28
 */
class SuperAdmin extends Admin {
    public function getNavigation(){
        return [
            ['link'=>'cities.php', 'name'=>'Miestai'],
            ['link'=>'new_city.php', 'name'=>'Pridėti miestą'],
            ['link'=>'countries.php', 'name'=>'Šalys'],
            ['link'=>'new_country.php', 'name'=>'Pridėti šalį'],
        ];

    }
    public function canEdit()
    {
        return true;
    }
}
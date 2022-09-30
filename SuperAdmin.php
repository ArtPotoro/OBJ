<?php

class SuperAdmin extends Admin {
    public function getNavigation(){
        return [
            ['link'=>'company.php', 'name'=>'Companies'],
            ['link'=>'customer.php', 'name'=>'Customers'],
            ['link'=>'conversation.php', 'name'=>'Conversations']
        ];
    }
    public function canEdit()
    {
        return true;
    }
}
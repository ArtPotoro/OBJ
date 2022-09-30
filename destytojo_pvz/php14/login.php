<?php
session_start();
include_once "DB.php";
include_once "Country.php";
include_once "City.php";
include_once "BladeOneM.php";
include_once "Admin.php";
include_once "SuperAdmin.php";
use eftec\bladeone\BladeOne;

if (isset($_GET['action']) && $_GET['action']=='logout'){
    Admin::logout();
}

if (isset($_POST['action'])){

    $user=Admin::login($_POST['username'], $_POST['password']);
    if ($user){
        header('location: index.php');
        die();
    }

}

$blade=new BladeOne();
echo $blade->run("login", []);
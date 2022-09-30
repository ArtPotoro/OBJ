<?php
session_start();
include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
include_once "Admin.php";
include_once "SuperAdmin.php";
use eftec\bladeone\BladeOne;

if (isset($_GET['action']) && $_GET['action']=='logout'){
    Admin::logout();
}

if (isset($_POST['action'])){

    $user=Admin::login($_POST['username'], $_POST['password']);
    print_r($user);
    if ($user){
        header('location: index.php');
        die();
    }
}
$blade=new BladeOne();

echo $blade->run("login", []);
<?php
include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

//$blade=new BladeOne();
//$blade->run("companies", ["title"=>"customers"]);

$companys=Company::getCompanys();
if (isset($_GET['delete_id'])){
    $company=Company::getCompany($_GET['delete_id']);
    $company->delete();
}
$blade=new BladeOne();
echo $blade->run("companys", ["title"=>"Naujas", "companys"=>$companys]);



$customers=Customer::getCustomers();
if (isset($_GET['delete_id'])){
    $customer=Customer::getCustomer($_GET['delete_id']);
    $customer->delete();
}
$blade=new BladeOne();
echo $blade->run("customers", ["title"=>"Naujas", "customers"=>$customers]);



$conversations=Conversation::getConversations();
if (isset($_GET['delete_id'])){
    $conversation=Conversation::getCompany($_GET['delete_id']);
    $conversation->delete();
}
$blade=new BladeOne();
echo $blade->run("conversations", ["title"=>"Naujas", "conversations"=>$conversations]);

//
//$company=Company::insertCompany('Vardas', 'adresas', 'varkodas', 'companijosVardas', 'telefonas', 'epastas');
//$c=Company::getCompanys();
//$cu=Customer::getCustomers();
//$con=Conversation::getConversations();
//$c->name='PACADS';
//$c->save();
//$c->delete();

//$c=Company::getCompany(1);
//
//print_r($c);
//$c->name='VILIUS';
//$c->atnaujinti();
//$customer=Customer::insertCustomer('KlienatoVardas', 'K.Pavarde', '+900000000', 'pastas@pastauskas.com', 'adresas 3-30', 'Vedejas', '2');
//$contact_information=Conversation::insertConversation('1', '1999-09-09', 'Bla bla bla....]');

?>




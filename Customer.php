<?php

class Customer
{
    public $id;
    public $name;
    public $surname;
    public $phone;
    public $email;
    public $address;
    public $positions;
    public $company_id;

    private $company;
    private $conversation;

    /**
     * @param $id
     * @param $name
     * @param $surname
     * @param $phone
     * @param $email
     * @param $address
     * @param $positions
     * @param $company_id
     */
    public function __construct($name, $surname, $phone, $email, $address, $positions, $company_id, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->positions = $positions;
        $this->company_id = $company_id;
    }

    public function getCompany($company_id){
        if ($this->company=$company_id){
            $this->company= Company::getCompany($this->company_id);
        }
        return  $this->company;
    }

    public function getCon($id=null){

        if ($this->conversation=$id) {

            $this->conversation = Conversation::getConversation($this->conversation);
        }

        if ($this->coversation=null){
            $this->conversation->conversation="no data";
        }

//        else {$this->conversation="no data";}
////        {
////            $customer=Conversation::getCon($_GET['conversation']);
////            $customer->conversation= "No data found";
////        }
    return $this->conversation;}

//    public static function getCon($id){
//        $pdo=DB::getPDO();
//        $stm=$pdo->prepare("SELECT conversation FROM contact_information left join customers on customers.id=contact_information.customer_id WHERE customers.id=contact_information.customer_id=?");
//        $stm->execute([$id]);
//        $c=$stm->fetch(PDO::FETCH_ASSOC);
//        $conversation=new Conversation($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
//        return $conversation;
//
//    }

    /**
     * @param null $id
     * @return Customer
     */
    public static function getCustomer($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM costomers WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $customer=new Customer($c['id'],$c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['positions'],$c['company_id']);
        return $customer;

    }


    /**
     * @param null $company_id
     * @return Customer[]
     */
    public static function getCustomers($company_id=null){
        $pdo=DB::getPDO();
        if ($company_id!==null){
            $stm=$pdo->prepare("SELECT * FROM customers WHERE company_id=?");
            echo "SELECT * FROM customers WHERE company_id=$company_id <br>";
            $stm->execute([$company_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM customers ");
            $stm->execute([]);
        }
        $customers=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $customers[]=new Customer($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['positions'],$c['company_id'],$c['id']);
        }
        return $customers;
    }

    public static function insertCustomer($name, $surname, $phone, $email, $address, $positions, $company_id) {
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO customers (name, surname, phone, email, address, positions, company_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stm->execute([$name, $surname, $phone, $email, $address, $positions, $company_id]);
        //  header("location:index.php");
        //  die();
    }

    public function saveCustomer(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("UPDATE customers SET name=?, surname=?, phone=?, email=?, address=?, positions=?, company_id=? WHERE id=?");
        $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->positions, $this->company_id, $this->id]);
    }

    public function deleteCustomer(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM customers WHERE id=?");
        $stm->execute([$this->id]);
    }

}
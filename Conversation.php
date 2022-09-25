<?php

class Conversation
{
    public $id;
    public $customer_id;
    public $date;
    public $conversation;

    /**
     * @param $id
     * @param $customer_id
     * @param $date
     * @param $conversation
     */
    public function __construct($customer_id, $date, $conversation, $id=null)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
    }
    public function getCustomer(){
        if ($this->customer==null){
            $this->customer= Customer::getCustomer($this->customer_id);
        }

        return  $this->customer;
    }

    /**
     * @param null $id
     * @return Conversation
     */
    public static function getConversation($id=null)
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("SELECT * FROM contact_information WHERE id=?");
        $stm->execute([$id]);
        $c = $stm->fetch(PDO::FETCH_ASSOC);
        $conversation = new Conversation($c['customer_id'], $c['date'], $c['conversation'],$c['id']);
        return $conversation;
    }

    /**
     * @param null $customer_id
     * @return Coversation[]
     */
    public static function getConversations($customer_id=null){
        $pdo=DB::getPDO();
        if ($customer_id!==null){
            $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
            echo "SELECT * FROM contact_information WHERE customer_id=$customer_id <br>";
            $stm->execute([$customer_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM contact_information ");
            $stm->execute([]);
        }
        $contact_information=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $contact_information[]=new Conversation($c['id'],$c['customer_id'],$c['date'],$c['conversation']);
        }
        return $contact_information;
    }

    public static function insertConversation($customer_id, $date, $conversation) {
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO contact_information (customer_id, date, conversation) VALUES (?, ?, ?)");
        $stm->execute([$customer_id, $date, $conversation]);
        //  header("location:index.php");
        //  die();
    }

    public function saveConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, coversation=? WHERE id=?");
        $stm->execute([$this->customer_id, $this->date, $this->conversation, $this->id]);
    }

    public function deleteConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM contact_information WHERE id=?");
        $stm->execute([$this->id]);
    }

}

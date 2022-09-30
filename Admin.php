<?php

class Admin
{
    protected $username;
    protected $password;
    protected $id;

    /**
     * @param $username
     * @param $password
     * @param $id
     */
    public function __construct($username, $password, $id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }


    public function getNavigation(){
        return [
            ['link'=>'company.php', 'name'=>'Companies'],
            ['link'=>'customer.php', 'name'=>'Customers'],
            ['link'=>'conversation.php', 'name'=>'Conversations']
        ];
    }
    public function __toString()
    {
        return "$this->id. $this->username";
    }
    public function canEdit(){
        return false;
    }
    private static function makeUser($u){
        if ($u['type']=='admin'){
            $user=new Admin($u['username'],$u['password'],$u['id']);
        }
        if ($u['type']=='superAdmin'){
            $user=new SuperAdmin($u['username'],$u['password'],$u['id']);
        }
        return $user;
    }
    public static function getUser($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $u=$stm->fetch(PDO::FETCH_ASSOC);
        return self::makeUser($u);
    }
    public static function login($username, $password){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE username=?");
        $stm->execute([$username]);
        $u=$stm->fetch(PDO::FETCH_ASSOC);
        if (!$u){
            return null;
        }

        if ($u['password']==$password){
            $_SESSION['uid']=$u['id'];
           return self::makeUser($u);
        }
        return null;
    }
    public static function logout(){
        session_destroy();
        unset($_SESSION);
    }

    public static function auth(){
        if (!isset($_SESSION['uid'])){
            header('location: login.php');
            die();
        }
        $uid=$_SESSION['uid'];
        $user=Admin::getUser($uid);
        return $user;
    }
}
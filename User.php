<?php
class User{

    private $username;
   
    private $profilePic;

    private $sqlData;
    private $con;

    //constructor

    public function __construct($con, $username){
        $this->con = $con;
        $this->username = $username;


        $query = $con->prepare("SELECT * FROM users WHERE  username=:username");
        $query->bindValue(":username", $this->username );
        $query->execute();


        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);

    }


    public function getUsername()
    {
    
        return $this->sqlData["username"];
    }

   

    public function getProfilePicture(){
        return $this->sqlData["profile_pic"];
    }



}

?>
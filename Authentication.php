<?php

class Authentication{
   
   private $con;
   private $errorArray = array();
  


   public function __construct($con){
       $this->con = $con;
   }


    public function registerUser($username, $pw, $profilePic){

        $status = false;

        $query = $this->con->prepare("SELECT * FROM users WHERE  username = :username");
        $query->bindValue(":username", $username);

        $query->execute();

        if($query->rowCount() != 0){
            array_push($this->errorArray, 'Username taken');
            
        }else{
            $pw = hash("sha512",$pw);
            $query = $this->con->prepare("INSERT INTO users (username,password,profile_pic)
                                       VALUES (:username, :pw, :profilePic)");
               $query->bindValue(":username", $username);  
               $query->bindValue(":pw", $pw);  
               $query->bindValue(":profilePic", $profilePic); 

               $status = $query->execute();

        }
        

           return $status;
       
    }


    public function LoginUser($username, $pw){

        $status = false;

        $pw = hash("sha512",$pw);

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:username AND password=:pw");

              $query->bindValue(":username", $username);  
              $query->bindValue(":pw", $pw);  

              $query->execute();

              if($query->rowCount() == 1 ){
                  $status =  true;
              }
              else{
                array_push($this->errorArray, "Login Failed");  
                $status = false;
              }

           

            return $status;
            
       
    }

    public function getError($error){
        if(in_array($error, $this->errorArray )){
            return "<span class='errors'>$error</span>";
        }

    }


}

?>
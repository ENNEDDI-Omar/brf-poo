<?php
require __DIR__ . '/../config/connexion.php';

class User 
{

   protected $name;
   protected $email;
   protected $passw;
   protected $profil;
   protected $role;
   private $Conx;

   public function __construct($name, $email, $passw, $profil, $role)
   {
     $this->Conx=DbConx::connexion();
     $this->name=$name;
     $this->email=$email;
     $this->passw=$passw;
     $this->profil=$profil;
     $this->role=$role;

    }
   
    public function Create()
{
    $password = password_hash($this->passw, PASSWORD_DEFAULT);
    
    $requete = "INSERT INTO `users`(`Name`, `Email`, `Password`, `Profil`, `Roles`) 
                VALUES (?, ?, ?, ?, ?)";
              $query = mysqli_prepare($this->Conx, $requete);
     if ($query) 
     {
        mysqli_stmt_bind_param($query,'sssss', $this->name, $this->email, $password, $this->profil, $this->role);
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
     }else {
        echo'Create User error';
     }

}
    
    public function getUserbyEmail()
    {

      $requete="SELECT * FROM users WHERE Email=?";
      $query=mysqli_prepare($this->Conx, $requete);

      mysqli_stmt_bind_param($query,'s', $this->email);
      mysqli_stmt_execute($query);
      $result=mysqli_stmt_get_result($query);
      

      if ($row=mysqli_fetch_assoc($result)) {
         
        mysqli_stmt_close($query);
        return $row;

      }else {
        echo'error';
      }
      
    
      }


    

}
 



?>
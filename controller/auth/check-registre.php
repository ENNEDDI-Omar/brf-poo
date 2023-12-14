<?php
// require __DIR__ .'/../../config/connexion.php';
require __DIR__ .'/../../model/user.php';

 session_start();




   if(isset($_POST['submit'])) {
    
   
    $username=$_POST['Name'];
    $email=$_POST['Email'];
    $pwd=$_POST['Password'];
    $c_pwd=$_POST['c_Pwd'];
    $profil=$_FILES['Profil']['name'];
    $temp_name=$_FILES['Profil']['tmp_name'];
    $folder="assets/images/".$profil;
    $role=$_POST['Roles'];

    if (empty($username) || empty($email) || empty($pwd) || empty($c_pwd) || empty($folder)) {
        echo'all Fields are required';
    }else{
        $user = new User($username, $email, $pwd, $c_pwd, $folder);
        $emailrep = $User->getUserbyEmail();
        if ($emailrep) 
        {
            echo'email already exist';
        }else {
            $user->Create();
            header('location:../../index.php');
        }
    }
        
    
    
     

}
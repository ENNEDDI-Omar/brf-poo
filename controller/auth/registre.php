<?php
// require __DIR__ .'/../../config/connexion.php';
require __DIR__ .'/../../model/user.php';


   if(isset($_POST['submit-up'])) {
    
   
    $username=$_POST['Name'];
    $email=$_POST['Email'];
    $pwd=$_POST['Password'];
    $c_pwd=$_POST['c_Pwd'];
    $profil=$_FILES['Profil']['name'];
    $temp_name=$_FILES['Profil']['tmp_name'];
    $folder="../../assets/images/".$profil;
    $role="student";

    if (empty($username) || empty($email) || empty($pwd) || empty($c_pwd)) {
        echo'all Fields are required';
    }else{
        $user = new User($username, $email, $pwd, $folder, $role);
        $emailrep = $user->getUserbyEmail();
        if ($emailrep) 
        {
            echo'email already exist';
        }else {
            move_uploaded_file($temp_name, $folder);
            $user->Create();
            header('location:../../vue/auth/login.php');
            exit();
            
        }
    }
        
    
    
     

}
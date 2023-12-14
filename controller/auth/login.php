<?php




require '../../model/user.php';
session_start();

if (isset($_POST['Email']) && isset($_POST['Password'])) {

    $email = $_POST['Email'];
    $passw = $_POST['Password'];

    if (empty($email) || empty($passw)) {
        echo 'fill in the fields';
    } else {
        $user = new User(null, $email, $passw, null, "Student"); 
        $logResult = $user->getUserbyEmail();

        if (password_verify($passw, $logResult['Password'])) {
            $_SESSION['Roles'] = $logResult['Roles']; 
            if ($logResult['Roles'] == 'Admin') {
                header("location: ../../vue/admin/index.php");
            } elseif ($logResult['Roles'] == 'Teacher') {
                header("location: ../../vue/teacher/index.php");
            } elseif ($logResult['Roles'] == 'Student') {
                header("location: ../../vue/student/index.php");
            }
        } else {
            echo 'Invalid Information';
        }
    }
}
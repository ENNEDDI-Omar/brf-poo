<?php




require __DIR__ . '/../../model/user.php';
session_start();

if (isset($_POST['Email']) && isset($_POST['Password'])) {

    $email = $_POST['Email'];
    $passw = $_POST['Password'];

    if (empty($email) || empty($passw)) {
        echo 'fill in the fields';
    } else {
        $user = new User(null, $email, $passw, null, null); 
        $logResult = $user->getUserbyEmail();

        if ($logResult && password_verify($passw, $logResult['Password'])) {
            $_SESSION['Roles'] = $logResult['Roles']; 
            var_dump($logResult['Roles']);
            if ($logResult['Roles'] == 'admin') {
                header("location: ../../vue/admin/index.php");
            } elseif ($logResult['Roles'] == 'teacher') {
                header("location: ../../vue/teacher/index.php");
            } elseif ($logResult['Roles'] == 'student') {
                header("location: ../../vue/student/index.php");
            }
        } else {
            echo 'Invalid Information';
        }
    }
}
<?php
    session_unset();
    session_destroy();
include 'connection.php';
$email=$_POST['email'];
$password=$_POST['password'];

if($email=='admin@admin.com' && $password=='admin')
{
    session_start();

    $_SESSION['email']=$email;
    $adminPannel='adminPannel/studentRequests.php';
    header("location: $adminPannel");
    exit();
}

$query="SELECT * FROM admission WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
    session_start();

    $_SESSION['email']=$email;
    $student_login='studentpannel/studentDashboard.php';
    header("location: $student_login");
    exit();

}
else{
    header('location: warning.html');
    exit();
}

?>
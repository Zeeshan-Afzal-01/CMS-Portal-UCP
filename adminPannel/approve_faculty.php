<?php
include '../connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $table_name = "approved_faculty";
    $table_query = "CREATE TABLE IF NOT EXISTS $table_name( email VARCHAR(255) )";
    $table_created = mysqli_query($conn_faculty, $table_query);
    
    $query = "INSERT INTO $table_name(email) VALUES ('$email')";
    $result = mysqli_query($conn_faculty, $query);

    if ($result) {
        header('location: faculityRequests.php');
        exit();
    } else {
        echo "Approval failed!";
    }
} else {
    echo "Email parameter not provided!";
}
?>
<?php
include '../connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $table_name = "approved";
    $table_query = "CREATE TABLE IF NOT EXISTS $table_name( email VARCHAR(255) )";
    $table_created = mysqli_query($conn, $table_query);
    
    $query = "INSERT INTO approved(email) VALUES ('$email')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: studentRequests.php');
        exit();
    } else {
        echo "Approval failed!";
    }
} else {
    echo "Email parameter not provided!";
}
?>
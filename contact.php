<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$creatingtable = 'CREATE TABLE IF NOT EXISTS contact (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20),
    Email VARCHAR(20),
    Subject VARCHAR(100),
    Explanation VARCHAR(1000)
)'; 

if (mysqli_query($conn, $creatingtable)) {
    $query = "INSERT INTO contact(Name, Email, Subject, Explanation)
              VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.html');
        exit();
    } else {
        header('Location: warning.html');
        exit();
    }
} else {
    
    echo "Error creating table: " . mysqli_error($conn);
}
?>

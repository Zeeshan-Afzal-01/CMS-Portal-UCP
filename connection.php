<?php


$server="localhost";
$username="root";
$password="";

$conn=mysqli_connect($server,$username,$password);
$database_query = "CREATE DATABASE IF NOT EXISTS students";
$database_query_faculty = "CREATE DATABASE IF NOT EXISTS faculty";
if (mysqli_query($conn, $database_query)) 
{
    $conn = mysqli_connect($server, $username, $password, "students");
}
else 
{
    echo "Error creating database: " . mysqli_error($conn);
}

if (mysqli_query($conn, $database_query_faculty)) 
{
    $conn_faculty = mysqli_connect($server, $username, $password, "faculty");
}
else 
{
    echo "Error creating database: " . mysqli_error($conn);
}

if(!$conn)
{
    die("Connection Failed in admission_table: ". mysqli_connect_error());
}


?>
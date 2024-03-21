<?php
include '../connection.php';
if($conn)
{
    echo "Connection Established<br>";
}
else{
    die('not connected');
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];

    $photo = $_FILES['photo'];
    $result = $_FILES['result'];
    

        $photoName = $photo['name'];
        $photoTempLocation = $photo['tmp_name'];

        $result_name = $result['name'];
        $result_temp_location = $result['tmp_name'];

        $extension=array('jpg','png','jpeg','png','pdf');


        $photoExtension=explode(".",$photoName);
        $result_image_extension=explode(".",$result_name);


        $photoE=end($photoExtension);


       if(in_array($photoE, $extension)) {

            
        $photoDestination = '../uploads/' . $photoName;
        $result_destination = '../uploads/' . $result_name;


            move_uploaded_file($photoTempLocation, $photoDestination);
            move_uploaded_file($result_temp_location, $result_destination);

            $table_name = "admission";
            $table_query = "CREATE TABLE IF NOT EXISTS $table_name (
                studentID int NOT NULL AUTO_INCREMENT,
                name text NOT NULL,
                cnic varchar(20) NOT NULL,
                photo varchar(60) NOT NULL,
                result_card varchar(60) NOT NULL,
                email varchar(30) NOT NULL,
                gender varchar(11) NOT NULL,
                department varchar(20) NOT NULL,
                password varchar(30) NOT NULL,
                PRIMARY KEY (studentID)
            )";
            $table_created = mysqli_query($conn, $table_query);
            $query = "INSERT INTO admission (name, cnic, photo, result_card, email, gender, department, password) 
            VALUES ('$name', '$cnic','$photoDestination', '$result_destination', '$email', '$gender', '$department', '$password')";
                    if (mysqli_query($conn,$query)) {
                        $signin='../signin.html';
                        $warning='../warning.html';
                        header("location: $signin");
                        exit();
                    } else {
                        header("location: $warning");
                        exit();
                    }
        }
       

        
   
}

mysqli_close($conn);
?>

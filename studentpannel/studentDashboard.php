<?php
include '../connection.php';
include 'timetable.php';
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if ($email == '') {
        $location='../signin.html';
        header("location: $location");
        exit();
    }

    $query = "SELECT * FROM admission WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $photo = $row['photo'];
        $_SESSION['student-photo'] = $photo;
        $photo = '../'.$photo;
        $department = $row['department'];
    }
} else {
    echo "Session not set. Please log in.";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Register Form</title>


    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
   <link rel="stylesheet" href="studentDashboard.css">
   <link rel="stylesheet" href="../assets/css/hero.css">
   <link rel="stylesheet" href="../components/CoursesNav.css">
   
    
</head>

<body>





    

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav  class="main-nav ">
                    <a href="#" id="student-p" style="display:  flex; align-items: center;" class="logo">
                        <img style="width: 70px;" src="../assets/images/img-01.png" alt="Ucp Logo" >
                          <h1 id="student-portal">Student Portal</h1>
                      </a>
                        <a href="#" id="label" class="logo img-name">
                            <?php
                            $table_name = "approved";
                            $table_query = "SHOW TABLES LIKE '$table_name'";
                            $check_table = mysqli_query($conn, $table_query);
                            $flag = true;
                            if (mysqli_num_rows($check_table) > 0) {
                                $Query = "SELECT * FROM approved WHERE email='$email'";
                                $approved_result = mysqli_query($conn, $Query);
                                $flag = false;
                                if (mysqli_num_rows($approved_result) == 0) {
                                    echo $name;
                                    echo '<img class="student-image-register" src="' . $photo . '" alt="User Photo">';
                                } else {
                                    echo '<style>';
                                    echo '#label {padding-right: 200px}';
                                    echo '</style>';
                                }
                            }
                            if ($flag) {
                                echo $name;
                                echo '<img class="student-image-not-register"  src="' . $photo . '" alt="User Photo">';
                            }



                            ?>
                        </a>

                    </nav>
                </div>
            </div>
        </div>
    </header>


    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="row">


                        <?php
                        $approve_table = "approved";
                        $reject_table = "declined";
                        $approve_query = "SHOW TABLES LIKE '$approve_table'";
                        $reject_query = "SHOW TABLES LIKE '$reject_table'";
                        $check_approve = mysqli_query($conn, $approve_query);
                        $check_reject = mysqli_query($conn, $reject_query);

                        $found_approved = false;
                        $found_declined = false;
                        if (mysqli_num_rows($check_approve) > 0) {
                            $Query = "SELECT * FROM approved WHERE email='$email'";
                            $approved_result = mysqli_query($conn, $Query);

                            if (mysqli_num_rows($approved_result) > 0) {

                                $found_approved = true;
                                echo ' <div class="col-lg-12" >';
                                echo '<div id="contact">';


                                echo '<div class="studentPortal">';
                                echo '<div class="img-text">';
                                echo '<img class="image-approved" src="' . $photo . '" alt="User Photo">';
                                echo '<div class="d-text">';
                                echo '<p class="studentName">' . $name . '</p>';
                                if ($department == 'se') {
                                    $dep = 'Software Engineering';
                                } else if ($department == 'cs') {
                                    $dep = 'Computer Science';
                                } else if ($department == 'it') {
                                    $dep = 'Information Technology';
                                }
                                echo '<p class="department">' . $dep . '</p>';
                                echo '</div>';
                                echo  '</div>';
                                echo '<div class="timetable">';
                                $today = strtolower(date('l'));
                                echo  "<p class='timetable'>Today Classes:</p>";

                                if (isset($se_timetable[$today])) {
                                    foreach ($se_timetable[$today] as $class) {
                                        echo "<p class='timetable'>{$class['subject']} : {$class['start_time']} - {$class['end_time']}</p>";
                                    }
                                } else {
                                    echo "No classes today.\n";
                                }
                            }
                        }
                        if (mysqli_num_rows($check_reject) > 0) {
                            $query_1 = "SELECT * FROM declined WHERE email='$email'";
                            $declined_request = mysqli_query($conn, $query_1);
                            if (mysqli_num_rows($declined_request) > 0) {
                                $found_declined = true;
                                echo ' <div class="col-lg-12 text-center" style="height:50vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">';
                                echo '<div id="contact">';
                                echo '<div style="text-align: center;">';
                                echo '<img src="../assets/images/unchecked.png" alt="clock image icon" style="margin-bottom: 10px; width:50px">';
                                echo '<p>Sorry! Your Request is declined by Administrator. Better luck next time.</p>';
                                echo '</div>';
                            }
                        }

                        if ((mysqli_num_rows($check_reject) < 1 && mysqli_num_rows($check_approve) < 1) ||
                            ($found_approved == false && $found_declined == false)
                        ) {
                            echo ' <div class="col-lg-12 text-center" style="height:50vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">';
                            echo '<div id="contact">';
                            echo '<div style="text-align: center;">';
                            echo '<img src="../assets/images/wait.png" alt="clock image icon" style="margin-bottom: 10px; width:50px">';
                            echo '<p>Your Request is in Process. Wait for 3-4 Working Days.</p>';
                            echo '</div>';
                        }
                        ?>

                    </div>

                </div>

                <div class="subjects-row-1">
                    <h3 class="H3">Today Classes Course Material: </h3>
                    <div class="-row-1">
                        <?php
                        if (mysqli_num_rows($approved_result) > 0) {
                            if (isset($se_timetable[$today])) {
                                $uniqueSubjects = array();

                                foreach ($se_timetable[$today] as $class) {
                                    if (!in_array($class['subject'], $uniqueSubjects)) {
                                        $uniqueSubjects[] = $class['subject'];

                                        // Extracting the first letter of each word in the subject and converting to lowercase
                                        $className = $class['subject'];
                                        $className = str_replace(' ', '', $className); // Remove spaces
                                        $fileName = $className . ".php";

                                        $folderPath = "../Departments/$department/$className"; // Assuming the folder is in the same directory
                                        // Full file path
                                        $fullFilePath = "$folderPath" . "/outline.php";
                                        // Generate the link to the new file
                                        $fileLink = '<a href="' . $fullFilePath . '">';

                                        echo '<div class="card text-white bg-success  mb-3" style="max-width: 18rem; margin-left:14px">';
                                        echo $fileLink;
                                        echo '<div class="card-body todayclassStudent">';
                                        echo '<h5 class="card-title">' . $class['subject'] . '</h5>';
                                        echo " {$class['start_time']} - {$class['end_time']}<br>";
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</a>';

                                        // Create the specified files if they don't exist
                                        $filesToCreate = array("outline.php", "news.php", "material.php", "assessments.php", "submission.php", "grade.php", "attendance.php");
                                        foreach ($filesToCreate as $file) {
                                            $fileToCreate = "$folderPath/$file";
                                            if (!file_exists($fileToCreate)) {
                                                if (!is_dir($folderPath)) {
                                                    if (!mkdir($folderPath, 0777, true)) {
                                                        die('Failed to create folders...');
                                                    }
                                                }
                                                $newFile = fopen($fileToCreate, "w");
                                                // Insert HTML content into the new PHP file
                                                $htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Outline</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/Subjects.css">



</head>

<body>

    <?php
    include("../../../components/CoursesNav.php");
    ?>
    <section class="contact-us" id="contact">



        <div id="contact" >
            <div id="CourseNav" class="CoursesNav" >
                <a class="CourseNav-Buttons" href="news.php">Announcements/News</a>
                <a class="CourseNav-Buttons" href="outline.php">Course Outline</a>
                <a class="CourseNav-Buttons" href="material.php">Course Material</a>
                <a class="CourseNav-Buttons" href="assessments.php">Assessments</a>
                <a class="CourseNav-Buttons" href="submission.php">Submission</a>
                <a class="CourseNav-Buttons" href="grade.php">Grade Book</a>
                <a class="CourseNav-Buttons" href="attendance.php">Attendance</a>

            </div>

            <div id="Content" class="Content">
                <h1>hello</h1>
            </div>
        </div>

        <div class="footer">
            <p>Copyright © 2002 University Of Central Punjab. All Rights Reserved.</p>
        </div>
    </section>





    <div class="main-button-red-bottom">
        <div class="scroll-to-section"><a href="../../../signin.html">Logout</a></div>
    </div>

</body>

</html>
HTML;
                                                fwrite($newFile, $htmlContent); // Write HTML content to the new PHP file
                                                fclose($newFile);
                                            }
                                        }
                                    }
                                }
                            } else {
                                echo "No classes today.\n";
                            }
                        }
                        ?>

                    </div>


                </div>



            </div>
        </div>



        </div>
        </div>

        </div>
        </div>
        </div>
        </div>
        <div class="footer">
            <p>Copyright © 2002 University Of Central Punjab. All Rights Reserved.</p>
        </div>
    </section>
    <div class="main-button-red-bottom">
        <div class="scroll-to-section"><a href="../signin.html">Logout</a></div>
    </div>









</body>

</html>
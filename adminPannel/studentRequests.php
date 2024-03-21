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

    <link rel="stylesheet" href="../assets/css/hero.css">
    <link rel="stylesheet" href="admin.css">

    <style>
        .ad-buttons {
            margin-left: 20px;
        }

        
    </style>
</head>

<body>







    <header style="top:0;" class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="#" id="student-p" style="display:  flex; align-items: center;" class="logo">
                            <img style="width: 70px;" src="../assets/images/img-01.png" alt="Ucp Logo">
                            <h1 id="student-portal">Admin Portal</h1>
                        </a>

                        <ul class="nav">
                            <li class="scroll-to-section"><a href="studentRequests.php" class="active">Student Requests</a></li>
                            <li class="scroll-to-section"><a href="faculityRequests.php">Facuilty Requests</a></li>
                            <li class="scroll-to-section"><a href="approvedMembers.php">Approved Members</a></li>
                            <li class="scroll-to-section"><a href="declinedMembers.php">Declined Members</a></li>


                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
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
                        <div class="col-lg-12">

                            <?php
                            include '../connection.php';

                            $query = "SELECT DISTINCT * FROM admission";

                            $result = mysqli_query($conn, $query);

                            if (!$result) {
                                die("ERROR getting data from admission table");
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $name = $row['name'];
                                $email = $row['email'];
                                $photo = $row['photo'];
                                $photo = '../' . $photo;
                                $department = $row['department'];
                                $gender = $row['gender'];
                                $result_card = $row['result_card'];
                                $approve_table = "approved";
                                $reject_table = "declined";
                                $approve_query = "SHOW TABLES LIKE '$approve_table'";
                                $reject_query = "SHOW TABLES LIKE '$reject_table'";
                                $check_approve = mysqli_query($conn, $approve_query);
                                $check_reject = mysqli_query($conn, $reject_query);
                                if (mysqli_num_rows($check_approve) > 0) {
                                    $query_approve = "SELECT DISTINCT * FROM approved where email='$email'";
                                    $result_approve = mysqli_query($conn, $query_approve);
                                    if (mysqli_num_rows($result_approve) > 0) {
                                        continue;
                                    }
                                }
                                if (mysqli_num_rows($check_reject) > 0) {
                                    $query_decline = "SELECT DISTINCT * FROM declined where email='$email'";
                                    $result_decline = mysqli_query($conn, $query_decline);
                                    if (mysqli_num_rows($result_decline) > 0) {
                                        continue;
                                    }
                                }
                                // Start of the contact div
                                echo '<div id="contact" style="margin-top:30px;">';

                                // Start of the ap-dc-buttons div



                                // Start of the img-text div

                                echo '<div  class="img-text">';
                                echo '<div id="img-text">';
                                echo '<img id="student-image"  src="' . $photo . '" alt="User Photo">';
                                // Start of the ad-1 div
                                echo '<div class="ad-1">';
                                echo '<h3 id="text"><b>Name:</b> ' . $name . '</h3>';
                                

                                // Convert department code to full department name
                                if ($department == 'se') {
                                    $dep = 'Software Engineering';
                                } else if ($department == 'cs') {
                                    $dep = 'Computer Science';
                                } else if ($department == 'it') {
                                    $dep = 'Information Technology';
                                } else {
                                    $dep = $department;
                                }

                                // Display department and gender

                                echo '<p id="text" class="gender-1"><b>Department:</b> ' . $dep . '</p>';

                                
                                echo '<p id="text" class="gender-1"><b>Gender:</b> ' . $gender . '</p>';
                                echo '<a  href="' . $result_card . '" download="result_card"><button  style="background-color:#525462;">Download Result Card</button></a>';

                                echo '</div>';

                                echo '</div>';

                                // Display download button for result card
                                echo '<div id="buttons" class="ad-buttons-parent">';
                                echo '<div>';
                                
                               echo '<button class="ad-buttons" onclick="approve(\'' . $email . '\')" style="margin-top: 20px; background-color:green;">Approve</button>';
                               echo '<button class="ad-buttons" onclick="reject(\'' . $email . '\')" style="margin-top: 20px; ">Reject</button>';
   
                              
                               
                                echo '</div>';
                                echo '</div>';
                                // End of img-text div
                                echo '</div>';
                                

                                echo '<div >';
                                echo '<p id="text" class="gender-2"><b>Department</b>: ' . $dep . '</p>'; // End of ad-1 div
                                echo '<p id="text" class="gender-2"><b>Gender:</b> ' . $gender . '</p>';
                               
                                echo '<div>';
                               
                                
                                echo '</div>';
                                echo '</div>';
                                // End of ap-dc-buttons div

                               echo '<div id="accept-reject-button">';
                               echo '<button class="ad-buttons" onclick="approve(\'' . $email . '\')" style="margin-top: 20px; background-color:green;">Approve</button>';
                               echo '<button class="ad-buttons" onclick="reject(\'' . $email . '\')" style="margin-top: 20px; ">Reject</button>';
   
                               echo '</div>';
                                // End of contact div
                                echo '</div>';
                            }
                            ?>



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
       <a href="../signin.html">Logout</a>
    </div>
    <script>
        function approve(email) {

            window.location.href = "approve_student.php?email=" + email;
        }

        function reject(email) {

            window.location.href = "reject_student.php?email=" + email;
        }
    </script>

    <script src="../assets/js/navbar.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>




    <script src="../assets/js/custom.js"></script>
</body>

</html>
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
    <link rel="stylesheet" href="../assets/css/searchbutton.css">

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
                            <li class="scroll-to-section"><a href="studentRequests.php">Student Requests</a></li>
                            <li class="scroll-to-section"><a href="faculityRequests.php">Facuilty Requests</a></li>
                            <li class="scroll-to-section"><a href="approvedMembers.php" >Approved Members</a></li>
                            <li class="scroll-to-section"><a href="declinedMembers.php" class="active">Declined Members</a></li>

                           
        
                           
<!-- <div class="search-container">
    <button class="search-icon" onclick="toggleSearchBar()">Search</button>
    <div class="search-bar">
        <form method="post" onsubmit="submitSearch(event)">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</div> -->

      
    
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
                            $query_faculty = "SELECT DISTINCT * FROM admit";
                            $result = mysqli_query($conn, $query);

                            $result_faculty = mysqli_query($conn_faculty, $query_faculty);

                            if (!$result_faculty) {
                                die("ERROR getting data from admission table");
                            }
                            while ($row = mysqli_fetch_assoc($result_faculty)) {

                                $name = $row['name'];
                                $email = $row['email'];
                                $photo = $row['photo'];


                                $gender = $row['gender'];
                                $result_card = $row['cv'];
                                $approve_table = "approved_faculty";
                                $reject_table = "declined_faculty";
                                $approve_query = "SHOW TABLES LIKE '$approve_table'";
                                $reject_query = "SHOW TABLES LIKE '$reject_table'";
                                $check_approve = mysqli_query($conn_faculty, $approve_query);
                                $check_reject = mysqli_query($conn_faculty, $reject_query);
                                if (mysqli_num_rows($check_approve) > 0) {
                                    $query_approve = "SELECT DISTINCT * FROM $approve_table where email='$email'";
                                    $result_approve = mysqli_query($conn_faculty, $query_approve);
                                    if (mysqli_num_rows($result_approve) > 0) {
                                       continue;
                                    }
                                }if (mysqli_num_rows($check_reject) > 0) {
                                    $query_decline = "SELECT DISTINCT * FROM $reject_table where email='$email'";
                                    $result_decline = mysqli_query($conn_faculty, $query_decline);
                                    if (mysqli_num_rows($result_decline) > 0) {
                                         // Start of the contact div
                                         echo '<div id="contact" style="margin-top:30px;">';

                                         // Start of the ap-dc-buttons div
 
 
 
                                         // Start of the img-text div
 
                                         echo '<div class="img-text">';
                                         echo '<div id="img-text">';
                                         echo '<img id="s-image"  src="' . $photo . '" alt="User Photo">';
 
                                         // Start of the ad-1 div
                                         echo '<div class="ad-1">';
                                         echo '<h3 id="text"><b>Name:</b> ' . $name . '</h3>';
 
 
                                         echo '<p id="text" class="gender-1"><b>Gender:</b> ' . $gender . '</p>';
                                         echo '</div>'; // End of ad-1 div
                                         echo '<p id="text" class="gender-2"><b>Gender:</b> ' . $gender . '</p>';
                                         // Display download button for result card
                                         echo '</div>';
                                         echo '<div  id="buttons" class="ad-buttons-parent">';
                                         echo '<div>';
                                         echo '<a  href="' . $result_card . '" download="result_card"><button  style="background-color:#525462;">Download CV or Resume</button></a>';
                                         echo '<p style="margin-left:6%; margin-top:6%;">Member: <b>Faculty</b></p>';
                                         echo '</div>';
                                         echo '</div>';
 
                                         // End of img-text div
                                         echo '</div>';
 
                                         echo '<div  id="buttons-2" class="ad-buttons-parent">';
                                         echo '<div>';
                                         echo '<a  href="' . $result_card . '" download="result_card"><button  style="background-color:#525462;">Download CV or Resume</button></a>';
                                         echo '<p style="margin-left:6%; margin-top:6%;">Member: <b>Faculty</b></p>';
                                         echo '</div>';
                                         echo '</div>';
                                         // End of ap-dc-buttons div
 
 
                                         // End of contact div
                                         echo '</div>';
                                    }
                                } else {
                                    continue;
                                }
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
                                if (mysqli_num_rows($check_reject) > 0) {
                                    $query_decline = "SELECT DISTINCT * FROM declined where email='$email'";
                                    $result_decline = mysqli_query($conn, $query_decline);
                                    if (mysqli_num_rows($result_decline) > 0) {
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
                                        echo '</div>';
echo '</div>';

                                        // Display download button for result card
                                        echo '<div id="buttons" class="ad-buttons-parent">';
                                        echo '<div>';
                                        echo '<a  href="' . $result_card . '" download="result_card"><button style="background-color:#525462;">Download Result Card</button></a>';
                                        echo '<p style="margin-left:6%; margin-top:6%;">Member: <b>Student</b></p>';
                                        echo '</div>';
                                        echo '</div>';
                                        // End of img-text div
                                        echo '</div>';
echo '<div  id="buttons-2" class="ad-buttons-parent">';

echo '<div >';
echo '<p id="text" class="gender-2"><b>Department</b>: ' . $dep . '</p>'; // End of ad-1 div
echo '<p id="text" class="gender-2"><b>Gender:</b> ' . $gender . '</p>';
echo '</div>';
                                        echo '<div>';
                                        echo '<a  href="' . $result_card . '" download="result_card"><button  style="background-color:#525462;">Download Result Card</button></a>';
                                        echo '<p style="margin-left:6%; margin-top:6%;">Member: <b>Student</b></p>';
                                        echo '</div>';
                                        echo '</div>';
                                        // End of ap-dc-buttons div


                                        // End of contact div
                                        echo '</div>';
                                    }
                                }if (mysqli_num_rows($check_approve) > 0) {
                                    $query_approve = "SELECT DISTINCT * FROM approved where email='$email'";
                                    $result_approve = mysqli_query($conn, $query_approve);
                                    if (mysqli_num_rows($result_approve) > 0) {
                                        continue;
                                    }
                                } 
                                else {
                                    continue;
                                }
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
        <div class="scroll-to-section"><a href="../signin.html">Logout</a></div>
    </div>
<!-- <script>
         function toggleSearchBar() {
  var searchBar = document.querySelector('.search-bar');
  searchBar.classList.toggle('show');
}

function submitSearch(event) {
  event.preventDefault();
  // Add your search functionality here, such as getting the search query and performing a search
  var searchInput = event.target.querySelector('input[type="text"]').value;
  console.log("Search query:", searchInput);
}

</script> -->

    <script src="../assets/js/navbar.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>




    <script src="../assets/js/custom.js"></script>
</body>

</html>
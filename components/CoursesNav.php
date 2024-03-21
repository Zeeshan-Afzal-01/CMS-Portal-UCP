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
<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
<link rel="stylesheet" href="../../../assets/css/hero.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../../../components/CoursesNav.css">

<style>
    .header-area{
        top:0;
    }
</style>

  </head>

<body>

   


  
  


  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                  
                      <a href="#" style="display: flex; align-items: center;" class="logo">
                      <i onclick="openSlider()" class="fa-solid fa-list"></i>  
                      <img style="width: 70px;" src="../../../assets/images/img-01.png" alt="Ucp Logo" >
                          <h1>Student Portal</h1>
                      </a>

                      <ul id="nav-signin"  class="student-image  ">
                          
                      <?php
            session_start();
            if(isset($_SESSION["student-photo"])){
                $photo=$_SESSION['student-photo'];
                $photo ='../../../'.$photo;
               
                echo '<img class="student-image-1" src="' . $photo . '" alt="User Photo">';
            }else{
                echo "image not found";
            }
            
            ?>

                      </ul>        
                      

                  </nav>
              </div>
          </div>
      </div>
  </header>

  <div id="mySlider" class="slider">
        <a href="../../../studentDashboard.php">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Attendance</a>
        <a href="#">Results & Exams</a>
        <a href="#">Notifications</a>
        <div class="dropdown">
            <div class="icon-div">
                <a href="#">Enrollments</a>
                <div class="dropdown-content">
                    <a href="#">Enrolled Courses</a>
                    <a href="#">Self Enrollment</a>
                    <a href="#">Enrollment Schedules</a>
                </div>
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </div>
        <a href="#">Feedback</a>
        <a href="#">Time Table</a>
        <a href="#">Invoices</a>
    </div>


  

<script>
        function openSlider() {
            var slider = document.getElementById("mySlider");
            if (slider.style.left === "-250px") {
                slider.style.left = "0";
            } else {
                slider.style.left = "-250px";
            }
        }
    </script>

<script src="../assets/js/navbar.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>




    <script src="../assets/js/custom.js"></script>



   </body>

</html>

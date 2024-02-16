<?php

include("../includes/connect.php");
include("../functions/commonfunction.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>eCommerce website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../style.css">
 
</head>

<body>
  <!--nav bar-->
  <div>

    <nav class="navbar navbar-expand-lg bg-info p-3">
      <div class="container-fluid">
        <img src="../img/abc.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Product</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="#">Contacts</a>
            </li>
            
          </ul>
          <form class="d-flex" role="search" action="../search_product.php">
       
            <input class="form-control me-2" name='search_data'type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
            <input type="submit" value='search' class='btn btn-outline-light ' name='search_data_product'>
          </form>
        </div>
      </div>
    </nav>


    <!--second child-->
    <nav class="navbar navbar-expand-lg bg-body-dark bg-secondary p-3">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
        if(isset($_SESSION["username"]))
         echo "<li class='nav-item'>
         <a class='nav-link' href=''>
         Welcome&nbsp; $_SESSION[username]</a>
       </li>";
        if(isset($_SESSION["username"])){
         
          echo"<li class='nav-item'>
          <a class='nav-link' href='logout.php'>logout</a>
        </li>";
        }
        ?>
      </ul>
    </nav>
    <div class="bg-light p-3">
      <h3 class="text-center">hidden store</h3>
      <p class="text-center">Communication is at the heart of e commerce and community</p>
    </div>

       <!-- fourth child -->
       <div class="row">
        <div class="col-md-2 d-flex">
              <ul class="navbar-nav bg-info text-center text-light">
             <li class="nav-item">
              <a class="nav-link " href="#"><h4>Your Profile</h4></a>
            </li>
           <?php
           $username=$_SESSION["username"];
           $u_img="select * from users where u_name='$username'";
           $result=mysqli_query($conn,$u_img);
           $row=mysqli_fetch_row($result);
           $u_id=$row[0];
           $img=$row[3];
           ?>
            <li class="nav-item bg-light">
            <img src="./images/<?php echo $img; ?>" alt="" class=' card-img-top' style='border-radius:50%;'>
            </li>
            <li class="nav-item">
              <h4><?php echo $username; ?></h4>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" href="profile.php?pending">Pending orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" href="profile.php?myorder">My orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" href="profile.php?Edit">Edit Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" href="./logout.php">Log out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" href="#">Delete Account</a>
            </li>
             </ul> 
           
        </div>
       <div class="col-md-10  text-center">
         <?php 
          
           if(isset($_GET['Edit'])){
             include("./edit_account.php");
           }
          else if(isset($_GET['myorder'])){
            include("./myorders.php");
                    }
         else if(isset($_GET['pending'])){
            include("./pending_orders.php");
                    }   
          else
          include("./pending_orders.php");
           ?>
       </div>
       
       </div>
        
    <!--Footer-->
   <?php 
   include("../includes/footer.php");
   ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php

include("includes/connect.php");
include("functions/commonfunction.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!--nav bar-->
  <div>

    <nav class="navbar navbar-expand-lg bg-info p-3">
      <div class="container-fluid">
        <img src="./img/abc.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Product</a>
            </li>
            <?php
            if (isset($_SESSION["username"])) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>
                My Account</a>
            </li>";}
            else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>";
        
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacts</a>
            </li>
           

          </ul>
          <form class="d-flex" role="search" action="search_product.php">
       
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
       else 
                echo "<li class='nav-item'>
                <a class='nav-link' href=''>
                Welcome&nbsp; Guest</a>
              </li>";





        if(!isset($_SESSION["username"])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/checkout.php'>login</a>
        </li>";
        }
        else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>logout</a>
        </li>";
        }
        ?>  
      </ul>
    </nav>

    <!-- Calling cart function -->
    <?php 
    //cart_item_num();
    add_to_cart();
    ?>
    <!-- third chile -->
    <div class="bg-light p-3">
      <h3 class="text-center">hidden store</h3>
      <p class="text-center">Communication is at the heart of e commerce and community</p>
    </div>
    <!-- table of items in cart- fourth table -->
     <div class="container">
        <div class="row">
            <!-- <form action="" method="get"> -->
        
           
            <?php
            $ip=getIPAddress();
            $select_query="select * from cards where ip_adr='$ip'";
            $result=mysqli_query($conn,$select_query);
            $row_num=mysqli_num_rows($result);
    if($row_num> 0){
       ?>

<table class="table table-bordered text-center">
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Remove</th>
                <th>Price</th>
                <th>Operation</th>
            </tr> 
       <?php
           while($row=mysqli_fetch_array($result))
           {
             $s1="select * from products where p_id=$row[p_id]";
             $result1=mysqli_query($conn,$s1);
             
             $row1=mysqli_fetch_row($result1);
             
           ?>
              <form action="" method="get">
             <tr>
                <td><?php echo $row1[1] ?></td>
                <td><img src="./admin_area/p_images/<?php echo $row1[5] ?>" class="card-img-top" alt=""></td>
                <td><input type="text" class="form-input" name='qty' ></td>
                <?php
                 
                if(isset($_GET['update']) and isset($_GET['qty'])){
                    $qty=$_GET['qty'];
                    $u="update cards set quantity=$qty where ip_adr='$ip'";
                    $re=mysqli_query($conn,$u);
                }

                if(isset($_GET['delete'] )){
                 foreach ($_GET['removeitem'] as  $value) {
                       echo $value;
                       $del="delete from cards where p_id=$value " ;
                         $re=mysqli_query($conn,$del);
                         if($re){
                          echo"<script>window.open('cart.php','_self')</script>";
                         }


                 }
              }
                ?>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $row1[0];?>"></td>
                <td><?php echo $row1[8] ?></td>
                <!-- <td><button class='btn btn-info'>update</button></td> -->
               <td><input type="submit" class="btn form-control btn-outline-info" name="update" value='update'></td> 
                <td><input type="submit" class="btn form-control btn-outline-info" name="delete" value='delete'></td>
            </tr>
              </form>
          <?php }
           
           
            ?>
            
        </table>
    <!-- </form> </div> -->
         <div >
            subamout:<strong><?php cart_price()?>/-</strong>
            <a href='index.php'><button class='btn btn-primary'>Continue shopping</button></a>
            <a href='./users_area/checkout.php'><button class='btn btn-primary'>Checkout</button></a>
         </div>
         
         <?php 
         }else{
          echo"
          <div>
          <h3 class='text-center text-danger '>Cart is empty</h3>
          <a href='index.php'><button class='btn btn-success'>Continue shopping</button></a>
          <div>";
         }?>
     </div>
    






    <!--Footer-->
   
  </div>
  <?php 
   include("./includes/footer.php");
   ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
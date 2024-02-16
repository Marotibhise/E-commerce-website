<?php
include("../functions/commonfunction.php");
include("../includes/connect.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <link rel="stylesheet" href="../style.css">
</head>
<body>

 <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info p-3">
        <div class="container-fluid">
            <img src="../img/logo.png " class="logo" alt="logo">
            <nav class="navbar navbar-expand-lg ">
              <ul class="navbar-nav">
               <?php
               if(!isset($_SESSION['admin'])){
                  echo"<li class='nav-item'>
                  <a href='' class='nav-link'>Welcome guest</a>
                  </li>
                  <li class='nav-item'>
                    <a href='./admin_login.php' class='nav-link'>Log in</a>
                </li>";
               }else{
                  echo"<li class='nav-item'>
                  <a href='' class='nav-link'>Welcome ".$_SESSION['admin']."</a>
                  </li>
                  <li class='nav-item'>
                    <a href='./admin_logout.php' class='nav-link'>Logout</a>
                </li>";

               }
               ?>
              </ul>
          </nav>
        </div>
       
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">
            Manage Details
        </h3>
    </div>

    <!-- third child -->
    <div class="bg-secondary row p-2 d-flex">
        <div class="col-md-12 d-flex  align-items-center">
          <div>
            <a href="#"><img src="../img/abc.png" class="admin_img"alt=""></a>
          </div>
          <div class="button text-center p-10">
            <button class="btn btn-primary m-4"><a href="   insert_product.php" class="nav-link text-light  my-1">Insert Product</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?view_products" class="nav-link my-1">view products</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?insert_cat" class="nav-link my-1">Insert Categories</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?view_categories" class="nav-link my-1">View Categories</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?insert_brand" class="nav-link my-1">Insert Brands</a></button>
            <button class="btn btn-primary m-2"><a href="" class="nav-link my-1">view Brands</a></button>
            
            <button class="btn btn-primary m-2"><a href="index.php?orders" class="nav-link my-1">All oreders</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?payments" class="nav-link my-1">All payments</a></button>
            <button class="btn btn-primary m-2"><a href="index.php?users" class="nav-link my-1">List user</a></button>
            <button class="btn btn-primary m-2"><a href="" class="nav-link my-1">Log out</a></button>
          </div>
        </div>
    </div>
 </div>
  <!-- fourth child -->
  <div class="container my-2">

  <?php 
     if(isset($_GET['users']))
     {
        include('users.php');
     }
     if(isset($_GET['payments']))
     {
        include('payments.php');
     }
     if(isset($_GET['insert_cat']))
     {
        include('insert_categories.php');
     }
     if(isset($_GET['insert_brand']))
     {
        include('insert_brand.php');
     }
     if(isset($_GET['view_products']))
     {
        include('view_products.php');
     }
     if(isset($_GET['edit_product']))
     {
        include('edit_product.php');
     }
     if(isset($_GET['view_categories']))
     {
        include('view_categories.php');
     }
     if(isset($_GET['edit_cat']))
     {
        include('edit_cat.php');
     }
     if(isset($_GET['orders']))
     {
        include('orders.php');
     }
     //delete the order
     if(isset($_GET['delete_user']))
     {
      $del="delete from users where u_id=$_GET[delete_user]";
      $result=mysqli_query($conn, $del);
      if($result)
      echo"<script>alert('data deleted successfully');
          window.open('index.php?users','_self')</script>";
       }
       if(isset($_GET['delete_order']))
       {
        $del="delete from orders where o_id=$_GET[delete_order]";
        $result=mysqli_query($conn, $del);
        if($result)
        echo"<script>alert('data deleted successfully');
            window.open('index.php?orders','_self')</script>";
         }
       //to delete the transaction
       if(isset($_GET['delete_payment']))
          {
          $del="delete from payment where payment_id=$_GET[delete_payment]";
          $result=mysqli_query($conn, $del);
          if($result)
          echo"<script>alert('transaction deleted successfully');
              window.open('index.php?payments','_self')</script>";
            }
            //deleting categories
       if(isset($_GET['delete_cat']))
       {
        $del="delete from categories where cat_id=$_GET[delete_cat]";
        $result=mysqli_query($conn, $del);
        if($result)
        echo"<script>alert('data deleted successfully');
            window.open('index.php?view_products','_self')</script>";
         }
     if(isset($_GET['delete_id']))
       {
     $del="delete from products where p_id=$_GET[delete_id]";
     $result=mysqli_query($conn, $del);
     if($result)
     echo"<script>alert('data deleted successfully');
         window.open('index.php?view_products','_self')</script>";
      }
    ?>
  </div>
  <div class="container-fluid p-0"><?php include("../includes/footer.php");?></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
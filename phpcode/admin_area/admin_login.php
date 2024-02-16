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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <link rel="stylesheet" href="../style.css">
    <style>
        img{
            height: 100%;
            width: 100%;
            object-fit: contain;
        }
        
        </style>
</head>
<body>
    <div class="container-fluid ">
      <h2 class="text-center mb-2   ">Admin Login</h2>
      <div class="row d-flex justify-content-center align-items-center ">  <!--this is photo section-->
                 <div class="col-md-6">
                    <img src="admin_img.jpeg">
                 </div>
                 <!--this is registration form section-->
                 <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="form-outline mb-4 mx-3">
                            <label for="a_name" class="mb-2 form-label">Admin name</label>
                            <input type="text" class='form-control' name='a_name' id='a_name' placeholder="Enter username" required>
                        </div>
                    
                        <div class="form-outline mb-4  mx-3">
                            <label for="a_password" class="mb-2 form-label">Admin Password</label>
                            <input type="password" class='form-control' name='a_password' id='a_password' placeholder='Enter password' required>
                        </div>
    
                        <div class="mx-3">
                            <input type="submit" value='login' name='login' class='btn btn-info'>
                            <p class="small fw-bold">Don't have an account ? <a href='admin_registration.php' class='nav-link d-inline text-danger'>Register</a></p>
                        </div>
    </form>
                 </div>
      </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['login'])){
  
     $admin_name=$_POST['a_name'];
     $psd=$_POST['a_password'];
     $sel_q="select * from admins where a_name='$admin_name' and a_psd='$psd'";
     $sel_q=mysqli_query($conn,$sel_q);
     $r_num=mysqli_num_rows($sel_q);

     if($r_num>0){
        $_SESSION['admin']=$admin_name;
         echo"<script>alert('login successful');
         window.open('index.php','_self');</script>";
    }else echo"<script>alert('password not match');</script>";
}

?>
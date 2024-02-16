<?php
include("../includes/connect.php");
include("../functions/commonfunction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
      <h2 class="text-center mb-5">Admin Registration</h2>
      <div class="row d-flex justify-content-center ">  <!--this is photo section-->
                 <div class="col-md-6">
                    <img src="admin_img.jpeg">
                 </div>
                 <!--this is registration form section-->
                 <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="form-outline mb-4 mx-3">
                            <label for="a_name" class="mb-2 form-label">Admin name</label>
                            <input type="text" class='form-control' name='a_name' id='a_name' placeholder="Enter username" required autocomplete="off">
                        </div>
                        <div class="form-outline mb-4  mx-3">
                            <label for="a_email" class="mb-2 form-label">Admin Email</label>
                            <input type="email" class='form-control' name='a_email' id='a_email' placeholder='Enter Email' required autocomplete='off'>
                        </div>
                        <div class="form-outline mb-4  mx-3">
                            <label for="a_password" class="mb-2 form-label">Admin Password</label>
                            <input type="password" class='form-control' name='a_password' id='a_password' placeholder='Enter password' required autocomplete='off'>
                        </div>
                        <div class="form-outline mb-4  mx-3 ">
                            <label for="a_cpsd" class="mb-2 form-label">Confirm password</label>
                            <input type="password" class='form-control' name='a_cpsd' id='a_cpsd' placeholder='Enter password' required autocomplete='off'>
                        </div>
                        <div class="mx-3">
                            <input type="submit" value='Register' name='register' class='btn btn-info'>
                            <p class="small fw-bold">have an account ? <a href='admin_login.php' class='nav-link d-inline text-danger'>Login</a></p>
                        </div>
    </form>
                 </div>
      </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['register'])){

     $admin_name=$_POST['a_name'];
     $psd=$_POST['a_password'];
     $cpsd=$_POST['a_cpsd'];
     if($psd==$cpsd){
     $sel_q="select * from admins where a_name='$admin_name'";
     $sel_q=mysqli_query($conn,$sel_q);
     $r_num=mysqli_num_rows($sel_q);
     if($r_num==0){

      $ins_q="insert into admins (a_name,a_email,a_psd) values ('$_POST[a_name]','$_POST[a_email]','$_POST[a_password]')";
        $ins_r=mysqli_query($conn,$ins_q);
       if($ins_r)
      echo"<script>alert('data inserted succesfully');
         window.open('admin_login.php','_self');</script>";
   else  echo"<script>alert('data inserted unsuccesfully');</script>";
    }else echo"<script>alert('admin name already exists');</script>";
}else echo"<script>alert('password not match');</script>";
}
?>
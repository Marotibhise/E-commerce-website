<?php
if(isset($_GET['Edit'])){
 $username=$_SESSION['username'];
 $select_user="select * from users where u_name='$username'";
 $result_user=mysqli_query($conn,$select_user);
 $row_user=mysqli_fetch_row($result_user);
 $email=$row_user[2];
 $adr=$row_user[6];
 $phone=$row_user[7];
 $u_id=$row_user[0];}
  if(isset($_POST["update"])){
    $update_user=$u_id;
    $username=$_POST['username'];
    $email=$_POST["email"];
    $adr=$_POST["adr"];
    $phone=$_POST['phone'];
    $img_name=$_FILES['img']['name'];   
    $img_tmp=$_FILES['img']['tmp_name'];   
    move_uploaded_file($img_tmp,"./images/$img_name");
    $update_q="update users set u_name='$username', u_email='$email',u_adr='$adr', u_img='$img_name',u_phone='$phone' where u_id='$u_id'";
    $result_q=mysqli_query($conn,$update_q);
    if($result_q){
        echo"<script>alert('profile updated successfully');
        window.open('logout.php','_self');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body >
<h1 class='text-center '>Edit Account</h1>
    <div class="container w-50  p-2 m-auto">
   
    <form action="" method="POST" enctype="multipart/form-data" class='text-center'><br>
        <div class="form-outline mb-4">
            <input type="text" class="form-control" placeholder="Enter username" name='username' autocomplete='off' value="<?php echo $username; ?>">
        </div>  
        <div class="form-outline mb-4">
            <input type="email" class="form-control "placeholder="Enter email" name='email' autocomplete="off"
            value="<?php echo $email; ?>">
        </div>  
        <div class="form-outline mb-4 d-flex">
            <input type="file" class="form-control "placeholder="" name='img' autocomplete="off" required>
            <img src="./images/<?php echo $img; ?>" class='card-img-top' alt="">
        </div>  
        <div class="form-outline mb-4">
            <input type="text" class="form-control "placeholder="Enter Address" name='adr' autocomplete="off"
            value="<?php echo $adr; ?>">
        </div>  
        <div class="form-outline mb-4">
            <input type="text" class="form-control "placeholder="Enter phone number" name='phone' autocomplete="off"
            value="<?php echo $phone; ?>">
        </div>  
         <div class="form-outline mb-4">
         <input type="submit" value='update'class='btn btn-outline-dark px-2'  name='update'>
        </div>  
    </form>
    </div>
    
</body>
</html>
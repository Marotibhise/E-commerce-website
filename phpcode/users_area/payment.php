<?php
//include("../functions/commonfunction.php");
include("../includes/connect.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../style.css">
 
    <style>
        img{
            height: 300px;
            width: 300px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <?php
       global $conn;
        $select_q="select * from users where u_name= '$_SESSION[username]'  ";
        $result=mysqli_query( $conn, $select_q );
        $row=mysqli_fetch_row($result);
        
        $u_id=$row[0];
    ?>
    <div class='container'></div>
   <div class="row">
    <div class="col-md-6 d-flex justify-content-center align-item-center">
        <img src="./images/upi.jpeg" alt="">
    </div>
    <div class="col-md-6  justify-content-center">
       <a href="orders.php?u_id=<?php echo $u_id;?>">payoffline </a>
    </div>
    </div>
   </div>
</body>
</html>
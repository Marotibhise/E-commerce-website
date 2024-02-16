<?php

include("../includes/connect.php");
include("../functions/commonfunction.php");
@session_start();

if(isset($_GET['o_id']))
{
    $o_id=$_GET['o_id'];
    $select="select * from orders where o_id=$o_id";
    $result=mysqli_query($conn,$select);
    $row=mysqli_fetch_array($result);
    $invoice=$row[3];
    $amt=$row[2];
    
}
if(isset($_POST['confirm']))
{
   echo"confirm";
   $payment_mode=$_POST['p_mode'];
   $ins_q="insert into payment (o_id,invoice_num,amount,payment_mode,payment_date) values($o_id,'$invoice',$amt,'$payment_mode',NOW())";
   $result=mysqli_query($conn,$ins_q);
   if($result){
       
      $up="update orders set o_status='Complete' where o_id=$o_id";
      $result1=mysqli_query($conn,$up);

    echo "<script>alert('payment successfull');
     window.open('profile.php?myorder','_self');</script>";
   }
   
}
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
</head>
<body class='bg-secondary'>
    <h1 class="text-center">Confirm Payment</h1>
    <form action="" method='POST'>

        <div class="form-outline my-4 text-center w-50 m-auto   " >
            <input type="text" class="form-control w-50 m-auto" name='invoicr_num' value="<?php echo $invoice; ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto   " >
            <label for="amount" class='text-light '>Amount</label>
            <input type="text" class="form-control w-50 m-auto" id='amount' name='amount' value="<?php echo $amt; ?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto   " >
          <select name="p_mode" class='form-select w-50 m-auto' required>
           <option disabled>Payment Mode</option>
           <option value="UPI">UPI</option>
           <option value="Net banking" >Net Banking</option>
           <option value="paypal">Paypal</option>
           <option value="cod">Cash on Delivary</option>
          </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto   " >
            
            <input type="submit" class="form-control w-50 m-auto btn btn-info"  name='confirm' value='confirm'>
        </div>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
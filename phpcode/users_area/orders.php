<?php 
   include("../includes/connect.php");
   include("../functions/commonfunction.php");
   if(isset($_GET["u_id"]))
   {
    $u_id=$_GET['u_id'];

   }
   $ip=getIPAddress();
   $select_q= "select * from cards where ip_adr='$ip'";
   $result=mysqli_query($conn,$select_q);
   $count=mysqli_num_rows($result);
   $invoice_num=mt_rand();
   echo $invoice_num;
   $status='pending';
   $total_price=0;
   while($row=mysqli_fetch_array($result))  {
      $select_p="select * from products where p_id=$row[p_id]";
      $qty=$row['quantity'];
      $result1=mysqli_query($conn,$select_p);
      $row1=mysqli_fetch_row($result1);
     // print_r($row1);
           $total_price+= $row1[8]*$qty;
   }
   $ins_q="insert into orders (u_id,amout_due,invoice_number,total_products,o_date,o_status) values($u_id,$total_price,'$invoice_num',$count,NOW(),'pending')";
   $r=mysqli_query($conn,$ins_q);
   if($r) 
      { 
         $del="delete from cards where ip_adr='$ip'";
        $result=mysqli_query($conn,$del);
        $ins_pending="insert into orders_pending (u_id,invoice_num,quantity,o_status) values($u_id,'$invoice_num',$count,'pending')";
        $pen=mysqli_query($conn,$ins_pending);
        if($pen) echo"hi added";
      echo"<script>alert('order successful');
          window.open('profile.php','_self');</script>";
    
      }
     
  
?>

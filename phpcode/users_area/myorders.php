<h1 class='text-info'>My orders</h1>
    <?php 
       $sel_o="select * from orders where u_id=$u_id order by o_id desc";
       $result=mysqli_query($conn,$sel_o);
     
       if(mysqli_num_rows($result)> 0){
        ?>


<table class='table table-bordered mt-5'>
    <thead class="bg-info">
    <tr>
        <th>Sr no</th>
       
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Status</th>
        <th>Confrim</th>
    </tr>
    </thead>

        <?php
        $i=0;
        while($row=mysqli_fetch_row($result)){
            if($row[6]=='pending')
                   $status='incomplete';
            else  
                 $status='complete';
           $o_id=$row[0];
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
       
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $status ?></td>
        <?php 
          if($row[6]=='pending')
         echo"<td><a href='confirm_payment.php?o_id=$o_id' class='text-decoration-none text-dark'>confirm</a></td>
    </tr>";
        else
        echo"<td>paid</td>
        </tr>"; 
   
        }}
    else{
        echo"<h1>No any priore order</h1>";
    }
    ?>
</table>
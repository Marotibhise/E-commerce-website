<!-- table of items in cart- fourth table -->
<h2 class="text-center">All payments</h2>
<div class="container-fluid mt-4">
        <div class="row">
            <!-- <form action="" method="get"> -->
        
           
            <?php
            
            $select_query="select * from payment";
            $result=mysqli_query($conn,$select_query);
            $row_num=mysqli_num_rows($result);
    if($row_num> 0){
       ?>

<table class="table table-bordered text-center bg-info">
       <thead class='bg-info'>
       <tr class='bg-info'>
                <th>Sr No</th>
                <th>Due amount</th>
                <th>Invoice number</th>
                <th>Payment mode</th>
                <th>Payment Date</th>
             
                <th>Delete</th>
            </tr> 
       </thead>
           
       <?php $i=0;
           while($row1=mysqli_fetch_array($result))
           {
             
            
           ?>
              <form action="" method="get">
             <tr>
             <td><?php echo $i++; ?></td>
                <td><?php echo $row1[3] ?></td>
                <td><?php echo $row1[2] ?></td>
                <td><?php echo $row1[4] ?></td>
                <td><?php echo $row1[5] ?></td>
               
               
                <!-- <td><button class='btn btn-info'>update</button></td> -->
            <?php
            echo"
            <td><a href='index.php?delete_payment=$row1[0]'><i class='fa-solid fa-trash'></i></a></td> 
            ";
            ?>
            </tr>
              </form>
          <?php }}
           
           
            ?>
            
        </table>
</div>  
</div>

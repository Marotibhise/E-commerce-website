<!-- table of items in cart- fourth table -->
<h2 class="text-center">All products</h2>
<div class="container-fluid mt-4">
        <div class="row">
            <!-- <form action="" method="get"> -->
        
           
            <?php
            $ip=getIPAddress();
            $select_query="select * from products";
            $result=mysqli_query($conn,$select_query);
            $row_num=mysqli_num_rows($result);
    if($row_num> 0){
       ?>

<table class="table table-bordered text-center bg-info">
       <thead class='bg-info'>
       <tr class='bg-info'>
                <th>Product id</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Total sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr> 
       </thead>
           
       <?php
           while($row1=mysqli_fetch_array($result))
           {
             
            
           ?>
              <form action="" method="get">
             <tr>
             <td><?php echo $row1[0] ?></td>
                <td><?php echo $row1[1] ?></td>
                <td><img src="./p_images/<?php echo $row1[5] ?>" class="card-img-top" alt=""></td>
                <td><?php echo $row1[8] ?></td>
                <td>1</td>
                <td><?php echo $row1[10] ?></td>
                <!-- <td><button class='btn btn-info'>update</button></td> -->
            <?php
            echo"
            <td><a href='index.php?edit_product=$row1[0]'><i class='fa-regular fa-pen-to-square'></i></a></td> 
            ";
            
            echo"
            <td><a href='index.php?delete_id=$row1[0]'><i class='fa-solid fa-trash'></i></a></td> 
            ";
            ?>
            </tr>
              </form>
          <?php }}
           
           
            ?>
            
        </table>
</div>  
</div>
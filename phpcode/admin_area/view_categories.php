<!-- table of items in cart- fourth table -->
<h2 class="text-center">All Categories</h2>
<div class="container-fluid mt-4">
        <div class="row">
            <!-- <form action="" method="get"> -->
        
           
            <?php
            $ip=getIPAddress();
            $select_query="select * from categories";
            $result=mysqli_query($conn,$select_query);
            $row_num=mysqli_num_rows($result);
    if($row_num> 0){
       ?>

<table class="table table-bordered text-center bg-info">
       <thead class='bg-info'>
       <tr class='bg-info'>
                <th>Category id</th>
                <th>Category Name</th>
                <th>Edit Category</th>
                <th>Delete Category</th>
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
                <!-- <td><button class='btn btn-info'>update</button></td> -->
            <?php
            echo"
            <td><a href='index.php?edit_cat=$row1[0]'><i class='fa-regular fa-pen-to-square'></i></a></td> 
            ";
            
            echo"
            <td><a href='index.php?delete_cat=$row1[0]'><i class='fa-solid fa-trash'></a></td> 
            ";
            ?>
            </tr>
              </form>
          <?php }}
           
           
            ?>
            
        </table>
</div>  
</div>
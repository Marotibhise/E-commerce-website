<?php
  $select_query="select * from categories where cat_id=$_GET[edit_cat]";
  $result=mysqli_query($conn,$select_query);
  $row=mysqli_fetch_row($result);
  print_r($row);
  $name=$row[1];
  if(isset($_POST["update"])){

    $name=$_POST["cat_title"];
    $insert_query="update  categories set cat_name='$name' where cat_id=$_GET[edit_cat]";
    $result=mysqli_query($conn,$insert_query);
    
    if($result)
    echo "<script>alert('product updated successfully');
    window.open('index.php','_self');</script>";
  }
  
?>
<div class="container w-50 m-auto">
    <h4>Edit categories</h4>
 <form action="" method="post" enctype="multipart/form-data" > <!--enctype allow us to add not text data like image -->
            <!-- Title -->
            <div class="form-outline  ">
                <label for="product_title">Product Title</label>
                <input type="text" name="cat_title" id="cat_title" class="form-control mb-4"  autocomplete="off" required value="<?php echo $name;?>">
            </div>
            <div class="form-outline   ">
               <button type="submit" name="update" class="btn btn-info " >update</button>
              
            </div>
</form></div>

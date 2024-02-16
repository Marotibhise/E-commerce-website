<?php
include("../includes/connect.php");
if (isset($_POST["in"])) {

    $brand = $_POST['brand_title'];
    $select_query = "Select * from brands where brand_name='$brand'";
    $result1 = mysqli_query($conn, $select_query);
    $num = mysqli_num_rows($result1);
    if ($num == 0) {
        $inser_query = "insert into brands (brand_name) values('$brand')";
        $result = mysqli_query($conn, $inser_query);
        if ($result)
            echo "<div class='alert alert-success' role='alert'>
                      $brand added successfully
                  </div>";
    } else
        echo "<div class='alert alert-danger' role='alert'>
      $brand already exist!
    </div>";
}


?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">

   <div class="input-group mb-3 w-90">
  <span class="input-group-text bg-info" id="basic-addon1">Enter brand</span>
  <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title" >
</div>

<div class="input-group mb-2 w-10 m-auto">
  <!-- <input type="submit" class="form-control bg-info" values="Insert Categories" name="insert_cat" > -->
  <button class="btn bg-info b-0 " name='in'>
    Insert Brands
  </button>
</div>
</form>
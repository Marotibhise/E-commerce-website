<?php
include("../includes/connect.php");
if (isset($_POST["in"])) {

    $cat = $_POST['cat_title'];
    $select_query = "Select * from categories where cat_name='$cat'";
    $result1 = mysqli_query($conn, $select_query);
    $num = mysqli_num_rows($result1);
    if ($num == 0) {
        $inser_query = "insert into categories (cat_name) values('$cat')";
        $result = mysqli_query($conn, $inser_query);
        if ($result)
            echo "<div class='alert alert-success' role='alert'>
                      data added successfully
                  </div>";
    } else
        echo "<div class='alert alert-danger' role='alert'>
      Data already exist!
    </div>";
}


?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">

    <div class="input-group mb-3 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fasolid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">


        <button type="submit" class="btn btn-info pl-4" name="in">insert categories</button>
    </div>
</form>
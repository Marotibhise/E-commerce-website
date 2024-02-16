<?php
include("../includes/connect.php");
$id=$_GET['edit_product'];
  $select_q="select * from products where p_id=$id";
  $result=mysqli_query($conn,$select_q);
  $row=mysqli_fetch_row($result);
  $name= $row[1];	
  $p_des=$row[2];	
  $cat_id=$row[3];		
  $brand_id=$row[4];		
  $p_i1=$row[5];		
  $p_i2	=$row[6];
  $p_i3	=$row[7];	
 $p_price=$row[8];		
  $status=$row[10];		
  $p_keyword=$row[11];	

 
if(isset($_POST["update"])){

    $product_name =$_POST['product_title'];
    $product_des = $_POST['product_des'];
    $product_cat = $_POST['product_cat'];
    $product_brand  = $_POST['product_brand'];
    $product_keyword = $_POST['product_keyword'];
    $product_price = $_POST['product_price'];
    $product_status='true';
    echo $product_price." ".$product_des;
    //for accessing images from databases
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //for accessing images tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //to check empty condition
    if($product_name=='' or $product_des=='' or $product_cat=='' or $product_brand=='' or $product_keyword=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''  ) 
    {
      
     exit();
      }
      else
      {
        move_uploaded_file($temp_image1,"./p_images/$product_image1");
        move_uploaded_file($temp_image2,"./p_images/$product_image2");
        move_uploaded_file($temp_image3,"./p_images/$product_image3");
        $insert_query="update  products set p_name='$product_name',p_des='$product_des',cat_id='$product_cat',brand_id='$product_brand',p_i1='$product_image1',p_i2='$product_image2',p_i3='$product_image3',p_price='$product_price',status='$product_status',p_keyword='$product_keyword' where p_id=$id";
        $result=mysqli_query($conn,$insert_query);
        
        if($result)
        echo "<script>alert('product updated successfully');
        window.open('index.php','_self');</script>";
      }
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    
         <div class="container w-50 bg-secondary p-4" style="border-radius: 5px; ">
              <h2 class="text-center">Edit Product </h2>
         <!-- form -->
         <form action="" method="post" enctype="multipart/form-data"> <!--enctype allow us to add not text data like image -->
            <!-- Title -->
            <div class="form-outline mb-4  m-auto">
                <label for="product_title">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required value="<?php echo $name;?>">
            </div>
            <!--Decription  -->
            <div class="form-outline mb-4  m-auto">
                <label for="product_des">Product Description</label>
                <input type="text" name="product_des" id="product_des" class="form-control" placeholder="Enter product description" autocomplete="off" required value="<?php echo $p_des;?>">
            </div>
            <!--keywords  -->
            <div class="form-outline mb-4  m-auto">
                <label for="product_keyword" disabled>Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required value="<?php echo $p_keyword;?>">
            </div>
            <!-- categories select -->
            <div class="form-outline mb-4  m-auto ">
              <select name="product_cat" id="product_cat" class="product_cat form-select">
                <option value="" disabled>selct categories</option>
               <?php
                  $select_query="select * from categories";
                  $result_select=mysqli_query($conn,$select_query);
                  while($row=mysqli_fetch_array($result_select)){
                    echo"<option value=$row[cat_id]>$row[cat_name]</option>";
                  }   
                  ?>
              </select>
            </div>
             <!-- Brands select -->
             <div class="form-outline mb-4  m-auto">
              <select name="product_brand" id="product_brand" class="product_brand form-select" value="<?php echo $name;?>">
                <option value="">selct brand</option>
                <?php
                  $select_query="select * from brands";
                  $result_select=mysqli_query($conn,$select_query);
                  while($row=mysqli_fetch_array($result_select))
                    echo"<option value=$row[brand_id]>$row[brand_name]</option>";
                  
                  ?>
              </select>
            </div>
            <!-- Images -->
            <label for="product_image1">Product image1</label>
            <div class="form-outline mb-4  m-auto d-flex">
           
                <input type="file" name="product_image1" id="product_image1" class="form-control" placeholder="Enter product image1"  required>
                <img src="./p_images/<?php echo $p_i1;?>" alt="" class='card-img-top'>
            </div>

             <!-- Images 2 -->
             <label for="product_image2">Product image1</label>
            <div class="form-outline mb-4  m-auto d-flex">
         
                <input type="file" name="product_image2" id="product_image2" class="form-control" placeholder="Enter product image2"  required>
                <img src="./p_images/<?php echo $p_i2;?>" alt="" class='card-img-top'>
            </div>

            <!-- Images 3-->
            <label for="product_image3">Product image3</label>
            <div class="form-outline mb-4  m-auto d-flex">
           
                <input type="file" name="product_image3" id="product_image3" class="form-control" placeholder="Enter product image3"  required>
                <img src="./p_images/<?php echo $p_i3;?>" alt="" class='card-img-top'>
            </div>
            <!-- Price -->
            <div class="form-outline mb-4  m-auto">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required value="<?php echo $p_price;?>">
            </div>
            <!-- submit -->
            <div class="form-outline row justify-content-around  ">
               <button type="submit" name="update" class="btn btn-info col-3 mx-10" >update</button>
               <button type="reset" name="reset" class="btn btn-warning col-3">reset</button>
            </div>
         </form>

         </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
//include('includes/connect.php');
//getting products 
function getProduct()
{
  global $conn;
  if (!isset($_GET['cat_id'])) {
    if (!isset($_GET['brand_id'])) {
      $select = "select * from products order by rand() limit 0,3 ";
    } else { //displayed after choosing categories
      $select = "select * from products where brand_id=$_GET[brand_id] ";
    }
  } else $select = "select * from products where cat_id=$_GET[cat_id] "; //after choosing brand
  $result = mysqli_query($conn, $select);
  $num = mysqli_num_rows($result);
  if ($num == 0) {
    echo "<h1 class='text-center text-danger'>No stock is available for this choice</h1>";
  } else {
    while ($row = mysqli_fetch_array($result)) {
      echo " <div class='col-md-4 mb-2 p-1'>
                            <div class='card ' style='width: 350px; height:400px;'>
                                          <img src='./admin_area/p_images/$row[p_i1]' class='card-img-top img' >
                                          <div class='card-body'>
                                            <h5 class='card-title'>$row[p_name]</h5>
                                            <p class='card-text'>$row[p_des]</p>
                                            <p class='card-text'>Price:$row[p_price]</p>
                                            <a href='index.php?addcart=$row[p_id]' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?p_id=$row[p_id]' class='btn btn-secondary'>View more</a>
                                          </div>
                            </div>
                          </div> ";
    }
  }
}

//getting all products
function get_all_products()
{
  global $conn;
  $select = "select * from products order by rand()  ";
  $result = mysqli_query($conn, $select);
  while ($row = mysqli_fetch_array($result)) {
    echo " <div class='col-md-4 mb-2 p-1'>
                            <div class='card ' style='width: 350px; height:400px;'>
                                          <img src='./admin_area/p_images/$row[p_i1]' class='card-img-top img' >
                                          <div class='card-body'>
                                            <h5 class='card-title'>$row[p_name]</h5>
                                            <p class='card-text'>$row[p_des]</p>
                                            <p class='card-text'>Price:$row[p_price]</p>
                                            <a href='index.php?addcart=$row[p_id]' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?p_id=$row[p_id]' class='btn btn-secondary'>View more</a>
                                          </div>
                            </div>
                          </div> ";
  }
}

//displaying brands in sidebar
function selectbrands()
{
  global $conn;
  $select_query = "select * from brands";
  $select_result = mysqli_query($conn, $select_query);
  while ($row = mysqli_fetch_array($select_result)) {
    echo " <li class='nav-item '>
      <a href='index.php?brand_id=$row[brand_id]' class='nav-link text-light text-center'><h3>$row[brand_name]</h3></a>
      </li>";
  }
}


//displaying categories in sidebar
function selectcategories()
{
  global $conn;
  include("./includes/connect.php");
  $select_query = "select * from categories";
  $select_result = mysqli_query($conn, $select_query);
  while ($row = mysqli_fetch_array($select_result)) {
    echo " <li class='nav-item '>
              <a href='index.php?cat_id=$row[cat_id]' class='nav-link text-light text-center'><h3>$row[cat_name]</h3></a>
              </li>";
  }
}


//to display the details of the product
function display_details()
{
  global $conn;
  if (isset($_GET['p_id'])) {

    $select = "select * from products where p_id=$_GET[p_id] "; //after choosing product
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($result)) {
      echo " <div class='col-md-4 mb-2 p-1'>
                            <div class='card ' style='width: 350px; height:400px;'>
                                          <img src='./admin_area/p_images/$row[p_i1]' class='card-img-top img' >
                                          <div class='card-body'>
                                            <h5 class='card-title'>$row[p_name]</h5>
                                            <p class='card-text'>$row[p_des]</p>
                                            <p class='card-text'>Price:$row[p_price]</p>
                                            <a href='index.php?addcart=$row[p_id]' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?p_id=$row[p_id]' class='btn btn-secondary'>View more</a>
                                          </div>
                            </div>
                          </div> 
                          <div class='col-md-8'>
                          <!-- Related images -->
                          <div class='row'>
                              <div class='col-md-12 mb-5'>
                                  <h3 class='text-center text-info'>Related products</h3>
                              </div>
                              <div class='col-md-6'>
                                 <img src='./admin_area/p_images/$row[p_i2]' alt='second img'>
                              </div>
                              <div class='col-md-6'>
                              <img src='./admin_area/p_images/$row[p_i3]' alt='second img'>
  
                              </div>
                          </div>
                      </div>";
    }
  }
}

//searching products
function searching_product()
{
  global $conn;
 
   if(isset($_GET["search_data_product"])) {
   $select = "select * from products where p_keyword like '%$_GET[search_data]%' "; //after choosing brand
  $result = mysqli_query($conn, $select);
  $num = mysqli_num_rows($result);
  
  if ($num == 0) {
    echo "<h1 class='text-center text-danger'>No stock is available for this choice</h1>";
  } else {
    while ($row = mysqli_fetch_array($result)) {
      echo " <div class='col-md-4 mb-2 p-1'>
                            <div class='card ' style='width: 350px; height:400px;'>
                                          <img src='./admin_area/p_images/$row[p_i1]' class='card-img-top img' >
                                          <div class='card-body'>
                                            <h5 class='card-title'>$row[p_name]</h5>
                                            <p class='card-text'>$row[p_des]</p>
                                            <p class='card-text'>Price:$row[p_price]</p>
                                            <a href='index.php?addcart=$row[p_id]' class='btn btn-info'>Add to cart</a>
                                            <a href='product_details.php?p_id=$row[p_id]' class='btn btn-secondary'>View more</a>
                                          </div>
                            </div>
                          </div> ";
    }
  }
}
}

//get ip address function
  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//add to cart
function add_to_cart()
{
  global $conn;
  if(isset($_GET['addcart']))
   {
     $ip = getIPAddress();  
      
        $select = "select * from cards  where p_id=$_GET[addcart] and ip_adr='$ip'"; //after choosing brand
        $result = mysqli_query($conn, $select);
        $num = mysqli_num_rows($result);
     
       if ($num > 0) {
          echo "<script>alert('This item is already present inside cart')</script>";
          echo"<script>window.open('index.php','_self')</script>";
          } 
      else {
             $insert_q="insert into cards (p_id,ip_adr,quantity) values ($_GET[addcart],'$ip',1)";
             $result = mysqli_query($conn, $insert_q);
             echo "<script>alert('This item added to the cart
             ')</script>";
             echo"<script>window.open('index.php','_self')</script>";
           }
        }
    }

    //function to calculate the number of items present in the cart
    function cart_item_num()
    {
      global $conn;
      
        $ip = getIPAddress();  
        $insert_q="select * from cards where ip_adr='$ip'";
        $result = mysqli_query($conn, $insert_q);
        $num_of_item = mysqli_num_rows($result);
       echo $num_of_item;
       return $num_of_item;
    }
   // cart_price
    function cart_price(){
      global $conn;
      $ip = getIPAddress();  
      $select_q="select * from cards where ip_adr='$ip'";
      $result = mysqli_query($conn, $select_q);
      $total=0;
      while ($row = mysqli_fetch_array($result)) 
          {
            $select_q2="select * from products where p_id=$row[p_id]";
           
            $result2 = mysqli_query($conn, $select_q2);
            $row1=mysqli_fetch_row($result2);

            $total=$row1[8]*$row[2]+$total;
          
          }
      echo $total;
    }
    
    //to display the items in cart
    function registration_details()
    {
      global $conn;
      $ip=getIPAddress();
      if(isset($_POST['submit'])){
              $username=$_POST["u_name"];
              $email=$_POST["u_email"];
              $password=$_POST['u_psd'];
              $hash_password=password_hash($password, PASSWORD_DEFAULT);
              $cpassword=$_POST['u_cpsd'];
              $u_adr=$_POST['u_adr'];
              $u_contact=$_POST['u_contact'];
              $u_img=$_FILES['u_img']['name'];
              $temp_image1=$_FILES['u_img']['tmp_name'];
             
              
                if($username=='' and $email== '' and $password== '' and $cpassword=='' and $u_adr== '' and $u_img== ''){
                     echo"<h1>please fill all the fields</h1>";
                      exit();
                  }
                else{
                 
                   $select="select * from users where u_name='$username' or u_email='$email'";
                   $result=mysqli_query($conn,$select);  
                   $r_num=mysqli_num_rows($result);
                   if($r_num>0){
                    echo" <script>alert('username already present ');</script>";
                    exit();
                   }
                   if($password!=$cpassword){
                    echo" <script>alert('Verification of password is unsuccessful ');</script>";
                    exit();
                   }
                  move_uploaded_file($temp_image1,"./images/$u_img");
                  $insert_q="insert into users (u_name,u_email,u_img,u_password,u_ip,u_adr,u_phone) values('$username','$email','$u_img','$hash_password','$ip','$u_adr','$u_contact')";	
                  $result=mysqli_query($conn, $insert_q);
                  if($result){
                   
                    echo" <script>alert('account created successfully');
                      window.open('checkout.php','_self')</script>";
                 }
         }
        }
   

  
  }


  //verification of the username and password 
  function verify_u_pass(){
    global $conn;
    $ip=getIPAddress();
    if(isset($_POST["login"])){
    $username=$_POST["u_name"];
    $password=$_POST["u_psd"];
     $select_q="select * from users where u_name='$username'";
     $result=mysqli_query($conn, $select_q);
     $row_num=mysqli_num_rows($result);
     $_SESSION['username']= $username;
     if($row_num==0){
       echo"<script>alert('wrong username  ')</script>";
     }
     else{
      $row=mysqli_fetch_row($result);
     
       //selecting cart items
       if(password_verify($password,$row[4])){
    $select_cart_items="select * from cards where ip_adr='$ip'";
    $result=mysqli_query($conn, $select_cart_items);
    $r_num=mysqli_num_rows($result);
    
    if($r_num> 0){
    
      echo" <script>alert('you have some items in cart');
      window.open('./checkout.php','_self');</script>";
    }else{
      echo" <script>
      window.open('./profile.php','_self')</script>";
    }
    
  }
    else{
      echo" <script>alert('Wrong password')</script>";
      
    }
  

     }
  }

}
?>

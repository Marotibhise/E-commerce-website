<?php 
   include("../includes/connect.php");
   include("../functions/commonfunction.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div class="container-fluid my-2 w-50  p-3">
            <h2 class="text-center">
            This is  registration page
            </h2>
            <div class="row">
                <div class="col-lg-12  ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="form-outline form my-4 ">
                            <label for="u_name" class='form-label'>Username</label>
                            <input type="text" id='u_name' name='u_name'class='form-control' autocomplete="off" required placeholder="Enter username">
                        </div>

                        <!-- email field -->
                        <div class="form-outline form my-4">
                            <label for="u_email" class='form-label'>email</label>
                            <input type="email" id='u_email' name='u_email'class='form-control' autocomplete="off" required placeholder="Enter email">
                        </div>
                        
                        <!-- Image field -->
                        <div class="form-outline form my-4">
                            <label for="u_img" class='form-label'>Image</label>
                            <input type="file" id='u_img' name='u_img'class='form-control'  required >
                        </div>
                        <!-- password field -->
                        <div class="form-outline form my-4">
                            <label for="u_psd" class='form-label'>password</label>
                            <input type="password" id='u_psd' name='u_psd'class='form-control' autocomplete="off" required  placeholder="Enter password">
                        </div>
                        <!-- password field -->
                        <div class="form-outline form my-4">
                            <label for="u_cpsd" class='form-label'>Confrom password password</label>
                            <input type="password" id='u_cpsd' name='u_cpsd'class='form-control' autocomplete="off" required  placeholder="Confrom password">
                        </div>
                        <!-- Address field -->
                        <div class="form-outline form my-4">
                            <label for="u_adr" class='form-label'>Address</label>
                            <input type="text" id='u_adr' name='u_adr'class='form-control' autocomplete="off" required placeholder="Enter Address">
                        </div>
                         <!-- Contact field -->
                         <div class="form-outline form my-4">
                            <label for="u_contact" class='form-label'>Phone number</label>
                            <input type="text" id='u_contact' name='u_contact'class='form-control' autocomplete="off" required placeholder="Enter phone number">
                        </div>
                        <div class="text-center">
                            <input type="submit" name='submit' class='btn btn-success p-x3 mx-5' value='save'>
                            <input type="reset" name='reset' class='btn btn-info w-6 px-3'>
                        </div>
                        <div class='p-2'>
                            <strong>Already have an account <a href="./checkout.php" class='mx-2 text-danger '>Login</a></strong>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

 <!--php code  -->
<?php 
registration_details();
?>

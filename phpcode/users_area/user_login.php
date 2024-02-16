<?php
//   include("../includes/connect.php");
//   include("../functions/commonfunction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div class="container-fluid  w-50  ">
            <h2 class="text-center">
            This is  Login page
            </h2>
            <div class="row">
                <div class="col-lg-12 ">
                    <form action="" method="post">
                        <!-- username field -->
                        <div class="form-outline form my-4 ">
                            <label for="u_name" class='form-label'>Username</label>
                            <input type="text" id='u_name' name='u_name'class='form-control' autocomplete="off" required placeholder="Enter username">
                        </div>

                        <!-- password field -->
                        <div class="form-outline form my-4">
                            <label for="u_psd" class='form-label'>password</label>
                            <input type="password" id='u_psd' name='u_psd'class='form-control' autocomplete="off" required  placeholder="Enter password">
                        </div>
                        <div class="form-outline form my-4">
                        <a href="./user_registration.php" class='text-info mx-3'>Password forgotten</a>
                    </div>
                        
                        <div >
                            <input type="submit" name='login' class='btn btn-success p-x3 ' value='Login'>
                         
                        </div>
                        <div class='p-2'>
                            <strong>Dont have an account <a href="./user_registration.php" class='mx-2 text-danger '>Register</a></strong>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
  verify_u_pass();
?>
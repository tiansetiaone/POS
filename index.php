<?php
session_start();
error_reporting(0);
if($_SESSION){
    if($_SESSION['level']=="Administrator")
    {
        header("Location: dashboard.php");
    }
    if($_SESSION['level']=="Konsumen")
    {
        header("Location: dashboard.php");
    }
} 
?>
<?php

$error=''; 
error_reporting(0);

include('konfig.php');
if(isset($_POST['submit']))
{               
    $email   = $_POST['email'];
    $password   = md5($_POST['password']);    
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Email or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['email']=$row['email'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "Administrator")
        {
            header("Location: dashboard.php");
        }
        else if($row['level'] =="Konsumen")
        {
            header("Location: konsumen.php");
        }
        else 
        {
            $error = "Gagal Login";
        }
    }
}           
?>
<?php 

// include 'konfig.php';

// error_reporting(0);

// session_start();

// if (isset($_POST['submit'])) {
//  $username = $_POST['username'];
//  $password = md5($_POST['password']);

//  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
//  $result = mysqli_query($conn, $sql);
//  if(mysqli_num_rows($query) == 0)
//     {
//         $error = "Username or Password is invalid";
//     }
//     else
//     {
//         $row = mysqli_fetch_assoc($query);
//         $_SESSION['username']=$row['username'];
//         $_SESSION['level'] = $row['level'];
        
//         if($row['level'] == "Administrator")
//         {
//             header("Location: admin.php");
//         }
//         else if($row['level'] =="QC")
//         {
//             header("Location: qc.php");
//         }
//         else 
//         {
//             $error = "Gagal Login";
//         }
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NCI | LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Icon -->
  <link href='img/nuansa.png' rel='shortcut icon'>

  <style>
    body {
      background-image : url("https://venture-lab.org/wp-content/uploads/2019/12/Best-POS-point-of-sale-software-1400x752.png");
      background-size: cover;
    }
  </style>
</head>
<?php

// function get_brand(){
// 	// Build up DB connection including cofiguration file
// 	require ("konfig.php");
// 	//Assign an empty variable to store the fetched items
// 	$output = '';
// 	//SQL query to fetch the phone brands to the input field
// 	$sql = "SELECT * FROM user ORDER BY username";
// 	// execution of the query. Output a boolean value
// 	$res = mysqli_query($conn , $sql);
// 	// Check whether there are results or not
// 	if(mysqli_num_rows($res)>0){
// 		while ($row = mysqli_fetch_array($res)) {
// 			//Concatenate fetched items to the output variable with HTML option tags to display
// 			$output .= $row["username"];
// 		}
// 	}
// 	//return the output results to be displayed
// 	return $output;

// }

?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>USER</b>LOGIN</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" onkeyup="isi_otomatis()" value="<?php echo $email; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="form-password" value="<?php echo $_POST['password']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Level" name="level" id="level" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
      </div>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- <script type="text/javascript">
	// start jQuery function to load the content of all functions after the page is loaded completely
	$(document).ready(function(){
		//jQuery function to get the value changed in the input field
		$('#form-username').change(function(){
			//Store the selected input value in brand_id variable
			var username = $(this).val();
			// start Ajax call to get the models belongs to a particular brand_id
			$.ajax({
				url: "fetch_model4.php",		//Path for PHP file to fetch phone models from DB
				method: "POST",				//Fetching method
				data: {username:username},	//Data send to the server to get the results
				success:function(data)		//If data fetched successfully from the server, execute this function
				{
					// console.log(data);
					$('#level').html(data);	//Print the fetched models in the section wih ID - #item
				}
			});
			// end Ajax call to get the suggestions
		});
	});
</script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var email = $("#email").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"email="+email ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#level').val(obj.level);
                });
            }
        </script>
</body>
</html>

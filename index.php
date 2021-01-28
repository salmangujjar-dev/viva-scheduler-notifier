<?php
session_start();
if(count($_POST)>0) {
	include 'connection.php';
	$conn=openConn();
	
    $result = mysqli_query($conn,"SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
    $row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["username"] = $row['username'];
	$_SESSION["student"] = "";
	$_SESSION["supervisor"] = "";
	}
	
	$result = mysqli_query($conn,"SELECT * FROM students WHERE email='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["student"] = $row['email'];
	$_SESSION["supervisor"] = "";
	$_SESSION["username"] = "";
	$_SESSION["id"]= $row['stu_id'];
	}
		
	$result = mysqli_query($conn,"SELECT * FROM supervisors WHERE email='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["supervisor"] = $row['email'];
	$_SESSION["student"] = "";
	$_SESSION["username"] = "";
	$_SESSION["id"]= $row['sup_id'];
	}
}
if(isset($_SESSION["username"]))
{
	$username = $_SESSION["username"];
	setcookie('cookie1', $username, time() + (86400 * 30), "/");
	header("Location:.\main.php");
}
elseif(isset($_SESSION["student"])){
	$username = $_SESSION["student"];
	setcookie('cookie1', $username, time() + (86400 * 30), "/");
	header("Location:.\main.php");
}
elseif(isset($_SESSION["supervisor"])){
	$username = $_SESSION["supervisor"];
	setcookie('cookie1', $username, time() + (86400 * 30), "/");
	header("Location:.\main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href=".\assets\index.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h1>Sign In</h1><br>
				<h1 style='font-size:15px;'><u>github.com/salmangujjar</u></h1>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form name="myform" method="post" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="username" name="username" class="form-control" placeholder="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" required>
					</div>
                    <br>
					<div class="form-group">
						<input type="submit" value="Login" class="btn login_btn btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php
session_start();
if ($_SESSION['username']!=""){
    echo "<style>.option4,.option5,.option6,.option7{display:none}</style>";
}
if ($_SESSION['supervisor']!=""){
    echo "<style>.option1,.option3,.option4,.option7{display:none}</style>";
    $id = $_SESSION['id'];
}
if ($_SESSION['student']!=""){
    echo "<style>.option1,.option2,.option3,.option5,.option6{display:none}</style>";
    $id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Menu</title>
    
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
	<!--Custom styles-->
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href=".\assets\main.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<div class="container">

	<div class="d-flex justify-content-center h-100">
                <div class="d-flex justify-content-end exit_icon">
                <a href="logout.php"><span><i class="bi bi-box-arrow-left"></i></span></a>
				</div>
		<div class="card">
			<div class="card-header">
            
				<h1>Main Menu</h1>
            </div>
            <br>
			<div class="card-body">
                <div class=option1>
            <div class="form-group">
                <p class="text-center"><a href="supervisors.php" class="btn login_btn btn-block">Manage Supervisors</p></a>
            </div>
</div>

<div class=option6>
            <div class="form-group">
                <p class="text-center"><a href="viva.php?id=<?php echo $id ?>" class="btn login_btn btn-block">Manage Viva</p></a>
            </div>
</div>
            <div class=option2>
            <div class="form-group">
                <p class="text-center"><a href="students.php" class="btn login_btn btn-block">Manage Students</p></a>
            </div>
</div>
<div class=option3>
            <div class="form-group">
                <p class="text-center"><a href="groups.php" class="btn login_btn btn-block">Make Groups</p></a>
            </div>
</div>


<div class=option7>
            <div class="form-group">
                <p class="text-center"><a href="view_date.php" class="btn login_btn btn-block">View Viva Date</p></a>
            </div>
</div>
            <div class=option4>
            <div class="form-group">
                <p class="text-center"><a href="update_stu.php?id=<?php echo $id; ?>" class="btn login_btn btn-block">Edit Profile</p></a>
            </div>
</div>
<div class=option5>
            <div class="form-group">
                <p class="text-center"><a href="update_sup.php?id=<?php echo $id; ?>" class="btn login_btn btn-block">Edit Profile</p></a>
            </div>
</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
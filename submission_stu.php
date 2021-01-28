<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<html>
    <head>
        <title>Success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link href=".\assets\add_sup.css" rel="stylesheet" id="bootstrap-css">
        <meta http-equiv="refresh" content="3;url=index.php"/>
    </head>
<body>
<div class="container">
      <div class="row">
			<div class="col-md-5 mx-auto">
				   <div class="myform form ">
					   <div class="logo mb-3">
						   <div class="col-md-12 text-center">
                           <?php
                                $na=$_POST["name"];
                                $ge=$_POST["gender"];
                                $ag=$_POST["age"];
                                $de=$_POST["dept"];
                                $do=$_POST["dob"];
                                $em=$_POST["email"];
                                $pa=$_POST["password"];
                                $lo=$_POST["location"];
                                include 'connection.php';
                                $conn=openConn();
                                $table="students";
                            $query="INSERT INTO $table (name,gender,age,dept,dob,email,password,location,status) VALUES ('$na','$ge',$ag,'$de','$do','$em','$pa','$lo',0)";
                                if ($conn->query($query)===TRUE){
                                    echo "<h1>Successfully Executed..</h1><br/>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";
                                }
                                else{
                                    echo "<h1>Not Successfully Executed..</h1><br/>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";
                                }
                                closeConn($conn);
                            ?>
						   </div>
					   </div>
				</div>
			</div>
		</div>
   </div>   
</body>
</html>
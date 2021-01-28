<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
if ($_SESSION['supervisor']){
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
                                $na1=$_POST["std1"];
                                $na2=$_POST["std2"];
                                $su=$_POST["supervisor"];
                                $fy=$_POST["fyp_title"];
                                $st=$_POST["study_center"];
                                include 'connection.php';
                                $conn=openConn();
                                
                                $query="Update students set status=1 where stu_id=$na1";
                                $conn->query($query);
                                
                                $query="Update students set status=1 where stu_id=$na2";
                                $conn->query($query);
                                
                                
                                
                                $table="groups";
                            $query="INSERT INTO $table (std1_id,std2_id,supervised_by,fyp_title,study_center) VALUES ($na1,$na2,$su,'$fy','$st')";
                                if ($conn->query($query)===TRUE){
                                    echo "<h1>Successfully Executed..</h1><br/>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";
                                }
                                else{
                                    echo "<h1>Not Successfully Executed..</h1><br/>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";
                                    echo $query;
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
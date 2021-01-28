<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
else if ($_SESSION['username']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
else if ($_SESSION['supervisor']){
   
}
else{
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href=".\assets\add_sup.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  	</head>
<body>
    <div class="container">
      <div class="row">
			<div class="col-md-5 mx-auto">
				   <div class="myform form ">
					   <div class="logo mb-3">
						   <div class="col-md-12 text-center">
                               <h1>Schedule</h1>
                               <hr>
						   </div>
						   
                               <h1 style='text-align:center;font-size:20px;' id='message'></h1>
                  </div>
                  <?php
                  include 'connection.php';
                  $conn=openConn();
                  $id=$_GET['id'];
                  $query="Select * from groups where group_id=$id";
                                $result5=$conn->query($query);
                                if ($result5->num_rows>0){
                                    while($rows5=$result5->fetch_assoc()){
                                        $counti=$rows5['schedule_count'];
                                    }
                                }
                                $counti++;
                                if ($counti<3){
                                    $check=0;
                                }
                                else{
                                    $check=1;
                                }
                                if ($check==1){
                                     echo "<script>document.getElementById('message').innerHTML='Cannot Schedule more than 2 times.';window.stop();</script>";
                                }
                  ?>
                  <form action="update_group.php?id=<?php echo $id ?>" method="post" name="details" id="details">
                           <h1 style="font-size:20px;text-align:center"><u>Automatically Selected Viva Location</u></h1><br>
<?php

$loc=$_GET['stdcen'];

$query="Select * from location where name='$loc'";
$result=$conn->query($query);
if ($result->num_rows>0){
   while($rows=$result->fetch_assoc()){
      $lon=$rows['longitude'];
      $lat=$rows['latitude'];
  }
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    }else {
      return $miles;
    }
  }
}
$min=999999;
$viva_location="";
$query="Select * from campus where name!='$loc'";
$result=$conn->query($query);
if ($result->num_rows>0){
   while($rows=$result->fetch_assoc()){
      $lon1=$rows['longitude'];
      $lat1=$rows['latitude'];
      $new=distance($lat, $lon, $lat1, $lon1, "K");
      if ($new<$min){
         $min=$new;
         $viva_location=$rows['name'];
      }
  }
}
echo "The Shortest Distance will be $min Kilometers.<br> Hence, The Viva Location will be <u>$viva_location</u>
<br><u>Supervisor</u> can change Default Location.";
?>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                           </div>
                           <select name="viva_loc" id="viva_loc" class="form-control" required>
                                 <option value="" disabled selected>Select Your Campus</option>
                                 <option value="Faisalabad" <?php if($viva_location=='Faisalabad'){echo 'selected';}?>>Faisalabad</option>
                                 <option value="Islamabad" <?php if($viva_location=='Islamabad'){echo 'selected';}?>>Islamabad</option>
                                 <option value="Karachi" <?php if($viva_location=='Karachi'){echo 'selected';}?>>Karachi</option>
                                 <option value="Lahore" <?php if($viva_location=='Lahore'){echo 'selected';}?>>Lahore</option>
                                 <option value="Peshawar" <?php if($viva_location=='Peshawar'){echo 'selected';}?>>Peshawar</option>
                           </select>   
                        </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                           </div>
                           <input type="datetime-local" name="viva_date" class="form-control" id="viva_date" placeholder="Viva Date" required="required">
                           </div>

<?php

                                $_SESSION['std1id']=$_GET['std1'];
                                
                                $_SESSION['std2id']=$_GET['std2'];
                               
                                $_SESSION['supid']=$_GET['sup1'];
                                
?>
                           <div class="col-md-13 text-center">
                              <div class="col-md-13 text-center mb-3">
                                 <button type="submit" name="insert" id="insert" class="btn login_btn btn-block">Update & Notify</button>
                              </div>
                           </div>
                     </form>
				   </div>
			</div>
		</div>
   </div>   
</body>
</html> 
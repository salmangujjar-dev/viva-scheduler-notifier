<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student</title>
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
                               <h1>Add Student</h1>
                               <hr>
						   </div>
                  </div>
                  <form action="submission_stu.php" method="post" name="details" id="details">
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required="required">
                           </div>

                           <div class="form-group">
                              <label>Gender: </label>
                              <label>
    <input type="radio" name="gender" value="male" required>
    Male
  </label>
  <label>
    <input type="radio" name="gender" value="female">
    Female
  </label>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-sort-numeric-down"></i></span>
						    </div>
                              <?php
                                echo "<select name='age' id='age' class='form-control' required>
                                <option value='' disabled selected>Select Your Age</option>";
                                for($var=1;$var<100;$var++){
                                    echo "<option value='$var'>$var</option>";
                                }
                                echo "</select>";
                              ?>
                           </div>

                           <div class="form-group">
                              <label>Department: </label>
                              <label for="cs">
                              <input type="radio" id="cs" name="dept" value="cs" required>
                              CS</label>
                              <label for="ee">
                              <input type="radio" id="ee" name="dept" value="ee">
                              EE</label>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-calendar4"></i></span>
						    </div>
                              <input type="date" name="dob" id="dob" class="form-control" required>
                           </div>

                           <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-envelope"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Enter Email" required="required">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
                    </div>
                    
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            </div>
                            <select name="location" id="location" class="form-control" required>
                                <option value="" disabled selected>Select Your Location</option>
                                <option value="Badin">Badin</option>
                                <option value="Chiniot">Chiniot</option>
                                <option value="Chishtian">Chishtian</option>
                                <option value="Dipalpur">Dipalpur</option>
                                <option value="Faisalabad">Faisalabad</option>
                                <option value="Gujranwala">Gujranwala</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Karachi">Karachi</option>
                                <option value="Kashmore">Kashmore</option>
                                <option value="Khairpur">Khairpur</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Mian Channu">Mian Channu</option>
                                <option value="Peshawar">Peshawar</option>
                                <option value="Quetta">Quetta</option>
                                <option value="Sahiwal">Sahiwal</option>
                                <option value="Sialkot">Sialkot</option>
                                <option value="Sukkur">Sukkur</option>
                                <option value="Wazirabad">Wazirabad</option>
                            </select>
                           </div>

                           <div class="col-md-13 text-center">
                              <div class="col-md-13 text-center mb-3">
                                 <button type="submit" name="insert" id="insert" class="btn login_btn btn-block">Insert</button>
                              </div>
                           </div>
                     </form>
				   </div>
			</div>
		</div>
   </div>   
</body>
</html> 
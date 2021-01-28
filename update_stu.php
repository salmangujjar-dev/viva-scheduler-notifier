<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src=".\assets\script.js" defer=""></script>
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
                               <h1>Update</h1>
                               <hr>
						   </div>
                  </div>
                  <?php
                  include 'connection.php';
                  $conn=openConn();
                  $table="students";
                  $id=$_GET["id"];
                  $query="Select * from $table where stu_id=$id";
                  $result=$conn->query($query);
                  if ($result->num_rows>0)
                    $row = $result -> fetch_row();
                  ?>
                  <form action="update2_stu.php?id=<?php echo $row[0]; ?>"  method="post" name="details" id="details">
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                              <input type="text" name="name" class="form-control" id="name" value="<?php echo $row[1]; ?>" placeholder="Enter Name">
                           </div>

                           <div class="form-group">
                              <label>Gender: </label>
                              <input type="radio" id="male" name="gender" value="male" <?php if ($row[2]=='male'){echo "checked";} ?>>
                              <label for="male">Male</label>
                              <input type="radio" id="female" name="gender" value="female" <?php if ($row[2]=='female'){echo "checked";} ?>>
                              <label for="female">Female</label>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-sort-numeric-down"></i></span>
						    </div>
                              <?php
                                echo "<select name='age' id='age' class='form-control' required>";
                                for($var=1;$var<100;$var++){
                                   if ($row[3]==$var){
                                    echo "<option value='$var' selected>$var</option>";}
                                    else{
                                    echo "<option value='$var'>$var</option>";}
                                }
                                echo "</select>";
                              ?>
                           </div>

                           <div class="form-group">
                              <label>Department: </label>
                              <input type="radio" id="cs" name="dept" value="cs" <?php if ($row[7]=='cs'){echo "checked";} ?>>
                              <label for="male">CS</label>
                              <input type="radio" id="ee" name="dept" value="ee" <?php if ($row[7]=='ee'){echo "checked";} ?>>
                              <label for="female">EE</label>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-calendar4"></i></span>
						    </div>
                              <input type="date" name="dob" id="dob" value="<?php echo $row[4]; ?>" class="form-control">
                           </div>

                           <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="bi bi-envelope"></i></span>
						</div>
						<input type="text" name="email" value="<?php echo $row[5]; ?>"class="form-control" placeholder="Enter Email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" value="<?php echo $row[6]; ?>" class="form-control" placeholder="Enter Password">
                    </div>
                    
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            </div>
                            <select name="location" id="location" class="form-control" required>
                                <option value="" disabled selected>Select Your Location</option>
                                <option value="Badin" <?php if ($row[8]=="Badin"){ echo "selected"; } ?>>Badin</option>
                                <option value="Chiniot" <?php if ($row[8]=="Chiniot"){ echo "selected"; } ?>>Chiniot</option>
                                <option value="Chishtian" <?php if ($row[8]=="Chishtian"){ echo "selected"; } ?>>Chishtian</option>
                                <option value="Dipalpur" <?php if ($row[8]=="Dipalpur"){ echo "selected"; } ?>>Dipalpur</option>
                                <option value="Faisalabad" <?php if ($row[8]=="Faisalabad"){ echo "selected"; } ?>>Faisalabad</option>
                                <option value="Gujranwala" <?php if ($row[8]=="Gujranwala"){ echo "selected"; } ?>>Gujranwala</option>
                                <option value="Gujrat" <?php if ($row[8]=="Gujrat"){ echo "selected"; } ?>>Gujrat</option>
                                <option value="Hyderabad" <?php if ($row[8]=="Hyderabad"){ echo "selected"; } ?>>Hyderabad</option>
                                <option value="Islamabad" <?php if ($row[8]=="Islamabad"){ echo "selected"; } ?>>Islamabad</option>
                                <option value="Karachi" <?php if ($row[8]=="Karachi"){ echo "selected"; } ?>>Karachi</option>
                                <option value="Kashmore" <?php if ($row[8]=="Kashmore"){ echo "selected"; } ?>>Kashmore</option>
                                <option value="Khairpur" <?php if ($row[8]=="Khairpur"){ echo "selected"; } ?>>Khairpur</option>
                                <option value="Lahore" <?php if ($row[8]=="Lahore"){ echo "selected"; } ?>>Lahore</option>
                                <option value="Mian Channu" <?php if ($row[8]=="Mian Channu"){ echo "selected"; } ?>>Mian Channu</option>
                                <option value="Peshawar" <?php if ($row[8]=="Peshawar"){ echo "selected"; } ?>>Peshawar</option>
                                <option value="Quetta" <?php if ($row[8]=="Quetta"){ echo "selected"; } ?>>Quetta</option>
                                <option value="Sahiwal" <?php if ($row[8]=="Sahiwal"){ echo "selected"; } ?>>Sahiwal</option>
                                <option value="Sialkot" <?php if ($row[8]=="Sialkot"){ echo "selected"; } ?>>Sialkot</option>
                                <option value="Sukkur" <?php if ($row[8]=="Sukkur"){ echo "selected"; } ?>>Sukkur</option>
                                <option value="Wazirabad" <?php if ($row[8]=="Wazirabad"){ echo "selected"; } ?>>Wazirabad</option>
                            </select>
                           </div>

                           <div class="col-md-13 text-center">
                              <div class="col-md-13 text-center mb-3">
                                 <button type="submit" name="insert" id="insert" class="btn login_btn btn-block">Update</button>
                              </div>
                           </div>
                     </form>
				   </div>
			</div>
		</div>
   </div>   
</body>
</html> 
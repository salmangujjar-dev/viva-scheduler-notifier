<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
if ($_SESSION['supervisor']){
   echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Group</title>
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
                               <h1>Add Group</h1>
                               <hr>
						   </div>
                  </div>
                  <?php
                  include 'connection.php';
                  $conn=openConn();
                  $id1=$_GET['student1'];
                  $id2=$_GET['student2'];
                  $query="Select * from students where stu_id=$id1";
                  $result=$conn->query($query);
                  if ($result->num_rows>0){
                     while($rows=$result->fetch_assoc()){
                        $name1=$rows['name'];
                     }
                  }
                  $query="Select * from students where stu_id=$id2";
                  $result=$conn->query($query);
                  if ($result->num_rows>0){
                     while($rows=$result->fetch_assoc()){
                        $name2=$rows['name'];
                     }
                  }
                  ?>
                  <form action="submission_group.php" method="post" name="details" id="details">
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="hidden" name="std1" id="std1" value=<?php echo $_GET['student1'] ?>>
                              <input type="text" name="name1" class="form-control" id="name1" value="<?php echo $name1; ?>" placeholder="Student 1 Name" required="required" disabled>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  
                  <input type="hidden" name="std2" id="std2" value=<?php echo $_GET['student2'] ?>>
                              <input type="text" name="name2" class="form-control" id="name2" value="<?php echo $name2; ?>" placeholder="Student 2 Name" required="required" disabled>
                           </div>

                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <select name="supervisor" id="supervisor" class="form-control" required>
                  <option value="" disabled selected>Select A Supervisor</option>
                     <?php
                        $query="Select * from supervisors";
                        $result=$conn->query($query);
                        if ($result->num_rows>0){
                           while($rows=$result->fetch_assoc()){
                              echo "<option value=$rows[sup_id]>$rows[name]</option>";
                           }
                        }
                     ?>
                  </select>
                           </div>
                           
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                              <input type="text" name="fyp_title" class="form-control" id="fyp_title"  placeholder="Enter FYP Title" required="required">
                           </div>
                    
                           <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            </div>
                            <select name="study_center" id="study_center" class="form-control" required>
                                <option value="" disabled selected>Select Your Study Center</option>
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
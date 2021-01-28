<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
if ($_SESSION['username']){
   echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Marks</title>
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
                               <h1>Update Marks</h1>
                               <hr>
						   </div>
                  </div>
                  <div id=full>
                      
                </div>
                  <?php
                  include 'connection.php';
                  $conn=openConn();
                  $id=$_GET['id'];
                  
                    if (isset($_POST['insert'])) {
                    $spp=$_POST['marks'];
                    $query="Update groups set marks=$spp where group_id=$id";
                        if($conn->query($query)){
                            echo "<script>$('#full').html('<h1 style=text-align:center;>Successfully Updated.</h1>');
                            setTimeout(function(){
            window.location.href = 'main.php';
         }, 3000);
         window.stop();</script>";
                        }
                    }
                ?>
                  
                <form action="" method="post" name="details" id="details">
                    
                             <div class="input-group form-group">
                           <div class="input-group-prepend">
                           <span class="input-group-text"><i class="bi bi-sort-numeric-down"></i></span>
                           </div>
                           <?php
                                echo "<select name='marks' id='marks' class='form-control' readonly>
                                <option value='' selected>Select Marks (After Viva)</option>";
                                for($var=1;$var<=10;$var++){
                                    echo "<option value=$var>$var</option>";
                                }
                                echo "</select>";
                              ?>
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
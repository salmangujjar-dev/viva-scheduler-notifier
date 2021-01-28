<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>
<script>
function goBack() {
  window.history.back();
}
</script>

<!DOCTYPE html>
<head>
	<title>Mangage Students</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href=".\assets\stu.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        	<div class="d-flex justify-content-center h-100">
                <div class="d-flex justify-content-end exit_icon">
                <span><i class="bi bi-box-arrow-left" onclick="goBack()" title="Back"></i></span>
				</div>
				<div class="limiter">
        
		<div class="container-table100">
			<div class="wrap-table100">
            <div class="col-md-12 text-center">
            <h1>Students</h1>
            <div class="d-flex justify-content-end social_icon">
                        <a href="add_stu.php"><span><i class="bi bi-plus-square" title="Add a Student"></i></span></a>
                </div>
            <hr>
            </div>
		<div class="table100">
                        <?php
                                include 'connection.php';
                                $conn=openConn();
                                $table="students";
                                if ($_SESSION['supervisor']!=""){
                                    $i=1;
                                    $id=$_SESSION['id'];
                                    $query="select * from groups where supervised_by=$id";
                                    $result1=$conn->query($query);
                                    if ($result1->num_rows>0) {
                                                echo "<table><thead>
                                                <tr class='table100-head'>
                                                <th class='column1'>ID</th>
                                                <th class='column2'>Name</th>
                                                <th class='column3'>Gender</th>
                                                <th class='column4'>Age</th>
                                                <th class='column5'>DOB</th>
                                                <th class='column6'>Email</th>
                                                <th class='column6'>Password</th>
                                                <th class='column6'>Department</th>
                                                <th class='column6'>Location</th>
                                                <th class='column7'>Manage</th>
                                                </tr>
                                                </thead>";
                                                while ($row = $result1 -> fetch_assoc()) {
                                                  $var1=$row['std1_id'];
                                                  $var2=$row['std2_id'];
                                                  
                                                  $query="Select * from students where stu_id=$var1";
                                                  $result=$conn->query($query);
                                                        if ($result->num_rows>0){
                                                            echo "<tbody><tr><td><b>Group $i</b></td></tr></tbody><hr>";
                                                            $i++;
                                                            while($rows=$result->fetch_assoc()){
                                                                echo "<tbody><tr>
                                                                <td class='column1'>$rows[stu_id]</td>
                                                                <td class='column2'>$rows[name]</td>
                                                                <td class='column3'>$rows[gender]</td>
                                                                <td class='column4'>$rows[age]</td>
                                                                <td class='column5'>$rows[dob]</td>
                                                                <td class='column5'>$rows[email]</td>
                                                                <td class='column5'>$rows[password]</td>
                                                                <td class='column5'>$rows[dept]</td>
                                                                <td class='column5'>$rows[location]</td>
                                                                <td ckass='column7'>
                                                                <div class='d-flex justify-content-center icons'>
                                                                <span><a href='update_stu.php?id=$rows[stu_id]'><i class='bi bi-pencil-square'></i></a></span>
                                                                <span><a href='delete_stu.php?id=$rows[stu_id]'><i class='bi bi-dash-square'></i></a></span>
                                                                </div>
                                                            </td>
                                                                </tr></tbody>";
                                                            }
                                                            $query="Select * from students where stu_id=$var2";
                                                            $result2=$conn->query($query);
                                                            if ($result2->num_rows>0){
                                                                while($rows=$result2->fetch_assoc()){
                                                                    echo "<tbody><tr>
                                                                    <td class='column1'>$rows[stu_id]</td>
                                                                    <td class='column2'>$rows[name]</td>
                                                                    <td class='column3'>$rows[gender]</td>
                                                                    <td class='column4'>$rows[age]</td>
                                                                    <td class='column5'>$rows[dob]</td>
                                                                    <td class='column5'>$rows[email]</td>
                                                                    <td class='column5'>$rows[password]</td>
                                                                    <td class='column5'>$rows[dept]</td>
                                                                    <td class='column5'>$rows[location]</td>
                                                                    <td ckass='column7'>
                                                                    <div class='d-flex justify-content-center icons'>
                                                                    <span><a href='update_stu.php?id=$rows[stu_id]' title='Edit'><i class='bi bi-pencil-square'></i></a></span>
                                                                    <span><a href='delete_stu.php?id=$rows[stu_id]' title='Delete'><i class='bi bi-dash-square'></i></a></span>
                                                                    </div>
                                                                </td>
                                                                    </tr></tbody>";
                                                                }
                                                        }
                                                        
                                                    }
                                                    else{
                                                        echo "<center><h1>No Record Found.<br><h1></center>";
                                                    }
                                                }
                                                echo "</table>";
                                    }
                                    else{
                                        echo "<center><h1>No Record Found.<br><h1></center>";
                                    }
                                }
                                else if($_SESSION['username']){
                                    $query="Select * from students";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    echo "<table><thead>
                                    <tr class='table100-head'>
                                    <th class='column1'>ID</th>
                                    <th class='column2'>Name</th>
                                    <th class='column3'>Gender</th>
                                    <th class='column4'>Age</th>
                                    <th class='column5'>DOB</th>
                                    <th class='column6'>Email</th>
                                    <th class='column6'>Password</th>
                                    <th class='column6'>Department</th>
                                    <th class='column6'>Location</th>
                                    <th class='column7'>Manage</th>
                                    </tr>
                                    </thead>";
                                    while($rows=$result->fetch_assoc()){
                                        echo "<tbody><tr>
                                        <td class='column1'>$rows[stu_id]</td>
                                        <td class='column2'>$rows[name]</td>
                                        <td class='column3'>$rows[gender]</td>
                                        <td class='column4'>$rows[age]</td>
                                        <td class='column5'>$rows[dob]</td>
                                        <td class='column5'>$rows[email]</td>
                                        <td class='column5'>$rows[password]</td>
                                        <td class='column5'>$rows[dept]</td>
                                        <td class='column5'>$rows[location]</td>
                                        <td ckass='column7'>
                                        <div class='d-flex justify-content-center icons'>
					                    <span><a href='update_stu.php?id=$rows[stu_id]'><i class='bi bi-pencil-square' title='Edit'></i></a></span>
                                        <span><a href='delete_stu.php?id=$rows[stu_id]'><i class='bi bi-dash-square' title='Delete'></i></a></span>
                                        </div>
                                       </td>
                                        </tr></tbody>";
                                    }
                                echo "</table>";
                                }
                                else{
                                    echo "<center><h1>No Record Found.<br><h1></center>";
                                }
                                    
                                }
                                else{
                                $query="Select * from $table where status!=1";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    echo "<table><thead>
                                    <tr class='table100-head'>
                                    <th class='column1'>ID</th>
                                    <th class='column2'>Name</th>
                                    <th class='column3'>Gender</th>
                                    <th class='column4'>Age</th>
                                    <th class='column5'>DOB</th>
                                    <th class='column6'>Email</th>
                                    <th class='column6'>Password</th>
                                    <th class='column6'>Department</th>
                                    <th class='column6'>Location</th>
                                    <th class='column7'>Manage</th>
                                    </tr>
                                    </thead>";
                                    while($rows=$result->fetch_assoc()){
                                        echo "<tbody><tr>
                                        <td class='column1'>$rows[stu_id]</td>
                                        <td class='column2'>$rows[name]</td>
                                        <td class='column3'>$rows[gender]</td>
                                        <td class='column4'>$rows[age]</td>
                                        <td class='column5'>$rows[dob]</td>
                                        <td class='column5'>$rows[email]</td>
                                        <td class='column5'>$rows[password]</td>
                                        <td class='column5'>$rows[dept]</td>
                                        <td class='column5'>$rows[location]</td>
                                        <td ckass='column7'>
                                        <div class='d-flex justify-content-center icons'>
					                    <span><a href='update_stu.php?id=$rows[stu_id]'><i class='bi bi-pencil-square' title='Edit'></i></a></span>
                                        <span><a href='delete_stu.php?id=$rows[stu_id]'><i class='bi bi-dash-square' title='Delete'></i></a></span>
                                        </div>
                                       </td>
                                        </tr></tbody>";
                                    }
                                echo "</table>";
                                }
                                else{
                                    echo "<center><h1>No Record Found.<br><h1></center>";
                                }
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
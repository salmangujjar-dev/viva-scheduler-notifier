<?php
session_start();
if ($_SESSION['student']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>

<!DOCTYPE html>
<head>
	<title>Mangage Supervisors</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href=".\assets\sup.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
            <div class="col-md-12 text-center">
            <h1>Supervisors</h1>
            <div class="d-flex justify-content-end social_icon">
                        <a href="add_sup.php"><span><i class="bi bi-plus-square"></i></span></a>
                </div>
            <hr>
            </div>
		<div class="table100">
                        <?php
                                include 'connection.php';
                                $conn=openConn();
                                $table="supervisors";
                                $query="Select * from $table";
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
                                    <th class='column6'>Campus</th>
                                    <th class='column7'>Manage</th>
                                    </tr>
                                    </thead>";
                                    while($rows=$result->fetch_assoc()){
                                        echo "<tbody><tr>
                                        <td class='column1'>$rows[sup_id]</td>
                                        <td class='column2'>$rows[name]</td>
                                        <td class='column3'>$rows[gender]</td>
                                        <td class='column4'>$rows[age]</td>
                                        <td class='column5'>$rows[dob]</td>
                                        <td class='column5'>$rows[email]</td>
                                        <td class='column5'>$rows[password]</td>
                                        <td class='column5'>$rows[dept]</td>
                                        <td class='column5'>$rows[location]</td>
                                        <td class='column6'>$rows[campus]</td>
                                        <td ckass='column7'>
                                        <div class='d-flex justify-content-center icons'>
					                    <span><a href='update_sup.php?id=$rows[sup_id]'><i class='bi bi-pencil-square'></i></a></span>
                                        <span><a href='delete_sup.php?id=$rows[sup_id]'><i class='bi bi-dash-square'></i></a></span>
                                        </div>
                                       </td>
                                        </tr></tbody>";
                                    }
                                echo "</table>";
                                }
                                else{
                                    echo "<center><h1>No Record Found.<br><h1></center>";
                                }

                                closeConn($conn);
                        ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


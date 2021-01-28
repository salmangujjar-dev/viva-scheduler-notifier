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
<head>
	<title>Mangage Viva</title>
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
	<div class="limiter">
        
		<div class="container-table100">
			<div class="wrap-table100">
            <div class="col-md-12 text-center">
            <h1>Viva Scheduling</h1>
            <hr>
            </div>
		<div class="table100">
                        <?php
                                include 'connection.php';
                                $conn=openConn();
                                $table="groups";
                                $id=$_SESSION['id'];
                                $query="Select * from $table where supervised_by=$id";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    echo "<table><thead>
                                    <tr class='table100-head'>
                                    <th class='column1'>ID</th>
                                    <th class='column3'>Student 1</th>
                                    <th class='column3'>Student 2</th>
                                    <th class='column4'>Supervisor</th>
                                    <th class='column5'>FYP Title</th>
                                    <th class='column6'>Study Center</th>
                                    <th class='column6'>Viva Station</th>
                                    <th class='column6'>Viva Date</th>
                                    <th class='column6'>Marks</th>
                                    <th class='column7'>Manage</th>
                                    </tr>
                                    </thead>";
                                    while($rows=$result->fetch_assoc()){
                                        $id1=$rows['std1_id'];
                                        $query="Select * from students where stu_id=$id1";
                                        $result1=$conn->query($query);
                                        if ($result1->num_rows>0){
                                            while($rows1=$result1->fetch_assoc()){
                                                $name1=$rows1['name'];
                                            }
                                        }
                                        $id2=$rows['std2_id'];
                                        $query="Select * from students where stu_id=$id2";
                                        $result2=$conn->query($query);
                                        if ($result2->num_rows>0){
                                            while($rows2=$result2->fetch_assoc()){
                                                $name2=$rows2['name'];
                                            }
                                        }
                                        $id3=$rows['supervised_by'];
                                        $query="Select * from supervisors where sup_id=$id3";
                                        $result3=$conn->query($query);
                                        if ($result3->num_rows>0){
                                            while($rows3=$result3->fetch_assoc()){
                                                $supe=$rows3['name'];
                                            }
                                        }
                                        echo "<tbody><tr>
                                        <td class='column1'>$rows[group_id]</td>
                                        <td class='column2'>$name1</td>
                                        <td class='column3'>$name2</td>
                                        <td class='column5'>$supe</td>
                                        <td class='column5'>$rows[fyp_title]</td>
                                        <td class='column5'>$rows[study_center]</td>
                                        <td class='column5'>$rows[viva_station]</td>
                                        <td class='column5'>$rows[viva_date]</td>
                                        <td class='column4'>$rows[marks]</td>
                                        <td ckass='column7'>
                                        <div class='d-flex justify-content-center icons'>
					                    <span title='Schedule'><a href='update_gr.php?id=$rows[group_id]&stdcen=$rows[study_center]&std1=$id1&std2=$id2&sup1=$id3'><i class='bi bi-pencil-square'></i></a></span>
                                        <span title='ReNotify'><a href='notify.php?id=$rows[group_id]&std1=$id1&std2=$id2&sup1=$id3'><i class='bi bi-bell'></i></a></span>
                                        <span title='Change Supervisor'><a href='changesup.php?id=$rows[group_id]'><i class='bi bi-arrow-clockwise'></i></a></span>
                                        <span title='Update Marks'><a href='marks.php?id=$rows[group_id]'><i class='bi bi-list-ol'></i></a></span>
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
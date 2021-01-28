<?php
session_start();
if ($_SESSION['username']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
if ($_SESSION['supervisor']){
    echo "<script>document.write('You are not allowed to access this webpage.');window.stop();</script>";
}
?>

<!DOCTYPE html>
<head>
	<title>Viva Details</title>
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
            <h1>Viva Schedule</h1>
            <hr>
            </div>
		<div class="table100">
                        <?php
                                include 'connection.php';
                                $conn=openConn();
                                $table="groups";
                                $id=$_SESSION['id'];
                                $query="Select * from $table where std1_id=$id or std2_id=$id";
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
                                    </tr>
                                    </thead>";
                                    while($rows=$result->fetch_assoc()){
                                        $id2=$rows['std1_id'];
                                        $query="Select * from students where stu_id=$id2";
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
                                        $id2=$rows['supervised_by'];
                                        $query="Select * from supervisors where sup_id=$id2";
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
                                        <td class='column5'>";
                                        if ($rows['viva_station']==NULL){
                                        echo 'You will get Notification via Email.';}
                                        else {echo $rows['viva_station'];}
                                        echo "</td>
                                        <td class='column5'>";
                                        if ($rows['viva_date']==NULL){
                                        echo 'You will get Notification via Email.';}
                                        else {echo $rows['viva_date'];}echo "</td>
                                        <td class='column4'>";
                                        if ($rows['marks']==0){
                                        echo 'After Viva.';}
                                        else {echo $rows['marks'];}echo "</td>
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
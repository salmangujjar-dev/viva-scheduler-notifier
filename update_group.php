<?php
session_start();
if ($_SESSION['student']){
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
						       <h1 style='text-align:center;' id='message'></h1>
                           <?php
                                include 'connection.php';
                                $conn=openConn();
                                $id=$_GET["id"];
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
                                $table="groups";
                                $vl=$_POST["viva_loc"];
                                $vd=$_POST["viva_date"];
                                
                                $id2=$_SESSION['std1id'];
                                $query="Select * from students where stu_id=$id2";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    while($rows1=$result->fetch_assoc()){
                                        $email1=$rows1['email'];
                                    }
                                }
                                
                                $id2=$_SESSION['std2id'];
                                $query="Select * from students where stu_id=$id2";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    while($rows1=$result->fetch_assoc()){
                                        $email2=$rows1['email'];
                                    }
                                }
                                
                                $id2=$_SESSION['supid'];
                                $query="Select * from supervisors where sup_id=$id2";
                                $result=$conn->query($query);
                                if ($result->num_rows>0){
                                    while($rows1=$result->fetch_assoc()){
                                        $email3=$rows1['email'];
                                    }
                                }
echo "<div style='display:none;'>";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'umerproject5@gmail.com'; // email
$mail->Password = '1122334455umer'; // password
$mail->setFrom('f180418@nu.edu.pk', 'Web Project'); // From email and name
$mail->addAddress($email1, 'Student'); // to email and name
$mail->addAddress($email2, 'Student'); 
$mail->addAddress($email3, 'Supervisor'); 
$mail->Subject = 'Viva Notification';
$mail->msgHTML('Group ID='.$id.'<br>'.'Viva Location='.$vl.'<br>'.'Viva DateTime='.$vd); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                
if(!$mail->send()){
    echo "Mailer Error: ";
}else{
    echo "</div>";
    echo "Message sent!";
}
                                $query="Update $table set viva_station='$vl', viva_date='$vd', schedule_count=$counti where group_id=$id";
                                if ($conn->query($query)===TRUE){
                                    echo "<h1>Successfully Updated..</h1>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";

                                }
                                else{
                                    echo "<h1>Not Updated..</h1><br/>";
                                    echo "<p>$query</p>";
                                    echo "<p>You will be redirected to the main page in 3 seconds.</p>";
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
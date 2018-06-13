<?php
$fname = $lname = $mail = $pas = $dob = $addr = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$mail = $_POST["mail"];
	$pas = $_POST["pas"];
	$dob = $_POST["dob"];
	$addr = $_POST["addr"];
}
else{
	echo "Request Method Error!";
}
?>

<?php
$serv = "localhost";
$user = "root";
$pass = "";
$db = "regp";

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error){
	echo "Database Error";
	exit();
}
$q = "insert into details values('$fname','$lname','$mail','$pas','$dob','$addr')";

if($conn->query($q)===True){
	echo "<div align = 'center'><h2>Successfully Registered !</h2></div>";
	echo "<script>setTimeout(function(){window.location.href='index.html'},3000);</script>";
}
else{
	echo "Internal Database Error";
}

$conn->close();
?>
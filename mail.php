<?php
$name = $mail = $sub = $body = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name = $_POST["name"];
	$mail = $_POST["mail"];
	$sub = $_POST["sub"];
	$body = $_POST["body"];
}
else{
	echo "Request Method Error!";
}
?>

<?php
$serv = "localhost";
$user = "root";
$pass = "";
$db = "mails";

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error){
	echo "Database Error";
	exit();
}
$q = "insert into data values('$name','$mail','$sub','$body')";

if($conn->query($q)===True){
	echo "<div align = 'center'><h2>Successfully Sent Mail !</h2></div>";
	echo "<script>setTimeout(function(){window.location.href='contact.html'},2200);</script>";
}
else{
	echo "Internal Database Error";
}

$conn->close();
?>
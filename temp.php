<?php

$fname = $lname = $mail = $pas = $dob = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$mail = $_POST["mail"];
	$pas = $_POST["pas"];
	$dob = $_POST["dob"];

	echo "DOB: ".$dob;
}
else{
	echo "Request Method Error!";
}
?>
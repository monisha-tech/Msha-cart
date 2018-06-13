<?php
session_start();
$mail = $pas = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$mail = $_POST["name"];
	$pas = $_POST["pas"];
}
else{
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Server Error !";
	echo "</div>";
}
?>

<?php
$serv = "localhost";
$user = "root";
$pass = "";
$db = "regp";
$NAME = "";
$conn = new mysqli($serv,$user,$pass,$db);
if($conn->connect_error){
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Internal Database Error !";
	echo "</div>";
}
else{
	$sql = "select fname, mail, pas from details where mail = '$mail' ";
	$res = $conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($mail == $row["mail"] && $pas == $row["pas"]){
				$NAME = $row["fname"];
				$_SESSION['NAME'] = $NAME;
				echo "<br>";
				echo "<div align = 'center'>";
				echo "<h3>Login Successful !</h3>";
				echo "</div>";
				echo "<script>setTimeout(function(){window.location.href='sam.php'},2200);</script>";
			}
			else{
				echo "<div align='center'> ";
				echo "<h3>Login Id/Password is Incorrect !</h3>";
				echo "</div>";
				echo "<script>setTimeout(function(){window.location.href='sam.php'},2200);</script>";
			}
		}
	}
	
	else{
		echo "<br>";
		echo "<div align = 'center'>";
		echo "<h3>Some Technical Error !</h3>";
		echo "</div>";
	}
	$conn->close();
}
?>
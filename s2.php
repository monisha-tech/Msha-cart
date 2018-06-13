<?php
session_start();

if($_SESSION['name'] == NULL) echo 'Login'; else echo $_SESSION['name'];

?>
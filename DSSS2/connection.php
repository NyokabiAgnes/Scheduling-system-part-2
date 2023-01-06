<?php
$conn = mysqli_connect('localhost', 'root', '', 'nyokabi');
if (!$conn) {
	die("Connection failed".mysqli_connect_error());
}
?>
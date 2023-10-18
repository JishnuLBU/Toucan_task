<?php
	$conn = new mysqli("localhost", "root", "", "toucan");
	
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>
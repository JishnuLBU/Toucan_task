<?php
	require_once 'conn.php';
	$searchName = $_POST['search'];

	$query = $conn->query("SELECT p.Firstname,p.Surname,e.emailaddress FROM emails e JOIN profiles p ON e.UserRefID = p.UserRefID where p.Firstname like '%$searchName%' ORDER BY `Firstname` ASC");
	
	$table = array();
	while($row = mysqli_fetch_array($query)) {
		$table[]= array(
			'Firstname' => $row['Firstname'],
			'Surname' => $row['Surname'],
			'Email' => $row['emailaddress']
			
		);
	}
	echo json_encode($table);

				
?>
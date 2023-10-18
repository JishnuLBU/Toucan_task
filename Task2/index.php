<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="">Toucan</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Profile Details</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center>
				<form  class="form-inline" >
					<input type="text" class="form-control" name="search" id="search" required/>
					<input type="button" class="btn btn-primary form-control" id="search-button" name="add" value="Search">
					
				</form>
			</center>
		</div>
		<br /><br /><br />
		<table class="table" id="profile-data">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Surname</th>
					<th>Email Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					$query = $conn->query("SELECT p.Firstname,p.Surname,e.emailaddress FROM emails e JOIN profiles p ON e.UserRefID = p.UserRefID ORDER BY `Firstname` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['Firstname']?></td>
					<td><?php echo $fetch['Surname']?></td>
					<td><?php echo $fetch['emailaddress']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
			$('#search-button').on('click', function () {
				var searchValue = $('#search').val();
				$.ajax({
					url: 'fetch_data.php',
					method: 'POST',
					dataType: 'json',
					data: { search: searchValue }, 
					success: function (data) {
						$("#profile-data tbody tr:not(:first)").remove();
						if (data.length === 0) {
				          // Display "Nothing to display" if there are no results
				          $("#profile-data").html('<p>Nothing to display</p>');
				        } 
				        else {
						var table = $('#profile-data');
						$("#profile-data tr").remove(); 
						table.append('<tr><th>First Name</th><th>Surname</th><th>Email Address</th></tr>');
						data.forEach(function (row) {
							table.append('<tr><td>' + row.Firstname + '</td><td>' + row.Surname + '</td><td>' + row.Email + '</td></tr>');
						});
						}
						
					}
				});
			});
			
        });
    </script>
</body>
</html>
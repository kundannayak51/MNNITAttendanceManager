<?php
 session_start();
require 'config.php';
?>
<html>
<head>
	<title>mechanical</title>
	<link rel="stylesheet" type="text/css" href="SecondPage.css"/>
</head>
<div class="panel panel-body">
	<h1 class="c1">STUDENT ATTENDANCE MANAGER</h1>
	</br>
	<form action="attendance.php" method="post">
			<table class="table table-striped" cellspacing="50px">
			<th>Roll Number</th>
			<th>Student Name</th>
			<th>Registration Number</th>
			<th>Attendance Profile</th>
			<?php
			$query="select * from user_login WHERE Branch='MECHANICAL'";
			$result=mysqli_query($con,$query);
			$counter=0;
			$serialno=1;
			while($query_run=mysqli_fetch_array($result))
			{
				?>
				<tr>
				<td><?php echo $serialno;?>.</td>
				<td><?php echo $query_run['Name'];?></td>
				<input type="hidden" value="<?php echo $query_run["Name"];?>" name="Name[]">
				<td><?php echo $query_run['Registration'];?></td>
				<input type="hidden" value="<?php echo $query_run["Registration"];?>" name="Registration[]">
				<td>Check<input type="submit" value="<?php echo $serialno; ?>" name="check"></td>

				</tr>
			<?php
			$counter++;
			$serialno++;
			}
			?>
		</table>
	</form>
 </div>
</html>
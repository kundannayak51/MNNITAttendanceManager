<?php
 session_start();
require 'config.php';
STATIC $Roll=1;
GLOBAL $Registration;
if(isset($_POST['submit']))
{
	foreach($_POST['attendance_status'] as $id=>$attendance_status)
	{
		$Name=$_POST['Name'][$id];
		$Registration=$_POST['Registration'][$id];
		$Date=date("Y/m/d  H:i:s");
		$query1="insert into attendance_records(Branch,Date,Roll,Name,Registration,attendance_status) values('ECE','$Date','$Roll','$Name','$Registration','$attendance_status')";
		 $query_run1=mysqli_query($con,$query1);
		 $Roll++;
	}
}
?>
<html>
<head>
	<title>ece</title>
	<link rel="stylesheet" type="text/css" href="SecondPage.css"/>
</head>
<div class="panel panel-body">
	<h1 class="c1">STUDENT ATTENDANCE MANAGER</h1>
	</br>
	<h3 class="c5"><?php echo date("Y/m/d");
			echo "\x20\x20\x20";  //To add space between date and day
		    echo  date("l");?> </h3>
	<form action="ece.php" method="post">
		<table class="table table-striped" cellspacing="50px">
			<th>Roll Number</th>
			<th>Student Name</th>
			<th>Registration Number</th>
			<th>Attendance</th>
			<?php
			$query="select * from user_login WHERE Branch='ECE'";
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
				<td>
					<input class="c3" name="attendance_status[<?php echo $counter; ?>]" type="radio" value="Present">Present
					<input class="c3" name="attendance_status[<?php echo $counter; ?>]" type="radio" value="Absent">Absent
					<input class="c3" name="attendance_status[<?php echo $counter; ?>]" type="radio" value="Off" checked>CLASS OFF
				</td>
			</tr>
			<?php
			$counter++;
			$serialno++;
			}
			?>
		</table>
		<?php
		$query2="select * from attendance_records WHERE Registration='$Registration'";
		 $query_run2=mysqli_query($con,$query2);
		 $num=mysqli_num_rows($query_run2);
		if($num >0)
		{
			echo '<script type="text/javascript">alert("Attendance is Taken!")</script>';
		}
		else
		{
			?>
		<input class="c4" name="submit" type="submit" value="Submit">
		<?php
	}
	?> 
	</form>
</div>
</html>
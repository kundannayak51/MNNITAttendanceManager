<?php
session_start();
require 'config.php';
?>
<html>
<head>
	<title>cse</title>
	<link rel="stylesheet" type="text/css" href="SecondPage.css"/>
</head>
<div class="panel panel-body">
	<h1 class="c1">STUDENT ATTENDANCE MANAGER</h1>
	</br>
</div>
</html>
<?php
$a=$_POST['Registration'];
$b=$_POST['check']-1;
$c=$_POST['Name'];
?>
<h2 class="c6">WELCOME <?php echo "$c[$b]";?></h2>
<?php
$query1="select * from attendance_records WHERE Registration='$a[$b]'";
$result1=mysqli_query($con,$query1);
$num1=mysqli_num_rows($result1);
$query2="select * from attendance_records WHERE Registration='$a[$b]' AND  attendance_status='Present'";
$result2=mysqli_query($con,$query2);
$num2=mysqli_num_rows($result2);
echo "<b>-> Total Number of Classes taken is : $num1<b><br>";
echo "<b>->Total Number of Classes Attended by You : $num2<b><br>";
$percentage=($num2/$num1)*100;
echo "<b>->Your Attendance Percentage is : $percentage %<b><br>";
if($percentage>=75)
{
	echo "<b>->YOU ARE ELLIGIBLE FOR END SEMESTER EXAM<b><br>";
}
else
{
	echo "<b>->YOU ARE NOT ELLIGIBLE FOR END SEMESTER EXAM<b><br>";
}
?>

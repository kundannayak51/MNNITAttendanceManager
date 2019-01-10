<?php
 session_start();
require 'config.php';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="SecondPage.css"/>
<title>Teacher_Access</title>
</head>
<body>
<h1 class="c1">STUDENT ATTENDANCE MANAGER</h1>
<a href="cse.php"><input class="C2" type="button"  value="CSE"  name="cse"/></a>
<a href="it.php"><input class="C2" type="button"  value="IT"  name="it"/></a>
<a href="ece.php"><input class="C2" type="button"  value="ECE"  name="ece"/></a>
<a href="mechanical.php"><input class="C2" type="button"  value="MECHANICAL"  name="mechanical"/></a>
<a href="civil.php"><input class="C2" type="button"  value="CIVIL"  name="civil"/></a>
</body>
</html>

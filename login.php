 <?php
 session_start();
 require 'config.php';
 ?>
 <!DOCTYPE html>
<html>
    <head>
        <title>Attendence Manager</title>
        <link rel="stylesheet"  type="text/css" href="FirstPage.css"/>
        <style type="text/css">
        body
        {
            background-image :url("cover.jpg");
        }
        h1
        {
           
            font-size : 70px;
            text-shadow :6px 4px 7px red;
        }
        h2{
            text-decoration :underline;
            color :#555566;
        }
        #m1
        {
            font-size :220%;
            color : #ff0000;
            text-shadow: 2px 4px 5px blue;
        }
        </style>
        <body>
             <h1 align="center"><img alt="mnnit_logo" src="mnnit_logo.png" height="70px"/> MNNIT ALLAHABAD</h1> 
             <h2 align="center" id="p1">An Institute of National Importance</h2> 
            <br/>
            <marquee id="m1">75% Attendence is Compulsory</marquee>
            <br/>
            <script>
                function redirect()
                {
                    var x=prompt("Enter the Teacher's Password","a");
                    if(x=="mnnitAttendance")
                    {
                        window.location.href="teacher.php";
                    }
                    else
                    {
                        alert("Authentication Fails!");
                    }
                }
                </script>
               <b>For Teachers<b> <button id="id1" onclick="redirect()">TakeAttendance</button>
            <p style="color : green; font-size :20px;">
                Check Your College Website Here :<a href="http://www.mnnit.ac.in/">MNNIT</a>
            </p>
            <div id="div1">
                <center>
                    <h2>Login Form</h2>
                    <img  id="avatar" src="avatar.png" class="avatar"/>
                </center>
                <form class="firstform" action="login.php" method="post">
                <label><b>Username:</b></label></br>
                <input class="email1" type="text" placeholder="Enter Your Email Id" name="username"/>
                <br/>
                <label><b>Password:</b></label>
                <br/>
                <input class="pass1" type="password" placeholder="Enter Password" name="password"/>
                <br/>
                <input class="login1" type="submit"  value="Login"  name="login"/>
                </br>
                <a href="register.php"><input type="button" class="register1"  value="Register"  name="register"/>
            </form> 
            <?php
            if(isset($_POST['login']))
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                $query="select * FROM user_login WHERE username='$username' AND password='$password'";
                $query_run=mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    $_SESSION['username']=$username;
                    header('location:home.php');
                }
                else
                {
                    echo '<script type="text/javascript">alert("Invalid Username or Password")</script>';
                }
            }
            ?>
            </div>
            </body>
        </body>
    </head>
</html>
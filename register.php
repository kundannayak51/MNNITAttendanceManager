<?php
 session_start();
require 'config.php';
?>
<!DOCTYPEhtml>
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
            <p style="color : green; font-size :20px;">
                Check Your College Website Here :<a href="http://www.mnnit.ac.in/">MNNIT</a>
            </p>
            <script>
                function validate()
                {
                var result=true;
                var e=document.getElementsByName("username")[0].value;
                var atindex = e.indexOf('0');
                var dotindex= e.lastIndexOf('.');
                if(atindex<1 || dotIndex>=e.length-2||dotindex-atindex<3)
                    result=false;
                return result;
            }
            </script>
            <div id="div1">
                <center>
                    <h2>Login Form</h2>
                    <img  id="avatar" src="avatar.png" class="avatar"/>
                </center>
                <form class="firstform" onsubmit="return validate()" action="register.php" method="post">
                    <label><b>Branch<b></label>
                    <select class="branch1" name="branch">
                        <option>CSE</option>
                        <option>IT</option>
                        <option>ECE</option>
                        <option>MECHANICAL</option>
                        <option>CIVIL</option>
                     </select></br>
                <label><b>Name :<b></label>
                <input  class="name" type="text" placeholder="Your Name" name="name" required/></br>
                <label><b>Registration Number:<b></label>
                <input class="name" type="number" placeholder="Registration Number" name="reg" required/></br>
                <label><b>Username:</b></label></br>
                <input class="email1" type="text" placeholder="format : abc@something.com/in" name="username" required/>
                <br/>
                <label><b>Password:</b></label>
                <br/>
                <input class="pass1" type="password" placeholder="Enter Password" name="password" required/>
                <br/>
                <label><b>Confirm Password:</b></label>
                <br/>
                <input class="pass1" type="password" placeholder="Confirm Password" name="cpassword" required/>
                <br/>
                <input class="signup1" type="submit"  value="Sign Up"  name="signup"/>
                </br>
                <a href="Login.php"><input class="back1" type="button"  value="Back"  name="register"/></a>
            </form> 
            <?php
                if(isset($_POST['signup']))
                {
                    $branch=$_POST['branch'];
                    $name = $_POST['name'];
                    $reg = $_POST['reg'];
                    $username = $_POST['username'];
                    $password =  $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    if($password==$cpassword)
                    {
                        $query1="select * from user_login WHERE username='$username'";
                        $query2="select * from user_login WHERE registration='$reg'";
                        $query_run1=mysqli_query($con,$query1);
                        $query_run2=mysqli_query($con,$query2);
                        if(mysqli_num_rows($query_run1)>0)
                        {
                            echo '<script type="text/javascript">alert("User already exist with same username")</script>';
                        }
                        elseif(mysqli_num_rows($query_run2)>0)
                        {
                            echo '<script type="text/javascript">alert("User already exist with same Registration number")</script>';
                        }
                        else
                        {
                            $query="insert into user_login(Branch,Name,Registration,Username,Password) values('$branch','$name','$reg','$username','$password')";
                            $query_run=mysqli_query($con,$query);
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Registered Successfully,Go to the Login page")</script>';
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("ERROR!")</script>';
                            }
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("Password and Confirm Password does not match")</script>'; 
                    }
                }
               ?>
            </div>
            </body>
        </body>
    </head>
</html>
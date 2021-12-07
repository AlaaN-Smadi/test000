<!doctype html>
<html>

<head>
    <title>Login</title>
    <!-- <style>
    
    </style> -->

    <link rel="icon" type="image/x-icon" href="https://cdn4.vectorstock.com/i/1000x1000/62/48/green-round-glossy-login-icon-vector-2976248.jpg">

    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <center>
        <h1> Welcome to my first task </h1>
        <h3> Lets Sign In to your account 😍 </h3>
    </center>
    <div id="container">
    

    <p id="myButtons">
        <a href="register.php">Register</a> / <a style="background:black;color:wheat;" href="myFirstTask.php">Login</a>
    </p>

    <h3 id="testId">Login Form</h3>

    <form id="mySignInForm" action="" method="POST">
        <label for="user"> Username: </label>
        <input class="inputData" placeholder="Name" type="text" id="user" name="user"><br />

        <label for="pass"> Password: </label>
        <input class="inputData" placeholder="Password" type="password" name="pass" id="pass"><br />
        <input id="logInButton" type="submit" value="Login" name="submit" />
    </form>


    </div>
    


    <?php  

        if(isset($_POST["submit"])){  
  
            if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
                $user=$_POST['user'];  
                $pass=$_POST['pass'];  
    
                // echo "before database";

                $con=mysqli_connect('localhost','root','','firstTask') or die(mysql_error());    

                // echo "<br />";
                // echo "selected local host";

                // echo "selected DataBase******";

                if(mysqli_connect_errno()){
                    echo " <p class='echoP'> Error To connect with database 😭😭 </p>";
                }else{

                    // echo "5555555555555555555550";
                    $query=mysqli_query($con , "SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");  
                    $numrows=mysqli_num_rows($query);  
     
                    // echo "<br />";
                    // echo "Before last if";
                    
                    // echo "<br />";
                    // echo ($numrows);
                    
                    if($numrows!=0) {
                        while($row=mysqli_fetch_assoc($query)){  
    		                $dbusername=$row['username'];  
	                        $dbpassword=$row['password']; 
                                $dbemail=$row['email'];  
	                        $dbphone=$row['phone']; 
                                $dbgender=$row['gender'];  
	                        $dbimage=$row['image'];  
	                    }  
                        
                        if($user == $dbusername && $pass == $dbpassword){  
                            session_start();  
		                    $_SESSION['sess_user']=$user;  
  
	                        // Redirect browser   
    		                //header("Location: member.php");  
                            echo "<br />";

                            echo " <p class='echoP'> Hi " . ($user) . "   You are successfully logged In 🙌😊 </p>";
			    
                            
			    $myDataSaved = array($dbusername,$dbemail,$dbphone,$dbgender,$dbimage);
                            echo ($myDataSaved[2]);
			    $cookieName = 'useData';
			    $exp = time() + (5*60*60);
			    setcookie($cookieName, '1520', $exp, '/');
                            
			    header("Location: http://localhost/firstTask/profile.php", TRUE, 301);
                            exit();

    	                }
                    } else {  
                        echo " <p class='echoP'> Invalid username or password! </p>";  
                    }  
                }

            } else {  
                echo " <p class='echoP'> All fields are required! </p>";  
            }  
        }  
?>
</body>

</html>

<!doctype html>
<html>

<head>
    <title>Register</title>

    <link rel="icon" type="image/x-icon"
        href="https://thumbs.dreamstime.com/b/sign-up-member-icon-green-round-button-isolated-abstract-illustration-105906838.jpg">

    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <center>
        <h1> Welcome to my first task </h1>
        <h3> Lets Regester new account if you don't have 😍 </h3>
    </center>

    <div id="container">
        <p id="myButtons"><a style="background:black;color:wheat;" href="register.php">Register</a> / <a
                href="myFirstTask.php">Login</a></p>

        <h3 id="testId">Registration Form</h3>
        <form id="mySignUpForm" method="POST">
            <legend>
                <fieldset>

                    <div id="imageDIV">
                        <img id="uploadImage" src="https://elitediscovery.com/wp-content/uploads/upload-1.png">
                        <img id="myPersonalImage">
                        <input id="myImage" name="myImage" type="file">
                    </div>
                    <p id="imageP"> Your Image </p>

                    <label for="user"> Username: </label>
                    <input class="inputData" placeholder="Full Name" type="text" id="user" name="user"><br />

                    <label for="email"> Email: </label>
                    <input class="inputData" placeholder="Email" type="email" id="email" name="email"><br />

                    <label for="phone"> Phone Number: </label>
                    <input class="inputData" placeholder="Phone Number" type="number" id="phone" name="phone"><br />

                    <label for="gender"> Your Gender: </label>
                    <select class="inputData" name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br />

                    <label for="pass"> Password: </label>
                    <input class="inputData" placeholder="Password" type="password" id="pass" name="pass"><br />

                    <label for="conPass"> Confirm Password: </label>
                    <input class="inputData" placeholder="Confirm Password" type="password" id="conPass"
                        name="conPass"><br />
                    <input id="signUpButton" type="submit" value="Register" name="submit" />

                </fieldset>
            </legend>
        </form>
    </div>

    


    <?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['myImage']) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['conPass']) && !empty($_POST['email']) && !empty($_POST['phone'])&& !empty($_POST['gender'])) { 

    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
    $conPss=$_POST['conPass'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $image=$_POST['myImage'];

    echo ($user). "-" .($pass). "-" .($email). "-" .($phone). "-" .($gender) ."-" . ($image);    


    if($pass == $conPss){

        $con=mysqli_connect('localhost','root','','firstTask') or die(mysqli_error());    

        if(mysqli_connect_errno()){
            echo "<script>
    Swal.fire({
        title: 'Error!',
        text: 'All fields are required!',
        icon: 'error',
        confirmButtonText: 'Done'
      })
      </script>" ;

            echo "<p class='echoP'> Error To connect with database 😭😭 </p>";
        }else{
    
            // echo "connection Successful";
            $query=mysqli_query($con , "SELECT * FROM users WHERE username='".$user."'");  
            $numrows=mysqli_num_rows($query); 
        
        if($numrows==0)  
        {  
            $sql="INSERT INTO users(username,password,email,phone,gender,image) VALUES('$user','$pass','$email','$phone','$gender','$image')";  
      
            // echo "----- Hi DataBase -----------";
            $result=mysqli_query($con , $sql);  
            if($result){  
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Saved',
                    text: 'Your Account Successfully Created 🥰',
                    })
                 </script>" ;
                
            } else {  
                echo " <p class='echoP'> Failure! </p>";  
            }  
      
        } else {  
            echo "<script>
    Swal.fire({
        title: 'Error!',
        text: 'That username already exists! Please try again with another. 💔',
        icon: 'error',
        confirmButtonText: 'Done'
      })
      </script>" ;

        }  
        // +++++++++++++++++++++++
        
        }
      
    }else{
        echo "<script>
    Swal.fire({
        title: 'Error!',
        text: 'Passwords are not match💔😭',
        icon: 'error',
        confirmButtonText: 'Done'
      })
      </script>" ;

    }

} else {  
    // echo "<p class='echoP'> All fields are required! </p>"; 
    echo "<script>
    Swal.fire({
        title: 'Error!',
        text: 'All fields are required!',
        icon: 'error',
        confirmButtonText: 'Done'
      })
      </script>" ;

    //   echo "<script> alert('-------------') </script>";
}  
}else{

    echo "<p class='echoP'> Not submited </p>";
}  
?>


</body>

<script>
        let myImage = document.getElementById('myImage');
        let myPersonalImage = document.getElementById('myPersonalImage');
        let myImageFunction = () =>{
            console.log(myImage.files[0]);

            myPersonalImage.src = URL.createObjectURL(myImage.files[0]) ;
        }
        myImage.addEventListener('change', myImageFunction);
        
    </script>

</html>
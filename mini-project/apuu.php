<html>
    <head>
        <title>Animated login page</title>
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Kanit&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="appu.css">
    </head>
    <body>
        <?php
$exists=false;
$showAlert = false;
$showError = false;
include 'nav/dbcon.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'nav/dbcon.php';
    $name=$_POST["username"];
    $pwd=$_POST["password"];
    $conp=$_POST["confirmpassword"];
   
    $existSql = "SELECT * FROM `register` WHERE username = '$name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else {
         if(($pwd == $conp) && $exists==false ){
            // $sql1="INSERT INTO 'student' VALUES( '$name','$uname','$email', '$phno','$pw')";
        $sql = "INSERT INTO `register` VALUES ('$name','$pwd')";
        $result = mysqli_query($conn, $sql);
        // $result1= mysqli_query($conn,$sql1);
        if ($result){
            $showAlert = true;
        }
        header("Location:/mini-project/mini.php");
    
    // else if(($pw == $cpw) && $exists==false && $role=="Teacher"){
    //     $sql2="INSERT INTO 'student' VALUES( '$name','$uname','$email', '$phno','$pw')";
    // $sql = "INSERT INTO `register` VALUES ('$name',$role','$name', '$uname','$email', '$phno','$sub','$pw')";
    // $result = mysqli_query($conn, $sql);
    // $result2= mysqli_query($conn,$sql1);
    // if ($result){
    //     $showAlert = true;
    // }
}
    else{
        $showError = "Passwords do not match";
    }
}
}
// else{
//      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
//         <strong> Please Enter information</strong> 
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">×</span>
//         </button>
//     </div> ';
//     }


    
?>

   
<!-- <!DOCTYPE html>
<html> -->
<!-- <head>
<title>Sign Up</title>
<style>
body { 
            background-image: url("signup.jpeg");
          
            background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
  background-attachment:fixed ;
  opacity:0.9;
        
font-family: Arial, sans-serif;
background-color: #f2f2f2;
padding: 20px;
}

h1 {
text-align: center;
margin-bottom: 30px;
}

form {
background-color: #fff;
padding: 20px;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
max-width: 500px;
margin: 0 auto;
}

label {
display: block;
margin-bottom: 10px;
}

input[type="text"], input[type="email"], select, input[type="password"] {
width: 100%;
padding: 10px;
margin-bottom: 20px;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

input[type="submit"] {
background-color: #4CAF50;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
transition: background-color 0.3s;
}

input[type="submit"]:hover {
background-color: #45a049;
}
</style>

    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
     header("Location:/mini-project/mini.php");
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    
    ?>
<h1 style="color:white;">Sign Up</h1>
<form method="post" action="/php/signup.php">
<input type="radio" id="stud" name="role" value="stud" required>
<label for="stud">Student</label>
<input type="radio" id="teacher" name="role" value="teacher" required>
<label for="teacher">Teacher</label><br>
<label for="name">Name:</label>
<input type="text" id="name" name="name"   required>
<label for="uname">Create username:</label>
<input type="text" id="uname" name="uname" required>
<label for="email">Email:</label>
<input type="email" id="email" name="email" required>
<label for="phno">Phone number:</label>
<input type="text" name="country_code" title="Enter 10 digits" pattern="[1-9]{1}[0-9]{9}" name="phno" id="phno"> 
<br> <br>
<label for="subject" >Subject:&nbsp;</label>
<input type="radio" id="DBMS" name="sub" value="DBMS">&nbsp;<label for="DBMS">DBMS</label>
<input type="radio" id="Java" name="sub" value="Java">&nbsp;<label for="Java">Java</label>

<input type="radio" id="ADA" name="sub" value="ADA">&nbsp;<label for="ADA">ADA</label>&nbsp; <label for="">(For Teachers Only)</label><br>

<label for="pw">Password:</label>
<input type="password" id="pw" name="pw" required>

<label for="cpw">Confirm Password:</label>
<input type="password" id="cpw" name="cpw" required>

<input type="submit" name="submit" value="Sign Up">
</form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html> -->




   
         <div class="head">
            <h1>Register<span>Here!</span></h1>
         </div>
            <!-- <a >Campus Placement predictor</a>
            <h2>sadd sdsds asd sdafd fsadsd assa dsa </h2> -->
            <!-- <input  type="submit" value="Login"> -->
        <!-- <img class="image" src="placement-PhotoRoom.png-PhotoRoom.png" alt="image"> -->

        <!-- </div> -->
        <!-- </div> -->
        
        
        <form method="POST" action="apuu.php">

        <div class="box">
            <center>
            <div class="form">
                
                <h2>Sign up</h2>
                <!-- <div class="option">
                <select name="language" id="language">
                    <option value="javascript">Admin</option>
                    <option value="python">Faculty</option>
                    <option value="c++" >Student</option>
                    <option value="java" selected>----Select role----</option>
                  </select>
                </div> -->
                <div class="inputbox">
                    <input type="text" required="required" name="username">
                    <span >Username</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" required="required" name="password">
                    <span >Password</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" required="required" name="confirmpassword">
                    <span >Confirm password</span>
                    <i></i>
                </div>
                <!-- <div class="link">
                    <a href="#">Forgot Password</a>
                    <a href="#">Sign-up</a>
                </div> -->
                <input  name="submit" type="submit" value="register" >
            </center>
            </div>
        </div>
</form>
    </body>
</html>

<?php
$exists=false;
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'nav/dbcon.php';
  
    $uname=$_POST["uname"];
   
    $pw = $_POST["pw"];
    $cpw = $_POST["cpw"];
   
    $existSql = "SELECT * FROM `register` WHERE username = '$uname'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else {
         if(($pw == $cpw) && $exists==false ){
            // $sql1="INSERT INTO 'student' VALUES( '$name','$uname','$email', '$phno','$pw')";
        $sql = "INSERT INTO `register` VALUES ( '$uname','$pw')";
        $result = mysqli_query($conn, $sql);
        // $result1= mysqli_query($conn,$sql1);
        if ($result){
            $showAlert = true;
        }
     header("Location:/php/apuu.php");

    
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
<html>
    <head>
        <title>Animated login page</title>
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Kanit&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="mini.css">
    </head>
    <body>
    
            <h1 class="h1">BASAVESHWAR ENGINEERING <span>COLLEGE</span></h1>
            <!-- <a class="a">Campus Placement predictor</a>
            <h2 class="h2">sadd sdsds asd sdafd fsadsd assa dsa </h2> -->
            <!-- <input  type="submit" value="Login"> -->
        <!-- <img class="image" src="placement-PhotoRoom.png-PhotoRoom.png" alt="image"> -->

        
        
       
        <div class="box">
            
            <div class="form">
                
                <h2>Sign in</h2>
                <div class="option">
                <select name="language" id="language">
                    <option value="javascript">Admin</option>
                    <option value="python">Faculty</option>
                    <option value="c++" >Student</option>
                    <option value="java" selected>----Select role----</option>
                  </select>
                </div>
                <div class="inputbox">
                    <input type="text" required="required">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="link">
                    <a href="#">Forgot Password</a>
                    <a href="apuu.php">Sign-up</a>
                </div>
                <input  type="submit" value="Login">
            </div>
        </div>

        
    </body>
</html>
<?php
require_once("databaseConnections.php");
$con = createdb();
?>


<!doctype html>
<html lang="en">
<head>
    <title>web site</title>

    
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="index.css">

</head>
<body>

<main>
<body>
<div class="container">
<form action="signup.php" method="post">
name: <input type="text" name="name"><br>
age: <input type="text" name="age"><br>
user name: <input type="text" name="email"><br>
password: <input type="password" name="password"><br>
<input type="submit" name = "submit">
</form>
</div>


<?php


if(isset($_POST['submit'])){
  
    createData();
}


function createData(){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql ="INSERT INTO info (name,age,user_name,password) 
            VALUES ('$name','$age','$email','$password')";
    if(mysqli_query($GLOBALS['con'],$sql)){
        header("Location: login.php");
    }
    else{
        echo "database error !";
    }
}

?>

</body>
</html>
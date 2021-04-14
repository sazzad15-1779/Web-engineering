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
<div class="container">
<form action="homepage.php" method="post">
<input type="submit" value ="show" name = "show">
<input type="submit" value ="LogOut" name = "logout">
</div>
<div class="tablediv">
<table class ="datatable">

  <tr>
    <th>name</th>
    <th>id</th>
    <th>age</th>
    <th>user_name</th>
     <th>password</th>
    </tr>
  
    
    <?php
    if(isset($_POST['show'])){
       $result = showData();
    if($result){
        while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?php echo $row['name'];?> </td>
            <td ><?php echo $row['id']; ?> </td>
            <td ><?php echo $row['age'];?> </td>
            <td ><?php echo $row['user_name'];?> </td>
            <td ><?php echo $row['password']; ?> </td>
         </tr>
    <?php
    } } }   ?>

</table>
</div>
<?php


function showData(){
    $sql = "SELECT * FROM info";
    $result = mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)){
        return $result;
    }
}
?>
<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (!isset($_SESSION['email'])) {
    if (!isset($_SESSION['password'])) {
        header('Location: login.php');
        exit;
    }
}


?>
<?php

if(isset($_POST['logout']))
if (session_destroy()) {
  header("Location: login.php");
}
 ?>
</body>
</html>
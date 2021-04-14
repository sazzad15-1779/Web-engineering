
<?php
function session_check(){

   
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (!isset($_SESSION['email'])) {
        if (!isset($_SESSION['password'])) {
            echo "successfull";
            exit;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Please enter email and password to login</p>
<div class="container">
<form action="session.php" method="post">
email: <input type="text" name="email"><br>
password: <input type="password" name="password"><br>
<input type="submit" name = "submit">
</form>
</div>
<?php
require_once("databaseConnections.php");
$con =createdb  ();
session_start();
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM info WHERE user_name='$email' and password='$password'";

	$result = mysqli_query($con, $query);
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
		echo "Login successfull .";
	}else {
		echo "Not matched ,Try again";
	}
}
?>
</body>
</html>
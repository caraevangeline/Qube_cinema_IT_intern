<?php
session_start();
?>

<?php
if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['pass'];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity1");

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($link,$username);
$password = mysqli_real_escape_string($link,$password);

//$_SESSION["username"] = $username;
//$_SESSION["password"] = $password;

if(!empty($username) && !empty($password))

{$result = mysqli_query($link,"select * from users where username = '$username' and password = '$password' ")
	  or die("failed to query database ".mysqli_error($link));
$row = mysqli_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password && $row['role'] == "admin"){
	$_SESSION['login_user']=$username; 
	header("LOCATION: dashboard.php");
}
else if($row['username'] == $username && $row['password'] == $password && $row['role'] == "user")
{$_SESSION['login_user']=$username; 
header("LOCATION:dashboard1.php");	
}
else{ echo "<script type='text/javascript'>alert('Check Your Credentials')</script>";
echo "<script>setTimeout(\"location.href = 'main.php';\",1500);</script>";
}
}
else
{header("LOCATION: main.php");
}

}
?>
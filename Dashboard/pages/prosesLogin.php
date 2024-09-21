<?php
    include '../../koneksi.php';
    
	$email=$_POST['email'];
    $password=md5($_POST['password']);
     
	$login = "SELECT * from user where email='$email' AND pass='$password'";
	
	$login_query = mysqli_query($conn,$login);
	$data = mysqli_fetch_array($login_query);

	$row = mysqli_fetch_assoc($login_query);
	
	if($data >0)
	{
		session_start();
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['level'] = $data['level'];

		if($data['level'] == "Admin")
		{
			header('location:../dashboard.php');
		}
		else
		{
			header('location:../../User/index.php');
		}
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='sign-in.php';
		</script>";
	}
?>

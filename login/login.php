<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	
	

	if (empty($uname)) {
		header("Location: index.php?error=Foydalanuvchi nomini kiriting");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Parol kiriting");
	    exit();
	}else{
        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			if ($uname==$adminname && $pass==$adminpass) 
			{
				header("Location: ../index.php");
				die();
			}else{
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];


				$user_id=$row['id'];
				

				$ism=$row['user_name'];
				$_SESSION['user_id']=$user_id;
				$_SESSION['user_name']=$ism;
				
            	header("Location: ../index.php");
		        exit();
            }else{
				header("Location: index.php?error= Foydalanuvchi nomi yoki parolda xato");
		        exit();
			}
		}
		}else{
			header("Location: index.php?error= Foydalanuvchi nomi yoki parolda xato");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
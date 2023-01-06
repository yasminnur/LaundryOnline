<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if ($_SESSION['status_login'] == true) {
    header('location: home.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">

	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="gambar/wave-biru-1.png">
	<div class="container">
		<div class="img">
			<img src="gambar/waiting-pana.png">
		</div>
		<div class="login-content">
			<form action="proses_login.php" method="post">
				<img class="logo" src="gambar/logo fiks.png" width="100px" height="180px">
				<h2 class="title">Welcome</h2>


           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" placeholder="Name" name="username" value="" class="form-control">
           		   </div>
           		</div>


           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" placeholder="Password" name="password" class="form-control">
            	   </div>
            	</div>


                <div class="input-div ">
           		   <div class="div">
					<select name="role" class="form-control">
                            <option></option>
                            <option value="owner">Owner</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
            	   </div>
            	</div>


            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<style type="text/css">
		.alert{
			position: relative;
		    padding: .75rem 1.25rem;
		    border: 1px solid transparent;
		}
		.alert-danger{
		    color: black;
		    background-color: rgba(141, 95, 95, 0.5);
		    border-color: rgb(141, 95, 95);
		}
		.alert-success{
		    color: white;
		    background-color: rgb(141, 95, 95);
		    border-color: ;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php session_start();
	if (isset($_SESSION['alert'])) {
		if(isset($_SESSION['alert']['danger'])){
			?>
			<div class="alert alert-danger">
				<?=$_SESSION['alert']['danger'];?>
			</div>
			<?php
		}else{
			?>
			<div class="alert alert-success">
				<?=$_SESSION['alert']['success'];?>
			</div>
			<?php
		}
	}
		session_unset();
		session_destroy(); 
	?>
			<div class="left">
				<div class="intro">
					<div class="desc">
					<h3>Selamat Datang</h3>
					<p>Silahkan registrasi terlebih dahulu</p>
					</div>
				</div>
			</div>
			<div class="right">
			<div class="head">
				<h3>Daftar</h3>
			</div>
				<form id="box-login" method="POST" action="act_login.php" style="margin-top: 0!important" autocomplete="off">
					<label><b>Nama</b></label>
						<div class="user">
							<input type="text" name="nama" placeholder="Nama">
						</div>
					<label><b>Username</b> </label>
						<div class="user">
							<input type="text" name="username" placeholder="Username">
						</div>
					<label><b>Password</b></label>
						<div class="user1">
							<input type="password" name="password" placeholder="Password">
						</div>
					<input type="hidden" name="aksi" value="daftar">
					<input type="submit" value="Daftar" name="submit">
					<a href="index.php">LOGIN</a>
				</form>
			</div>
		
		</div>
</body>
</html>
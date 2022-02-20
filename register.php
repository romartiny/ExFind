<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>ExFind Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/windowstyle.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/register.css">
</head>

<body>
	<div id="particles"></div>
	<div class="container">
		<div class="container-form">
			<div class="header">
			<a href="index.html"><img src="/assets/img/back.png" class="prev-back" width="10" height="10" alt="back button"></a>
				<h2>Register</h2>
			</div>
			<form method="post" action="register.php">
				<?php include('errors.php'); ?>
				<div class="input-group">
					<label class="label-class">Username</label>
					<input type="text" name="username" class="typing">
				</div>
				<div class="input-group">
					<label class="label-class">Email</label>
					<input type="email" name="email" class="typing" value="<?php echo $email; ?>">
				</div>
				<div class="input-group">
					<label class="label-class">Password</label>
					<input type="password" name="password_1" class="typing">
				</div>
				<div class="input-group">
					<label class="label-class">Confirm password</label>
					<input type="password" name="password_2" class="typing">
				</div>
				<div class="input-group input-button">
					<button type="submit" class="btn_reg" name="reg_user">Register</button>
				</div>
				<p>
					Already a member? <a href="login.php" class="sign-in">Sign in</a>
				</p>
			</form>
		</div>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/particles.min.js"></script>
	<script src="/assets/js/app.js"></script>
	<script>
		document.addEventListener('contextmenu', function (e) {
			e.preventDefault();
			alert("The right click function has been disabled on this website." + "\n\n" +
				"(C) Axi, Gill 2018");
		});
	</script>
</body>

</html>
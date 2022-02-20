<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>ExFind Login</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/windowstyle.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>

<body>
	<div id="particles"></div>
	<div class="container">
		<div class="container-form">
			<div class="header">
				<a href="index.html"><img src="/assets/img/back.png" class="prev-back" width="10" height="10" alt="back button"></a>
				<h2>Login</h2>
			</div>
			<form method="post" action="login.php">
				<?php include('errors.php'); ?>
				<div class="input-group">
					<label class="label-class">Username</label>
					<input type="text" name="username" class="typing">
				</div>
				<div class="input-group">
					<label class="label-class">Password</label>
					<input type="password" name="password" class="typing">
				</div>
				<div class="input-group input-button">
					<button type="submit" class="btn_login" name="login_user">Login</button>
				</div>
				<p>
					Not yet a member? <a href="register.php" class="sign-up">Sign up</a>
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
			alert("The right click function has been disabled on EXFIND." + "\n" +
				"Creator loves and protects you from awful code");
		});
	</script>
</body>

</html>
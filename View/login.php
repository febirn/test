<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Src\Librarian;

$librarian = new Librarian();

if ($librarian->is_login() != "") {
	$librarian->redirect('../');
}

if (isset($_POST['login'])) {
	$librarian->login($_POST['uname'], $_POST['pass']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD | OOP Dan PDO</title>
	<link rel="stylesheet" type="text/css" href="../Assets/Css/style.css">
</head>
<body class="form-login">
	<section class="login">
		<form action="" method="POST">
			<?php if (isset($_POST['login'])) : ?>
				<p class="message"><?= $librarian->message ?></p>
			<?php endif; ?>
			<div class="avatar"> </div>
			<p><input type="text" name="uname" placeholder="Username"
				required></p>
			<p><input type="password" name="pass" placeholder="Password" 
				required></p>
			<button type="submit" name="login">
				LOGIN</button>
		</form>
	</section>
</body>
</html>
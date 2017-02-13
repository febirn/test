<?php

use App\Src\Librarian;

$librarian = new Librarian();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Librarian</title>
</head>
<body>
	<form action="add_librarian.php" method="POST">
		<input type="text" name="name" placeholder="Nama Lengkap">
		<select name="gender">
			<option value="">-- Silahkan Pilih --</option>
			<option value="Laki-Laki">Laki-Laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="text" name="phone_number" placeholder="Phone Number">
		<textarea rows="4" cols="50" placeholder="Address"></textarea>
	</form>
</body>
</html>
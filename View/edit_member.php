<?php

if (isset($_POST['edit'])) {
	$member->updateMember($_GET['id'], $_POST['librarian_id'], $_POST['name'], 
		$_POST['gender'], $_POST['photo'], $_POST['date_expired']);
}
if (isset($_GET['id'])) {
	$members = $member->getDetailMember($_GET['id']);
}

?>

<div class="group">
	<i class="fa fa-pencil fa-lg left"></i>
	<span class="right">EDIT MEMBER</span>
</div>
<form action="" method="POST">
	<?php if (isset($_POST['edit'])) : ?>
			<p class="message sukses"><?= $member->message ?></p>
	<?php endif; ?>
	<p><input type="hidden" name="librarian_id" 
		value="<?= $_SESSION['login']['id'] ?>"></p>
	<p><input type="text" name="name" placeholder="Nama Lengkap" 
		value="<?= $members['name'] ?>" require></p>
	<p><select name="gender" required>
		<option value="">-- Jenis Kelamin --</option>
		<option value="Laki-Laki" 
			<?php if ($members['gender'] == "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
		<option value="Perempuan"
			<?php if ($members['gender'] == "Perempuan") echo "selected" ?>>Perempuan</option>
	</select></p>
	<p><?= $members['photo'] ?></p>
	<p><input type="file" name="photo"></p>
	<p><input type="text" name="date_expired" 
		value="<?= $members['date_expired'] ?>" required></p>
	<div class="grup">
		<button class="width-50" type="submit" name="edit">UPDATE DATA</button>
		<a href="index.php?page=data"><button class="width-50 error" 
			type="button">CLOSE</button></a>
	</div>
</form>
<?php

if (isset($_POST['add'])) {
	$member->addMember($_POST['librarian_id'], $_POST['name'], 
		$_POST['gender'], $_POST['photo'], $_POST['date_expired']);
}

?>

<div class="group">
	<i class="fa fa-user-plus fa-lg left"></i>
	<span class="right">ADD MEMBER</span>
</div>
<form action="" method="POST">
	<?php if (isset($_POST['add'])) : ?>
			<p class="message sukses"><?= $member->message ?></p>
	<?php endif; ?>
	<p><input type="hidden" name="librarian_id" 
		value="<?= $_SESSION['login']['id'] ?>"></p>
	<p><input type="text" name="name" placeholder="Nama Lengkap" 
		required></p>
	<p><select name="gender" required>
		<option value="">-- Jenis Kelamin --</option>
		<option value="Laki-Laki">Laki-Laki</option>
		<option value="Perempuan">Perempuan</option>
	</select></p>
	<p><input type="file" name="photo" required></p>
	<p><input type="text" name="date_expired" 
		placeholder="Date Expired" required></p>
	<button type="submit" name="add">ADD MEMBER</button>
</form>
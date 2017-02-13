<?php 
session_start();

require __DIR__ . "/vendor/autoload.php";

use App\Src\Librarian;
use App\Src\Member;

$librarian = new Librarian();
$member = new Member();

if (isset($_GET['logout'])) {
	$librarian->logout();
}

if ($librarian->is_login()) :

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD | OOP DAN PDO</title>
	<link rel="stylesheet" type="text/css" href="Assets/Css/style.css">
</head>
<body>
	<?php include 'View/menu.php' ?>
	<section class="container">
		<article class="col col-1">
			<?php
				if (isset($_GET['page'])) { 
					switch ($_GET['page']) {
						case ($_GET['page']) == 'data' :
							include 'View/data_member.php';
							break;
						case ($_GET['page']) == 'addmember' :
							include 'View/add_member.php';
							break;
						case ($_GET['page']) == 'edit' :
							include 'View/edit_member.php';
							break;
					}
				}
			?>
		</article>
		<?php include 'View/sidebar.php' ?>	
	</section>
</body>
</html>
<?php else :
	$librarian->redirect('View/login.php');
	endif;
?>

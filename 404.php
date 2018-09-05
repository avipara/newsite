<?php require_once 'includes/init.php';
require_once 'includes/db_connection.php';

header('HTTP/1.1 404 Page not found.');
$title = '404 Page Not Found';

require_once 'templets/header.php';
$active = '';
require_once 'templets/nav.php';
?>
<main class="row">
	<div class="col-12 text-center my-3">
		<h1>Error 4004 Page not found</h1>	
	</div>
</main>
<?php require_once 'templets/footer.php'; ;?>

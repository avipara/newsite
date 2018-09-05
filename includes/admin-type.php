<?php
if($_SESSION['admin']['type']!='admin'){
	redirect('admin');
	die;
}


?>
<?php
if(!isset($_SESSION['admin']) || empty($_SESSION['admin']))
{
	redirect('admin/login.php');
	die;
}


?>
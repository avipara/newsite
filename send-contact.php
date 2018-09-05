<?php

 require_once 'includes/init.php';

if(!empty($_POST)) {
 	

 	extract($_POST);

 	$to = "light.tiwari10@gmail.com";
 	$subject = "News Site Contact Message";

 	$content = "Name: {$name}\r\n";
 	$content .= "Email: {$email}\r\n";
 	$content .= "Message: {$message}";

 	@mail($to, $subject, $content, "From: {$email}");

 	$_SESSION['message'] = [
 		'content' => 'Contact message sent.',
 		'type' => 'success'
 	 	];

 	 	$addr = str_replace(config('site_url'), '', $_SERVER['HTTP_REFERER']);
 	 	redirect($addr);
 }

 else
{
	 $_SESSION['message'] = [
	 	'content'=>'Invalid Action .',
	    'type'=>'error'
	];
        $addr = str_replace(config('site_url'), '', $_SERVER['HTTP_REFERER']);
 	 	redirect($addr);
}
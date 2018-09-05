<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> -NEWSSITE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/front.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/all.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/alertify.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/default.css');?>">
</head>
<body style="background-color: lightgrey">
	<div class="container bg-white">
		<header class="row" style="background-color: #5cc65c">
			<div class="col py-4 text-md-left text-center">
				<h1 class="text-center">NewsSite</h1>
	    	</div>
	    	<div class="col-lg-4 col-md-5 py-4">
	    		<form action="<?php echo url('search'); ?>" method="get">
	    			<div class="form-group">
	    				<div class="input-group">
	    					<input type="search" name="term" placeholder="search" class="form-control"  required="">
	    					<div class="input-group-append">
	    						<button class="btn-primary" type="submit"><i class="fas fa-search"></i></button>
	    						
	    					</div>
	    				</div>
	    			</div>
	    		</form>
	    		
	    	</div>

		</header>
		
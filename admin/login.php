
			
		<?php
         require_once '../includes/init.php';
         $title='Login';
		 include_once 'templets/header.php';
		  
		 ?>  




			<!--Content Start-->
	 		<div class="col">
	 			<main class="col-4 mx-auto bg-white my-3">
	 				<div class="row">
	 					<div class="col-12">
	 						<h1 class="text-center">News Site</h1>
	 						<?php include_once('/templets/message.php');?>
	 						<form method="post" action="<?php echo url('admin/login-check.php');?>">
	 							<div class="form-group">
	 								<label>Email/Usernsme</label>
	 								<input type="text" name="username" class="form-control" required>
	 							</div>
	 							<div class="form-group">
	 								<label>Password</label>
	 								<input type="password" name="password" class="form-control" required>
	 							</div>
	 							<div class="form-group">
	 								<button type="submit" class="btn btn-primary">Login </button>
	 							</div>

	 						</form>
	 				    </div>
	 				</div>
	 			</main>
	 		<?php
			include_once'templets/footer.php';

			?>
	 
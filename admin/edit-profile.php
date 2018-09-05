 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         /*require_once '../includes/db_connection.php';*/
         $title='Edit profile';
		 include_once 'templets/header.php';
		  include_once 'templets/nav.php';
		 ?>  




			<!--Content Start-->
	 		<div class="col">
	 			<main class="col-12 bg-white my-3">
	 				<div class="row">
	 					<div class="col-6 mx-auto">
	 						<div class="row">
	 							<div class="col-12 text-center">
	 								<h1>Edit profile</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								<?php $admin=$_SESSION['admin'];?>


	 								<form method="post" action="<?php echo url('admin/update-profile.php');?>" id="password-confirm">
	 									<div class="form-group">
	 										<label for="first_name">First Name</label>
	 										<input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo($admin['first_name']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="middle_name">Middle Name</label>
	 										<input type="text" name="middle_name" class="form-control" id="middle_name" value="<?php echo($admin['middle_name']);?>" >
	 									</div>
	 									<div class="form-group">
	 										<label for="last_name">Last Name</label>
	 										<input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo($admin['last_name']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="username">User Name</label>
	 										<input type="text" name="username" class="form-control" id="username" value="<?php echo($admin['username']);?>" required>
	 									</div>
	 								    <div class="form-group">
	 										<label for="email">Email</label>
	 										<input type="email" name="email" class="form-control" id="email" value="<?php echo($admin['email']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="opassword">Old Password</label>
	 										<input type="password" name="opassword" class="form-control" id="opassword">
	 									</div>
	 									<div class="form-group">
	 										<label for="password">Password</label>
	 										<input type="password" name="password" class="form-control" id="password">
	 									</div>
	 									<div class="form-group">
	 										<label for="cpassword">Confirm Password</label>
	 										<input type="password" name="cpassword" class="form-control" id="cpassword">
	 									</div>
	 									<div class="form-group">
	 										<label for="phone">Phone</label>
	 										<input type="text" name="phone" class="form-control" id="phone" value="<?php echo($admin['phone']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="address">Address</label>
	 										<textarea class="form-control" name="address" id="address" required=""><?php echo($admin['address']);?>
	 											
	 										</textarea>
	 									</div>
	 									<div class="form-group">
	 										<button type="submit" class="btn btn-primary">Save
	 											
	 										</button>
	 									</div>

	 								</form>

	 							</div>
	 							
	 						</div>
	 						
	 					</div>
	 				</div>
	 				
	 			</main>
	 		<?php
			include_once'templets/footer.php';

			?>
	 
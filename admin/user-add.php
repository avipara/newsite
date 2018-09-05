 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         require_once '../includes/admin-type.php';
         /*require_once '../includes/db_connection.php';*/
         $title='User Add';
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
	 								<h1>User Add</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								


	 								<form method="post" action="<?php echo url('admin/user-store.php');?>" id="password-confirm">
	 									<div class="form-group">
	 										<label for="first_name">First Name</label>
	 										<input type="text" name="first_name" class="form-control" id="first_name" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="middle_name">Middle Name</label>
	 										<input type="text" name="middle_name" class="form-control" id="middle_name">
	 									</div>
	 									<div class="form-group">
	 										<label for="last_name">Last Name</label>
	 										<input type="text" name="last_name" class="form-control" id="last_name" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="username">User Name</label>
	 										<input type="text" name="username" class="form-control" id="username" required>
	 									</div>
	 								    <div class="form-group">
	 										<label for="email">Email</label>
	 										<input type="email" name="email" class="form-control" id="email" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="password">Password</label>
	 										<input type="password" name="password" class="form-control" id="password" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="cpassword">Confirm Password</label>
	 										<input type="password" name="cpassword" class="form-control" id="cpassword" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="phone">Phone</label>
	 										<input type="text" name="phone" class="form-control" id="phone" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="address">Address</label>
	 										<textarea class="form-control" name="address" id="address" required="">
	 										</textarea>
	 									</div>
	 									<div class="form-group">
	 										<label for="status">Status</label>
	 										<select class="form-control" name="status" id="status" required>
	 											<option value="active">Active</option>
	 											<option value="inactive">Inactive</option>
	 										</select>

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
	 
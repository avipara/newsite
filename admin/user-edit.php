 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         require_once '../includes/admin-type.php';
         require_once '../includes/db_connection.php';
         $title='User edit';
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
	 								<h1>User edit</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								<?php $username=$_GET['username'];
                                          $sql="SELECT * FROM admins WHERE username='{$username}' AND type='author'";
                                          $result=db_query($con,$sql);
                                          $admin=db_fetch_assoc($result);
	 								?>


	 								<form method="post" action="<?php echo url('admin/user-update.php');?>">
	 									<input type="hidden" name="id" value="<?php echo $admin[
	 									'id'];?>">
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
	 										<label for="phone">Phone</label>
	 										<input type="text" name="phone" class="form-control" id="phone" value="<?php echo($admin['phone']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="address">Address</label>
	 										<textarea class="form-control" name="address" id="address" required=""><?php echo($admin['address']);?>
	 											
	 										</textarea>
	 									</div>
	 									<div class="form-group">
	 										<label for="status">Status</label>
	 										<select class="form-control" name="status" id="status" required>
	 											<option value="active"<?php echo $admin['status']=='active'?'selected':'';?>>Active</option>
	 											<option value="inactive"<?php echo $admin['status']=='inactive'?'selected':'';?>>Inactive</option>
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
	 
 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         /*require_once '../includes/db_connection.php';*/
         $title='Category Add';
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
	 								<h1>Category Add</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								


	 								<form method="post" action="<?php echo url('admin/category-store.php');?>">
	 									<div class="form-group">
	 										<label for="name">Name</label>
	 										<input type="text" name="name" class="form-control" id="name" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="slug">Slug</label>
	 										<input type="text" name="slug" class="form-control" id="slug" required>
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
	 
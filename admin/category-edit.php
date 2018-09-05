 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         require_once '../includes/db_connection.php';
         $title='Category edit';
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
	 								<h1>Category edit</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								<?php $slug=$_GET['slug'];
                                          $sql="SELECT * FROM categories WHERE slug='{$slug}' ";
                                          $result=db_query($con,$sql);
                                          $category=db_fetch_assoc($result);
	 								?>


	 								<form method="post" action="<?php echo url('admin/category-update.php');?>">
	 									<input type="hidden" name="id" value="<?php echo $category[
	 									'id'];?>">
	 									<div class="form-group">
	 										<label for="name">Name</label>
	 										<input type="text" name="name" class="form-control" id="name" value="<?php echo($category['name']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="slug">Slug</label>
	 										<input type="text" name="slug" class="form-control" id="slug" value="<?php echo($category['slug']);?>" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="status">Status</label>
	 										<select class="form-control" name="status" id="status" required>
	 											<option value="active"<?php echo $category['status']=='active'?'selected':'';?>>Active</option>
	 											<option value="inactive"<?php echo $category['status']=='inactive'?'selected':'';?>>Inactive</option>
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
	 
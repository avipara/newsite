 
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         require_once '../includes/db_connection.php';
         $title='Article Add';
		 include_once 'templets/header.php';
		  include_once 'templets/nav.php';
		 ?>  




			<!--Content Start-->
	 		<div class="col">
	 			<main class="col-12 bg-white my-3">
	 				<div class="row">
	 					<div class="col-8 mx-auto">
	 						<div class="row">
	 							<div class="col-12 text-center">
	 								<h1>Article Add</h1>
	 							</div>
	 							<?php include_once('/templets/message.php');?>
	 							<div class="col-12">
	 								


	 								<form method="post" action="<?php echo url('admin/article-store.php');?>" enctype="multipart/form-data">
	 									<div class="form-group">
	 										<label for="name">Name</label>
	 										<input type="text" name="name" class="form-control" id="name" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="slug">Slug</label>
	 										<input type="text" name="slug" class="form-control" id="slug" required>
	 									</div>
	 									<div class="form-group">
	 										<label for="category_id">Category</label>
	 										<select name="category_id" class="form-control" id="category_id" required>
	 											<option value="">Select A category</option>
	 											<?php $sql="SELECT id,name FROM categories WHERE status='active'";
	 											$result=db_query($con,$sql);
                                                if($result && db_num_rows($result)>0):;
	 											?>
	 											<?php while($category=db_fetch_assoc($result)):;?>
	 											<option value=<?php echo $category['id'];?>><?php echo $category['name'];?></option>
	 											<?php endwhile;?>
	 										<?php endif;?>
	 										</select>
	 									</div>
	 									<div class="form-group"> 
	 										<label for="content">Content</label>
	 										<textarea class="form-control" name="content" id="content" required></textarea>
	 										
	 									</div>
	 									<div class="form-group">
	 										<label for="featured">Featured Image</label>
	 										<input type="file" name="featured" class="form-control" accept="image/*" id="featured">
	 										<div id="img-preview"></div>
	 									</div>
	 									<div class="form-group">
	 										<label for="published_at">Published At</label>
	 										<input type="text" name="published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at" id="published_at">
	 									</div>

	 									<div class="form-group">
	 										<label for="status">Status</label>
	 										<select class="form-control" name="status" id="status" required>
	 											<option value="draft">Draft</option>
	 											<option value="pending">Publish</option>
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
	 
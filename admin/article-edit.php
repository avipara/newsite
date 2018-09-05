<?php 
	require_once '../includes/init.php';
	require_once '../includes/admin-check.php';
	require_once '../includes/db_connection.php';
	$title = 'Article Edit';
	include_once 'templets/header.php';
	include_once 'templets/nav.php';
?>
<!-- Content Start -->
<div class="col">
	<main class="col-12 my-3 bg-white">
		<div class="row">
			<div class="col-8 mx-auto">
				<div class="row">
					<div class="col-12 text-center">
						<h1>Article Edit</h1>
					</div>
					<?php include_once 'templets/message.php'; ?>
					<div class="col-12">
						<?php
							$slug = $_GET['slug'];
							$sql = "SELECT * FROM articles WHERE slug = '{$slug}'";
							$result = db_query($con, $sql);
							$article = db_fetch_assoc($result);
						?>
						<form method="post" action="<?php echo url('admin/article-update.php') ?>" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" value="<?php echo $article['name']; ?>" required>
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" name="slug" id="slug" class="form-control" value="<?php echo $article['slug']; ?>" required>
							</div>
							<div class="form-group">
								<label for="category_id">Category</label>
								<select name="category_id" class="form-control" id="category_id" required>
									<option value="">Select a category</option>
									<?php
										$sql = "SELECT id, name FROM categories WHERE status = 'active'";
										$result = db_query($con, $sql);
										if($result && db_num_rows($result) > 0):
									?>
									<?php while($category = db_fetch_assoc($result)): ?>
									<option value="<?php echo $category['id']; ?>" <?php echo $article['category_id'] == $category['id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
									<?php endwhile; ?>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" id="content" required><?php echo $article['content']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="featured">Featured Image</label>
								<input type="file" name="featured" id="featured" class="form-control" accept="image/*">
								<div id="img-preview">
									<?php if(isset($article['featured_image']) && !empty($article['featured_image'])): ?>
									<img src="<?php echo url('images/'.$article['featured_image']); ?>" class="img-fluid mt-3">
									<input type="hidden" name="featured_image" value="<?php echo $article['featured_image']; ?>">
									<?php endif; ?>
								</div>
							</div>
							<div class="form-group">
								<label for="published_at">Published At</label>
								<input type="text" name="published_at" id="published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at" value="<?php echo $article['published_at']; ?>">
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" name="status" id="status" required>
									<?php if($_SESSION['admin']['type'] == 'author'): ?>
									<option value="draft" <?php echo $article['status'] == 'draft' ? 'selected' : ''; ?>>Draft</option>
									<option value="pending" <?php echo $article['status'] == 'pending' ? 'selected' : ''; ?>>Publish</option>
									<?php else: ?>
									<option value="pending" <?php echo $article['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
									<option value="published" <?php echo $article['status'] == 'published' ? 'selected' : ''; ?>>Published</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php include_once 'templets/footer.php'; ?>
				
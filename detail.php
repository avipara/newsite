<?php require_once 'includes/init.php';
require_once 'includes/db_connection.php';
$slug=$_GET['slug'];
$now=date('Y-m-d H:i:s');
$sql="SELECT * FROM articles WHERE status='published' AND published_at<='{$now}' AND slug='{$slug}' AND EXISTS(SELECT id FROM admins
	  WHERE status='active' AND articles.user_id=admins.id)";
$result=db_query($con,$sql);


	


$article=db_fetch_assoc($result);
$title=$article['name'];
 
	 $qry="SELECT name, slug FROM categories WHERE id='{$article['category_id']}'" ;
	$res=db_query($con,$qry);
	$category=db_fetch_assoc($res);

require_once 'templets/header.php';
$active= $category['slug'];
require_once 'templets/nav.php';
?>


			
<main class="row">
<div class="col-12 mt-3 top-news">
	<div class="row">
		<div class="col-12 mb-3 top-news-title">
			<?php echo $article['name'] ;?>
		</div>
	</div>
	<div class="row">
		<?php if(!empty($article['featured_image'])):?>
		<div class="col-12">
        	<img src="<?php echo url('images/'.$article['featured_image']);?>" class="img-fluid">
		</div>
	    <?php endif;?>
		<div class="col-12 mt-3">
			<div class="row">
				<div class="col-12">
					<?php $qry="SELECT first_name,middle_name,last_name FROM admins WHERE id='{$article['user_id']}'" ;
					$res=db_query($con,$qry);
					$user=db_fetch_assoc($res);

					?>
					<span class="news-info mr-2"><i class="fas fa-user"></i> <?php echo $user['first_name'].' '.$user['middle_name'].' '.$user['last_name'] ;?></span>
					<span class="news-info mr-2 "><i class="fas fa-clock"></i>
						<?php echo date('j M ,Y h:m A',strtotime($article['published_at'])) ;?>
					 </span>

					<span class="news-info"><i class="fas fa-tag"></i>
						<?php echo $category['name'] ;?>
					 </span>
				</div>
				<div class="col-12">
			 		<?php echo $article['content'];?>

        		</div>
			</div>
		</div>
	</div>
</div>
<div class="col-12">
	<hr>
</div>
	<a name="comment"></a>
	<div class="col-12">
		<div class="row">
			<div class="col-lg-7 col-md-6">
				<div class="row">
					<div class="col-12">
						<h4>Add Comments</h4>
					</div>
					<div class="col-12">
						<form method="post" action="<?php echo url('add-comment.php'); ?>">
							<input type="hidden" name="slug" value="<?php echo $slug; ?>">
							<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea class="form-control" name="comment" id="comment" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<hr>
					</div>
					<div class="col-12">
						<h4>Comments</h4>
					</div>
					<div class="col-12">
							<?php 
								$sql = "SELECT * FROM comments WHERE article_id = '{$article['id']}' ORDER BY created_at DESC ";
								$result = db_query($con, $sql);
								if($result && db_num_rows($result) > 0):
							?>
							<?php while($comment = db_fetch_assoc($result)): ?>
								<div class="col-12 mb-3 py-3 px-4 comments">
									<div class="row">
										<div class="col-12">
											<strong><?php  echo $comment['full_name']; ?> </strong> <em>(<?php echo $comment['email']; ?>)</em>
										</div>
										<div class="col-12">
											<?php  echo $comment['content']; ?>
										</div>
										<div class="col-12">
											<small>Posted at <?php echo date('j M, Y h:i A', strtotime($comment['created_at'])); ?></small>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php else: ?> 
								<div class="col-12 mb-3 py-3 px-4 comments text-center">
									<small>No comments added yet for this article. </small>
								</div>
							<?php endif; ?>
						
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-6">
				<div class="row">
					<?php $sql="SELECT name, slug, featured_image FROM articles WHERE status='published' AND published_at<='{$now}' AND category_id = '{$article['category_id']}' AND id !='{$article['id']}' AND EXISTS (SELECT id FROM admins WHERE status = 'active' AND articles.user_id = admins.id) ORDER BY published_at DESC LIMIT 0,2";
					    
						$result=db_query($con,$sql);
						
	  					if($result && db_num_rows($result)>0):
						?>
					<div class="col-12">
						<h4>Related Articles</h4>
					</div>
					<?php while($related=db_fetch_assoc($result)): ?>
					<div class="col-12 mt-3">
						<div class="row">
							<?php if(!empty($related['featured_image'])):?>
							<div class="col-4">
								<div class="news-thumbnail small-thumbnail" style="background-image:url('<?php echo url('images/'.$related['featured_image']);?>')">
								</div>
							</div>
							<?php else:;?>
								<div class="col-4">
								    <div class="news-thumbnail small-thumbnail" style="background-image:url('<?php echo url('images/No.png');?>')">
								</div>
							</div>
						<?php endif;?>
						<div class="col-8">
							<a href="<?php echo url('article/'.$related['slug']) ;?>"><storng><?php echo $related['name'];?></storng></a>
						</div>
						</div>
					</div>
					<?php endwhile; ?>
					<div class="col-12">
						<hr>
					</div>
					<?php endif; ?>

					<?php $sql="SELECT name, slug, featured_image FROM articles WHERE status='published' AND published_at<='{$now}' AND id != '{$article['id']}' AND EXISTS(SELECT id FROM categories WHERE status='active' AND articles.category_id=categories.id) AND EXISTS (SELECT id FROM admins WHERE status = 'active' AND articles.user_id = admins.id) ORDER BY RAND() DESC LIMIT 0,2";
						$result=db_query($con,$sql);
	  					if($result && db_num_rows($result)>0):
						?>
					<div class="col-12">
						<h4>Recommended Articles</h4>
					</div>
					<?php while($related=db_fetch_assoc($result)): ?>
						
					<div class="col-12 mt-3">
						<div class="row">
							<?php if(!empty($related['featured_image'])):?>
							<div class="col-4">
								<div class="news-thumbnail small-thumbnail" style="background-image:url('<?php echo url('images/'.$related['featured_image']);?>')">
								</div>
							</div>
							<?php else:?>
								<div class="col-4">
								    <div class="news-thumbnail small-thumbnail" style="background-image:url('<?php echo url('images/No.png');?>')">
								</div>
							</div>
						<?php endif;?>
						<div class="col-8">
							<a href="<?php echo url('article/'.$related['slug']) ;?>"><storng><?php echo $related['name'];?></storng></a>
						</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php require_once 'templets/footer.php'; ;?>

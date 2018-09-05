<?php require_once 'includes/init.php';
require_once 'includes/db_connection.php';
$title='Welcome';
require_once 'templets/header.php';
$active='home';
require_once 'templets/nav.php';
?>


			
<main class="row">
	<?php 
	$now=date('Y-m-d H:i:s');
	$sql="SELECT * FROM articles WHERE status='published' AND published_at<='{$now}' AND EXISTS(SELECT id FROM categories WHERE status='active' AND articles.category_id=categories.id)  AND EXISTS(SELECT id FROM admins
	  WHERE status='active' AND articles.user_id=admins.id) ORDER BY published_at DESC LIMIT 1";
	$result=db_query($con,$sql);
	if($result && db_num_rows($result)>0):

	?>
<div class="col-12 mt-3 top-news">
	<?php $article=db_fetch_assoc($result) ;?>
	<div class="row">
		<div class="col-12 mb-3 top-news-title">
			<?php echo $article['name'] ;?>
		</div>
	</div>
	<div class="row">
		<?php if(!empty($article['featured_image'])):?>
		<div class="col-4">
        	<img src="<?php echo url('images/'.$article['featured_image']);?>" class="img-fluid">
		</div>
	    <?php endif;?>
		<div class="col">
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
					 <?php $qry="SELECT name FROM categories WHERE id='{$article['category_id']}'" ;
					$res=db_query($con,$qry);
					$category=db_fetch_assoc($res);

					?>
					<span class="news-info"><i class="fas fa-tag"></i>
						<?php echo $category['name'] ;?>
					 </span>
				</div>
				<div class="col-12">
			 		<?php echo getFirstPara($article['content']) ;?>
			 		<a href="#">Read More</a>
        		</div>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<div class="col-12">
	<hr>
</div>
<div class="col-12">
	<div class="row">
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="row">
				<div class="col-12">
					<div class="news-thumbnail" style="background-image: url('<?php echo url('images/article_54071020182119_8523.jpg');?>')">
					</div>
				</div>
				<div class="col-12">
					<a href="#"><storng>Lorem ipsum dolor sit amet, consectetur</storng></a>
				</div>
			</div>
		</div>
	</div>
</div>

</main>
<?php require_once 'templets/footer.php'; ;?>

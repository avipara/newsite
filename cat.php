<?php require_once 'includes/init.php';
require_once 'includes/db_connection.php';
$slug=$_GET['slug'];
$sql="SELECT * FROM categories WHERE slug='{$slug}' AND status = 'active'";
$result=db_query($con,$sql);


$category=db_fetch_assoc($result);
$title=$category['name'];
require_once 'templets/header.php';
$active=$slug;
require_once 'templets/nav.php';
?>
<main class="row">
	
<div class="col-12">
	<div class="row">

		<div class="col-12 text-center my-3">
			<h3>Category:<?php echo $category['name'];?></h3>
		</div>
		<?php 
        $now=date('Y-m-d H:i:s');
        if(isset($_GET['page']) && !empty($_GET['page'])){
			$pageno=$_GET['page'];}

					
		else{
            $pageno=1;
		    }
			$limit=16;
		$sql="SELECT COUNT(id) AS total FROM articles WHERE status='published' AND published_at<='{$now}' AND category_id='{$category['id']}' AND EXISTS(SELECT id FROM admins
	  WHERE status='active' AND articles.user_id=admins.id)";
	  	$result=db_query($con,$sql);
	    $data=db_fetch_assoc($result);
		$total=$data['total'];
		$pages=ceil($total/$limit);
		$offset=($pageno*$limit)-$limit;
	  	$sql="SELECT name,slug,featured_image FROM articles WHERE status='published' AND published_at<='{$now}' AND category_id='{$category['id']}' AND EXISTS(SELECT id FROM admins
	  WHERE status='active' AND articles.user_id=admins.id) ORDER BY published_at DESC LIMIT {$offset},{$limit}";
	  	$result=db_query($con,$sql);
	  if($result && db_num_rows($result)>0):
		?>
		<?php while($article=db_fetch_assoc($result)): 
			?>
		<div class="col-md-3 col-sm-6">
			<div class="row">
				<?php if(!empty($article['featured_image'])):?>
				<div class="col-12">
					<div class="news-thumbnail" style="background-image:url('<?php echo url('images/'.$article['featured_image']);?>')">
					</div>
				</div>
				<?php else:?>
					<div class="col-12">
					    <div class="news-thumbnail" style="background-image:url('<?php echo url('images/No.png');?>')">
					</div>
				</div>
			<?php endif;?>
				<div class="col-12 text-center">
					<a href="<?php echo url('article/'.$article['slug']) ;?>"><storng><?php echo $article['name'];?></storng></a>
				</div>
				 
			</div>
		</div>
		<?php endwhile;?>
		<?php endif;?>
	</div>
</div>
<?php if($pages>1):;?>
				<div class="col-12 mt-3">
					<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				    <?php if($pageno==1):;?>
				    <li class="page-item disabled">
				      <a class="page-link" href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				        <span class="sr-only">Previous</span>
				      </a>
				    </li>
                    <?php else:;?>
                    	<li class="page-item ">
					      <a class="page-link" href="<?php echo url('category/'.$slug.'?page='.($pageno-1));?>" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					        <span class="sr-only">Previous</span>
					      </a>
				    </li>
				    <?php endif;?>

                    <?php for($n=1;$n<=$pages;$n++):;?>
                    <?php if($n==$pageno):;?>
                    	<li class="page-item active">
					      <span class="page-link">
					        <?php echo $n;?>
					        <span class="sr-only">(current)</span>
					      </span>
					    </li>
					<?php else:;?>
				    <li class="page-item"><a class="page-link" href="<?php echo url('category/'.$slug.'?page='.$n);?>"><?php echo $n;?></a></li>
				<?php endif;?>
				<?php endfor;?>
				<?php if($pageno==$pages):;?>
				    <li class="page-item disabled">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li>
				<?php else:;?>
					 <li class="page-item">
				      <a class="page-link" href="<?php echo url('category/'.$slug.'?page='.($pageno+1));?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li>
				<?php endif;?>
				  </ul>
				</nav>
				</div>
			    <?php endif;?>

</main>
<?php require_once 'templets/footer.php'; ;?>

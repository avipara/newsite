
			
<?php
require_once '../includes/init.php';
require_once '../includes/admin-check.php';
require_once '../includes/db_connection.php';
$title='Articles';
include_once 'templets/header.php';
include_once 'templets/nav.php';
?>  




<!--Content Start-->
	<div class="col">
		<main class="col-12 bg-white my-3">
			<div class="row">
				<div class="col-12 text-center">
					<h1>Articles</h1>
				</div>
				<?php include_once('/templets/message.php');?>
				<div class="col-12">
					<table class="table table-stripped table-hover table-sm" >
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Image</th>
								<th>Category</th>
								<th>Author</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Updated At</th>
								<th>Published At</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($_GET['page']) && !empty($_GET['page'])){
								$pageno=$_GET['page'];

							}
							else{
                             $pageno=1;
							    }
							$limit=10;
							$sql="SELECT COUNT(id) AS total FROM articles";
							if($_SESSION['admin']['type']=='author'){
								$sql.=" WHERE user_id=".$_SESSION['admin']['id'];
							}
							else{
								$sql.=" WHERE status!='draft'";
							}
							$result=db_query($con,$sql);
						    $data=db_fetch_assoc($result);


							$total=$data['total'];
							$pages=ceil($total/$limit);
							$offset=($pageno*$limit)-$limit;
						    $sql="SELECT * FROM articles";
							if($_SESSION['admin']['type']=='author'){
								$sql.=" WHERE user_id=".$_SESSION['admin']['id'];
							}
							else{
								$sql.=" WHERE status!='draft'";
							}
							$sql.=" ORDER BY created_at DESC LIMIT {$offset},{$limit}";
						          $result=db_query($con,$sql);
						          $i=$offset+1;
						          if($result && db_num_rows($result)>0):
						    ?>
						    <?php while($article=db_fetch_assoc($result)): 
						     ?>
						     <tr>
						     	<td><?php echo $i++;?></td>
						     	<td><?php echo $article['name'];
						     	 ?></td>
						     	<td><?php echo $article['slug'];?></td>
						     	<td><?php echo !empty($article['featured_image']) ? '<img src="'.url('images/'.$article['featured_image']).'" class="img-small">' : 'n/a'; ?></td>
						     	<?php 
						     		$qry="SELECT name FROM categories WHERE id='{$article['category_id']}'";
						     		$res=db_query($con,$qry);
						     		$category=db_fetch_assoc($res);
						     	;?>
						     	<td><?php echo $category['name'];?></td>
						     	<?php 
						     		$qry="SELECT first_name,middle_name,last_name FROM admins WHERE id='{$article['user_id']}'";
						     		$res=db_query($con,$qry);
						     		$author=db_fetch_assoc($res);
						     	;?>
						     	<td><?php echo $author['first_name'].' '.$author['middle_name'].' '.$author['last_name'] ;?></td>
						     	<td><?php echo ucfirst($article['status']);?></td>
						     	<td><?php echo date("jS M Y h:i:s A",strtotime($article['created_at']));?></td>
						     	<td><?php echo date("jS M Y h:i:s A",strtotime($article['updated_at']));?></td>
						     	<td><?php echo !is_null($article['published_at'])?date("jS M Y h:i:s A",strtotime($article['published_at'])):'n/a';?></td>

						     	
						     	<td>
						     		<a href="article-edit.php?slug=<?php echo $article['slug'];?>" class="mr-3"><i class="fas fa-edit"></i></a>
						     		<a href="article-delete.php?slug=<?php echo $article['slug'];?>" class="delete-data mr-3"><i class="fas fa-trash"></i></a>
						     		

						     	</td>
						     </tr>
						 <?php endwhile;?>
						    <?php else: ?>
						    	<tr class="text-center">
						    		<td colspan="10">No Data added Yet.</td>
						    	</tr>
						    <?php endif;   ?>
						</tbody>
						
					</table>
				</div>
				<?php if($pages>1):;?>
				<div class="col-12">
					<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <?php if($pageno==1):;?>
				    <li class="page-item disabled">
				      <a class="page-link" href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				        <span class="sr-only">Previous</span>
				      </a>
				    </li>
                    <?php else:;?>
                    	<li class="page-item ">
					      <a class="page-link" href="<?php echo url('admin/articles.php?page='.($pageno-1));?>" aria-label="Previous">
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
				    <li class="page-item"><a class="page-link" href="<?php echo url('admin/articles.php?page='.$n);?>"><?php echo $n;?></a></li>
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
				      <a class="page-link" href="<?php echo url('admin/articles.php?page='.($pageno+1));?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li>
				<?php endif;?>
				  </ul>
				</nav>
				</div>
			    <?php endif;?>
			    <?php if($_SESSION['admin']['type']=='author'): ;?>
				<div class="col-12 my-3">
					<a href="article-add.php" class="btn btn-primary ">ADD New Article</a>
				</div>
			<?php endif;?>
			</div>
		</main>
	<?php
include_once'templets/footer.php';

?>

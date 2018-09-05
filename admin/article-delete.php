<?php 
	 require_once '../includes/init.php';
	 require_once '../includes/admin-check.php';
	 require_once '../includes/db_connection.php';

	 if(isset($_GET['slug']) && !empty($_GET['slug'])){
	 	$slug=$_GET['slug'];

	 	$sql = "SELECT id, featured_image FROM articles WHERE slug = '{$slug}'";
	 		 	$result = db_query($con, $sql);
				$article = db_fetch_assoc($result);

				$sql = "DELETE FROM comments WHERE article_id = '{$article['id']}'";
			 	$result = db_query($con, $sql);

			 	@unlink('../images/'.$article['featured_image'])


	 	$sql = "DELETE FROM articles WHERE slug='{$slug}'";
	 	$result = db_query($con, $sql);
	 	
	 	if($result){

               $_SESSION['message']=['content'=>'Article Removed .','type'=>'success'];
               redirect('admin/articles.php');
	 	}
	 	else{

               $_SESSION['message']=['content'=>'Error While Removing Data .'.db_error($con),'type'=>'danger'];
               redirect('admin/articles.php');
	 	    }
	 }
	 else
	 	{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/articles.php');
}

;?>
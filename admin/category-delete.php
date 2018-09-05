<?php 
	 require_once '../includes/init.php';
	 require_once '../includes/admin-check.php';
	 require_once '../includes/db_connection.php';
	 if(isset($_GET['slug']) && !empty($_GET['slug'])){
	 	$slug=$_GET['slug'];
	 	$sql="DELETE FROM categories WHERE slug='{$slug}'";
	 	$result=db_query($con, $sql);
	 	if($result){

               $_SESSION['message']=['content'=>'Category Removed .','type'=>'success'];
               redirect('admin/categories.php');
	 	}
	 	else{

               $_SESSION['message']=['content'=>'Error While Removing Data .'.db_error($con),'type'=>'danger'];
               redirect('admin/categories.php');
	 	    }
	 }
	 else
	 	{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/categories.php');
}

;?>
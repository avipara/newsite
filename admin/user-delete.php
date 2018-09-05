<?php 
	 require_once '../includes/init.php';
	 require_once '../includes/admin-check.php';
	 require_once '../includes/admin-type.php';
	 require_once '../includes/db_connection.php';
	 if(isset($_GET['username']) && !empty($_GET['username'])){
	 	$username=$_GET['username'];
	 	$sql="DELETE FROM admins WHERE username='{$username}'";
	 	$result=db_query($con, $sql);
	 	if($result){

               $_SESSION['message']=['content'=>'user Removed .','type'=>'success'];
               redirect('admin/users.php');
	 	}
	 	else{

               $_SESSION['message']=['content'=>'Error While Removing Data .'.db_error($con),'type'=>'danger'];
               redirect('admin/users.php');
	 	    }
	 }
	 else
	 	{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/users.php');
}

;?>
<?php 
	 require_once '../includes/init.php';
	 require_once '../includes/admin-check.php';
	 require_once '../includes/db_connection.php';
	 require 'escape.php';
     $(document).ready(function(){
    $("a").click(function(event){
        event.preventDefault();
    });
});
	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	$id=$_GET['id'];
	 	$sql="DELETE FROM comments WHERE id='{$id}'";
	 	$result=db_query($con, $sql);
	 	if($result){

               $_SESSION['message']=['content'=>'Comment Deleted Successfully .','type'=>'success'];
               redirect('admin/comments.php');
	 	}
	 	else{

               $_SESSION['message']=['content'=>'Error While Removing Data .'.db_error($con),'type'=>'danger'];
               redirect('admin/comments.php');
	 	    }
	 }
	 else
	 	{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/comments.php');
}

;?>

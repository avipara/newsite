<?php
 require_once '../includes/init.php';
 require_once '../includes/admin-check.php';
 require_once '../includes/db_connection.php';
if(!empty($_POST))
{
 	/*$first_name=$first_name;*/
 	extract($_POST);
 	$now=date('Y-m-d H:i:s');
 	$sql="INSERT INTO categories SET name='{$name}',slug='{$slug}',status='{$status}',created_at='{$now}',updated_at='{$now}'";
           $result=db_query($con,$sql);
           if($result)
           {
            
               $_SESSION['message']=['content'=>'New Category added .','type'=>'success'];
               redirect('admin/categories.php');
           }
           else
           {
             $_SESSION['message']=[
              'content'=>'Error While Adding Data .'.db_error($con),
              'type'=>'danger'];
              redirect('admin/category-add.php');
       }

}
else
{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/category-add.php');
}

;

?>
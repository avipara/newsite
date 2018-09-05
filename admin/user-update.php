<?php
 require_once '../includes/init.php';
 require_once '../includes/admin-check.php';
 require_once '../includes/admin-type.php';
 require_once '../includes/db_connection.php';
if(!empty($_POST))
{
 	/*$first_name=$first_name;*/
 	extract($_POST);
 	$now=date('Y-m-d H:i:s');
 	$sql="UPDATE admins SET first_name='{$first_name}',last_name='{$last_name}',middle_name='{$middle_name}',username='{$username}',email='{$email}',address='{$address}',phone='{$phone}',status='{$status}',type='author',updated_at='{$now}' WHERE id={$id}";
           $result=db_query($con,$sql);
           if($result)
           {
            
               $_SESSION['message']=['content'=>'user information updated .','type'=>'success'];
               redirect('admin/users.php');
           }
           else
           {
             $_SESSION['message']=[
              'content'=>'Error While Updateing Data .'.db_error($con),
              'type'=>'danger'];
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

;

?>
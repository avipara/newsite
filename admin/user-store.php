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
  $password=sha1($password);
 	$sql="INSERT INTO admins SET first_name='{$first_name}',last_name='{$last_name}',middle_name='{$middle_name}',username='{$username}',email='{$email}',address='{$address}',phone='{$phone}',password='{$password}',status='{$status}',type='author',created_at='{$now}',updated_at='{$now}'";
           $result=db_query($con,$sql);
           if($result)
           {
            
               $_SESSION['message']=['content'=>'New User added .','type'=>'success'];
               redirect('admin/users.php');
           }
           else
           {
             $_SESSION['message']=[
              'content'=>'Error While Adding Data .'.db_error($con),
              'type'=>'danger'];
              redirect('admin/user-add.php');
       }

}
else
{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/user-add.php');
}

;

?>
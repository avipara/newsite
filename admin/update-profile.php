<?php
 require_once '../includes/init.php';
 require_once '../includes/admin-check.php';
 require_once '../includes/db_connection.php';
if(!empty($_POST))
{
 	/*$first_name=$first_name;*/
 	extract($_POST);
 	$now=date('Y-m-d H:i:s');
    $user_id=$_SESSION['admin']['id'];
    $user_type=$_SESSION['admin']['type'];
 	$sql="UPDATE admins SET first_name='{$first_name}',last_name='{$last_name}',middle_name='{$middle_name}',username='{$username}',email='{$email}',address='{$address}',phone='{$phone}',updated_at='{$now}'";
 	if (isset($password) && !empty($password) && isset($opassword) && !empty($opassword))
 	{
 		$password=sha1($password);
 		$opassword=sha1($opassword);
 		$qry="SELECT id FROM admins where id='{$user_id}' AND password='{$opassword}'";
 		$res=db_query($con,$qry);
 		if ($res && db_num_rows($res)==1)
 		 {
 			$sql.=",password='{$password}'";
 		 }
 		 else
 		 {
 		 	 $_SESSION['message']=[
       'content'=>'Old password is incorrect .',
       'type'=>'danger'];
       redirect('admin/edit-profile.php');
       die;
 		 }
 		 
 		

 	}
      $sql.=" WHERE id='{$user_id}'";
           $result=db_query($con,$sql);
           if($result)
           {
            $_SESSION['admin']=[
                           'id'=>$user_id,
                           'username'=>$username,
                           'email'=>$email,
                           'address'=>$address,
                           'phone'=>$phone,
                           'first_name'=>$first_name,
                           'middle_name'=>$middle_name,
                           'last_name'=>$last_name,
                           'type'=>$user_type
                            ];
                            $_SESSION['message']=['content'=>'Your profile information updated .','type'=>'success'];
                            redirect('admin/edit-profile.php');
           }
           else
           {
             $_SESSION['message']=[
              'content'=>'Error While updating Data .'.db_error($con),
              'type'=>'danger'];
                       redirect('admin/edit-profile.php');
       }

}
else
{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/edit-profile.php');
}

;

?>
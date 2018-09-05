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
 	$sql="INSERT INTO articles SET name='{$name}',slug='{$slug}',category_id='{$category_id}',user_id='{$user_id}',content='{$content}',status='{$status}',created_at='{$now}',updated_at='{$now}'";
  if(isset($published_at)&& !empty($published_at)){
      $published_at=date('Y-m-d H:i:s',strtotime($published_at));
      $sql.=",published_at='{$published_at}'";
  }
  else{
    $sql.=",published_at=NULL";
  }
  if(isset($_FILES['featured'])&& !empty($_FILES['featured'])){

      $image=$_FILES['featured'];
      $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
      $filename='article_'.date('smHYid').'_'.rand(1000,9999).".".$ext;
      move_uploaded_file($image['tmp_name'], '../images/'.$filename);
      $sql.=", featured_image='{$filename}'";
  }
         $result=db_query($con,$sql);
           if($result)
           {
            
               $_SESSION['message']=['content'=>'New Article added .','type'=>'success'];
               redirect('admin/articles.php');
           }
           else
           {
             $_SESSION['message']=[
              'content'=>'Error While Adding Data .'.db_error($con),
              'type'=>'danger'];
              redirect('admin/article-add.php');
       }

}
else
{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'danger'];
        redirect('admin/article-add.php');
}

;

?>
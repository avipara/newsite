<?php
 require_once 'includes/init.php';
 require_once 'includes/db_connection.php';
 require 'escape.php';

if(!empty($_POST)) {
 	extract($_POST);
 	$now=date('Y-m-d H:i:s');
  
 	$sql="INSERT INTO comments SET full_name='{$name}', email='{$email}', article_id='{$id}', content='{$comment}', created_at='{$now}' ";

         $result=db_query($con,$sql);
           if($result)
           {
            
               $_SESSION['message']=
               ['content'=>'New Comment added .',
               'type'=>'success'];
               redirect('article/'.$slug.'#comment');
           }
           else
           {
             $_SESSION['message']=
             ['content'=>'Error While Adding Comment.',
              'type'=>'error'];
              redirect('article/'.$slug.'#comment');
       }

}
else
{
	 $_SESSION['message']=
	    ['content'=>'Invalid Action .',
	    'type'=>'error'];
        redirect('/');
}

;

?>
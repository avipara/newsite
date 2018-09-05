        <?php 
         	require_once '../includes/init.php';
         	require_once '../includes/db_connection.php';

         	if(!empty($_POST))
         	{
               $username=$_POST['username'];
               $password=sha1($_POST['password']);
               $sql = "SELECT * FROM  admins WHERE (email='{$username}' OR username='{$username}') AND password='{$password}' AND status='active'";
               $result=db_query($con,$sql);
               if($result && db_num_rows($result)==1)
               { 
               		$admin=db_fetch_assoc($result);
                  $ip=$_SERVER['REMOTE_ADDR'];
                  $now=date('Y-m-d H:i:s');
                  $sql="INSERT INTO admin_logs SET user_id='{$admin['id']}',ip_address='{$ip}',created_at='{$now}'";
                  db_query($con,$sql);


               		$_SESSION['admin']=['id'=>$admin['id'],
                     'username'=>$admin['username'],
                     'email'=>$admin['email'],
                     'address'=>$admin['address'],
                     'phone'=>$admin['phone'],
                     'first_name'=>$admin['first_name'],
                     'middle_name'=>$admin['middle_name'],
                     'last_name'=>$admin['last_name'],
                     'type'=>$admin['type'],];
                     
               		redirect('admin');

               }
               

               else
               {
               	 $_SESSION['message']=[
              'content'=>'Incorrect username or password .',
              'type'=>'danger'];
              redirect('admin/login.php');
                       
               }



         	}
         	else
         	{
         		 $_SESSION['message']=[
              'content'=>'Invalid access .',
              'type'=>'danger'];
              redirect('admin/login.php');
         	}
        ?>
		 
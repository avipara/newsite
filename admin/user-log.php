
			
		<?php
         require_once '../includes/init.php';
         require_once '../includes/admin-check.php';
         require_once '../includes/admin-type.php';
         require_once '../includes/db_connection.php';
         $title='Users Log';
		 include_once 'templets/header.php';
		  include_once 'templets/nav.php';
		 ?>  




			<!--Content Start-->
	 		<div class="col">
	 			<main class="col-12 bg-white my-3">
	 				<div class="row">
	 					<div class="col-12 text-center">
	 						<h1>Users Log</h1>
	 					</div>
	 					<?php include_once('/templets/message.php');?>
	 					<div class="col-12">
	 						<table class="table table-stripped table-hover table-sm" >
	 							<thead>
	 								<tr>
	 									<th>#</th>
	 									<th>Name</th>
	 									<th>Ip Address</th>
	 									<th>Created At</th>
	 								</tr>
	 							</thead>
	 							<tbody>
	 								<?php 
	 								     $username=$_GET['username'];
	 								     $sql="SELECT id,first_name,middle_name,last_name FROM admins WHERE username='{$username}'";
	 								     $result=db_query($con,$sql);
	 								     $user=db_fetch_assoc($result);
	 								if(isset($_GET['page']) && !empty($_GET['page'])){
	 									$pageno=$_GET['page'];

	 								}
	 								else{
                                         $pageno=1;
	 								    }
	 								$limit=2;
	 								$sql="SELECT COUNT(id) AS total FROM admin_logs WHERE user_id='{$user['id']}'";
	 								$result=db_query($con,$sql);
	 								$data=db_fetch_assoc($result);
	 								$total=$data['total'];
	 								$pages=ceil($total/$limit);
	 								$offset=($pageno*$limit)-$limit;
	 								

	 								;?>
	 								<?php $sql="SELECT * FROM admin_logs WHERE user_id='{$user['id']}' ORDER BY created_at DESC LIMIT {$offset},{$limit}";
	 							          $result=db_query($con,$sql);
	 							          $i=$offset+1;
	 							          if($result && db_num_rows($result)>0):
	 							    ?>
	 							    <?php while ($log=db_fetch_assoc($result)): ;
	 							     ?>
	 							     <tr>
	 							     	<td><?php echo $i++;?></td>
	 							     	<td><?php echo $user['first_name'].' '.$user['middle_name'].' '.$user['last_name'];?></td>
	 							     	<td><?php echo $log['ip_address'];?></td>
	 							     	<td><?php echo date("jS M Y h:i:s A",strtotime($log['created_at']));?></td>
	 							     	

	 							     	
	 							     	
	 							     </tr>
	 							 <?php endwhile;?>
	 							    <?php else: ?>
	 							    	<tr class="text-center">
	 							    		<td colspan="4">No Data added Yet.</td>
	 							    	</tr>
	 							    <?php endif;   ?>
	 							</tbody>
	 							
	 						</table>
	 					</div>
	 					<?php if($pages>1):;?>
	 					<div class="col-12">
	 						<nav aria-label="Page navigation example">
							  <ul class="pagination">
							    <?php if($pageno==1):;?>
							    <li class="page-item disabled">
							      <a class="page-link" href="#" aria-label="Previous">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a>
							    </li>
                                <?php else:;?>
                                	<li class="page-item ">
								      <a class="page-link" href="<?php echo url('admin/users.php?page='.($pageno-1));?>" aria-label="Previous">
								        <span aria-hidden="true">&laquo;</span>
								        <span class="sr-only">Previous</span>
								      </a>
							    </li>
							    <?php endif;?>

                                <?php for($n=1;$n<=$pages;$n++):;?>
                                <?php if($n==$pageno):;?>
                                	<li class="page-item active">
								      <span class="page-link">
								        <?php echo $n;?>
								        <span class="sr-only">(current)</span>
								      </span>
								    </li>
								<?php else:;?>
							    <li class="page-item"><a class="page-link" href="<?php echo url('admin/users.php?page='.$n);?>"><?php echo $n;?></a></li>
							<?php endif;?>
							<?php endfor;?>
							<?php if($pageno==$pages):;?>
							    <li class="page-item disabled">
							      <a class="page-link" href="#" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							<?php else:;?>
								 <li class="page-item">
							      <a class="page-link" href="<?php echo url('admin/users.php?page='.($pageno+1));?>" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							<?php endif;?>
							  </ul>
							</nav>
	 					</div>
	 				<?php endif;?>
	 					
	 				</div>
	 			</main>
	 		<?php
			include_once'templets/footer.php';

			?>
	 
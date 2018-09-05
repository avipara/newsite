<!--Navigation Start-->
	 		<nav class="col-2 side-nav">
	 			<div class="row">
	 				<div class="col-12 mt-3 text-center">  
	 					<h1>NewsSite</h1>
	 				</div>
	 				<div class="col-12 user-info text-center">
	 					<div class="row">
	 						<div class="col-12">
	 							Hello <?php echo $_SESSION['admin']['first_name'];?>
	 						</div>
	 						<div class="col-12">
	 							<a href="<?php echo url('admin/edit-profile.php');?>">Edit Profile</a>
	 							<a href="<?php echo url('admin/logout.php');?>">Logout</a>
	 						</div>
	 					</div>
	 					
	 				</div>
	 				
	 				<div class="col-12 my-3">
	 					<ul class="side-menu">
	 						<li class="menu-item">
	 							<a href="<?php echo url('admin');?>" class="menu-link"><i class="fas fa-home">
	 								
	 							</i> Home
	 							</a>
	 						</li>
	 						<?php if($_SESSION['admin']['type']=='admin'):;?>
	 						<li class="menu-item">
	 							<a href="<?php echo url('admin/users.php');?>" class="menu-link">
	 							<i class="fas fa-users">
	 								
	 							</i> Users
	 							</a>
	 						</li>
	 					<?php endif;?>
	 						<li class="menu-item">
	 							<a href="<?php echo url('admin/categories.php');?>" class= "menu-link">
	 							<i class="fas fa-tags">
	 								
	 							</i> Categories
	 							</a>
	 						</li>
	 						<li class="menu-item">
	 							<a href="<?php echo url('admin/articles.php');?>" class="menu-link">
	 							 <i class="far fa-newspaper">
	 							 	
	 							 </i> 
	 							 Articles
	 							</a>
	 						</li>
	 						<li class="menu-item">
	 							<a href="<?php echo url('admin/comments.php') ?>" class="menu-link">
	 							<i class="far fa-comments">
	 								
	 							</i> Comments
	 							</a>
	 						</li>
	 						
	 					</ul>

	 				</div>
	 			</div>

	 		</nav>
	 		<!--Navigation End-->
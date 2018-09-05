<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])):;?>
<div class="col-12">
	<div class="alert alert-<?php echo $_SESSION['message']['type'];?>">
		<?php echo $_SESSION['message']['content'];?>
	</div>	
</div>
<?php unset($_SESSION['message']);?>
<?php endif;?>
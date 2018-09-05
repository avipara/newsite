<nav class="navbar navbar-expand-lg navbar-dark w-100" style="background-color: #ce1313">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $active=='home'?'active':'';?>">
        <a class="nav-link" href="<?php echo url() ;?>"><i class="fas fa-home"></i></a>
      </li>
      <?php $sql="SELECT name,slug FROM categories WHERE status='active'";
      $result=db_query($con,$sql); 
      if($result && db_num_rows($result)>0):
      ?>
      <?php while($cat=db_fetch_assoc($result)):;?>
      <li class="nav-item <?php echo $active==$cat['slug']?'active':'';?>">
        <a class="nav-link" href="<?php echo url('category/'.$cat['slug']) ;?>"><?php echo $cat['name'];?></a>
      </li>
  <?php endwhile;?>
  <?php endif;?>
    </ul>
  </div>
</nav>
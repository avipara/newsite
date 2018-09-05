<footer class="row">
				<div class="col-12 mt-3 py-3" style="background-color: #3e4174">
					<div class="row">
						<div class="col-md-4 text-md-left text-center">
							<div class="row">
								<div class="col-12">
									<h1>NEWS SITE</h1>
								</div>
								<div class="col-12">
									New Baneswor,Kathmandu
									<br>
									<a href="tel:+977-1-4712345">+977-1-4712345</a>
									<br>
									<a href="mailto:info@newssite.com"> info@newssite.com </a>
								</div>
								<div class="col-12 mt-4" id="map">
									
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-md-0 mt-3 text-md-left text-center">
							<div class="row">
								<div class="col-12">
									<h3>Find Us On</h3>
								</div>
								<div class="col-12">
									<a href="http://www.facebook.com" class="social-icon mr-2">
										<i class="fab fa-facebook"></i>
									</a>
									<a href="http://www.twitter.com" class="social-icon mr-2">
										<i class="fab fa-twitter"></i>
									</a>
									<a href="http://www.instagram.com" class="social-icon mr-2">
										<i class="fab fa-instagram"></i>
									</a>
									<a href="http://www.linkedin.com" class="social-icon mr-2">
										<i class="fab fa-linkedin"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-md-0 mt-3">
							<div class="row">
								<div class="col-12 text-md-left text-center">
									<h3>Contact Us</h3>
								</div>
								<div class="col-12">
									<form action="<?php echo url('send-contact.php') ?>" method="post">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" required="">
											
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" id="email" class="form-control" required="">
											
										</div>
										<div class="form-group">
											<label for="message">Message</label>
											<textarea class="form-control" name="message" id="message" required=""></textarea>
											
										</div>
										<div class="form-group">
											<button class="btn btn-success" type="submit">SEND</button>
											
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</footer>
			
		</div>
    <script type="text/javascript" src="<?php echo url('js/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo url('js/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo url('js/alertify.js');?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGBQEA7e_WwEMQsSsrhEtexxZjMjZP3Q8&callback=initMap"
    async defer></script>
	<script type="text/javascript" src="<?php echo url('js/front.js');?>"></script>

	<?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])): ?>
	<script type="text/javascript">
		alertify.<?php echo $_SESSION['message']['type']; ?>('<?php echo $_SESSION['message']['content']; ?>'); 
	</script>
	<?php unset($_SESSION['message']); ?>
<?php endif; ?>
</body>
</html>
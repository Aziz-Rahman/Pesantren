	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-4 col-lg-4 widget wow fadeInUp animated animated" data-wow-duration="500ms">
						<h3 class="widget-title">Our Location</h3>
						<div class="widget-body map-body">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1251818050328!2d106.78984231435956!3d-6.113844861659028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1dbfa8ab3613%3A0x1669a6a42b573f9d!2sJl.+Taman+Pluit+Permai+Timur%2C+Penjaringan%2C+Kota+Jkt+Utara%2C+Daerah+Khusus+Ibukota+Jakarta+14450!5e0!3m2!1sid!2sid!4v1455561149297" width="100%" height="160" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>

					<div class="col-md-4 col-lg-4 widget wow fadeInUp animated animated" data-wow-duration="500ms">
						<h3 class="widget-title">Lorem Ipsum</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
						</div>
					</div>

					<div class="col-md-4 col-lg-4 widget wow fadeInUp animated animated" data-wow-duration="500ms">
						<h3 class="widget-title">Address</h3>
						<div class="widget-body">
							<p>Jl. Lorem ipsum Blok 3A RT 01 / RW 09 Kec. Adipisicing, Pluit, Jakarta Utara</p>
							<p>+021 87 9873267<br>
								<a href="mailto:#">armando@gmail.com</a>
							</p>
							<p class="follow-me-icons">
								<a href="#"><i class="fa fa-twitter fa-2"></i></a>
								<a href="#"><i class="fa fa-google-plus fa-2"></i></a>
								<a href="#"><i class="fa fa-instagram fa-2"></i></a>
								<a href="#"><i class="fa fa-facebook fa-2"></i></a>
							</p>		
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p>
								<?php $date = date('Y'); ?>
								Copyright &copy; <?php echo $date; ?>, Demo beta version by <a href="http://aziz-rahman.com/">Aziz Rahman Aji</a> 
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="./">Home</a> | 
								<a href="profile">About</a> |
								<a href="news">News</a> |
								<a href="gallery">Gallery</a> |
								<a href="video">Videos</a> |
								<b><a href="sign-up">Sign up</a></b>
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>

	<a id="scroll-top" href="#" style="display: block;"><span class="fa fa-chevron-up"></span></a><!-- Scroll to top -->	
		
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery-ias.min.js"></script>
	<script type="text/javascript" src="js/jquery.justifiedGallery.min.js"></script>
	<script type="text/javascript" src="js/jquery.swipebox.min.js"></script>
	<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/form-validation-script.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            // Infinite Ajax Scroll configuration
            jQuery.ias({
                container : '.wrap', // main container where data goes to append
                item: '.item', // single items
                pagination: '.nav-scroll', // page navigation
                next: '.nav-scroll a', // next page selector
                loader: '<img src="images/loader.gif"/>', // loading gif
                triggerPageThreshold: 1 // show load more if scroll more than this
            });
        });
    </script>


</body>
</html>
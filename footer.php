<footer>
        <div class="container">
            <div class="flex footer-content">
                <div class="ft-detail">
							<h4>Lucidum</h4>
                    <p><?php the_field('footer_content', 'Options');?></p>
                    <div class="ft-social">
                        <a href="<?php the_field('facebook_link', 'Options');?>" target="_blank"><img src="/wp-content/uploads/2021/01/Fackbook.png" ></a>
                        <a href="<?php the_field('twitter_link', 'Options');?>" target="_blank"><img src="/wp-content/uploads/2021/01/twitter.png" ></a>
                        <a href="<?php the_field('linkdin_link', 'Options');?>" target="_blank"><img src="/wp-content/uploads/2021/01/LinkedIn.png" ></a>
                    </div>
                </div>
                <div class="ft-nav">
                    <h4>Navigation</h4>
                    <div class="flex">
                        <?php
                    wp_nav_menu(array(
                        'theme_location' => 'my-footer-menu',
                        'container' => false
                    ));
                    ?>
                    </div>
                </div>
                <div class="ft-contact">
                    <h4>Contact Information</h4>
                    <div class="flex">
                        <a class="flex" href="mailto:<?php the_field('mail', 'Options');?>"><img src="<?php echo get_template_directory_uri()?>/assets/images/email.png" alt="icon">
                        <span><?php the_field('mail', 'Options');?></span></a>
                    </div>
                    <div class="flex">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/map-marker.png" alt="icon">
                        <span><?php the_field('address', 'Options');?></span>
                    </div>
                </div>
            </div>
            <div class="ft-copyright">
				<span>&copy; <?php the_field('copyright_text', 'Options');?> <a target="_blank" href="/privacy-policy/"><u>Privacy Policy.</u></a>
				<a target="_blank" href="/terms-and-conditions"><u>Terms & Conditions</u></a>
				</span>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?> 
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/timepicker@1.11.12/jquery.timepicker.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php echo get_template_directory_uri()?>/assets/js/jquery-3.1.1.js"></script>
    <script src="<?php echo get_template_directory_uri()?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri()?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri()?>/assets/js/custom.js"></script>
    <!-- fancybox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--     <script>
        $(document).ready(function() {
            $('#datepicker1').datepicker();
            $('#datepicker2').datepicker();
        });
		

    </script> -->
<script>
        
//         $(function () {
//             $("div.technology-logo-col").slice(0, 10).show();
//             $("#loadMore").on('click', function (e) {
//                 e.preventDefault();
//                 $("div.technology-logo-col:hidden").slice(0, 5).slideDown();
//                 if ($("div.technology-logo-col:hidden").length == 0) {
//                     $("#load").fadeOut('slow');
//                 }
//             });
//         });
//         
	// $("div.technology-logo-col").slice(0, 10).show();
	// $("#loadMore").on("click", function(e){
	// 	e.preventDefault();
	// 	$("div.technology-logo-col:hidden").slice(0, 5).slideDown();
	// 	if($("div.technology-logo-col:hidden").length == 0) {
	// 		$("#loadMore").text("No Content").addClass("noContent");
	// 	}});
</script>
   <script>
        jQuery(document).ready(function(){
            jQuery('.filter_by_type').change(function(){
                var filter_class = jQuery(this).val();
                if(filter_class=='')
                {
                    jQuery('.fys-box').show();
                }
                else
                {
                    jQuery('.fys-box').hide();
                    jQuery('.'+filter_class).show('slow');
                }

            });

        });
    </script>
     <script>
$(document).ready(function(){
  $("#catsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".fys-box").filter(function() {
      $(this).toggle($(this).data('title').toLowerCase().indexOf(value) > -1)
    });
  });
	$(".request-submit input").click( function(e) {
		if($('select#asd').val() == "Download Free Trial & Schedule A Full Product Dem") {
			window.open(
				'<?php the_field('contact_form_ducument', 'Options');?>',
				'_blank' // <- This is what makes it open in a new window.
			);
		}
	})
});
     </script>
     <script>
// 	$('.cat-blog ul li a').click(function(){
// 		$('.cat-blog ul li a').removeClass('active');
// 		$(this).addClass('active');
// 	});
// 		var url = $(location).attr('href');
// 		var parts = url.split("/");
// 		var last_part = parts[parts.length-2];
// 		var asd = $('.cat-blog li:last-child a').text().toLowerCase();
// 		var asd1 = $('.cat-blog li:nth-child(2) a').text().toLowerCase();

// 		if(last_part === asd) {
// 			$('.cat-blog li:last-child a').addClass('active')
// 		} else if ( last_part === asd1) {
// 			$('.cat-blog li:nth-child(2) a').addClass('active')
// 		} else {
// 			console.log('asd')
// 		}
		 $(function($) { 
			 let url = window.location.href; $('.cat-blog ul li a').each( function()  { 
				 if (this.href === url) { 
					 $(this).closest('li').addClass('activatedli'); 
				 } 
			 }); }
		  ); 

</script>
<script>
AOS.init({
  duration: 1200,
});
</script>
<script>
// 	$('#').play();
//	$('#qwe').get(0).play();
         $(".wal-btn ul a").click(function() {
            var xdlist = (jQuery(this).attr('href').replace("#",""));
            var xdbox = (jQuery('.wki-box').attr('id'));
            $('.wki-box').removeClass('active-box');
            $('.wki-box#' + xdlist).addClass('active-box')
        });
    </script>

</body>
</html>
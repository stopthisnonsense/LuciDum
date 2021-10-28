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
    <script type="text/javascript" defer>
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
</body>
</html>
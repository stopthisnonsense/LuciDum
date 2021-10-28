<footer class="footer footer--new">
    <h2 class="footer__title">Know More Unknowns</h2>
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
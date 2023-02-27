<?php 
    /**
     * The footer file
     * 
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     * 
     * @package blogradient
     * @since Bootstrap to WordPress 2.0
     */

?>


<footer>

    <?php 
        if(get_theme_mod('footer_calltoaction_visibility')) {

    ?>

    <div class="footer-calltoaction text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 overflow-hidden">
            <p class="sub-title"><?php echo wp_kses_post(get_theme_mod(
                'footer_calltoaction_eyebrow', 'Join Now')); 
                ?>
            </p>
            <h2><?php echo wp_kses_post(get_theme_mod(
                'footer_calltoaction_heading', 'Exciting Call to Action Heading')); 
                ?>
            </h2>
            <p class="cta-description">
                <?php echo wp_kses_post(get_theme_mod(
                'footer_calltoaction_desc', 'Learn how to design and build custom, beautiful & 
                responsive WordPress websites and themes for beginners in 2021 and beyond!')); 
                ?>
            </p>
            <?php $new_tab = get_theme_mod('footer_calltoaction_link_new_tab', true); ?>
            <a href="<?php echo wp_kses_post(get_theme_mod(
                'footer_calltoaction_link', '#')); ?>" class="btn btn-primary" target="<?php echo ($new_tab) ? '_blank' : '_self' ?>">
                <?php echo wp_kses_post(get_theme_mod('footer_calltoaction_button', 'Join Now -&gt;')); ?>
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php } ?>

    <div class="copyright text-center">
      <p><?php echo wp_kses_post(get_theme_mod('footer_copyright', 'Copyright &copy; Brightside Studio Inc.')); ?></p>
    </div>

  </footer>

  <?php wp_footer(); ?>
</body>

</html>
<?php
/**
 * Title Banner and Subscribe Bar
 * 
 * @package blogradient
 * @since 2.0
 * 
 */

    $blog_info      = get_bloginfo('name');
    $description    = get_bloginfo('description', 'display');
?>

<section class="title-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0
                        overflow-hidden text-center">

        <?php

            if(is_page()){

                the_title('<h1 class="page-title">', '</h1>');

            }elseif(is_single()){
                the_title('<h1 class="page-title">', '</h1>');
                ?>
                <p class="tag-line sub-title"><?php echo get_the_date('M d, Y');?></p>

                <?php

            }elseif(!is_front_page() && is_home()){
                // in WP settings you can set a page as the Posts Page
                // This variable will store the ID of the Page assigned to display the Blog Posts Index
                $blog_title = get_the_title(get_option('page_for_posts', true));
                ?>

                    <h1 class='page-title'> <?php echo esc_html($blog_title); ?> </h1>

                <?php
            }elseif(is_home()){

                if($description){
                ?>

                    <p class="tag-line sub-title"> <?php echo esc_html($description)?> </p>
                <?php 
                }
                ?>
                
                <h1> <?php esc_html_e($blog_info, 'blogradient'); ?> </h1>

                <?php

            }elseif(is_archive()){

                the_archive_title('<h1 class="page-title">', '</h1>');

            }elseif(is_404()){

                ?>
                <p class="tag-line sub-title"> 404 error </p>
                <h1> <?php esc_html_e('Couldn\'t Be Found', 'blogradient');?> </h1>
                <?php

            }elseif(is_search()){

                $search_title = sprintf('%s %s', __('Search resutls for: ', 'blogradient'), get_search_query() );
                ?>

                <h1 class="page-title"> <?php echo esc_html($search_title); ?> </h1>

                <?php
            }

        ?>

        </div>
      </div>
    </div>
  </section>

  <section class="subscribe-bar">
    <div class="container">
      <div class="row flex-vertical-center">
        <div class="col-sm-6">

            <p> <?php echo wp_kses_post(get_theme_mod('subscribe_text', '<p>Some compelling call to action text goes here!</p>')); ?> </p>

        </div>
        <div class="col-sm-6">

            <?php

                $form_html = get_theme_mod(
                    'subscribe_form', 
                    '<form class="" action="index.html" method="post"> 
                    <div class="row"> <div class="col-lg-8"> <input type="text" name="" value=""> </div> 
                    <div class="col-lg-4"> 
                    <button type="button" name="button" class="btn btn-invert m-0">Subscribe</button>
                    </div> </div> </form>'
                );

                echo $form_html;

            ?>
        </div>
      </div>
    </div>
  </section>
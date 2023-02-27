<?php
/**
 * The template file for displaying single posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package blogradient
 * @since 2.0
 * 
 */

  get_header(); 
  get_template_part('template-parts/banner', 'title');  
?>

<div class="content-area">
    <div class="container">
        <div class="row">

            <?php
                if(have_posts()){
                    if(has_post_thumbnail()){
                        the_post_thumbnail('large', 
                            array(
                                'class' => 'img-fluid'
                            ));
                    }
                    the_post();
            ?>

            <div class="col-md-8 offset-md-2 overflow-hidden">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

                    <?php
                        the_content();
                    ?>

                </article>
            </div>
            
            <?php
                }else{
                    get_template_part('template-parts/content', 'none');
                }
            ?>

        </div>
    </div>
</div>

<?php get_footer();


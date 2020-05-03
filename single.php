<?php
/*
 Template Name: single
 Template Post Type: post
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <section class="page-section portfolio" id="portfolio">
            <div class="container masthead d-flex align-items-center flex-column">
                <!-- Portfolio Section Heading -->
                <?php echo PG_Image::getPostImage( null, 'large', array(
                        'class' => 'project-masthead'
                ), 'both', null ) ?>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php the_title(); ?></h2>
                <p class="masthead-subheading font-weight-light text-center mb-0"> <?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                          echo $posttags[0]->name;
                          foreach(array_slice($posttags, 1) as $tag) {
                            echo ' - ' . $tag->name; 
                          }
                        }
                    ?></p>
                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items -->
                <div class="row">
                    <?php the_content(); ?>
                </div>
                <!-- /.row -->
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
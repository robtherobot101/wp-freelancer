<?php get_header(); ?>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image -->
        <?php echo PG_Image::getPostImage( null, 'large', array(
                'class' => 'masthead-avatar mb-5'
        ), 'both', null ) ?>
        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0"><?php bloginfo( 'name' ); ?></h1>
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-light mb-0"><?php bloginfo( 'description' ); ?></p>
    </div>
</header>
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php _e( 'Portfolio', 'wp_freelancer' ); ?></h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items -->
        <?php
            $portfolio_args = array(
                'category_name' => 'Field',
                'post_status' => 'publish',
                'nopaging' => true,
                'orderby' => 'menu_order'
            )
        ?>
        <?php $portfolio = new WP_Query( $portfolio_args ); ?>
        <?php if ( $portfolio->have_posts() ) : ?>
            <div class="row">
                <!-- Portfolio Item 1 -->
                <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
                    <?php PG_Helper::rememberShownPost(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="<?php echo '#portfolioModal-'.get_the_ID() ?>">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <?php echo PG_Image::getPostImage( null, 'large', array(
                                    'class' => 'img-fluid'
                            ), 'both', null ) ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <!-- Portfolio Item 2 -->
                <!-- Portfolio Item 3 -->
                <!-- Portfolio Item 4 -->
                <!-- Portfolio Item 5 -->
                <!-- Portfolio Item 6 -->
            </div>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'wp_freelancer' ); ?></p>
        <?php endif; ?>
        <!-- /.row -->
    </div>
</section>
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white"><?php the_title(); ?></h2>
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content -->
        <?php
            //take the content and split it into array
            $columns = explode( "<hr class=\"wp-block-separator\"/>", get_the_content() );

            $column_1 = '';
            $column_2 = '';

            //if at least one column set $column_1 variable
            if(count($columns) > 0) {
                $column_1 = $columns[0];
            }

            //if the second column is set, put it into the $column_2 variable
            if(count($columns) > 1) {
                $column_2 = $columns[1];
            }

        ?>
        <div class="row">
            <div class="col-lg-4 ml-auto lead">
                <?php echo $column_1 ?>
            </div>
            <div class="col-lg-4 mr-auto lead">
                <?php echo $column_2 ?>
            </div>
        </div>
        <!-- About Section Button -->
        <?php
            $attachments_args = array(
                's' => 'CV',
                'post_type' => 'attachment',
                'post_status' => 'any',
                'nopaging' => true
            )
        ?>
        <?php $attachments = new WP_Query( $attachments_args ); ?>
        <?php if ( $attachments->have_posts() ) : ?>
            <?php while ( $attachments->have_posts() ) : $attachments->the_post(); ?>
                <?php PG_Helper::rememberShownPost(); ?>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>"><i class="fas fa-download mr-2"></i><?php _e( '&nbsp;Download My CV&nbsp;', 'wp_freelancer' ); ?></a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
<!--        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'wp_freelancer' ); ?></p>-->
        <?php endif; ?>
    </div>
</section>
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php _e( 'Contact Me', 'wp_freelancer' ); ?></h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <form name="sentMessage" id="contactForm" novalidate="novalidate" action="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/contact_me.php" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>
                                <?php _e( 'Name', 'wp_freelancer' ); ?>
                            </label>
                            <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>
                                <?php _e( 'Email Address', 'wp_freelancer' ); ?>
                            </label>
                            <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>
                                <?php _e( 'Phone Number', 'wp_freelancer' ); ?>
                            </label>
                            <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>
                                <?php _e( 'Message', 'wp_freelancer' ); ?>
                            </label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">
                            <?php _e( 'Send', 'wp_freelancer' ); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    $portfolio_args = array(
        'post_type' => 'portfolio_item',
        'post_status' => 'publish',
        'nopaging' => true,
        'orderby' => 'menu_order'
    )
?>
<?php $portfolio = new WP_Query( $portfolio_args ); ?>
<?php if ( $portfolio->have_posts() ) : ?>
    <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
        <?php PG_Helper::rememberShownPost(); ?>
        <div class="portfolio-modal modal fade" id="portfolioModal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fas fa-times"></i> </span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title -->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?php the_title(); ?></h2>
                                    <!-- Icon Divider -->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image -->
                                    <?php echo PG_Image::getPostImage( null, 'large', array(
                                            'class' => 'img-responsive img-centered'
                                    ), 'both', null ) ?>
                                    <!-- Portfolio Modal - Text -->
                                    <?php the_content(); ?>
                                    <button class="btn btn-primary" href="#" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        <?php _e( 'Close Window', 'wp_freelancer' ); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'wp_freelancer' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>

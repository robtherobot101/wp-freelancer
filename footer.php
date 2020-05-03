
        </div>
        <!-- Masthead -->
        <!-- Portfolio Section -->
        <!-- About Section -->
        <!-- Contact Section -->
        <!-- Footer -->
        <!-- Copyright Section -->
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <footer class="footer text-center">
                    <div class="container">
                        <div class="row">
                            <!-- Footer Location -->
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4"><?php echo get_post_meta( '6', 'footer1_title', true ); ?></h4>
                                <p class="lead mb-0"><?php echo get_post_meta( '6', 'footer1_text', true ); ?></p>
                            </div>
                            <!-- Footer Social Icons -->
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4"><?php echo get_post_meta( '6', 'footer2_title', true ); ?></h4>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( '6', 'social_github', true ); ?>"> <i class="fab fa-fw fa-github"></i> </a>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( '6', 'social_linkedin', true ); ?>"> <i class="fab fa-fw fa-linkedin-in"></i> </a>
                            </div>
                            <!-- Footer About Text -->
                            <div class="col-lg-4">
                                <h4 class="text-uppercase mb-4"><?php echo get_post_meta( '6', 'footer3_title', true ); ?></h4>
                                <p class="lead mb-0"><?php echo get_post_meta( '6', 'footer3_text', true ); ?></p>
                            </div>
                        </div>
                    </div>
                </footer>
            <?php endwhile; ?>
        <?php endif; ?>
        <section class="copyright py-4 text-center text-white">
            <div class="container">
                <small><?php _e( 'Copyright &copy;', 'wp_freelancer' ); ?> <?php bloginfo( 'name' ); ?> <?php echo date( 'Y' ) ?></small>
            </div>
        </section>
        <div class="scroll-to-top d-lg-none position-fixed ">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"> <i class="fa fa-chevron-up"></i> </a>
        </div>
        <!-- Portfolio Modals -->
        <!-- Portfolio Modal 1 -->
        <!-- Portfolio Modal 2 -->
        <!-- Portfolio Modal 3 -->
        <!-- Portfolio Modal 4 -->
        <!-- Portfolio Modal 5 -->
        <!-- Portfolio Modal 6 -->
        <!-- Bootstrap core JavaScript -->
        <!-- Plugin JavaScript -->
        <!-- Contact Form JavaScript -->
        <!-- Custom scripts for this template -->
        <?php wp_footer(); ?>
    </body>
</html>

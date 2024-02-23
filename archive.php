<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Coffee
 */

get_header(); ?>

<div class="container">
     <div class="page_content <?php if( get_theme_mod( 'hide_slides' ) != '') { echo'topspacesingle'; } ?>">
        <section class="site-main">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <?php the_archive_title( '<h1 class="entry-title">', '</h1>' );?>
                    <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', $term_description );
                        endif;
                    ?>
                </header><!-- .page-header -->
				<div class="blog-post">
					<?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php  
				// Previous/next post navigation.
				the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => __( 'Back', 'skt-coffee' ),
							'next_text' => __( 'Next', 'skt-coffee' ),
							'screen_reader_text' => __( 'Posts navigation', 'skt-coffee' )
				) );
			    ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
        </section>
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>
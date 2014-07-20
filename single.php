<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-8 columns" role="main">
	
	<?php do_action('foundationPress_before_content'); ?>
	
    <?php
     while( have_posts() )
     { 
        the_post();

        if( is_cpt_accueil() )
        {
            global $post_accueil;
            print_r( $post_accueil );
            get_template_part( 'content', 'accueil' );
        }
        else
        {
            get_template_part( 'content', get_post_format() );
        }
     }
	 ?>
	
	<?php do_action('foundationPress_after_content'); ?>

	</div>
	<?php get_sidebar(); ?>
</div>	
<?php get_footer(); ?>

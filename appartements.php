<?php
/*
Template Name: Appartements
 */
?>
<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">
        <?php
        $args = array( 'post_type' => 'fw_appartement_cpt', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <?php if( is_cpt_appartement() ) : global $post_appartement; //print_r( $post_appartement ) ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class='row'>
                    <div class='small-12 large-12 columns'>
                        <?php if( $post_appartement->est_disponible() ) : ?>
                            <div data-alert class="alert-box success radius">
                                <?php _e( 'Disponible', TEXT_DOMAIN ); // FIXME TEXTDOMAIN DU PLUGIN !!!?>
                            </div>
                        <?php else: ?>
                            <div data-alert class="alert-box warning radius">
                                <?php _e( ' Non Disponible', TEXT_DOMAIN ); // FIXME TEXTDOMAIN DU PLUGIN !!!?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='small-12 large-12 columns'>
                        <div class="panel">
                            <div class='row'>
                                <div class='small-3 large-3 columns'>
                                    <ul class="clearing-thumbs clearing-feature" data-clearing>
                                         <?php if( $post_appartement->has_gallerie() ): $y = true; foreach( $post_appartement->gallerie as $id ) :?>
                                                <?php if( $y ) :  $y = false;?>
                                                     <li class="clearing-featured-img "> <a href="<?php echo wp_get_attachment_url( $id ); ?>" class='appartement_img'><?php echo wp_get_attachment_image( $id, 'thumbnail' ); ?></a></li>
                                                <?php else : ?>
                                                     <li> <a href="<?php echo wp_get_attachment_url( $id ); ?>"><?php echo wp_get_attachment_image( $id ); ?></a></li>
                                        <?php endif; endforeach; endif;?>
                                    </ul>
                                </div>
                                <div class='small-9 large-9 columns'>
                                    <div class='row'>
                                      <div class='small-9 large-9 columns'>
                                            <h2><?php echo $post_appartement->nom ?></h2>
                                            <p><?php echo $post_appartement->description; ?></p>
                                      </div>
                                      <div class='small-3 large-3 columns'>
                                        <ul class='small-block-grid-1 large-block-grid-1'>
                                        <?php if( $post_appartement->has_commodites() ): foreach( $post_appartement->commodites as $nom => $quantite ) :?>
                                            <li> <?php echo $quantite;?>x <?php echo $nom;?></li>
                                        <?php endforeach; endif;?>
                                       </div> <!-- /column commodites -->
                                    </div>
                                </div><!-- /row-->
                            </div>
                        </div>
                    </div>
                </div><!-- /row principal -->

            </article>
        <?php endif; // is cpt_appartement?>
    <?php endwhile; // End the loop ?>

	</div>
</div>
		
<?php get_footer(); ?>

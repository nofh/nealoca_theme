<?php
/*
Template Name: Activités 
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">
        <?php
        $args = array( 'post_type' => 'fw_activite_cpt', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <?php if( is_cpt_activite() ) : global $post_activite; //print_r( $post_activite ) ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class='row'>
                    <div class='small-12 large-12 columns'>
                        <div class='panel'>
                            <div class='row'>
                                <div class='small-12 large-12 columns'>
                                    <h2><?php echo $post_activite->nom;?></h2>
                                </div><!-- /columns-->
                            </div>
                            <div class='row'>
                                <ul class="clearing-thumbs small-block-grid-3 large-block-grid-3" data-clearing>
                                    <li><?php echo $post_activite->label_horaires?>: <?php echo $post_activite->horaires_html?></li>
                                    <li><?php echo $post_activite->label_adresse?>: <?php echo $post_activite->adresse_html?></li>
                                    <li><?php echo $post_activite->label_contact?>: <?php echo $post_activite->contact_html?></li>
                                </ul>
                            </div><!-- /row -->
                            <div class='row'>
                                <div class='small-12 large-7 columns'>
                                    <p> <?php echo $post_activite->description;?></p>
                                </div><!-- /columns-->
                                <div class='small-5 large-5 columns hide-for-small-only hide-for-medium-only'>
                                    <ul class="clearing-thumbs small-block-grid-3 large-block-grid-3" data-clearing>
                                        <?php if( $post_activite->has_gallerie() ) : foreach( $post_activite->gallerie as $id ) : ?>
                                        <li><a href="<?php echo wp_get_attachment_url( $id ); ?>"><?php echo wp_get_attachment_image( $id ); ?></a></li>
                                        <?php endforeach; endif;?>
                                    </ul>
                                </div><!-- /columns-->
                            </div><!-- /row -->
                            <div class='row'>
                        
                            </div>
                        </div><!-- /panel -->
                    </div><!-- /columns-->
                </div><!-- /row -->
            </article>
        <?php endif; // is cpt_acceuil?>
    <?php endwhile; // End the loop ?>

	</div>
</div>
		
<?php get_footer(); ?>

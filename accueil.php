<?php
/*
Template Name: Accueil 
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

        <?php
        $args = array( 'post_type' => 'fw_accueil_cpt', 'posts_per_page' => 1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ;
            if( is_cpt_accueil() ) : global $post_accueil; //print_r( $post_accueil ) ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <!-- Slider -->
            <div class="row">
                <div class="small-12 large-12 columns">
                    <div class='panel'>
                        <ul class="orbit" data-orbit>
                            <?php if( $post_accueil->has_slider() ) :foreach( $post_accueil->slider as $id ) : ?>
                              <li class=''>
                                 <?php echo wp_get_attachment_image( $id, 'full' ); ?>
                              </li>
                            <?php endforeach; endif; ?>
                        </ul>      
                     </div>
                </div>
            </div>	
            <!-- zone desc principale et secondaire -->
            <div class="row">
                <div class="small-12 large-8 columns">
                    <div class='row'>
                        <div class='small-11 large-11 columns'>
                            <!-- desc principale -->
                            <div class="panel">
                              <p><?php echo $post_accueil->description_principale;?></p>
                            </div> <!-- /panel -->
                        </div>
                    </div>
                    <div class='row'>
                        <div class='small-11 large-11 columns'>
                            <ul class="clearing-thumbs small-block-grid-4 large-block-grid-4" data-clearing>
                                <?php if( $post_accueil->has_gallerie() ) : foreach( $post_accueil->gallerie as $id ) : ?>
                                    <li><a href="<?php echo wp_get_attachment_url( $id ); ?>"><?php echo wp_get_attachment_image( $id ); ?></a></li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>
                </div><!-- /columns -->
                <div class='small-4 large-4 columns show-for-large-up'>
                    <div class='row'>
                        <!-- desc secondaire -->
                        <div class="panel">
                          <p><?php echo $post_accueil->description_secondaire;?></p>
                        </div> <!-- /panel -->
                    </div><!-- /row -->
                    <div class='row'>
                        <!-- desc tertiaire -->
                        <div class="panel">
                          <p><?php echo $post_accueil->description_tertiaire;?></p>
                        </div> <!-- /panel -->
                    </div><!-- /row -->
                </div><!-- /columns -->
            </div><!-- /row desc principal et secondaire -->
            <!-- slogan -->
            <div class='row'>
                <div class='small-12 small-centered large-12 large-centered columns'>
                    <div class="panel callout radius slogan">
                        <p><?php echo $post_accueil->slogan;?></p>
                    </div> <!-- /panel -->
                </div><!-- /columns slogan -->
            </div><!-- /row slogan -->
        </article>
        <?php endif; // is cpt_acceuil?>
    <?php endwhile; // End the loop ?>

	</div>
</div>
		
<?php get_footer(); ?>

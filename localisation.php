<?php
/*
Template Name: Localisation
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

        <?php
        $args = array( 'post_type' => 'fw_localisation_cpt', 'posts_per_page' => 1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();  
            if( is_cpt_localisation() ) : global $post_localisation; //print_r( $post_localisation );?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <!-- Map -->
                <div class="row">
                    <div class="large-12 columns">
                        <div class="panel top">
                            <div id="map-canvas"> </div>
                        </div>
                    </div>
                </div>
                <!-- Desc -->
                <div class="row">
                    <div class="small-12 large-12 columns">
                        <dl class="accordion" data-accordion>
                          <dd>
                            <div id="panel1" class="content active">
                              <dl class="tabs" data-tab>
                              <dd class="active"><a href="#panel2-1" id='tab_acces'><?php _e( 'Acces', TEXT_DOMAIN ) ;?></a></dd>
                              <dd><a href="#panel2-2" id='tab_region'><?php _e( 'Région', TEXT_DOMAIN ); ?></a></dd>
                              <dd><a href="#panel2-3" id='tab_villages'><?php _e( 'Villages', TEXT_DOMAIN ); ?></a></dd>
                              <dd><a href="#panel2-4" id='tab_cis'><?php _e( 'Centres Interets', TEXT_DOMAIN ); ?></a></dd>
                              </dl>
                              <div class="tabs-content">
                                <!-- Acces -->
                                <div class="content active" id="panel2-1">
                                    <!-- bouttons -->
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <ul class="inline-list" id='choix_depart'>
                                            <li><a href="#map-canvas" class="button" id='depart_un'><?php echo $post_localisation->label_depart_un;?></a></li>
                                            <li><a href="#map-canvas" class="button" id='depart_deux'><?php echo $post_localisation->label_depart_deux;?></a></li>
                                            <li><a href="#map-canvas" class="button" id='depart_trois'><?php echo $post_localisation->label_depart_trois;?></a></li>
                                            <li><a href="#map-canvas" class="button" id='depart_quatre'><?php echo $post_localisation->label_depart_quatre;?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- affichage des distances -->
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <table id='localisation_distances'>
                                                <thead>
                                                    <tr>
                                                        <th width="30%">Départ</th>
                                                        <th width="40%">Arrivée</th>
                                                        <th width="10%">Km</th>
                                                        <th width="20%">Durée</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="distances">
                                                    <tr>
                                                        <td class="depart"></td>
                                                        <td class="arrivee"></td>
                                                        <td class="km"></td>
                                                        <td class="duree"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- texte sur l'accessibilite -->
                                    <div class="panel callout radius" id>
                                        <p> <?php echo $post_localisation->acces; ?> </p>
                                    </div>
                                </div>
                                <!-- Region -->
                                <div class="content" id="panel2-2">
                                <p><?php echo $post_localisation->region;?></p>
                                </div>
                                <!-- Village -->
                                <div class="content" id="panel2-3">
                                <p><?php echo $post_localisation->texte_villages;?></p>
                                </div>
                                <!-- Centres Interets -->
                                <div class="content" id="panel2-4">
                                <ul class='small-block-grid-2 large-block-grid-3' id='cis'>
                                    <?php if( $post_localisation->has_centres_interets() ) : foreach( $post_localisation->centres_interets as $categorie => $cis_de_categorie ) : ?>
                                        <li id='<?php echo $categorie;?>'> <?php echo $categorie;?></li>
                                    <?php endforeach;  endif; ?>
                                </ul>
                                </div>
                              </div>
                            </div>
                          </dd>  
                        </dl>  
                    </div><!-- /columns -->
                </div><!-- /row -->

            </article>
        <?php endif; // is cpt_acceuil?>
    <?php endwhile; // End the loop ?>

	</div>
</div>
<!-- infos localisation -->
<input type='hidden' id='args_localisation' data-post_id='<?php echo $post_localisation->ID ?>' data-id_map='map-canvas'>

<?php get_footer(); ?>

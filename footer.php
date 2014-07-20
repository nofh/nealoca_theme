</section>
<footer>
<div class="separateur"></div>
<div class="row">
    <div class='small-12 large-12 columns'>
        <div class='small-8 large-8 columns'>
             <ul class="small-block-grid-2 large-block-grid-2 icon-contact ">
             <li><a href='<?php $page = get_page_by_path( 'accueil' ) ; echo get_permalink( $page->ID );?>'><?php echo __( 'Accueil', TEXT_DOMAIN);?></a></i></li>
             <li><a href='<?php $page = get_page_by_path( 'localisation' ) ; echo get_permalink( $page->ID );?>'><?php echo __( 'Localisation', TEXT_DOMAIN);?></a></i></li>
             <li><a href='<?php $page = get_page_by_path( 'appartements' ) ; echo get_permalink( $page->ID );?>'><?php echo __( 'Appartements', TEXT_DOMAIN);?></a></i></li>
             <li><a href='<?php $page = get_page_by_path( 'activites' ) ; echo get_permalink( $page->ID );?>'><?php echo __( 'Activites', TEXT_DOMAIN);?></a></i></li>
             <li><a href='<?php $page = get_page_by_path( 'contact' ) ; echo get_permalink( $page->ID );?>'><?php echo __( 'Contact', TEXT_DOMAIN);?></a></i></li>
             </ul>
        </div><!-- /site map -->
        <div class='small-4 large-4 columns'>
            <ul class="small-block-grid-1 large-block-grid-1 icon-contact right">
            <li><a href='<?php $page = get_page_by_path( 'contact' ) ; echo get_permalink( $page->ID );?>'><i class="fa fa-phone"><?php echo "   " . get_option( '_fw_tel_contact' )?></i></a></li>
                <li><a href='<?php $page = get_page_by_path( 'contact' ) ; echo get_permalink( $page->ID );?>'><i class="fa fa-envelope"><?php echo "   " . get_option( '_fw_email_contact' )?></i></a></li>
                <li> <a href='<?php $page = get_page_by_path( 'contact' ) ; echo get_permalink( $page->ID );?>'><i class="fa fa-user"><?php echo "   " . get_option( '_fw_nom_contact' )?></i></a></li>
            </ul>
        </div><!-- /contact -->
    </div> <!-- /2columns sitemap et contact -->
</div> <!-- /ligne footer -->
<div class="separateur"></div>
<div class='row'>
    <div class="small-9 columns">
        <p id="copyright"> copyright <a href="http://www.agiweb.be" target="_blank">agiweb</a> </p>
    </div>
    <div class="small-3 columns">
        <a href="#" id="vers_haut" class='right'><img src="<?php echo get_template_directory_uri() . '/assets/img/back-to-top.png' ?>" alt='vers le haut'></a>
    </div>
</div>
</footer>
<!-- side bar 
            <?php do_action('foundationPress_before_footer'); ?>
            <?php dynamic_sidebar("footer-widgets"); ?>
            <?php do_action('foundationPress_after_footer'); ?>
-->

<a class="exit-off-canvas"></a>
	
  <?php do_action('foundationPress_layout_end'); ?>
  </div>
</div>
<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>
</body>
</html>

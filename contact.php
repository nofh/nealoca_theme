<?php
/*
Template Name: Contact 
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

        <?php
        $args = array( 'post_type' => 'fw_contact_cpt', 'posts_per_page' => 1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); //print_r( $post ) ?>
         <?php if( is_cpt_contact() ) : global $post_contact; //print_r( $post_contact ); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class='row'>
                <div class='small-12 large-12 columns'>
                    <div class='panel'>
                        <?php echo $post_contact->description; ?>
                    </div>
                </div>
            </div>
            <div class='row'>
                <?php echo envoyer_mail( $post_contact ) ?>
            </div>
            <div class="row">
                <div class="small-7 large-7 columns">
                    <form>
                    <label for='mail' class='left'><?php _e( 'Mail', TEXT_DOMAIN );?>*:</label> <input type="text" name="mail"><br/>
                    <label for='nom' class='left'><?php _e( 'Nom', TEXT_DOMAIN );?>*:</label> <input type="text" name="nom"><br/>
                    <label for='sujet' class='left'><?php _e( 'Sujet', TEXT_DOMAIN );?>*:</label><input type="text" name="sujet"><br/>
                    <label for='message' class='left'><?php _e( 'Message', TEXT_DOMAIN );?>*:</label><textarea name="message" rows=13></textarea><br/>
                    <!--<label for='captcha' class='left'><?php _e( 'Entrez le code', TEXT_DOMAIN);?>*:</label><input type='text' name='captcha' ><?php ?></br>-->
                    <input type='hidden' name='envoi_mail' value='xvzed'>
                    <input type='submit' value='<?php _e( 'Envoyez', TEXT_DOMAIN );?>' class='button'>
                    </form>
                </div>
                <div class='small-5 large-4 large-offset-1 columns'>
                    <div class='row'>
                        <div class='small-12 large-12 columns'>
                            <div class='panel callout radius'>
                            <h4> <?php _e( 'Contactez Nous', TEXT_DOMAIN ); ?></h4>
                            <ul class='no-bullet'>
                            <li><?php echo $post_contact->nom_contact;?></li>
                            <li><?php echo $post_contact->tel_contact;?></li>
                            <li><?php echo $post_contact->email_contact;?></li>
                            <li><?php echo $post_contact->jours;?></li>
                            <li><?php echo $post_contact->heures;?></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </article>
        <?php endif; // is cpt_acceuil?>
    <?php endwhile; // End the loop ?>

	</div>
</div>

		
<?php get_footer(); ?>

<!-- Traitement envoi mail -->
<?php

function envoyer_mail( $post_contact )
{
$message = '';
if( array_key_exists( 'envoi_mail', $_REQUEST ) )
{

    if( $_REQUEST['envoi_mail'] == 'xvzed' )
    {
        if( array_key_exists( 'nom', $_REQUEST ) && array_key_exists( 'sujet', $_REQUEST ) && array_key_exists( 'message', $_REQUEST ) )
        {
            // envoi mail
            require_once( WP_PLUGIN_DIR . '/fmwp/src/public/assets/vendors/swiftmailer/lib/swift_required.php' );
            // conf
            // !!!!! depend de l'emplacement sur le serveur !!!!
            $url_ok = $_SERVER['HTTP_HOST'] . '/Agiweb/mail_envoyer';
            $url_ko = $_SERVER['HTTP_HOST'] . '/Agiweb/mail_non_envoyer';

            // recup
            $mail_contact = ( ! empty( $_REQUEST['mail'] ) ) ? $_REQUEST['mail']: 'infos';
            $nom_contact = ( ! empty( $_REQUEST['nom'] ) ) ? $_REQUEST['nom']: 'nom vide';
            $sujet = ( ! empty( $_REQUEST['sujet'] ) ) ? $_REQUEST['sujet']: 'sujet vide';
            $message = ( ! empty( $_REQUEST['message'] ) ) ? $_REQUEST['message']: 'message vide';

            $date_envoi = date( 'd/m/Y H:m:s' );

            $infos = PHP_EOL . PHP_EOL . PHP_EOL . 'INFOS'.PHP_EOL 
                    . "---------------- ----------------" . PHP_EOL
                . "Sujet           : $sujet"      . PHP_EOL
                . "Date            : $date_envoi "    . PHP_EOL
                . "Mail Contact    : $mail_contact "  . PHP_EOL
                . "Nom Contact     : $nom_contact "   . PHP_EOL
                . "---------------- ----------------" . PHP_EOL;

            // envoi mail
            if( $mail_contact && $message )
            {
                try
                {
                    //error_reporting(0);

                    // Create the Transport
                    $transport = Swift_SmtpTransport::newInstance( 'smtp.gmail.com', 465, 'ssl' )
                        ->setUsername('nealoca@gmail.com')
                        ->setPassword('nealoca00');

                    // Create the Mailer using your created Transport
                    $mailer = Swift_Mailer::newInstance($transport);

                    // Create the message
                    $message_a_envoyer = Swift_Message::newInstance()

                        // Give the message a subject
                        ->setSubject( $sujet )

                        // Set the From address with an associative array
                        ->setFrom(array( $mail_contact => $mail_contact ) )

                        // Set the To addresses with an associative array
                        ->setTo(array('nealoca@gmail.com' => 'nealoca'))
                        ->setTo(array( $post_contact->email_contact => $post_contact->nom_contact ))

                        // Give it a body
                        ->setBody( $message . $infos );

                    // Send the message
                    $result = $mailer->send($message_a_envoyer, $failures);


                    $message = "<div data-alert class='alert-box success radius'>
                        Mail Envoyer, Merci
                        <a href='#' class='close'>&times;</a>
                        </div>";
                } catch (Exception $e) {
                    $message = "<div data-alert class='alert-box warning radius'>
                        !Erreur lors de l'envoi! 
                        <a href='#' class='close'>&times;</a>
                        </div>";
                }
            }
            else
            {
                $message = "<div data-alert class='alert-box warning radius'>
                    !Erreur lors de l'envoi! 
                    <a href='#' class='close'>&times;</a>
                    </div>";
            }
        }
    }
}
return $message;
}
?>

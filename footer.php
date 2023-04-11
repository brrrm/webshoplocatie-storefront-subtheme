<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

            <?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

            <div class="shop-identity">
                <h2><?php echo get_bloginfo('name'); ?></h2>
                <figure>
                    <?php the_custom_logo('site-branding');?>
                </figure>
                <p> <?php echo get_bloginfo('name'); ?> </p>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>">Mail Customer service</a>
            </div>
    
            <div class="adress">
                <h3><strong>Adres </strong></h3>
                <p>
                <?php echo get_bloginfo('name'); ?> <br>
                <?php echo get_option( 'woocommerce_store_address' ); ?>  <br>
                <?php echo  get_option( 'woocommerce_store_postcode' ); ?>  ,
                <?php echo  get_option( 'woocommerce_store_city' ); ?>  
                <?php 
                $addressEncoded = urlencode(get_option( 'woocommerce_store_address' ) . ' ' . get_option( 'woocommerce_store_postcode' ) . ' ' . get_option( 'woocommerce_store_city' ));
                $mapsUrl = 'https://www.google.com/maps/search/' . $addressEncoded;
                ?>
                </p>
                <p><a href="<?php echo $mapsUrl; ?>" target="_blank">Bekijk op Google Maps</a></p>
            </div>
            <div class="shop-id">
                <h3><strong> <?php echo get_bloginfo('name'); ?></strong></h3>
                <dl>
                    <dt>KVK nummer</dt>  <dd>34364550</dd>
                    <dt>BTW nummer</dt>  <dd>000002601052</dd>
                </dl>
            </div>
            <div class="about">
                <h3><strong>  Over deze winkel</strong> </h3>    
                <?php wp_nav_menu();?>
            </div>
            <div class="social-media">
                <h3><strong> Volg ons op </strong></h3>  
                <ul class="social-media">
                    <li>
                        <a href="#" class="icon facebook" target="_blank"> Facebook</a>
                    </li>
                    <li>
                        <a href="#" class="icon linkedin" target="_blank"> Instagram</a>                
                    </li>
                </ul>
            </div>
        </div><!-- .col-full -->

        <div class="copyright"> 
            <div class="col-full"> 
                <div class="usps">
                    <p class="usp refund"> Niet goed geld terug </p>
                    <p class="usp return" > Gratis retour </p>
                    <p class="usp shipment" > Vlotte verzending </p>
                </div> 
                <div class="contact">
                    <a class="icon mail" href="mailto:<?php echo get_bloginfo('admin_email'); ?>"><?php echo get_bloginfo('admin_email'); ?></a>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

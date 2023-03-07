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
                <?php the_custom_logo('site-branding');?>
                <?php echo get_bloginfo('name'); ?>  <br>
                mist nog reviews<br>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>">Customer Service</a>
            </div>
            <div class="about">
                <p><strong>  Over deze winkel</strong> </p>    
                <?php wp_nav_menu();?>
            </div>

            <div class="social-media">
                <p><strong> Volg ons op sociale media </strong></p>
                kan ik nog niet linken geloof ik
            </div>
    
            <div class="adress">
                <p><strong>Adres </strong></p>
                <?php echo get_bloginfo('name'); ?> <br>
                <?php echo get_option( 'woocommerce_store_address' ); ?>  <br>
                <?php echo  get_option( 'woocommerce_store_city' ); ?>  ,
                <?php echo  get_option( 'woocommerce_store_postcode' ); ?>  
            </div>
            <div class="shop-id">
                <p><strong> <?php echo get_bloginfo('name'); ?></strong></p>
                kvk en btw kan ik nog niet ophalen dacht ik
            </div>
        </div><!-- .col-full -->

        <div class="copyright"> 
            <div class="col-full"> 
                <div class="usps">
                    (nog niet dynamisch) 
                    <p class="usp refund"> Niet goed geld terug </p>
                    <p class="usp return" > Gratis retour </p>
                    <p class="shipment" > Vlotte verzending </p>
                </div> 
                <div class="contact">
                    <p class="phone"> Couldnt find number </p>
                    <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>"><?php echo get_bloginfo('admin_email'); ?></a>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
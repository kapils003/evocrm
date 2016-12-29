<?php 
/* Template Name: View Vehicle */
	get_header(); ?>
    
    <?php if (have_posts()): while (have_posts()) : the_post(); 
		
		$sidebar       = get_post_meta(get_current_id(), "sidebar", true); 
		
		$classes       = content_classes($sidebar);

		$content_class = $classes[0];
		$sidebar_class = (isset($classes[1]) && !empty($classes[1]) ? $classes[1] : ""); ?>
    
        <div class="inner-page row wp_page<?php echo (isset($sidebar) && !empty($sidebar) ? " is_sidebar" : " no_sidebar"); ?>">
        	<!-- <div class="<?php echo $content_class; ?> page-content"> -->
        	<div id="post-<?php the_ID(); ?>" <?php echo post_class($content_class . " page-content post-entry"); ?>>
            
        		<?php the_content(); ?>

				<?php wp_link_pages( array('before' => '<p class="margin-top-20">' . __( 'Pages:' ), 'after' => '</p>') ); ?>          

                <?php 

                wp_reset_postdata();
                $post_id = $_GET['pid'];
/*'reg-no', 'make', 'model', 'year', 'body', 'mileage' , 
'advert-mileage', 'transmission', 'condition', 'price', 'drive-train',
'engine', 'exterior-color', 'interior-color', 'vin-number',
'secondary_title', 'car_sold', 'stock-number', 'reg-letter',
'reg-date', 'priv-plate', 'sale-type', 'vat-type', 'import', 
'engine-number', 'engine-type', 'ins-group', 'former-owner',
'grading', 'key-tag', 'location', 'mot-date1', 'mot-number',
'mot-date2', 'motability', 'radio-code', 'alarm-code', 'ig-key', 
'door-key', 'spare-key', 'v5', 'v5-no', 'vehicle-tax', 'purchase-price',
'hpi', 'mileage-check', 'service-check', 'purchase-date',
'supplier-inv-no', 'source', 'supplier', 'buyer', 'sale-return',
'stock-comments', 'history', 'fsh', 'bhp', 'warrenty', 'engine-size',
'fuel-type', 'gears', 'doors', 'trim-type', 'trim-colour', 'status',
'youtube-id', 'hide-finance', 'hide-web', 'service-comments' */
                if(isset($post_id)) {
	              	$vehicleDetails = update_vehicle_form($post_id, 'view');
                	echo "<article>";
                	echo $vehicleDetails['make'];
                	echo "</article>";
                }else{ ?>
                	<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'automotive' ); ?></h1>

					</article>
                <?php } ?>
        	</div>
            <?php // sidebar 
                $default_sidebar = get_post_meta( get_current_id(), "sidebar_area", true );

				if(isset($sidebar) && !empty($sidebar) && $sidebar != "none" && isset($default_sidebar) && !empty($default_sidebar)){
					echo "<div class='" . $sidebar_class . " sidebar-widget side-content'>";
					dynamic_sidebar($default_sidebar);
					echo "</div>";
				}					
			?>
        </div>
    
    <?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'automotive' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

<?php get_footer(); ?>

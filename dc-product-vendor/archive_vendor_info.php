<?php
/**
 * The template for displaying archive vendor info
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/archive_vendor_info.php
 *
 * @author 		dualcube
 * @package 	WCMp/Templates
 * @version   2.2.0
 */
 
global $WCMp;
$vendor_hide_address = get_user_meta($vendor_id,'_vendor_hide_address', true);
$vendor_hide_phone = get_user_meta($vendor_id,'_vendor_hide_phone', true);
$vendor_hide_email = get_user_meta($vendor_id,'_vendor_hide_email', true);
$review_settings = get_option('wcmp_general_sellerreview_settings_name');
?>
<div class="container vendor-profile">
	<div class="row">
		<div class="col l3 m4 s12">
			<div class="vendor-profile-img valign-wrapper">
				<img class="valign" height="400" width="200" src=<?php echo $profile;?> />
			</div>
		</div>
		<div class="col l9 m8 s12 valign-wrapper">
			<?php $vendor_hide_description = get_user_meta($vendor_id,'_vendor_hide_description', true);
				if(!$vendor_hide_description) { ?>
					<div class="vendor-profile-bio valign">
						<h1 class="vendor-title"><?php woocommerce_page_title(); ?></h1>
						<?php $string = $description; ?>
						<?php echo stripslashes($string); ?>
					</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col s12 ">
			<h2 class="center-align">Experiencias creadas</h2>
		</div>
	</div>
</div>
		

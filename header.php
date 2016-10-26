<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7 ltie8 ltie9" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8 ltie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1685232158413150');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1685232158413150&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php 
		global $theme_option, $gdlr_post_option;
		if( !empty($gdlr_post_option) ){ $gdlr_post_option = json_decode($gdlr_post_option, true); }
		
		wp_head(); 
	?>
<!-- Facebook Conversion Code for Key Page Views - Housing Families First HOME -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6029445862000', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6029445862000&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
</head>

<body <?php body_class(); ?>>
<?php
	$body_wrapper = '';
	if($theme_option['enable-boxed-style'] == 'boxed-style'){
		$body_wrapper  = 'gdlr-boxed-style';
		if( !empty($theme_option['boxed-background-image']) && is_numeric($theme_option['boxed-background-image']) ){
			$alt_text = get_post_meta($theme_option['boxed-background-image'] , '_wp_attachment_image_alt', true);	
			$image_src = wp_get_attachment_image_src($theme_option['boxed-background-image'], 'full');
			echo '<img class="gdlr-full-boxed-background" src="' . $image_src[0] . '" alt="' . $alt_text . '" />';
		}else if( !empty($theme_option['boxed-background-image']) ){
			echo '<img class="gdlr-full-boxed-background" src="' . $theme_option['boxed-background-image'] . '" />';
		}
	}
	$body_wrapper .= ($theme_option['enable-float-menu'] != 'disable')? ' float-menu': '';
?>
<div class="body-wrapper <?php echo $body_wrapper; ?>" data-home="<?php echo home_url(); ?>" >
	<?php 
		// page style
		if( empty($gdlr_post_option) || empty($gdlr_post_option['page-style']) ||
			  $gdlr_post_option['page-style'] == 'normal' || 
			  $gdlr_post_option['page-style'] == 'no-footer'){ 
	?>
	<header class="gdlr-header-wrapper gdlr-header-style-2 gdlr-centered">

		<!-- top navigation -->
		<?php if( empty($theme_option['enable-top-bar']) || $theme_option['enable-top-bar'] == 'enable' ){ ?>
		<div class="top-navigation-wrapper">
			<div class="top-navigation-container container">
				<?php 
					if( !empty($theme_option['top-bar-left-text']) || function_exists('icl_get_languages') ){
						echo '<div class="top-navigation-left">';
						echo gdlr_get_wpml_nav();
						echo gdlr_text_filter($theme_option['top-bar-left-text']); 
						echo '</div>';
					}				
				
					if( !empty($theme_option['top-bar-right-text']) ){
						echo '<div class="top-navigation-right">';
						echo gdlr_text_filter($theme_option['top-bar-right-text']); 
						echo '</div>';
					}
				?>	
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>
		
		<!-- logo -->
		<div class="gdlr-header-substitute">
			<div class="gdlr-header-container container">
				<div class="gdlr-header-inner">
					<!-- logo -->
					<div class="gdlr-logo gdlr-align-left">
						<?php echo (is_front_page())? '<h1>':''; ?>
						<a href="<?php echo home_url(); ?>" >
							<?php 
								if(empty($theme_option['logo-id'])){ 
									echo gdlr_get_image(GDLR_PATH . '/images/logo.png');
								}else{
									echo gdlr_get_image($theme_option['logo-id']);
								}
							?>						
						</a>
						<?php echo (is_front_page())? '</h1>':''; ?>
						<?php
							// mobile navigation
							if( class_exists('gdlr_dlmenu_walker') && ( empty($theme_option['enable-responsive-mode']) || $theme_option['enable-responsive-mode'] == 'enable' ) ){
								echo '<div class="gdlr-responsive-navigation dl-menuwrapper" id="gdlr-responsive-navigation" >';
								echo '<button class="dl-trigger">Open Menu</button>';
								wp_nav_menu( array(
									'theme_location'=>'main_menu', 
									'container'=> '', 
									'menu_class'=> 'dl-menu gdlr-main-mobile-menu',
									'walker'=> new gdlr_dlmenu_walker() 
								) );						
								echo '</div>';
							}						
						?>
					</div>
					
					<div class="gdlr-logo-right-text gdlr-align-left">
							<?php echo gdlr_text_filter($theme_option['logo-right-text']); ?>
					</div>
					<?php
						if( $theme_option['enable-top-search'] == 'enable' ){
							echo '<div class="gdlr-header-search">';
							get_search_form();
							echo '</div>';
						}
					?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<!-- navigation -->
		<?php 
			get_template_part( 'header', 'nav' ); 
			get_template_part( 'header', 'title' );
		?>
	</header>
	<?php } // page style ?>
	<div class="content-wrapper">
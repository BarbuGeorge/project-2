<!--<!DOCTYPE html>-->
<!--<html lang="en">-->

<!--<head>-->
	<!--=== HEAD ===-->
	<?php wp_head(); ?>

	<!--=== META TAGS ===-->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="facebook-domain-verification" content="er1r6lmw8iybygxw7czzq3oabxoq1v" />
	<!--=== LINK TAGS ===-->

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--=== TITLE ===-->
	<title><?php
	if (is_page(IS_LIVE ? 10 : 10)) {
		echo 'Apply for a truck driving job with MVL';
	} else {
		echo get_the_title();
	}
		?></title>

	<style>
		html{
			margin-top:0!important;
		}
	</style>

	<?php
	if (IS_LIVE) {
		?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-PZKR9GC');</script>
		<!-- End Google Tag Manager -->

		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:3226626,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<?php
	}
	?>

<!--</head>-->

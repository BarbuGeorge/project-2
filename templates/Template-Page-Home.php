<?php
/* Template Name: Page Home */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_header(); ?>

	<main class="page-home">
		<?php get_template_part('templates-parts/Page_Home/Hero');?>
		<?php get_template_part('templates-parts/Page_Home/logistic-services');?>
		<?php get_template_part('templates-parts/Page_Home/qualities');?>
		<?php get_template_part('templates-parts/Page_Home/real-time-insights');?>
		<?php get_template_part('templates-parts/Page_Home/put-drivers-first');?>
		<?php get_template_part('templates-parts/Page_Home/testimonial');?>
	</main>

	<?php get_footer(); ?>

</body>

</html>

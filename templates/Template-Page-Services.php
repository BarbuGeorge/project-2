<?php
/* Template Name: Page Services */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_header(); ?>

	<main class="page-services">
		<?php get_template_part('templates-parts/Page_Services/Hero_Section');?>
		<?php get_template_part('templates-parts/Page_Services/Industries_Section');?>
		<?php get_template_part('templates-parts/Page_Services/Cargo_Section');?>
		<?php get_template_part('templates-parts/Page_Services/Lanes_Section');?>
		<?php get_template_part('templates-parts/Page_Services/Equipment_Section');?>
		<?php get_template_part('templates-parts/Page_Services/Prioritization_Section');?>
	</main>

	<?php get_footer(); ?>

</body>

</html>

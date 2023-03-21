<?php
/* Template Name: Page Drive */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_header(); ?>

	<main class="page-driver">

		<div class="bg-main first">

			<?php get_template_part('templates-parts/Page_Driver/Hero');?>

			<?php get_template_part('templates-parts/Page_Driver/Support_Section');?>

		</div>

		<?php get_template_part('templates-parts/Page_Driver/Slider_Section');?>

		<?php get_template_part('templates-parts/Page_Driver/Info_Section');?>

		<?php get_template_part('templates-parts/Page_Driver/Jobs_Section');?>

		<?php get_template_part('templates-parts/Page_Driver/Locations_Section');?>


	</main>

	<?php get_footer(); ?>

</body>

</html>

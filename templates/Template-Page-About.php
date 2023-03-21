<?php
/* Template Name: Page About */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_header(); ?>

	<main class="page-about">
		<?php get_template_part('templates-parts/Page_About/Section_Hero');?>
		<?php get_template_part('templates-parts/Page_About/Section_Team');?>
		<?php get_template_part('templates-parts/Page_About/Section_Icons');?>
	</main>

	<?php get_footer(); ?>

</body>

</html>

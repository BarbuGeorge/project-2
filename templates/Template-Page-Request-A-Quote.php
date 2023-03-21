<?php
/* Template Name: Page Request A Quote*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body  class="have-aside" <?php body_class(); ?>>

	<?php get_header(); ?>
	<aside>
		<?php get_template_part('templates-parts/Contact_Info');?>
	</aside>
	<main class="page-send-us-a-message position-relative">
		<?php get_template_part('templates-parts/Page_Request_A_Quote/Form');?>
	</main>

	<?php get_footer(); ?>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('_meta.php'); ?>
</head>

<body>

	<?php get_header();?>

	<main class="index">
		<section>
			<?php the_content();?>
			<?php
		if(!file_exists('templates/'.$page.'.php')){
			include('templates/404.php');
		} else {
			include('templates/'.$page.'.php');
			echo'<?php the_content(); ?>';
		}
		?>
		</section>

	</main>

	<?php
		get_footer(); // standard with call to action
		// get_footer(null,['hide'=>true]); // hide the callto actiuon
	?>

</body>

</html>

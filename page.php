<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('_meta.php'); ?>
</head>

<body>

	<?php get_header();?>

	<main class="page">

		<section class="container pt-16">
            <h1><?php the_title();?></h1>
			 <?php
                $content = get_the_content();

                if (trim($content) == "") // Check if the string is empty or only whitespace
                {
                    echo "
                    <div class='d-block text-center'>
                        <h1>Page not found (404)</h1>
                        <p>The oage you are looking for does not exist.</p>
                     </div>";
                    get_template_part('slug', 'name');
                } else {
                    // Apply filters the same as the_content() does:
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                }
                ?>

		</section>

	</main>

	<?php get_footer();?>

</body>

</html>

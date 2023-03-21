<?php

$post = get_post($_GET['postid']);

?>
<div class="container">
	<div class="row">

		<div class="col-md-4">
			<span class="small-title text-dark mb-2">
				<?php echo get_post_meta(get_the_ID(), 'name', true); ?>
			</span>
			<h1><?php the_title(); ?></h1>
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="col-md-8">
			<?php echo $post->post_content; ?>
		</div>

	</div>
</div>
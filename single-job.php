<?php if(!isset($args['ajax'])){
echo '<!DOCTYPE html><html lang="en"><head>';include('_meta.php'); echo '</head><body>'; get_header(); echo '<main class="page"><div>';
} ?>
<?php

$post = get_post($_GET['postid']);

?>

<div class="job-page position-relative <?php echo isset($args['ajax']) ? 'ajax' : 'container';?>">
		<aside>
			<div class="content-wrapper">

				<div class="d-block px-md-8 px-4 mb-lg-9 mb-5">

					<span class="small-title text-dark mb-2">
						<?php echo get_post_meta(get_the_ID(), 'name', true); ?>
					</span>

					<h1 class="text-white"><?php the_title(); ?></h1>

				</div>

				<div class="job-img">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
					<img alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" class="img-fluid text-dark" src="<?php echo $url ?>" />
				</div>

			</div>
		</aside>

		<div class="main-content">
			<?php echo $post->post_content; ?>
			<div class="d-flex mt-2">

				<div>
					<a
						href="<?php echo get_permalink(get_page_by_title('Apply Now')); ?>"
						class="btn outlined"
						data-bs-toggle="modal" data-bs-target="#TheModal" data-bs-page="questionaire"
					>Apply now</a>
				</div>

				<?php if(isset($args['ajax'])){ ?>
				<button type="button" class="btn outlined border-0" data-bs-dismiss="modal" aria-label="Close" >Close</button>
				<?php } ?>
			</div>
		</div>
</div>

<?php if(!isset($args['ajax'])){
echo '</div></main>'; get_footer(); echo '</body></html>';
} ?>

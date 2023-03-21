<section class="jobs-section">
	<div class="container content-wrapper d-flex">

		<div class="row pt-md-10 pt-0">

			<div class="div col-lg-4 col-12 ps-lg-0 ps-md-7 ps-2 mb-lg-0 mb-4 title-wrapper">
				<span class="h1">
					Two options <br class=" d-block d-lg-none"> for joining <br class="d-block d-lg-none"> our team.
				</span>
			</div>

			<div class="col-lg-8 col-12">
				<div class="jobs-row">

					<?php
					// the query
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wpb_all_query = new WP_Query(array(
						'post_type' => 'job',  'post_status' => 'publish', 'posts_per_page' => 4,
					)); ?>
					<?php if ($wpb_all_query->have_posts()) : ?>
						<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
							<!-- Job Cards -->

							<div class="card card-job d-block">

								<?php if(has_post_thumbnail()): ?>
									<div class="card-img" title="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" style="background-image: url('<?php the_post_thumbnail_url();?>');"></div>
								<?php endif;?>

								<div class="card-body">

									<p class="small-title red">
										<?php echo get_post_meta(get_the_ID(), 'name', true); ?>
									</p>

									<h3 class="card-title"><?php the_title(); ?></h3>
									<p class="card-text"><?php echo get_the_excerpt( @$postid ); ?></p>

									<a
										href="<?php echo get_permalink(get_page_by_title('Company Drivers')); ?>"
										class="btn outlined" 
										data-bs-toggle="modal" 
										data-bs-target="#TheModal" 
										data-bs-backgr="white" 
										data-bs-page="job&postid=<?php echo get_the_ID(); ?>"
									>Learn more</a>


								</div>
							</div>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php ('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>

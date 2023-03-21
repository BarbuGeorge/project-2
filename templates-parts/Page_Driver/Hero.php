<section class="hero  m-0 p-0">
	<div class="container d-flex flex-wrap position-relative pe-0">
		<div class="row">

			<div class="hero-img-col">
				<img alt="Smiling family poses with MVL Truck Cab" class="hero-img " src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/Hero_Img.png'; ?>" />
				<img alt="Smiling family poses with MVL Truck Cab" class="hero-img-b " src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/Hero_Img_Sm.jpg'; ?>" />
				<div class="float-btn">
					<a href="#support-section"><button><i class="fa-solid fa-arrow-down"></i></button></a>
				</div>
			</div>


			<div class="hero-text-col">
				<?php

				$names = array(
					'	page-driver-hero'
				);

				$query = new WP_Query(array(
					'post_type' => 'textnode',
					'status' => 'publish, private',
					'post_status' => 'publish, private',
					'post_name__in' => $names
				));

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$thumb = get_the_post_thumbnail_url();
				?>

						<?php the_content(); ?>

				<?php
					}
				}

				wp_reset_postdata();
				?>

				<div class="mb-6">
					<a
						href="<?php echo get_permalink(get_page_by_title('Apply Now')); ?>"
						class="btn outlined white"
						data-bs-toggle="modal" data-bs-target="#TheModal" data-bs-page="questionaire"
					>Apply now</a>
				</div>

				<div class="hero-icons">
					<div>
						<img alt="2022 Military Friendly Employer badge" src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/hero_icon_a.png'; ?>" />
					</div>
					<div>
						<img alt="Women In Trucking Logo" src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/hero_icon_b.png'; ?>" />
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

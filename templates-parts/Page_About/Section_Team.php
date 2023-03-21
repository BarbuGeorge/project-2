<section class="section-team">
	<h2>Meet the team</h2>
	<div class="wrapper">
	<ul class="nav nav-pills mb-lg-6 mb-3" id="pills-tab" role="tablist">
		<?php
		$c = 0;
		$class = '';
		$cat_terms = get_terms(
			array('departments-team'),
			array(
				'hide_empty'    => false,
				'orderby'       => 'ID',
				'order'         => 'DESC',
				'number'        => 6
			)
		);

		if ($cat_terms) :
			foreach ($cat_terms as $term) :
				$c++;
				$class = ($c == 1) ? 'active' : '';

				echo '<li class="nav-item" role="presentation">' . '<button class="nav-link ' . $class . ' text-uppercase" id="' . $term->name . '-tab" data-bs-toggle="pill" data-bs-target="#' . $term->name . '" type="button" role="tab" aria-controls="' . $term->name . '" aria-selected="false">' .'<strong class="text-light">'. $term->name .'</strong>' . '</button>' . '</li>';
				wp_reset_postdata(); //important

			endforeach;

		endif; ?>
		<?php wp_reset_postdata(); ?>
	</ul>

	<div class="tab-content" id="pills-tabContent">

		<?php
		$c2 = 0;
		$classb = '';
		$cat_terms = get_terms(
			array('departments-team'),
			array(
				'hide_empty'    => false,
				'orderby'       => 'ID',
				'order'         => 'DESC',
				'number'        => 6
			)
		);
		?>

		<?php if ($cat_terms) : ?>

			<?php foreach ($cat_terms as $term) :

				$args = array(
					'category__in' => wp_get_post_categories($post->ID),
					'post_type'             => 'team',
					'posts_per_page'        => 15,
					'post_status'           => 'publish',
					'hide_empty'    		=> false,
					'tax_query'             => array(
						array(
							'taxonomy' => 'departments-team',
							'field'    => 'slug',
							'terms'    => $term->slug,

						),
					),
				);
				$_posts = new WP_Query($args); ?>
				<?php if ($_posts->have_posts()) :
					$c2++;
					$classb = ($c2 == 1) ? 'active' : '';
					echo '<div class="tab-pane fade show ' . $classb . '" id="' . $term->name . '" role="tabpanel" aria-labelledby="' . $term->name . '-tab">';
					echo '<div class="row">';
					while ($_posts->have_posts()) : $_posts->the_post();
						echo '<div class="team-col-wrapper"><div class="team-col">';
						echo '<div class="card card-team">';
						echo '<div class="card-header p-0">';
						echo get_the_post_thumbnail();
						echo '</div>';
						echo '<div class="card-body text-start">';
						echo '<strong><span class="text-dark">' . get_the_title() . '</span></strong>';
						echo '<small class="d-block"><span class="text-primary text-uppercase">' . get_post_meta(get_the_ID($post -> ID), 'role', true) . '</span></small>';
						echo '</div>';
						echo '</div>';
						echo '</div></div>';
					endwhile;
					echo '</div>';
					echo '</div>';?>
				<?php endif; ?>
				<?php wp_reset_postdata(); //important
				?>
			<?php endforeach; ?>
			<?php else : echo "dsadasa";?>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
		<!--  -->

	</div>
	</div>
</section>
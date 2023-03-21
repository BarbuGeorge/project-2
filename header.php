<header>
<navigation>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
		<div class="container-fluid nav-bar">

			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				<img alt="Drive MVL" class="fluid-img" src="<?php echo get_template_directory_uri() . '/_assets/images/logo.svg'; ?>" />
			</a>

			<div class="nav-toggle">
				<button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse bg-white" id="navbarNavDropdown">
				<div class="collapse-mobile-wrapper">
				<?php wp_nav_menu(array(
					'menu'           => 'top-menu',
					'theme_location' => '__no_such_location',
					'fallback_cb'    => false,
					'class' => 'top-menu'
				)); ?>
				<div class="navbar-buttons">
					<a class="call-link" href="tel:(662) 728-2220">
						<i class="fa-solid text-primary fa-phone me-1"></i>
						<span class=" ">(662) 728-2220</span>
					</a>
					<div>
						<a
							href="<?php echo get_permalink(get_page_by_title('Apply Now')); ?>"
							class="btn filled "
							data-bs-toggle="modal"
							data-bs-target="#TheModal"
							data-bs-page="questionaire"
						>Apply now</a>
					</div>

					<div class="ms-lg-3 ms-0 mt-lg-0 mt-2 ">
						<a
							href="<?php echo site_url('/request-a-quote'); ?>"
							class="btn outlined"
						>Request a quote</a>
					</div>

				</div>
			</div>
			</div>
	</div>
	</nav>
</navigation>
</header>

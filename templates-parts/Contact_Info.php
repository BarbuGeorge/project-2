<div class="contact-info-col">
	<?php echo textnode('contact-info'); ?>

	<?php if (is_page('contact-us')) : ?>
		<a href="<?php echo site_url('/request-a-quote'); ?>" >
			<button class="btn filled">Request a quote</button>
		</a>

	<?php elseif(is_page('request-a-quote')) :?>
		<a href="<?php echo site_url('/contact-us'); ?>" >
			<button class="btn filled">Send us a message</button>
		</a>

	<?php endif; ?>

</div>
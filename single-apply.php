<?php if(!isset($args['ajax'])){
echo '<!DOCTYPE html><html lang="en"><head>';include('_meta.php'); echo '</head><body>'; get_header(); echo '<main class="page"><div>';
} ?>
<?php

// $post = get_post($_GET['postid']);

?>

<div class="page-apply p-10 pb-0 position-relative <?php echo isset($args['ajax']) ? 'ajax' : '';?>">
	<div class="d-flex align-items-lg-center align-items-start flex-column  h-100">
		<div class="container d-flex flex-xl-row flex-column position-relative">
			<div class="col-lg-7 col-12 mb-lg-9 mb-5">
				<h1>Want to know more about driving for MVL?</h1>
				<p class="mb-2">Get your questions answered by one of our recruiters at our Virtual Driver Job Fair Sessions.</p>
				
				<span>
					<i>We care about your privacy. Your identity and information will<br class="d-lg-block d-none"> be kept private during all sessions.</i>
				</span>
			
				<div class="mb-3 mt-3">
					<a
						target="_blank"
						href="https://mvlonline.com/zoom"
						class="btn outlined white dates_rsvp"
					>See dates & RSVP</a>
				</div>
				<?php if(isset($args['ajax'])){ ?>
					<div class="mb-lg-3 mb-0">
					<button type="button" class="btn outlined white border-0" data-bs-dismiss="modal" aria-label="Close" >No thanks</button>
					</div>
				<?php } ?>
			</div>
			<div class="apply-modal-img-wrapper">
				<img alt="Man and woman watching MVL’s Virtual Driver Job Fair Session on Zoom." class="apply-modal-img" src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/apply-image-hr.png'; ?>" />
			</div>
		</div>
		<div class="page-apply-footer container-fluid">
			<div class="row">
				<div class="col-xl-4 col-12 order-xl-1 order-2">
					<img alt="Recruiters" class="page-apply-footer-img" src="<?php echo get_template_directory_uri() . '/_assets/images/Page_Driver/recruiters@2x.png'; ?>" />
				</div>
				<div class="col-xl-8 col-12 order-xl-2 order-1">
					<strong>Join one of our recruiters</strong> and learn how we go above and beyond for our driving force. You'll also hear from MVL drivers and staff and learn firsthand how we <i>put our drivers first.</i>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(!isset($args['ajax'])){
echo '</div></main>'; get_footer(); echo '</body></html>';
} ?>

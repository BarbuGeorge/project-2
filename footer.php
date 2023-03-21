<footer class="footer">
	<div class="container">
		<div class="row flex-lg-row flex-column w-100">

			<div class="col-lg-2 col-12 text-lg-start text-center">
				<a class="footer-brand" href="<?php echo home_url(); ?>">
					<img alt="MVL logo" class="fluid-img" src="<?php echo get_template_directory_uri() . '/_assets/images/logo.svg'; ?>" />
				</a>
			</div>

			<div class="col-lg-10 col-12 mt-lg-0 mt-5">

				<div class="row text-md-start text-center frow">
					<div class="col-lg-3 col-md-12 col-xl-2 pe-0 mb-lg-0 mb-3 text-lg-start text-center">
						<div class="info-box-title">Call Us</div>
						<div><a class="text-white" href="tel:(662) 728-2220">(662) 728-2220</a></div>
					</div>
					<div class="col-lg-3 col-md-12 col-xl-2 pe-0 mb-lg-0 mb-3 text-lg-start text-center">
						<div class="info-box-title">Email Us</div>
						<div><a class="text-white" href="mailto:sales@mvlonline.com">sales@mvlonline.com</a></div>
					</div>
					<div class="col-lg-5 col-md-12 col-xl-4 pe-0 ps-lg-9 ps-4 mb-lg-0 mb-3 text-lg-start text-center">
						<div class="info-box-title">Corporate Office</div>
						<div><a class="text-white" href="#">2719 S. Second St. Booneville,
							<br/>MS 38829</a></div>
					</div>
					<div class="col-sm-12 col-md-12 col-xl-4 px-0 text-center text-xl-end  mt-lg-0 mt-5 pe-md-2 pe-0 social-icons-row">
						<a class="text-light" target="_blank" href="http://www.linkedin.com/company/morganvanlines">
							<span class="social-icon">
								<i class="fa-brands fa-linkedin-in"></i>
							</span>
						</a>

						<a class="text-light" target="_blank" href="https://www.facebook.com/morganvanlines">
							<span class="social-icon">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
						</a>

						<a class="text-light" target="_blank" href="https://instagram.com/driveformvl/">
							<span class="social-icon">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</a>

						<a class="text-light" target="_blank" href="https://www.youtube.com/channel/UCjMqO105psOXMOf6ULrEVyQ?v">
							<span class="social-icon">
								<i class="fa-brands fa-youtube"></i>
							</span>
						</a>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-12 col-xl-6 text-xl-start text-center">
						<a class="text-light" href="<?php echo site_url('/privacy-policy'); ?>">
							<span>Privacy Policy</span>
						</a>
						<span class="ms-6 d-none">Terms & Conditions</span>
					</div>

					<div class="col-12 col-xl-6 text-xl-end text-center mt-xl-0 mt-2"><span>© 2022 Morgan Van Lines. All rights reserved.</span></div>
				</div>

			</div>
		</div>
	</div>
</footer>

<div class="modal fade" id="TheModal" tabindex="-1" aria-labelledby="TheModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="TheModalDialog">
		<div class="modal-content">
			<div class="modal-body" id="TheModalBody"><!-- inject content here --></div>
			<a class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fa-xl"></i></a>
		</div>
	</div>
</div>

<style type="text/css">
	/*svg { fill: currentColor !important;}*/
	.btn-close {
		/*background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center / 1em auto no-repeat !important;*/
		/*fill: green;*/
		/*color: purple;*/
		background: none !important;
	}

</style>

<script type="text/javascript">

	// Cache popups for faster load
	let PopupCaches = {
		'apply': true,
		'questionaire': true,
	}

	let GetTemplateContents = function(file_template) {

		if (PopupCaches[file_template] && PopupCaches[file_template] instanceof Promise) {
			return PopupCaches[file_template];
		}

		return new Promise(function (resolve, reject) {
			file_template = file_template.replace('.php','');
			let page = wp_home_page + "/wp-content/themes/MVLtheme/ajax.php?page="+file_template;

			const xhttp = new XMLHttpRequest();
			xhttp.onload = function () {
				let resp = this.response;

				if (resp) {
					resolve(resp);
				} else {
					reject(resp);
				}

			}
			xhttp.open("GET", page, true);
			xhttp.send();
		});
	}

	jQuery(function () {
		for (let cache in PopupCaches) {
			if (PopupCaches[cache] === true) {
				PopupCaches[cache] = GetTemplateContents(cache);
			}
		}
	});

	function TheModalOpened(button) {

		// variables ---------------------------------------------------
			const page 			= button.getAttribute('data-bs-page');
			const modalsize 	= button.getAttribute('data-bs-size') ? button.getAttribute('data-bs-size') : 'modal-fullscreen';
			const modalbackgr 	= button.getAttribute('data-bs-backgr') ? button.getAttribute('data-bs-backgr') : 'red';
			const pageattr 		= "popup-"+page;

		// CSS CLASS ---------------------------------------------------
			TheModalDialog.classList.add(modalsize);
			TheModal.classList.add(modalbackgr);

		// URL replace ---------------------------------------------------
			window.location.href = "#"+pageattr.replace('&postid=','-');

		// LOADING ---------------------------------------------------
			TheModalBody.innerHTML = '<div class="p-5 text-center"><i class="fa-solid fa-spinner fa-spin me-2"></i>Loading ...</div>';

		// LOAD FROM CACHE ---------------------------------------------------
		GetTemplateContents(page).then(response => {
			resp = response;
		}).catch(() => {
			resp = '<div class="lead">The page you are looking for, does not exist!</div>';
		}).finally(() => {
			TheModalBody.innerHTML = resp;

			if(page=='questionaire'){
				let script = document.createElement('script');
				script.src = wp_home_page + '/wp-content/themes/MVLtheme/questionaire.js';
				document.body.appendChild(script);
			}

			document.querySelectorAll('#TheModal [data-bs-toggle="modal"][data-bs-target="#TheModal"][data-bs-page]').forEach(btn => {
				btn.removeAttribute('data-bs-toggle');
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					e.stopImmediatePropagation();

					TheModalOpened(btn);
				}, true);
			});
		});
	}

	// identify modal ---------------------------------------------------
	const TheModal 			= document.getElementById('TheModal');
	const TheModalDialog	= document.getElementById('TheModalDialog');
	const TheModalBody 		= document.getElementById('TheModalBody');

	// attach OPEN ---------------------------------------------------
	TheModal.addEventListener('show.bs.modal', event => {
		const button = event.relatedTarget;
		TheModalOpened(button);
	});

	// attach CLOSE ---------------------------------------------------
	TheModal.addEventListener('hidden.bs.modal', event => {

		TheModal.className 			= "modal fade";
		TheModalDialog.className 	= "modal-dialog";

		if ("pushState" in history){
			history.pushState("", document.title, window.location.pathname + window.location.search);
		} else {
			window.location.href= "#";
		}
	});


	// Request a quote modal should show after 7 seconds.
	// pause the timer when another modal is being displayed, so they don't overlap

	var Timer = function(callback, delay) {
		var timerId, start, remaining = delay;

		this.pause = function() {
			window.clearTimeout(timerId);
			timerId = null;
			remaining -= Date.now() - start;
		};

		this.resume = function() {
			if (timerId) {
				return;
			}

			start = Date.now();
			timerId = window.setTimeout(callback, remaining);
		};

		this.resume();
	};

	jQuery(function() {

		return; // disable popup auto show

		if (!jQuery('body').hasClass('page-template-Template-Page-Driver')) {
			return;
		}
		let popup_last_show = localStorage.getItem('MVL_popup_last_showed_at');
		let today = new Date();

		if (popup_last_show) {
			popup_last_show = new Date(parseInt(popup_last_show));
		}

		if (!popup_last_show || (popup_last_show && popup_last_show.getMonth()+''+popup_last_show.getDate() !== today.getMonth()+''+today.getDate())) {
			window.popup_timer = new Timer(function () {
				document.querySelector('[data-bs-page=apply]').click();
				localStorage.setItem('MVL_popup_last_showed_at', new Date().getTime() + '');

				window.popup_timer = null;
			}, 15000);
		}
	});

	jQuery(document).on('show.bs.modal', function () {
		if (window.popup_timer) {
			window.popup_timer.pause();
		}
	});

	jQuery(document).on('hidden.bs.modal', function () {
		if (window.popup_timer) {
			window.popup_timer.resume();
		}
	});

	jQuery(function() {
		if (window.location.hash && window.location.hash.substring(0, 7) == '#popup-') {
			let request_popup = jQuery('[data-bs-page='+window.location.hash.substring(7)+']');
			if (request_popup.length) {
				request_popup[0].click();
			}
		}
	});

</script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<!-- LIVE CHAT ADDED 2022.11.22 -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 14753244;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/14753244/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>

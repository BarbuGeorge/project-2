<?php
const FACEBOOK_CONVERSION_API_ACCESS_TOKEN = 'EAAhdH9hOiYwBABDYAvZBp7L4owCCueUAszZAjsJWmbQ0YGYfwnS2RGvJ9H55U2YGKHaSPwTTyOP5jeLMGOwz4Buhe4RYWAJCbzhYELlrKgNbi1726TAxqu5QXAKAFrq80xQIEEglcJhTH7K0V1v9fX9fnZCcBoNGHrypdV2Diy8mCghT3QieN77ESbyzukZD';
const FACEBOOK_PIXEL_ID = '456266993028796';

function get_new_event_id($event_name) {
	return time() . '_' . $event_name . '_' . rand();
}

add_action('wp_loaded', function () {

    if (!IS_LIVE) {
        return;
    }

	if (is_admin()) {
		return;
	}

	$event_name = 'PageView';
	$event_id = get_new_event_id($event_name);

	$request_url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $request_url = str_replace('wp-content/themes/MVLtheme/ajax.php?page=', '#popup-', $request_url);
	$data = [
		[
			'event_name'       => $event_name,
			'event_time'       => time(),
			'event_id'         => $event_id,
			'event_source_url' => $request_url,
			'action_source'    => 'website',
			'user_data'        => [
				'client_user_agent' => @$_SERVER['HTTP_USER_AGENT'],
				'client_ip_address' => $_SERVER['REMOTE_ADDR'],
			],
		],
	];

	$ch = curl_init();
	curl_setopt_array($ch, [
		CURLOPT_URL            => 'https://graph.facebook.com/v15.0/' . FACEBOOK_PIXEL_ID . '/events',
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST           => true,
		CURLOPT_POSTFIELDS     => [
			'data'         => json_encode($data),
			'access_token' => FACEBOOK_CONVERSION_API_ACCESS_TOKEN,
		],
	]);

	$response = curl_exec($ch);
});

add_action('wp_head', function() {

    if (!IS_LIVE) {
		return;
	}

	if (is_admin()) {
		return;
	}

	echo '<!-- FB Pixel Head Start -->';
	?>
	<!-- Meta Pixel Code -->
	<script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?= FACEBOOK_PIXEL_ID; ?>');
        fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=<?= FACEBOOK_PIXEL_ID; ?>&ev=PageView&noscript=1"
		/></noscript>
	<!-- End Meta Pixel Code -->
	<?php
	echo '<!-- FB Pixel Head End -->';
});

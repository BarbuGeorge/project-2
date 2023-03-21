<?php
if (file_exists(__DIR__.'/facebookpixel.php')) {
	include __DIR__.'/facebookpixel.php';
}

// Fontawesome
function diwp_include_font_awesome_styles()
{
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/_assets/fontawesome-free-6.1.2-web/css/all.css');

	wp_enqueue_style('owl-carousel-min-css', get_template_directory_uri() . '/_assets/css/owl.carousel.min.css', array());

	wp_enqueue_style('owl-carousel-min-default-css', get_template_directory_uri() . '/_assets/css/owl.theme.default.min.css', array());

}

add_action('wp_enqueue_scripts', 'diwp_include_font_awesome_styles');
// Bootstrap Script
function arl_enqueue_scripts()
{
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/_assets/bootstrap-5.1.3/dist/js/bootstrap.min.js', array());

	wp_enqueue_script('vue', get_template_directory_uri() . '/_assets/js/vue.global.js', array());

	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js');

	wp_enqueue_script(
		'carousel',
		get_template_directory_uri() . '/_assets/js/carousel.js',
		array('jquery')
	);

	wp_enqueue_script(
		'owl-carousel',
		get_template_directory_uri() . '/_assets/js/owl.carousel.min.js',
		array('jquery')
	);

	wp_enqueue_script(
		'toggle-class',
		get_template_directory_uri() . '/_assets/js/toggle-class-active.js',
		array('jquery')
	);

}
add_action('wp_enqueue_scripts', 'arl_enqueue_scripts');

// Menus
function wpb_custom_new_menu()
{
	register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');

register_nav_menus(
	array(
		'top-menu' => 'Top Menu Location',
		'top-menu-mobile' => 'Top Menu Mobile',
		'footer-menu' => 'Footer Menu Location',
	)
);
add_theme_support('menus');
add_theme_support(
	'custom-logo',
	array(
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true,
	)
);

// Add Thumbnails
add_theme_support('post-thumbnails');

// CPT Textnode
function custom_post_type()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __('Text Nodes', 'Post Type General Name', 'MVL Theme'),
		'singular_name'       => __('Text Node', 'Post Type Singular Name', 'MVL Theme'),
		'menu_name'           => __('Text Nodes', 'MVL Theme'),
		'parent_item_colon'   => __('Parent TextNode', 'MVL Theme'),
		'all_items'           => __('All Text Nodes', 'MVL Theme'),
		'view_item'           => __('View Text Node', 'MVL Theme'),
		'add_new_item'        => __('Add New Text Node', 'MVL Theme'),
		'add_new'             => __('Add New', 'MVL Theme'),
		'edit_item'           => __('Edit Text Node', 'MVL Theme'),
		'update_item'         => __('Update Text Node', 'MVL Theme'),
		'search_items'        => __('Search Text Node', 'MVL Theme'),
		'not_found'           => __('Not Found', 'MVL Theme'),
		'not_found_in_trash'  => __('Not found in Trash', 'MVL Theme'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('TextNodes', 'MVL Theme'),
		'description'         => __('TextNode', 'MVL Theme'),
		'labels'              => $labels,

		// 'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
		'supports'            => array('title', 'editor', 'author', 'revisions', 'tags', 'thumbnail'),

		'taxonomies'          => array('textnode-category'),

		'hierarchical'        => false,
		'public'              => true,
		'menu_icon'         => 'dashicons-edit',
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('textnode', $args);
}
add_action('init', 'custom_post_type', 0);

// Jobs CPT
function custom_post_job()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __('Jobs', 'Post Type General Name', 'MVL Theme'),
		'singular_name'       => __('Job', 'Post Type Singular Name', 'MVL Theme'),
		'menu_name'           => __('Jobs', 'MVL Theme'),
		'parent_item_colon'   => __('Parent Job', 'MVL Theme'),
		'all_items'           => __('All Jobs', 'MVL Theme'),
		'view_item'           => __('View Job', 'MVL Theme'),
		'add_new_item'        => __('Add New Job', 'MVL Theme'),
		'add_new'             => __('Add New', 'MVL Theme'),
		'edit_item'           => __('Edit Job', 'MVL Theme'),
		'update_item'         => __('Update Job', 'MVL Theme'),
		'search_items'        => __('Search Job', 'MVL Theme'),
		'not_found'           => __('Not Found', 'MVL Theme'),
		'not_found_in_trash'  => __('Not found in Trash', 'MVL Theme'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('Jobs', 'MVL Theme'),
		'description'         => __('Job', 'MVL Theme'),
		'labels'              => $labels,

		'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),

		'taxonomies'          => array('job-category'),
		'menu_icon'         => 'dashicons-hammer',
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 3,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('job', $args);
}
add_action('init', 'custom_post_job', 0);

// Cpt Team

function custom_post_type_team()
{
	$labels = array(
		'name'                => __('Team', 'Post Type General Name', 'MVL'),
		'singular_name'       => __('Team', 'Post Type Singular Name', 'MVL'),
		'menu_name'           => __('Team', 'MVL'),
		'parent_item_colon'   => __('Parent Team', 'MVL'),
		'all_items'           => __('All members', 'MVL'),
		'view_item'           => __('Vezi team', 'MVL'),
		'add_new_item'        => __('Add team member', 'MVL'),
		'add_new'             => __('Add member ', 'MVL'),
		'edit_item'           => __('Edit team member', 'MVL'),
		'update_item'         => __('Update team member', 'MVL'),
		'search_items'        => __('sEARCH team member', 'MVL'),
		'not_found'           => __('Not Found', 'MVL'),
		'not_found_in_trash'  => __('Not found in Trash', 'MVL'),
	);

	$args = array(
		'label'               => __('Team', 'MVL'),
		'description'         => __('Team', 'MVL'),
		'labels'              => $labels,

		'supports'            => array('title', 'editor', 'author', 'revisions', 'tags', 'thumbnail', 'custom-fields'),

		'taxonomies'          => array('team','departments-team'),

		'has_archive' 		  => true,
		'hierarchical'        => true,
		'public'              => true,
		'menu_icon'        	  => 'dashicons-groups',
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest ' => 		true,
		'menu_position'       => 5,
		'can_export'          => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'description'  =>  false

	);

	// Registering your Custom Post Type
	register_post_type('team', $args);
}
add_action('init', 'custom_post_type_team', 0);

//Register taxonomy for team
function team_taxonomy() {

    register_taxonomy(
        'departments-team',
        'team',
        array(

			"labels" => array(
				"name" => "Departments",
				"add_new_item" => "Add new department",
				"search_items"  => "Search department"
			),

            'rewrite' => array( 'slug' => 'departments-team' ),
			'has_archive'   => 		true,
            'hierarchical'  => 		true,
			'show_in_rest'  => 		true ,
			'show_ui'       => 		true,
			'show_tagcloud' => 		false,
			'show_admin_column' => 	true,
			'public'            => 	true,
			'query_var' 	=> true,
			'update_count_callback' => '_update_post_term_count',
        )
    );

}
add_action( 'init', 'team_taxonomy' );
//

// Register metabox "Role" for team members
//Register Meta box

//

// End register metabox
function textnode($post_name) {
	$query = new WP_Query(array(
		'post_type' => 'textnode',
		'post_status' => 'publish, private',
		'name' => $post_name
	));

	if (!$query->have_posts()) {
		return null;
	}

	$query->the_post();

	$content = get_the_content();

	wp_reset_postdata();

	return $content;
}

function textnodeimage($post_name) {
	$query = new WP_Query(array(
		'post_type' => 'textnode',
		'post_status' => 'publish, private',
		'name' => $post_name
	));

	if (!$query->have_posts()) {
		return null;
	}

	$query->the_post();

	$content = get_the_post_thumbnail();

	wp_reset_postdata();

	return $content;
}


add_action( 'wp_enqueue_scripts', function () {
	wp_register_script( 'wp-homepage-url', '' );
	wp_enqueue_script( 'wp-homepage-url' );
	wp_add_inline_script('wp-homepage-url', 'window.wp_home_page = "'.get_home_url().'";');
	wp_add_inline_script('wp-homepage-url', 'window.admin_ajax = "'.admin_url('admin-ajax.php').'";');
	wp_add_inline_script('wp-homepage-url', 'window.IS_LIVE = '.(IS_LIVE ? 'true' : 'false').';');
	wp_add_inline_script('wp-homepage-url', 'window.cp_referer = "'.wpcf7_conversion_referal_shortcode_handler().'";');
});

add_action('wpcf7_mail_sent', function() {
	if (IS_LIVE) {
		$post_address = 'https://dashboard.tenstreet.com/post/';
	} else {
		$post_address = 'https://devdashboard.tenstreet.com/post/';
	}

	$referer = wpcf7_conversion_referal_shortcode_handler();

	$request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
<TenstreetData>
    <Authentication>
        <ClientId>' . (IS_LIVE ? '743' : '741') . '</ClientId>
        <Password>5YgH39ZyM!We^6t1wyhe02</Password>
        <Service>subject_upload</Service>
    </Authentication>
    <Source>MorganVanLines</Source>
    <CompanyId>' . (IS_LIVE ? '1304' : '15') . '</CompanyId>
    <Mode>' . (IS_LIVE ? 'LIVE' : 'DEV') . '</Mode>
    <PersonalData>
        <PersonName>
            <GivenName>' . htmlentities($_POST['first-name']) . '</GivenName>
            <FamilyName>' . htmlentities($_POST['last-name']) . '</FamilyName>
        </PersonName>
        <ContactData>
            <InternetEmailAddress>' . htmlentities($_POST['email']) . '</InternetEmailAddress>
            <PrimaryPhone>' . htmlentities($_POST['phone']) . '</PrimaryPhone>
        </ContactData>
        <PostalAddress>
        	<PostalCode>' . htmlentities($_POST['zip']) . '</PostalCode>
		</PostalAddress>
    </PersonalData>
    <ApplicationData>
        <AppReferrer>' . $referer . '</AppReferrer>
        <DisplayFields>
            <DisplayField>
                <DisplayPrompt>Cdl A</DisplayPrompt>
                <DisplayValue>' . htmlentities(ucfirst(strtolower($_POST['answer-1']))) . '</DisplayValue>
            </DisplayField>
            <DisplayField>
                <DisplayPrompt>Moving Violations</DisplayPrompt>
                <DisplayValue>' . htmlentities(ucfirst(strtolower($_POST['answer-3']))) . '</DisplayValue>
            </DisplayField>
            <DisplayField>
                <DisplayPrompt>Experience</DisplayPrompt>
                <DisplayValue>' . htmlentities(ucfirst(strtolower($_POST['answer-2']))) . '</DisplayValue>
            </DisplayField>
        </DisplayFields>
    </ApplicationData>
</TenstreetData>
';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $post_address);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf- 8'));
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $request_xml);
	$response_xml = curl_exec($ch);

	file_put_contents(__DIR__.'/tenstreet.log', $request_xml.PHP_EOL.PHP_EOL.$response_xml.PHP_EOL, FILE_APPEND);

	curl_close($ch);
});

function wpcf7_conversion_referal_shortcode_handler() {
	$conversion_ref_value = apply_filters('cpreftrack_referrer', '');

	if (empty($conversion_ref_value)) {
		$conversion_ref_value = 'ar-web-organic';
	}

	if (substr($conversion_ref_value, 0, 36) == 'https://www.mvlonline.com/') {
		$conversion_ref_value = 'ar-web-mainwebsite';
	}

	if (substr($conversion_ref_value, 0, 7) != 'ar-web-') {
		$conversion_ref_value = 'ar-web-organic';
	}

	return $conversion_ref_value;
}

add_action('wpcf7_posted_data', function($data) {

	$data['cp_referer'] = wpcf7_conversion_referal_shortcode_handler();

	return $data;
});

add_filter('wpcf7_submission_result', function($result) {

	$result['cp_referer'] = wpcf7_conversion_referal_shortcode_handler();

	return $result;
});

add_filter( 'wp_sitemaps_add_provider', function ($provider, $name) {
	return ( $name == 'users' ) ? false : $provider;
}, 10, 2);

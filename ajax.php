<?php
// iact Cos, 2022-09-29 17:05 //
// weird template parts hack???????
require_once("../../../wp-load.php");
// get_template_part( 'templates-parts/popups/'.@$_GET['page'] );
get_template_part( 'single-'.@$_GET['page'], null, [
	'ajax' => true,
] );

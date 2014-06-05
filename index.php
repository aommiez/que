<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:24 AM
 */
require_once 'bootstrap.php';

$_page = isset($_GET['page'])? $_GET['page']: 'index';

class View{
	
	static function render($_page, $template_dir = '_template'){

		// Detect AJAX Request
		$no_template = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='xmlhttprequest') ? true : false ;
		if ($no_template===false) {
			include $template_dir.'/header.php';
		}
		
		include 'page/'.$_page.'.php';

		if ($no_template===false) {
			include $template_dir.'/footer.php';
		}
		
	}
}

if ($_page=='index') {
	View::render($_page, '_template_login');
}else if($_page=='user/scan'
	OR $_page=='user/show'){
	View::render($_page, '_template_blank');
}else{
	View::render($_page);
}

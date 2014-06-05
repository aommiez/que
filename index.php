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
	public static $template = '_template';
	static function render($_page, $template_dir = null){

		if ($template_dir===null) {
			$template_dir = View::$template;
		}

		include $template_dir.'/header.php';
		include 'page/'.$_page.'.php';
		include $template_dir.'/footer.php';
	}
}

if ($_page!=='index') {
	View::render($_page);
}else{
	View::render($_page, '_template_login');
}

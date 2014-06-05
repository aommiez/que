<?php
/**
* 
*/
class Views
{
	public $template_folder = '_default';
	
	public function render($path){
		require_once 'views/templates/'.$this->template_folder.'/header.php';

		$view = 'views/'.$path.'.php';
		if (is_file($view)===true) {
			require_once $view;
		}else{
			exit;
		}
		require_once 'views/templates/'.$this->template_folder.'/footer.php';
	}
}


/**
* 
*/
class Routes
{
	static function set($path, $param = null)
	{
		$browser_path = Routes::find();
		if ($browser_path==$path) {
			$views = new Views();
			if ($param!==null) {
				if (!empty($param['template'])) {
					$views->template_folder = $param['template'];
				}
			}
			$views->render($path);
		}
	}

	static function find(){
		$find_dir = dirname($_SERVER['SCRIPT_NAME']).'/';
		return str_replace($find_dir, "", $_SERVER['REQUEST_URI']);
	}
}

// Routes::set('', array('template' => '_login'));
Routes::set('user/login', array('template' => '_login'));
Routes::set('department/list');
Routes::set('department/form');
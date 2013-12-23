<?php defined('BASEPATH') or die('Access restricted!');


/**
 * 这是一个smarty的初始化类
 *
 * @copyright Copyright (c) 
 * @author    王雷 leiwang520ps@163.com * @package Core
 * @date      2012-8-8
 * @version   $Id$
 */
require(APPPATH.'libraries/smarty/Smarty.class.php');//APPPATH是入口文件定义的application的目录
class Cismarty extends Smarty
{
	// {{{ constructor
		
	/**
	 * 构造函数
	 *
	 * @access	public
	 * @param	array/string	$template_dir
	 * @return	obj		smarty obj
	 */
	public function __construct($template_dir = '', $compile_dir = '', $config_dir = '', $cache_dir = '')
	{
		parent::__construct();
		//$this->Smarty();
	    if(is_array($template_dir)){
	    	foreach ($template_dir as $key => $value) {
	    		$this->$key = $value;
	    	}
	    }
	    else {
	    	//ROOT是Codeigniter在入口文件index.php定义的本web应用的根目录
	    	//在入口文件中加入define('ROOT', dirname(__FILE__);
	    	$this->template_dir = $template_dir ? $template_dir : ROOT . '/templates';
	    	$this->compile_dir  = $compile_dir  ? $compile_dir  : ROOT . '/templates_c';
	    	$this->config_dir   = $config_dir   ? $config_dir   : ROOT . '/config'; 
	    	$this->cache_dir    = $cache_dir    ? $cache_dir    : ROOT . '/cache';
	    }
		
		$this->caching = false;//开启缓存,为false的时侯缓存无效
		$this->cache_lifetime = 60;//缓存时间
		
	} // end func constructor
		 
	// }}}


	function view($template, $data='') {
		
		
		
		if(!empty($data)) 
		{
			if(is_array($data))
			{
				foreach($data as $key=>$val)
				{
					$this->assign($key, $val);
				}
			}
		}
		//$arr = get_defined_vars();  
		
		$this->display($template . '.htm');
	}

}

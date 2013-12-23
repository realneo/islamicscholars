<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('lib/smarty/smarty.class.php');

class Tp extends Smarty{
	function tp(){
		parent::Smarty();
		$this->template_dir = APPPATH.'views';
		$this->compile_dir = APPPATH.'templates_c/';
	}
}
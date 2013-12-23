<?php

/*****************************************************************************\
 * 说明: 包含类                             								  	 *
\*****************************************************************************/

class Include_all {
	
	var $conf;	// 通信参数配置
	
	// 构造函数
	function __construct($conf)
	{
		$this->conf = $conf;
		
		$this->init();
	}
	
	// 初始化
    function init()
    {
		foreach($this->conf as $key => $row){
			include_once('application/include/' . ucfirst(strtolower($row)) . '.php');
		}
    }

}

?>
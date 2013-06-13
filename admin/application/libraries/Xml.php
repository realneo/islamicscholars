<?php

/*****************************************************************************\
 * 说明: XML类                             								  	 *
\*****************************************************************************/

class Xml {
	
	// 构造函数
	function __construct()
	{
		// TODO
	}
	
	// XML转数组
	function xml2array($xml, &$arr)
	{	
		$arr = $this->get_array_fromXML($xml);
		
		return true;
	}
	
	// 数组转XML
	function array2xml($arr, &$xml, $root = 'request')
	{
		$xml = '<' . $root . '>';
		
		foreach($arr as $key => $row){
			$xml .= '<' . $key . '>' . $row . '</' . $key . '>';
		}
		
		$xml .= '</' . $root . '>';
		
		return true;
	}
	
	// 清理数组多余节点
	function clean_node($arr, &$outarr, $type = 1)
	{
		if($type == 1){
			foreach($arr as $key => $row){
				if($key !== '@attributes'){
					foreach($row as $k => $r){
						$outarr[$k] = $r[0];
					}
				}
			}
		}
		
		return true;
	}
	
	// 解析XML
	function get_array_fromXML($xml)
	{        
	   $result=array();    

	   $doc=simplexml_load_string($xml);    

	   $this->convert_xml2array($result,$doc);    

	   return $result['root'];    
	}
	
	// XML转换数组
	function convert_xml2array(&$result,$root,$rootname='root')
	{
	   $n=count($root->children());

	   if ($n>0){
	       if (!isset($result[$rootname]['@attributes'])){
	           $result[$rootname]['@attributes']=array();
	           foreach ($root->attributes() as $atr=>$value){
	               $result[$rootname]['@attributes'][$atr]=(string)$value;
	           }            
	       }

	         foreach ($root->children() as $child){
	             $name=$child->getName();    
	             $this->convert_xml2array($result[$rootname][],$child,$name);                          
	         }
	   } else {        
	       $result[$rootname]= (array) $root;
	       if (!isset($result[$rootname]['@attributes'])){
	           $result[$rootname]['@attributes']=array();
	       }
	   } 
	}

}

?>
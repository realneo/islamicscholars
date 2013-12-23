<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common_module extends CI_Model{

	private $GF_DBM;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//分页
	function GetPaging($configs)
	{

		$config['base_url'] = $configs['base_url'];
		$config['total_rows'] = $configs['total_rows'];
		$config['per_page'] = $configs['per_page'];



		$config['full_tag_open'] = "<div class='page'>";
		$config['full_tag_close'] = '</div>';

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';

		$config['prev_link'] = 'Prev';

		$config['cur_tag_open'] = '&nbsp;<b>';
		$config['cur_tag_close'] = '</b>';



		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}

	function get_adpBrand()
	{
		$sql = "SELECT * FROM mx_brand where brandtype in(35,36,37)";
		$query =$this->db->query($sql);
		$data = $query->result_array();
		return  $data;
	}
	
	function get_config_fomration($codekind)
	{
		//var_dump($codekind);die();
		if(isset($codekind) && $codekind <>''){
			$sql = "SELECT * FROM mx_system_code WHERE codekind='".$codekind."'";
			//var_dump($sql);die();
			$query =$this->db->query($sql);
			$pricerow = $query->result_array();
			//var_dump($pricerow); die();
			return  $pricerow;
			////var_dump($pricerow);die();
		}else{
			return false;
		}
	}


	/**
	 * 
	 *
	 * @param unknown_type $fcodeID
	 * @return unknown
	 */
	function get_configbyfcodeid($fcodeID)
	{
		if(isset($fcodeID) && $fcodeID <>''){
			$sql = "SELECT * FROM mx_system_code WHERE fcodeID='".$fcodeID."'";
			//var_dump($sql);die();
			$query =$this->db->query($sql);
			$result = $query->result_array();
			return  $result;
		}else{
			return false;
		}
	}

	/**
	 * 
	 *
	 * @param unknown_type $fcodeID
	 * @return unknown
	 */
	function get_config_bycodeid($codeID)
	{
		if(isset($codeID) && $codeID <>''){
			$sql = "SELECT * FROM mx_system_code WHERE codeID='".$codeID."'";
			//var_dump($sql);die();
			$query =$this->db->query($sql);
			$result = $query->result_array();
			return  $result;
		}else{
			return false;
		}
	}

	/**
	 *  分页显示
	 *
	 * @param unknown_type $configs
	 * @return unknown
	 */
	function page_all($configs) {
		$config['uri_segment'] = $configs['uri_segment'];
		$config['base_url'] = $configs['base_url'];

		$config['total_rows'] =$configs['total_rows'];
		$config['per_page'] = $configs['per_page'];

		$config['num_links'] = 5;
		
		$config['full_tag_open'] = "<div class='page'>";
		$config['full_tag_close'] = '</div>';

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';

		$config['prev_link'] = 'Prev';

		$config['cur_tag_open'] = '&nbsp;<b>';
		$config['cur_tag_close'] = '</b>';

//添加封装标签
//				$config['full_tag_open'] = '<p>';
//				$config['full_tag_close'] = '</p>';
		
		//自定义起始链接
//		$config['first_link'] = '首页';//首页若不显示，空即可；
//		//$config['first_tag_open'] = '<div style="display:none">';//"第一页"链接的打开标签。
//		$config['first_tag_open'] = '<div style="">';//"第一页"链接的打开标签。
//		$config['first_tag_close'] = '</div>';//"第一页"链接的关闭标签。
//		//自定义结束链接
//		$config['last_link'] = '末页';//尾页若不显示，空即可；
//		//$config['last_tag_open'] = '<div style="display:none">';//"最后一页"链接的打开标签。
//		$config['last_tag_open'] = '<div style="">';
//		$config['last_tag_close'] = '</div>';//"最后一页"链接的关闭标签。
//		//自定义"下一页"链接；
//		$config['next_link'] = '下一页';//你希望在分页中显示"下一页"链接的名字。
//		$config['next_tag_open'] = '<div>';//"下一页"链接的打开标签。
//		$config['next_tag_close'] = '</div>';//"下一页"链接的关闭标签。
//		//自定义"上一页"链接；
//		$config['prev_link'] = '上一页';//你希望在分页中显示"上一页"链接的名字。
//		$config['prev_tag_open'] = '<div>';//"上一页"链接的打开标签。
//		$config['prev_tag_close'] = '</div>';//"上一页"链接的关闭标签。
//		//自定义"当前页"链接；
//		$config['cur_tag_open'] = '<b>';////"当前页"链接的打开标签。
//		$config['cur_tag_close'] = '</b>';//"当前页"链接的关闭标签。
//		//自定义"数字"链接
//		$config['num_tag_open'] = '<div>';//"数字"链接的打开标签。
//		$config['num_tag_close'] = '</div>';//"数字"链接的关闭标签。
		//隐藏"数字"链接
		$config['display_pages'] = true; //不显示"数字"链接 ；

		$config['use_page_numbers']   = TRUE;            //默认分页URL中是显示每页记录数,启用use_page_numbers后显示的是当前页码
		//$config['page_query_string']  = TRUE;            //把 $config['enable_query_strings'] 设置为 TRUE，链接将自动地被用查询字符串（url中的参数）重写。

		//添加 CSS 类
		$config['anchor_class'] = "";
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		return $pagination;
	}
}
?>
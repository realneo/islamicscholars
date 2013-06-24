<?php
class avatarMapi
{
	public function run()
	{
		global $_FANWE;	
		
		$root = array();
		$root['return'] = 0;
		
		if($_FANWE['uid'] == 0)
		{
			$root['info'] = "请先登陆";
			m_display($root);
		}

		if(isset($_FILES['image_1']))
		{
			if($img = FS("Image")->save('image_1'))
			{
				FS('User')->saveAvatar($_FANWE['uid'],$img['path']);
				$avatar = FS('User')->getAvatar($_FANWE['uid']);
				$root['user_avatar'] = avatar($avatar,'m',true);
			}
			else
			{
				$root['info'] = "上传图片失败";
				m_display($root);
			}
		}
		else
		{
			$root['info'] = "请上传图片";
			m_display($root);
		}

		$root['return'] = 1;
		m_display($root);
	}
}
?>
<?php
function getmymalls()
{
	global $_FANWE;
	$uid = (int)$_FANWE['uid'];
	
	$args['user_malls'] = FS('User')->getusermalls($uid);
	return tplFetch('inc/getfollow/mall',$args);
	
}
?>
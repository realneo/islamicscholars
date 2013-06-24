<?php
/**
 * WEIP uploadfile 类
 *
 * @package weip.util
 * @author 
 */
//import('FileSystem.class.php');
class Upload_file {
	/**
	 * 允许的上传文件类型
	 * @var array $allowFileTypes 
	 * @access private
	 */
	private $allowFileTypes = array('html','htm','doc','zip','rar','txt','jpg','gif','bmp','png','inf','exe');
	
	/**
	 * 允许的上传文件大小，单位字节
	 * @var int $maxFileSize 
	 * @access public
	 */
	public $maxFileSize = 20388608;
	
	/**
	 * 设置允许的文件类型
	 * @param mixed $fileTypes 文件类型列表可以是数组和字符串，用“,”号隔开
	 * @return void 
	 * @access public
	 */
	public function setAllowFileType($fileTypes) {
		$this->allowFileTypes = is_array($fileTypes) ? $fileTypes : explode(',', $fileTypes);
	} 
	
	/**
	 * 上传文件
	 * @param string $fileField  要上传的文件如$_FILES['file']
	 * @param string $destFolder 上传的目录，会自动建立
	 * @param string $fileTypes   上传后文件命名方式 0使用原文件名 1使用当前时间戳作为文件名
	 * @return int 
	 * @access public
	 */
	public function upload($fileField, $destFolder = './', $fileNameType = 1) {
		switch ($fileField['error']) {
			case UPLOAD_ERR_OK : //其值为 0，没有错误发生，文件上传成功。
				$uploadSucceed = true;
				break;
			case UPLOAD_ERR_INI_SIZE : //其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
			case UPLOAD_ERR_FORM_SIZE : //其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
				$errorMsg = '文件上传失败！失败原因：文件大小超出限制！';
				$errorCode = -103;
				$uploadSucceed = false;
				break;
			case UPLOAD_ERR_PARTIAL : //值：3; 文件只有部分被上传。 
				$errorMsg = '文件上传失败！失败原因：文件只有部分被上传！';
				$errorCode = -101;
				$uploadSucceed = false;
				break;
			case UPLOAD_ERR_NO_FILE : //值：4; 没有文件被上传。 
				$errorMsg = '文件上传失败！失败原因：没有文件被上传！';
				$errorCode = -102;
				$uploadSucceed = false;
				break;
			case UPLOAD_ERR_NO_TMP_DIR : //其值为 6，找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。
				$errorMsg = '文件上传失败！失败原因：找不到临时文件夹！';
				$errorCode = -102;
				$uploadSucceed = false;
				break;
			case UPLOAD_ERR_CANT_WRITE : //其值为 7，文件写入失败。PHP 5.1.0 引进。
				$errorMsg = '文件上传失败！失败原因：文件写入失败！';
				$errorCode = -102;
				$uploadSucceed = false;
				break;
			default : //其它错误
				$errorMsg = '文件上传失败！失败原因：其它！';
				$errorCode = -100;
				$uploadSucceed = false;
				break;
		}
		if ($uploadSucceed) {
			if ($fileField['size']>$this->maxFileSize) {
				$errorMsg = '文件上传失败！失败原因：文件大小超出限制！';
				$errorCode = -103;
				$uploadSucceed = false;
			}
			if ($uploadSucceed) {
				$fileExt = $this->fileExt($fileField['name']);
//				$fileExt = FileSystem::fileExt($fileField['name']);
				if (!in_array(strtolower($fileExt),$this->allowFileTypes)) {
					$errorMsg = '文件上传失败！失败原因：文件类型不被允许！';
					$errorCode = -104;
					$uploadSucceed = false;
				}
			}
		}
		if ($uploadSucceed) {
			if (!is_dir($destFolder) && $destFolder!='./' && $destFolder!='../') {
				$dirname = '';
				$folders = explode('/',$destFolder);
				foreach ($folders as $folder) {
					$dirname .= $folder . '/';					
					if ($folder!='' && $folder!='.' && $folder!='..' && !is_dir($dirname)) {
						mkdir($dirname);
					}
				}
				chmod($destFolder,0777);
			}
			switch ($fileNameType) {  
				case 1:
//					if(!isset($fileName)){
//						$fileName = date('YmdHis').mt_rand(1000, 9999);
//					}
					$fileName = date('YmdHis').mt_rand(1000, 9999);
					$dot = '.';
					$fileFullName = $fileName . $dot . $fileExt;
					$i = 0;
					//判断是否有重名文件
					while (is_file($destFolder . $fileFullName)) {
						$fileFullName = $fileName . $i++ . $dot . $fileExt;
					} 
					break;
				case 2:
					$fileFullName = date('YmdHis');
					$i = 0;
					//判断是否有重名文件
					while (is_file($destFolder . $fileFullName)) {
						$fileFullName = $fileFullName . $i++;
					}
					break;
				default:
					$fileFullName = $fileField['name'];
					break;
			}
			if (@move_uploaded_file($fileField['tmp_name'], $destFolder . $fileFullName)) {
				return $fileFullName;
			} else {
				$errorMsg = '文件上传失败！失败原因：本地文件系统读写权限出错！';
				$errorCode = -105;
				$uploadSucceed = false;
			}
		}
		if (!$uploadSucceed) {
			throw new Exception($errorMsg, $errorCode);
		}
	}
	
	/**
	 * 生成缩略图
	 *
	 */
	function makethumb($srcfile, $tow, $toh, $str='') {
		//判断文件是否存在
		if (!file_exists($srcfile)) {
			return '';
		}
		$dstfile = $srcfile;
		
		$_SGLOBAL['setting']=Array
		(
			'thumbwidth' => 100,
			'thumbheight' => 100,
			'maxthumbwidth' => '',
			'maxthumbheight' => '',
			'watermarkfile' => '',
			'watermarkpos' => 4,
			'ftpssl' => 0,
			'ftphost' => '',
			'ftpport' => '',
			'ftpuser' => '',
			'ftppassword' => '',
			'ftppasv' => 0,
			'ftpdir' => '',
			'ftptimeout' => ''
		);
	
		//缩略图大小
		/*if($tow < 60) $tow = 60;
		if($toh < 60) $toh = 60;*/
	
		$make_max = 0;
		$maxtow = intval($_SGLOBAL['setting']['maxthumbwidth']);
		$maxtoh = intval($_SGLOBAL['setting']['maxthumbheight']);
		if($maxtow >= 300 && $maxtoh >= 300) {
			$make_max = 1;
		}
		
		//获取图片信息
		$im = '';
		if($data = getimagesize($srcfile)) {
			if($data[2] == 1) {
				$make_max = 0;//gif不处理
				if(function_exists("imagecreatefromgif")) {
					$im = imagecreatefromgif($srcfile);
				}
			} elseif($data[2] == 2) {
				if(function_exists("imagecreatefromjpeg")) {
					$im = imagecreatefromjpeg($srcfile);
				}
			} elseif($data[2] == 3) {
				if(function_exists("imagecreatefrompng")) {
					$im = imagecreatefrompng($srcfile);
				}
			}
		}
		if(!$im) return '';
		
		$srcw = imagesx($im);
		$srch = imagesy($im);
		
		$towh = $tow/$toh;
		$srcwh = $srcw/$srch;
		if($towh <= $srcwh){
			$ftow = $tow;
			$ftoh = $ftow*($srch/$srcw);
			
			$fmaxtow = $maxtow;
			$fmaxtoh = $fmaxtow*($srch/$srcw);
		} else {
			$ftoh = $toh;
			$ftow = $ftoh*($srcw/$srch);
			
			$fmaxtoh = $maxtoh;
			$fmaxtow = $fmaxtoh*($srcw/$srch);
		}
		if($srcw <= $maxtow && $srch <= $maxtoh) {
			$make_max = 0;//不处理
		}
		if($srcw > $tow || $srch > $toh) {
			if(function_exists("imagecreatetruecolor") && function_exists("imagecopyresampled") && @$ni = imagecreatetruecolor($ftow, $ftoh)) {
				imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch);
				//大图片
				if($make_max && @$maxni = imagecreatetruecolor($fmaxtow, $fmaxtoh)) {
					imagecopyresampled($maxni, $im, 0, 0, 0, 0, $fmaxtow, $fmaxtoh, $srcw, $srch);
				}
			} elseif(function_exists("imagecreate") && function_exists("imagecopyresized") && @$ni = imagecreate($ftow, $ftoh)) {
				imagecopyresized($ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch);
				//大图片
				if($make_max && @$maxni = imagecreate($fmaxtow, $fmaxtoh)) {
					imagecopyresized($maxni, $im, 0, 0, 0, 0, $fmaxtow, $fmaxtoh, $srcw, $srch);
				}
			} else {
				return '';
			}
			if(function_exists('imagejpeg')) {
				imagejpeg($ni, $dstfile);
				//大图片
				if($make_max) {
					imagejpeg($maxni, $srcfile);
				}
			} elseif(function_exists('imagepng')) {
				imagepng($ni, $dstfile);
				//大图片
				if($make_max) {
					imagepng($maxni, $srcfile);
				}
			}
			imagedestroy($ni);
			if($make_max) {
				imagedestroy($maxni);
			}
		}
		imagedestroy($im);
	
		if(!file_exists($dstfile)) {
			return '';
		} else {
			return $dstfile;
		}
	}
	
	/**
	 * 取文件扩展名  
	 * @param string $fileName
	 * @param bool $withDot
	 * @return string
	 * @static 
	 */
	function fileExt($fileName, $withDot=false) {
		$fileName = basename($fileName);
		$pos = strrpos($fileName, '.');
		if ($pos===false) {
			$result = '';
		} else {
			$result = ($withDot) ? substr($fileName, $pos) : substr($fileName, $pos+1);
		}
		return $result;
	}
	
	function ResizeImage($im,$maxwidth,$maxheight,$name){    
        //取得当前图片大小   
        $width = imagesx($im);    
        $height = imagesy($im);    
        //生成缩略图的大小   
        if(($width > $maxwidth) || ($height > $maxheight)){    
            $widthratio = $maxwidth/$width;        
            $heightratio = $maxheight/$height;     
            if($widthratio < $heightratio){    
                $ratio = $widthratio;    
            }else{    
                $ratio = $heightratio;    
            }    
            $newwidth = $width * $ratio;    
            $newheight = $height * $ratio;    
           
            if(function_exists("imagecopyresampled")){    
                $newim = imagecreatetruecolor($newwidth, $newheight);    
                imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);    
            }else{    
                $newim = imagecreate($newwidth, $newheight);    
                imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);    
            }    
            ImageJpeg ($newim,$name . ".jpg");    
            ImageDestroy ($newim);    
        }else{    
            ImageJpeg ($im,$name . ".jpg");    
        }    
    }    
	
	
}
?>
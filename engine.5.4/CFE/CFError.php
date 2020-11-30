<?php
class CFError
{
	public static function getInstance() 
	{
		#set class instance
		$class = __CLASS__;
		return new $class();
    }
	public static function CFE_400($errorMessage='')
	{
		if(!empty($errorMessage))
		die(self::CFErrorBox(400,$errorMessage));
		if(!defined('ERR_400'))
		define('ERR_400',"You have bad Request");
		die(self::CFErrorBox(400,ERR_400));
	}
	public static function CFE_401($errorMessage='')
	{
		if(!empty($errorMessage))
		die(self::CFErrorBox(401,$errorMessage));
		if(!defined('ERR_401'))
		define('ERR_401',"You need authorized to access this page");
		die(self::CFErrorBox(401,ERR_401));
	}
	public static function CFE_403($errorMessage='')
	{
		if(!empty($errorMessage))
		die(self::CFErrorBox(403,$errorMessage));
		if(!defined('ERR_403'))
		define('ERR_403',"Access Forbidden");
		die(self::CFErrorBox(403,ERR_403));
	}
	public static function CFE_404($errorMessage='')
	{
		if(!empty($errorMessage))
		die(self::CFErrorBox(404,$errorMessage));
		if(!defined('ERR_404'))
		define('ERR_404',"You have accessing wrong page");
		die(self::CFErrorBox(404,ERR_404));
	}
	public static function CFE_500($errorMessage='')
	{
		if(!empty($errorMessage))
		die(self::CFErrorBox(500,$errorMessage));
		if(!defined('ERR_500'))
		define('ERR_500',"Internal Server Error");
		die(self::CFErrorBox(500,ERR_500));
	}
	public static function CFE_raise($message='')
	{
		$setting = GetAllSetting();
		if(array_key_exists('page_error',$setting))
		{
			redirect(getSetting('page_error'));
		}
		die(self::CFErrorBox('Raise',$message));
	}
	public static function CFE_DbError($message='')
	{
		die(self::CFErrorBox('Database Layer',$message));
	}
	public static function CFE_show($header,$message)
	{
		return self::CFErrorBox($header,$message);
	}
	private static function CFErrorBox($mode,$message)
	{
		return('<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;">
				<div style="width:80%; background-color:#FFCCCC; border:#CA0000 solid 1px; color:#FD1117; padding-top:10px; padding-bottom:10px;font-size:12px;">
					<h2 style="margin:0;padding:0;font-size:14px;">Crazy Framework Error '.$mode.' !</h2><br>'.$message.'
				</div>
			</div>');
	}
	#error mode 
	# 0 : text output
	# 1 : array output
	# 2 : json output 
	# 3 : xml output 
	
	# die mode
	# true : the error will play end close all process (default)
	# false : the error message will returning
	
	# add
	# string to add in error message
	# default is empty
	public static function CFE_UrlError($error,$add='',$die=true,$mode=0)
	{
		$msg = '';
		$header = '';
		if($error=='object')
		{
			$header = 'Object';
			$msg = 'Object Not Found '.$add;
		}
		elseif($error=='function')
		{
			$header = 'Function';
			$msg = 'Function Not Found '.$add;
		}
		if(!$die)
		{
			if($mode==0)
				return self::CFErrorBox($header,$msg.' '.$add);
			elseif($mode==1)
				return array('header'=>'Crazy Framework Error '.$hader,'msg'=>$msg.' '.$add);
			elseif($mode==2)
				return json_encode(array('header'=>'Crazy Framework Error '.$hader,'msg'=>$msg.' '.$add));
			elseif($mode==3)
				return '<?xml version="1.0"?><CFError><header>Crazy Framework Error '.$hader.'</header><msg>'.$msg.' '.$add.'</msg></CFError>';
		}
		else
		{
			if($mode==0)
			{
				die(self::CFErrorBox($header,$msg.' '.$add));
			}
			elseif($mode==1)
			{
				 print_r(array('header'=>'Crazy Framework Error '.$hader,'msg'=>$msg.' '.$add));
				 exit;
			}
			elseif($mode==2)
			{
				 die(json_encode(array('header'=>'Crazy Framework Error '.$hader,'msg'=>$msg.' '.$add)));
			}
			elseif($mode==3)
			{
				die('<?xml version="1.0"?><CFError><header>Crazy Framework Error '.$hader.'</header><msg>'.$msg.' '.$add.'</msg></CFError>');
			}
		}
	}
}
?>
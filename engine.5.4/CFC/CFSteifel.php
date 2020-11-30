<?php
/*
 * Crazy Framework
 *
 * Copyright 2006-2011 by the Crazy Framework Team.
 * founder is : Teguh SCN (teguh_cahya2000@yahoo.com)
 * supported By : pusatide (http://pusatide.com)
 * All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 *
 */
 
#function load view
function Load($path,$mode='',$parser=array())
{
	if(count($parser)>0)
	{
		foreach($parser as $key=>$value)
		{
			$_REQUEST['CFVars'][$key] = $value;
		}
	}
	if(isset($_REQUEST['CFVars']))
		$params = $_REQUEST['CFVars'];
	else
		$params = array();

	if(is_array($params))
	extract($params, EXTR_OVERWRITE);
	if($mode=='apps')
	{
		if(file_exists(ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$path.'.php'))
		include_once(ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$path.'.php');
	}
	else
	{
		if(file_exists($path.'.php'))
		include_once($path.'.php');
	}
}

#function to get base url
function GetMainBaseFromURL()
{
	$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

	$chars = preg_split('//', $url, -1, PREG_SPLIT_NO_EMPTY);
	$slash = 3; // 3rd slash
	$i = 0;
	foreach($chars as $key => $char)
	{
		if($char == '/')
		{
		   $j = $i++;
		}
	
		if($i == 3)
		{
		   $pos = $key; break;
		}
	}
	if($_REQUEST['CFSystem']['url_friendly'])
	{
		$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME']: "http://".$_SERVER['SERVER_NAME'];
		$main_base = rtrim($url.'/'.basename($_REQUEST['CFSystem']['baseurl']),'/');
	}
	else
	{
		$main_base = substr($url, 0, $pos);
	}
	return $main_base.'/';	
}

#function to generate link
function site_url($url='',$full=false)
{
	$params = $_REQUEST['CFSystem'];
	$uri = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME']: "http://".$_SERVER['SERVER_NAME'];
	$uri .= rtrim(isset($_REQUEST['CFSystem']['baseurl']) ? $_REQUEST['CFSystem']['baseurl'] : '','/');
	if(empty($url))
	{
		if(!$full)
		{
			return '/'.trim($params['baseurl'],'/');
		}
		else
		{
			return $uri.'/'.trim($params['baseurl'],'/');
		}
	}
	else
	{
		$arr = explode('/',$url);
		$out = '';
		if($_REQUEST['CFSystem']['url_friendly']==0)
		{
			$str_out = 'index.php?';
			for($i=0;$i<count($arr);$i++)
			{
				if($i==0)
				$str_out.='cfo='.$arr[$i].'&';
				elseif($i==1)
				if($i==0)
				$str_out.='cfu='.$arr[$i].'&';
				else
				$str_out.='cfparams_'.$i.'='.$arr[$i].'&';
			}
			$out = trim($str_out,'&');
		}
		elseif($_REQUEST['CFSystem']['url_friendly']==1)
		{
			$out = $url;
		}
		else
		{
			$out = 'index.php/'.$url;
		}
		if(!$full)
		{
			return $out;
		}
		else
		{
			return $uri.'/'.trim($out,'/');
			#return $uri.str_replace('//','/','/'.basename($_REQUEST['CFSystem']['baseurl']).'/'.trim($out,'/'));
		}
	}
}

#function to redirect page
function redirect($url='',$full=false)
{
	$params = $_REQUEST['CFSystem'];
	$_REQUEST['CFSystem']['baseurl'] = rtrim($_REQUEST['CFSystem']['baseurl'],'/').'/';
	if(empty($url))
	{
		header('location:'.$_REQUEST['CFSystem']['baseurl']);
	}
	elseif($url=='back')
	{
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$arr = explode('/',$url);
		$out = '';
		if($_REQUEST['CFSystem']['url_friendly']==0)
		{
			$str_out = 'index.php?';
			for($i=0;$i<count($arr);$i++)
			{
				if($i==0)
				$str_out.='cfo='.$arr[$i].'&';
				elseif($i==1)
				if($i==0)
				$str_out.='cfu='.$arr[$i].'&';
				else
				$str_out.='cfparams_'.$i.'='.$arr[$i].'&';
			}
			$out = trim($str_out,'&');
		}
		elseif($_REQUEST['CFSystem']['url_friendly']==1)
		{
			$out = $_REQUEST['CFSystem']['baseurl'].$url;
		}
		else
		{
			$out= 'index.php/'.$url;
		}
		header('location:'.$out);
	}
}
#class to get
if(!function_exists('get_called_class')) {
        class class_tools {
                static $i = 0;
                static $fl = null;

                static function get_called_class() {
                    $bt = debug_backtrace();
					return $bt[3]['class'];
            }
        }

        function get_called_class() {
            return class_tools::get_called_class();
        }
}
#getting setting variable
function getSetting($name)
{
	$name = '["'.str_replace('.','"]["',$name).'"]';
	$out = '';
	eval("\$out=isset(\$_REQUEST['CFSystem']$name)?\$_REQUEST['CFSystem']$name:'';");
	return $out;
}
#getting file extension from filename
function getExtension($filename)
{
	$info =  pathinfo($filename);
	return $info['extension'];
}
#loading Model
function loadModel($name,$names)
{		
	if(!class_exists('CFModels'))
	include('CFModels.php');
	
	#checking file class path
	if(!$_REQUEST['CFSystem']['application_ondir'])
	$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$names.DIRECTORY_SEPARATOR;
	else
	$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$names.DIRECTORY_SEPARATOR.$_REQUEST['CFSystem']['model'].DIRECTORY_SEPARATOR;
	
	
	if(!file_exists($file_path.$names.'.model.php'))
	{
		CFError::CFE_raise('Aplication Model Class ('.$names.') Not Found');
	}
	elseif(!class_exists($name) && file_exists($file_path.$names.'.model.php'))
	{
		include($file_path.$names.'.model.php');
		if(get_parent_class($name)!='CFModels')
		CFError::CFE_raise('Aplication Model Class ('.$names.') Not Extending On System');
		$object = new $name();
		$_REQUEST['CFSystem']['CFObject']['reg_model'][$name] = $object;
	}
	else
	{
		if(get_parent_class($name)!='CFModels')
			CFError::CFE_raise('Aplication Model Class ('.$names.') Not Extending On System');
		$object = isset($_REQUEST['CFSystem']['CFObject']['reg_model'][$name]) ? $_REQUEST['CFSystem']['CFObject']['reg_model'][$name] : new $name();
	}
	
	#checking cfs methods
	$arr_methods = get_class_methods($object);
	if(!in_array('cfs',$arr_methods))
		CFError::CFE_raise('Aplication Model Class ('.$names.') Not Registered');
	
	$object->cfs();
	
	if(!isset($_REQUEST['CFSystem']['CFObject'][$names]['model']) || empty($_REQUEST['CFSystem']['CFObject'][$names]['model']))
		CFError::CFE_raise('Aplication Model Class ('.$_REQUEST['CFRequest']['object'].') Not Registered');
		
	$object->settings = $_REQUEST['CFSystem'];
	return  $object;
}
#loading Controller
function loadController($name,$names)
{		
	if(!class_exists('CFControllers'))
	include('CFControllers.php');
	
	#checking file class path
	if(!$_REQUEST['CFSystem']['application_ondir'])
	$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$names.DIRECTORY_SEPARATOR;
	else
	$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$names.DIRECTORY_SEPARATOR.$_REQUEST['CFSystem']['controller'].DIRECTORY_SEPARATOR;
	
	
	if(!file_exists($file_path.$names.'.controller.php'))
	{
		CFError::CFE_raise('Aplication Controller Class ('.$names.') Not Found');
	}
	elseif(!class_exists($name) && file_exists($file_path.$names.'.controller.php'))
	{
		include($file_path.$names.'.controller.php');
		if(get_parent_class($name)!='CFControllers')
		CFError::CFE_raise('Aplication Controller Class ('.$names.') Not Extending On System');
		$object = new $name();
		$_REQUEST['CFSystem']['CFObject']['reg_controller'][$name] = $object;
	}
	else
	{
		if(get_parent_class($name)!='CFControllers')
			CFError::CFE_raise('Aplication Controller Class ('.$names.') Not Extending On System');
		$object = isset($_REQUEST['CFSystem']['CFObject']['reg_controller'][$name]) ? $_REQUEST['CFSystem']['CFObject']['reg_controller'][$name] : new $name();
	}
	
	#checking cfs methods
	$arr_methods = get_class_methods($object);
	if(!in_array('cfs',$arr_methods))
		CFError::CFE_raise('Aplication Controller Class ('.$names.') Not Registered');
	
	$object->cfs();
	
	if(!isset($_REQUEST['CFSystem']['CFObject'][$names]['controller']) || empty($_REQUEST['CFSystem']['CFObject'][$names]['controller']))
		CFError::CFE_raise('Aplication Controller Class ('.$_REQUEST['CFRequest']['object'].') Not Registered');
		
	$object->settings = $_REQUEST['CFSystem'];
	return  $object;
}
function _print_r($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
function getCFSetting($param)
{
	if(empty($param))
	return false;
	
	$out = '';
	$str = "\$out=\$_REQUEST['CFSystem']['".(str_replace('.',"']['",$param))."'];";
	eval($str);
	return $out;
}
function Cfsession($name)
{
	$str = '$_SESSION[\''.(str_replace('.',"']['",$name)).'\']';
	$output = false;
	@eval("\$output=isset($str)?$str:false;");
	return $output;
}
function GetAllSetting()
{
	return $_REQUEST['CFSystem'];
}
function trimarray($arr=array())
{
	foreach($arr as $key=>$value)
	{
		$arr[$key] = trim($value);
	}
	return $arr;
}
function obfuscate_link($file_id, $type='documents') {

	$temp = array(date("jmY"), $file_id, $type); // using date("jmY") ensures download links are specific to each day
	$temp = serialize($temp);
	$temp = base64_encode($temp);
	$link = rawurlencode($temp);
	return $link;

}

function unobfuscate_link($link) {

	$temp = rawurldecode($link);
	$temp = base64_decode($temp);
	$download_array = unserialize($temp);
	return isset($download_array[1]) ? $download_array[1] : '';

}
?>
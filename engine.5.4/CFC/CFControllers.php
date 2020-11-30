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
abstract class CFControllers 
{
	abstract function cfs();
	private $model;
	private $libs;
	private $libs_reg = array('thumb','encrypt');
	private $teil;
	
	protected static function Boot()
	{
		$temp_name = explode('_',get_called_class());
		$_REQUEST['CFSystem']['CFObject']['cfc'][$temp_name[0]] =  get_called_class();	
	}
	protected function Register()
	{
		echo get_called_class();
	}
	protected function model($names='')
	{
		#checking name and including abstact class
		$temp_name = explode('_',get_called_class());
		$names = empty($names) ? $temp_name[0] : $names; 
		$name = empty($names) ? $temp_name[0].'_model' : $names.'_model';
		return loadModel($name,$names);
	}
	protected function view($CFnames='',$params=array())
	{
		foreach($GLOBALS as $key=>$value)
		{
			if(!array_key_exists($key,$params))
			$params[$key] = $value;
		}
		if(!$_REQUEST['CFSystem']['view_obj'])
		{
			$temp_name = explode('_',get_called_class());
			$CFname = empty($CFnames) ? $temp_name[0] : $CFnames;
			$expr = explode('.',$CFname);
			$path_CFname = '';
			for($i=0;$i<count($expr)-1;$i++)
			{
				$path_CFname .= $expr[$i].DIRECTORY_SEPARATOR;
			}
			if(empty($path_CFname))
				$path_CFname = $CFname.DIRECTORY_SEPARATOR;
			else
				$CFname = $expr[count($expr)-1];
			$params['settings'] = $_REQUEST['CFSystem'];
			$params['request'] = $_REQUEST['CFRequest'];
			$_REQUEST['CFVars'] = $params;
			extract($params, EXTR_OVERWRITE);
			if(!$_REQUEST['CFSystem']['application_ondir'] && !empty($CFnames))
			{
				ini_set('include_path', get_include_path().PATH_SEPARATOR.ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$path_CFname.PATH_SEPARATOR);
			}
			if(!file_exists(ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$path_CFname.$CFname.'.view.php'))
				CFError::CFE_raise('Aplication View File ('.$path_CFname.$CFname.'.view.php) Not Found');
			include_once($CFname.'.view.php');
		}
		else
		{
			$temp_name = explode('_',get_called_class());
			$name = empty($name) ? $temp_name[0].'_view' : $name.'_view';
			$names = $temp_name[0];
			if(!class_exists('CFViews'))
			include('CFViews.php');
			
			#checking file class path
			if(!$_REQUEST['CFSystem']['application_ondir'])
			$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$_REQUEST['CFRequest']['object'].DIRECTORY_SEPARATOR;
			else
			$file_path = ROOTPATH.$_REQUEST['CFSystem']['application'].DIRECTORY_SEPARATOR.$_REQUEST['CFRequest']['object'].DIRECTORY_SEPARATOR.$_REQUEST['CFSystem']['view'].DIRECTORY_SEPARATOR;
	
	
			if(!class_exists($name) && file_exists($file_path.$names.'.view.php'))
			{
				include($_REQUEST['CFRequest']['object'].'.view.php');
				if(get_parent_class($name)!='CFViews')
				CFError::CFE_raise('Aplication View Class ('.$names.') Not Extending On System');
				$object = new $name();
			}
			elseif(!file_exists($file_path.$names.'.view.php'))
			{
				CFError::CFE_raise('Aplication view File ('.$names.') Not Found');
			}
			else
			{
				if(get_parent_class($name)!='CFViews')
				CFError::CFE_raise('Aplication View Class ('.$names.') Not Extending On System');
				$object = $name;
			}
			
			#checking cfs methods
			$arr_methods = get_class_methods($object);
			if(!in_array('cfs',$arr_methods))
			CFError::CFE_raise('Aplication Views Class ('.$names.') Not Registered');
			
			$object->cfs();
		
			if(!isset($_REQUEST['CFSystem']['CFObject'][$names]['view']) || empty($_REQUEST['CFSystem']['CFObject'][$names]['view']))
				CFError::CFE_raise('Aplication View Class ('.$_REQUEST['CFRequest']['object'].') Not Registered');
				
			$object->settings = $_REQUEST['CFSystem'];
			return  $object;
		}
	}
	
	protected  function PostParams($key='')
	{
		if(empty($key))
		{
			return $_POST;
		}
		else
		{
			return $_POST[$key];
		}
	}
	protected function getRequest($index='')
	{
		if(isset($_REQUEST['CFRequest']['params']))
		$_REQUEST['CFRequest']['params'] = filter_var_array($_REQUEST['CFRequest']['params'], FILTER_SANITIZE_STRING);
		if(empty($index))
			return $_REQUEST['CFRequest']['params'];
		else
			return isset($_REQUEST['CFRequest']['params'][$index-1]) ? $_REQUEST['CFRequest']['params'][$index-1] : '';
	}
	protected function getField($name='')
	{
		if($_POST)
		{	
			$arr = filter_var_array($_POST, FILTER_SANITIZE_STRING);  
			if(empty($name))
			return $arr;
			
			if(isset($arr[$name]) && !empty($arr[$name]))
			{
				return $arr[$name];
			}
		}
		return false;
	}
	protected function request($name='')
	{
		if($_GET)
		{	
			$arr = filter_var_array($_GET, FILTER_SANITIZE_STRING);
			
			if(empty($name))
			return $arr;
			
			if(isset($arr[$name]))
			{
				return $arr[$name];
			}
		}
		return false;
	}
	protected function teil($compname)
	{
		$obj = 'teil_'.$compname;
		if(!isset($this->teil[$compname]))
		{
			$this->teil[$compname] =  new $obj;
		}
		return $this->teil[$compname];
	}
	
	// thumbnail image
	protected function thumb()
	{
		if(!class_exists('CFBiblio_thumb'))
		{
			include('thumb/thumb.php');
			$this->libs['thumb'] = new CFBiblio_thumb();
		}
		return $this->libs['thumb'];
	}
	
	//load library
	protected function biblio($name,$params=array(),$debug=false)
	{
		$params = empty($params) ? array() : $params;
		if(in_array($name,$this->libs_reg))
		{
			if(!file_exists(ENGINEPATH.'/CFLibs/'.$name.'/'.$name.'.php') && $debug)
			{
				die(CFError::CFE_show("Library File Not Found","Your Library File \"$name\" Not Exist"));
			}
			elseif(!file_exists(ENGINEPATH.'/CFLibs/'.$name.'/'.$name.'.php') && !$debug)
			{
				return false;
			}
			if(!class_exists('CFBiblio_'.$name))
			{
				include($name.'/'.$name.'.php');
				if(!class_exists('CFBiblio_'.$name) && $debug)
				{
					die(CFError::CFE_show("Library Not Found","Class \"CFBiblio_$name\" Not Found"));
				}
				elseif(!class_exists('CFBiblio_'.$name) && !$debug)
				{
					return false;
				}
				$name = 'CFBiblio_'.$name;
				$arr = get_class_methods($name);
				if(!in_array('getInstance',$arr) && $debug)
				{
					die(CFError::CFE_show("Instance Method Not Found","Method \"getInstance\" Not Found"));
				}
				elseif(!in_array('getInstance',$arr) && !$debug)
				{
					return false;
				}
				else
				{
					$obj = '';
					eval("\$obj = $name::getInstance();");
					$obj->setParams($params);
					return $obj;
				}
				//return $this->libs['thumb'];	
			}
		}
		else
		{
			if($debug)
			{
				die(CFError::CFE_show("Class \"$name\" Not Registered","Please Check Your Library Register Name"));
			}
			return false;
		}
	}
}
?>
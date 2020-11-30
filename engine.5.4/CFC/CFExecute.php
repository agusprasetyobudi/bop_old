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
class CFExecute
{
	public static function Execute()
	{
		self::UrlSetting();
		self::loadLoaders();
		self::loadMVC();
	}
	private static function UrlSetting()
	{
		$params = $_REQUEST['CFSystem'];
		
		if($params['url_friendly']==0)
		{
			$req = '';
			if(count($_GET)>0)
			{
				if(!isset($_GET['cfo']))
				{
					CFError::CFE_UrlError('object');
				}
				if(!isset($_GET['cfu']) && count($_GET)>1)
				{
					CFError::CFE_UrlError('function');
				}
				foreach($_GET as $key=>$value)
				{
					$req .= $value.'/';	
				}
			}
			else
			{
				$req=isset($params['default_app'])?$params['default_app']:'home'.'/';
			}
			self::RequestProcess(trim($req,'/'));
		}
		elseif($params['url_friendly']==1)
		{
			if(!isset($_GET['cfq']))
			$_GET['cfq'] = isset($params['default_app'])?$params['default_app']:'home';
			self::RequestProcess(trim($_GET['cfq'],'/'));
		}
		elseif($params['url_friendly']==2)
		{
			$arr = explode('index.php',trim($_SERVER['PHP_SELF'],'/'));
			array_shift($arr);
			self::RequestProcess(trim($arr[0],'/'));
			$_REQUEST['CFRequest']['object'] = isset($_REQUEST['CFRequest']['object'])? $_REQUEST['CFRequest']['object']:(isset($params['default_app'])?$params['default_app']:'home');
		}
		$_REQUEST['CFRequest']['function'] = !isset($_REQUEST['CFRequest']['function']) ? (isset($params['default_caller'])?$params['default_caller']:'init'):$_REQUEST['CFRequest']['function'];
	}
	
	private static function RequestProcess($strRequest)
	{
		$request = explode('/',$strRequest);
		$num = count($request);
		$str_params = '';
		for($i=0;$i<$num;$i++)
		{
			if($i==0)
				$_REQUEST['CFRequest']['object'] = $request[$i];
			elseif($i==1)
				$_REQUEST['CFRequest']['function'] = $request[$i];
			else
			{
				$_REQUEST['CFRequest']['params'][] = $request[$i];
				$str_params .= '$_REQUEST["CFRequest"]["params"]['.(count($_REQUEST['CFRequest']['params'])-1).'],';
			}
		}
		$_REQUEST['CFRequest']['function_caller'] = trim($str_params,',');
		$_REQUEST['CFSystem']['base_url'] = GetMainBaseFromURL();
		
	}
	private static function loadLoaders()
	{
		if(isset($_REQUEST['CFSystem']['loaders']))
		{
			if(!is_dir($_REQUEST['CFSystem']['loaders']))
			CFError::CFE_raise('Aplication Loader Folder Not Found');
			
			foreach(glob($_REQUEST['CFSystem']['loaders'].'*.php') as $filename)
			{
				$content = file_get_contents($filename);
				if(preg_match('/CFModels/',$content) && !class_exists('CFModels'))
				include('CFModels.php');
				if(preg_match('/CFViews/',$content) && !class_exists('CFViews'))
				include('CFViews.php');
				if(preg_match('/CFControllers/',$content) && !class_exists('CFControllers'))
				include('CFControllers.php');
				
				$obj_name = 'teil_'.basename($filename);
				if(!class_exists($obj_name))
				include($filename);
				$name = basename($obj_name,'.php');
				$obj = new $name();
				$mtd = get_class_methods($name);
				if(in_array('run',$mtd))
				$obj->run();
			}
		}
	}
	private static function loadMVC()
	{
		$params = $_REQUEST['CFSystem'];
		$request = $_REQUEST['CFRequest'];
		$includes = array();
		require_once('CFControllers.php');
		
		$params['application'] = !isset($params['application']) || empty($params['application']) ? CFError::CFE_raise('Aplication Folder Setting Not Found'):$params['application'];
		
		if(!is_dir(ROOTPATH.$params['application']))
			CFError::CFE_raise('Aplication Folder Not Found');
		if(!is_dir(ROOTPATH.$params['application'].'/'.$request['object']))
			CFError::CFE_raise('Aplication Object Folder Not Found');
		
		$params['application_ondir'] = !isset($params['application_ondir'])? CFError::CFE_raise('Aplication Folder Directory Set Setting Not Found'):$params['application_ondir'];
		
		if($params['application_ondir'])
		{
			$params['model'] = !isset($params['model']) || empty($params['model']) ? CFError::CFE_raise('Aplication Model Folder Setting Not Found'):$params['model'];
			$params['view'] = !isset($params['view']) || empty($params['view']) ? CFError::CFE_raise('Aplication View Folder Setting Not Found'):$params['view'];
			$params['controller'] = !isset($params['controller']) || empty($params['controller']) ? CFError::CFE_raise('Aplication Controller Folder Setting Not Found'):$params['controller'];

			if(!is_dir(ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$params['controller']))
			CFError::CFE_raise('Aplication Object Controller Folder Not Found');
			
			$includes['mode'] = ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$params['model'].DIRECTORY_SEPARATOR;
			$includes['view'] = ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$params['view'].DIRECTORY_SEPARATOR;
			$includes['controller'] = ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$params['controller'].DIRECTORY_SEPARATOR;
			
			if(!file_exists(ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$params['controller'].DIRECTORY_SEPARATOR.$request['object'].'controller.php'))
				CFError::CFE_raise('Aplication Controller File Not Found');
			
		}
		else
		{
			$params['model'] = '';
			$params['view'] = '';
			$params['controller'] = '';
			$includes['model'] = $includes['view'] = $includes['controller'] = ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR;
			if(!file_exists(ROOTPATH.$params['application'].DIRECTORY_SEPARATOR.$request['object'].DIRECTORY_SEPARATOR.$request['object'].'.controller.php'))
				CFError::CFE_raise('Aplication Controller File Not Found');
		}
		$_REQUEST['CFSystem']['CFObject']['ori_model_path'] = $includes['model'];
		$_REQUEST['CFSystem']['CFObject']['ori_view_path'] = $includes['view'];
		$_REQUEST['CFSystem']['CFObject']['ori_controller_path'] = $includes['controller'];
		ini_set('include_path', get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$includes));
		include($request['object'].'.controller.php');
		if(!class_exists($request['object'].'_controller'))
			CFError::CFE_raise('Aplication Controller Class Not Found');

		if(get_parent_class($request['object'].'_controller')!='CFControllers')
			CFError::CFE_raise('Aplication Controller Should Be Extending CFControllers');
		$object  = $request['object'].'_controller';
		$controller = new $object();
		
		$controller->cfs();
		
		if(!isset($_REQUEST['CFSystem']['CFObject']['cfc'][$request['object']]) || $_REQUEST['CFSystem']['CFObject']['cfc'][$request['object']]!=$object)
		CFError::CFE_raise('Aplication Controller Not Registered');
		$arr_method = get_class_methods($object);
		if(!in_array($request['function'],$arr_method))
			CFError::CFE_raise('Aplication Controller Method ('.$request['function'].') Not Found');
		$str_caller = '';
		if(isset($request['params']) && is_array($request['params']) && count($request['params'])>0)
			$str_caller = '$controller->'.$request['function']."($request[function_caller]);";
		else
			$str_caller = '$controller->'.$request['function']."();";
		if(!empty($str_caller))
			eval($str_caller);
	}
}
?>
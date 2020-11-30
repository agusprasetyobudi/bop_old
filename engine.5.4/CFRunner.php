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
	ob_start();
	define('ENGINEPATH',dirname(__FILE__));
	if ( !defined('ROOTPATH') ) {
		if ( php_sapi_name() != 'cli' ) {
			define('ROOTPATH',getcwd().DIRECTORY_SEPARATOR);
		} else {
			define('ROOTPATH',dirname(getcwd().DIRECTORY_SEPARATOR.$_SERVER['SCRIPT_FILENAME']).DIRECTORY_SEPARATOR);
		}
	}
	
	$includes[] = dirname(__FILE__).DIRECTORY_SEPARATOR.'CFC'.DIRECTORY_SEPARATOR;
	$includes[] = dirname(__FILE__).DIRECTORY_SEPARATOR.'CFE'.DIRECTORY_SEPARATOR;
	$includes[] = dirname(__FILE__).DIRECTORY_SEPARATOR.'CFLibs'.DIRECTORY_SEPARATOR;
	ini_set('include_path', get_include_path().PATH_SEPARATOR.ROOTPATH.PATH_SEPARATOR.implode(PATH_SEPARATOR,$includes));

	/**************************************
	Process Of Additional runtime php.ini
	***************************************/
	if(isset($cfi) && is_array($cfi) && count($cfi)>0)
	{
		foreach($cfi as $key=>$value)
		{
			ini_set($key,$value);
		}
	}
	/*****************************
	Process Of Additional function
	******************************/
	if(isset($cff) && count($cff)>0)
	{
		foreach($cff as $key=>$val)
		{
			if(strtolower($val['type'])=="constant")
				{
					$value = self::CFconfigureReplacingMod($val['value']);
					$value = constant($value);
					eval("$key($value);");
				}
				elseif(strtolower($val['type'])=="boolean")
				{
					$value = self::CFconfigureReplacingMod($val['value']);
					$value = str_replace(1,true,str_replace(0,false,$value));
					eval("$key($value);");
				}
				elseif(strtolower($val['type'])=="integer")
				{
					$value = self::CFconfigureReplacingMod($val['value']);
					eval("$key($value);");
				}
				elseif(strtolower($val['type'])=="empty")
				{
					eval("$key();");
				}
				else
				{
					$value = self::CFconfigureReplacingMod($val['value']);
					eval("$key(\"$value\");");
				}
		}
	}
	
	/***********************
	Process Of Configuration
	************************/
	require(str_replace('%ENGINEPATH%',ENGINEPATH,str_replace('%ROOTPATH%',ROOTPATH,CONFIG_FILE)).'.php');
	if(isset($system) && is_array($system))
	{
		foreach($system as $key=>$value)
		{
			//if(preg_match('/%ENGINEPATH%/',$value))
			$system[$key] = str_replace('%ENGINEPATH%',ENGINEPATH,$value);
			//if(preg_match('/%ROOTPATH%/',$value))
			$system[$key] = str_replace('%ROOTPATH%',ROOTPATH,$value);
		}
	}
	$_REQUEST['CFSystem'] = $system;
	require('CFError.php');
	require('CFExecute.php');
	require('CFSteifel.php');
	CFExecute::Execute();
?>
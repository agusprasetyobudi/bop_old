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
abstract class CFModels
{
	abstract function cfs();
	private $connection;
	public $insert_id;
	protected static function Boot()
	{
		$temp_name = explode('_',get_called_class());
		$_REQUEST['CFSystem']['CFObject'][$temp_name[0]]['model'] =  get_called_class();	
	}
	private function getConnection($key='default')
	{
		if(!class_exists('ADOConnection'))
		include(dirname(dirname(__FILE__)).'/CFLibs/adodb5/adodb.inc.php');
		if(!isset($_REQUEST['CFSystem']['database'][$key]))
		CFError::CFE_raise('Database Connection Not Found');
		
		$setting = $_REQUEST['CFSystem']['database'][$key];
		$driver = $setting['db_type']; unset($setting['db_type']);
		$username = $setting['db_user']; unset($setting['db_user']);
		$password = $setting['db_pass']; unset($setting['db_pass']);
		$password = rawurlencode($password);
		$hostname = $setting['db_host']; unset($setting['db_host']);
		$database = $setting['db_name']; unset($setting['db_name']);
		$dbport = !empty($setting['db_port']) ? ':'.$setting['db_port']:''; unset($setting['db_port']);
		$cache  = isset($setting['db_cache']) && !empty($setting['db_cache']) ? true : false; unset($setting['db_cache']);
		
		
		
		$this->cache  = $cache;
		//$this->prefix = $setting['db_prefix']; 
		unset($setting['db_prefix']); 
		$this->active = $setting['db_active']; unset($setting['db_active']);
		//$setting['flag'] = MYSQL_CLIENT_COMPRESS;
		
		$str_options = $setting['db_option'];
		/*foreach($setting as $keys=>$value)
		$str_options.= $keys.'='.$value.'&';
		$str_options = trim($str_options,'&');*/
		$dsn = "$driver://$username:$password@$hostname$dbport/$database?".$str_options;
		$GLOBALS['ADODB_FETCH_MODE'] = ADODB_FETCH_ASSOC;
		$GLOBALS['ADODB_FORCE_TYPE'] = ADODB_FORCE_VALUE;
		if($cache)
		{
			if(!is_dir($_REQUEST['CFSystem']['cache'].'/db/'))
				mkdir($_REQUEST['CFSystem']['cache'].'/db/');
			$GLOBALS['ADODB_CACHE_DIR'] = $_REQUEST['CFSystem']['cache'].'/db/';
		}
		try
		{
			$this->connection[$key] = NewADOConnection($dsn);
		}
		catch(exception $e) 
		{
			CFError::CFE_DbError($e->msg);
		}
	}
	protected function _Get($query,$key="default")
	{
		$key = empty($key)?'default':$key;
		$query = self::_PrefixTrimmer($query,$key);
		$this->getConnection($key);
		if($this->cache)
			return $this->connection[$key]->CacheGetAll($query);
		else
			return $this->connection[$key]->GetAll($query);
	}
	protected function _GetTable($tablename,$field='',$where='',$group='',$having='',$order='',$numrows=-1,$offset=-1,$key="")
	{
		$str = '';
		$field = !empty($field)? $field : array();
		if(is_array($field))
		{
			for($i=0;$i<sizeof($field);$i++)
			{
				$str = ($i==0)?$field[$i]:','.$field[$i];
			}
		}
		else
		{
			$str = $field;	
		}
		if(empty($str))
		$str = '*';
		$query = (!empty($where))? "SELECT ".$str." FROM ".$tablename." WHERE $where":"SELECT ".$str." FROM ".$tablename;
		$query = (!empty($group))? $query." GROUP BY $group":$query;
		$query = (!empty($having))? $query." HAVING $having":$query;
		$query = (!empty($order))? $query." ORDER BY $order":$query;
		return $this->_Get($query,$key);
	}
	protected function _GetRow($query,$key='default')
	{
		$key = empty($key)?'default':$key;
		$query = self::_PrefixTrimmer($query,$key);
		$this->getConnection($key);
		if($this->cache)
			return $this->connection[$key]->CacheGetRow($query);
		else
			return $this->connection[$key]->GetRow($query);
	}
	protected function _Replace($table,$arrRecord,$keys,$key='default')
	{
		$table = self::_PrefixTrimmer($table,$key);
		$this->getConnection($key);
		if($this->connection[$key]->Replace($table,$arrRecord,$keys,true))
		return true;
		return false;
	}
	protected function _Update($table,$arrRecord,$keys,$key='default')
	{
		$key = !empty($key) ? $key : 'default';
		$query = "SELECT * FROM $table WHERE $keys";
		$query = self::_PrefixTrimmer($query,$key);
		$this->getConnection($key);
		try
		{
			$rs = $this->connection[$key]->Execute($query); 
			$updateSQL = $this->connection[$key]->GetUpdateSQL($rs, $arrRecord); 
			if(!empty($updateSQL))
			$this->_Exec($updateSQL,$key);
			return true;
		}
		catch(exception $e)
		{
			CFError::CFE_DbError($e->msg);
		}
		return false;
	}
	protected function _Exec($query,$key='default',$mode='')
	{
		$key = !empty($key) ? $key : 'default';
		$query = self::_PrefixTrimmer($query,$key);
		$this->getConnection($key);
		try 
		{
			$this->connection[$key]->StartTrans(); 
			if($this->connection[$key]->Execute($query))
			{
				if($mode=='insert')
				$this->insert_id = $this->connection[$key]->Insert_ID();
				$this->connection[$key]->CompleteTrans(); 
				return true;
			}
			$this->connection[$key]->FailTrans();
		}
		catch(exception $e)
		{
			CFError::CFE_DbError($e->msg);
		}
		return false;
	}
	protected function _Multi_Exec($query,$key='default')
	{
		$key = !empty($key) ? $key : 'default';
		$query = self::_PrefixTrimmer($query,$key);
		$this->getConnection($key);
		$ss = explode(";",$query);
		$rs = array();
		for($i=0;$i<count($ss);$i++)
		{
			$ss[$i] = trim($ss[$i]);
			if(!empty($ss[$i]))
			{
				$rs = $this->connection[$key]->Execute($ss[$i]);
			}
		}
		return $rs;
	}
	protected function _Delete($table,$keys,$key='default')
	{
		$key = !empty($key) ? $key : 'default';
		$query = self::_PrefixTrimmer("DELETE FROM $table WHERE $keys",$key);
		if($this->_Exec($query,$key))
		return true;
		return false;
	}
	protected function _Insert($table,$arrRecord,$slim='id = -1',$force_value=3,$key='')
	{
		$key = !empty($key) ? $key : 'default';	
		$slim = !empty($slim) ? $slim : 'id=-1';
		$query = "SELECT * FROM $table WHERE $slim";	
		$query = self::_PrefixTrimmer($query,$key);
		try
		{
			$this->getConnection($key);
			$rs = $this->connection[$key]->Execute($query); 
			$insertSQL  = $this->connection[$key]->GetInsertSQL($rs, $arrRecord); 
			$this->_Exec($insertSQL,$key,'insert');
			return true;
		}
		catch(exception $e)
		{
			CFError::CFE_DbError($e->msg);
		}
		return false;
	}
	protected function _Paging($query,$num=10,$start=0,$key='default')
	{
		 $this->getConnection($key);
		 $query = self::_PrefixTrimmer($query,$key);
		 $res = $this->connection[$key]->Execute($query);
		 $out['count'] = $res->RecordCount();
		 $rs = $this->connection[$key]->SelectLimit($query, $num,$start);
		 $fields = $rs->fields;
		 $out['list'] = array();
		 while (!$rs->EOF) 
		 {	
		 	$index = count($out['list']);
			foreach($fields as $key=>$value)
			{
				$out['list'][$index][$key] = $rs->fields[$key];
			}
			$rs->MoveNext();
		}
		return $out;
	}
	protected function getFieldName($table,$key='default')
	{
		$this->getConnection($key);
		$table = self::_PrefixTrimmer($table,$key);
		return $this->connection[$key]->MetaColumnNames($table,true);
	}
	private static function _PrefixTrimmer($str,$key)
	{
		$prefix = isset($_REQUEST['CFSystem']['database'][$key]['db_prefix']) ? $_REQUEST['CFSystem']['database'][$key]['db_prefix'] : '';	
		return str_replace('#__',$prefix,$str);
	}
	protected function closeConnection($key='default')
	{
		$this->connection[$key]->close();
	}
}
?>
<?php
class komponen_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getMatch($id)
	{
		return $this->_GetRow("SELECT * FROM #__komponen WHERE id=$id");
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__komponen");
	}
	public function add($data)
	{
		return $this->_Insert('#__komponen',$data);
	}
	public function edit($data)
	{
		return $this->_Update('#__komponen',$data,"id='$data[id]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__komponen',"id='$id'");
	}
	public function subadd($data)
	{
		return $this->_Insert('#__subkomponen',$data);
	}
	public function subedit($data)
	{
		return $this->_Update('#__subkomponen',$data,"id='$data[id]'");
	}
	public function submatch($id)
	{
		return $this->_GetRow("SELECT * FROM #__subkomponen WHERE id=$id");
	}
	public function subdelete($id)
	{
		return $this->_Delete('#__subkomponen',"id='$id'");
	}
	public function subkomponent_aktifitas_add($data)
	{
		return $this->_Insert('#__subkomponen_aktifitas',$data);
	}
	public function subkomponent_aktifitas_delete($id)
	{
		return $this->_Delete('#__subkomponen_aktifitas',"id='$id'");
	}
	public function getlistby_komponen($id_komponen)
	{
		$sWhere = '';
		if(cfSession('bop_last.id_group')==3)
		{
			$pref = strtolower(substr(cfSession('bop_last.id_kantor'),0,1));
			if(strtolower($pref)=='k')
			{
				$sWhere .= " AND $pref='1'";
			}
		}	
		return $this->_Get("SELECT * FROM #__subkomponen WHERE id_komponen='$id_komponen' $sWhere");
	}
	public function setReadOnly($id)
	{
		$arr = $this->getMatch($id);
		$arr['read_only'] = abs($arr['read_only']-1);
		$this->edit($arr);
		return true;
	}
}
?>
<?php
class aktifitas_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__aktifitas");
	}
	public function add($data)
	{
		return $this->_Insert('#__aktifitas',$data);
	}
	public function edit($data)
	{
		return $this->_Update('#__aktifitas',$data,"id='$data[id]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__aktifitas',"id='$id'");
	}
	public function getNotInSubKomponen($id_subkomponen)
	{
		return $this->_Get("SELECT a.* FROM tc_aktifitas a WHERE a.id NOT IN (SELECT id_aktifitas FROM tc_subkomponen_aktifitas WHERE id_subkomponen=$id_subkomponen)");
	}
	public function getInSubkomponen($id_subkomponen)
	{
		return $this->_Get("SELECT a.id,a.nama_aktifitas,b.id as id_subkomponen_aktifitas FROM #__aktifitas a INNER JOIN #__subkomponen_aktifitas b ON a.id=b.id_aktifitas WHERE b.id_subkomponen='$id_subkomponen' GROUP BY b.id");
	}
}
?>
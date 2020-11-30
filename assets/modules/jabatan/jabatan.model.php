<?php
class jabatan_model extends CFModels
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
		return $this->_Get("SELECT * FROM #__jabatan");
	}
	public function add($data)
	{
		return $this->_Insert('#__jabatan',$data,"kode_jabatan=-1");
	}
	public function edit($data)
	{
		return $this->_Update('#__jabatan',$data,"kode_jabatan='$data[kode_jabatan]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__jabatan',"kode_jabatan='$id'");
	}
}
?>
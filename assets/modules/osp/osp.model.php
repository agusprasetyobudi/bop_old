<?php
class osp_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__osp");
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function add($data)
	{
		return $this->_Insert('#__osp',$data);
	}
	public function edit($data)
	{
		return $this->_Update('#__osp',$data,"id='$data[id]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__osp',"id='$id'");
	}
	public function getByKodeKantor($kode_kantor)
	{
		return $this->_GetRow("SELECT a.* FROM #__osp a INNER JOIN #__kantor b ON a.id=b.id_osp WHERE b.kode_kantor='$kode_kantor'");
	}
}
?>
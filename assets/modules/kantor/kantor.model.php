<?php
class kantor_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getmatch($kode_kantor)
	{
		return $this->_GetRow("SELECT a.*,c.id as id_propinsi FROM #__kantor a INNER JOIN #__kabupaten b ON b.id=a.id_kabupaten INNER JOIN #__propinsi c ON c.id=b.id_propinsi WHERE a.kode_kantor='$kode_kantor'");
	}
	public function getListByOsp($id_osp)
	{
		return $this->_Get("SELECT a.*,b.nama_kabupaten FROM #__kantor a INNER JOIN #__kabupaten b ON b.id=a.id_kabupaten WHERE id_osp='$id_osp'");
	}
	public function add($data)
	{
		return $this->_Insert('#__kantor',$data,"kode_kantor=-1");
	}
	public function edit($data)
	{
		return $this->_Update('#__kantor',$data,"kode_kantor='$data[kode_kantor]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__kantor',"kode_kantor='$id'");
	}
}
?>
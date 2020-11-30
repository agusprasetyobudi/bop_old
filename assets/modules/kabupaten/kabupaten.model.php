<?php
class kabupaten_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getMatchByPropinsi($id_propinsi)
	{
		return $this->_Get(sprintf("SELECT * FROM #__kabupaten WHERE id_propinsi='%s'",$id_propinsi));
	}
	public function add($data)
	{
		return $this->_Insert('#__kabupaten',$data);
	}
	public function edit($data)
	{
		return $this->_Update('#__kabupaten',$data,"id='$data[id]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__kabupaten',"id='$id'");
	}
	public function getMatch($id)
	{
		return $this->_GetRow(sprintf("SELECT * FROM #__kabupaten WHERE id='%s'",$id));
	}
}
?>
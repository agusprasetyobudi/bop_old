<?php
class oauth_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getUser($username,$password)
	{
		return  $this->_GetRow("SELECT a.*,b.id_osp FROM #__pengguna as a INNER JOIN #__kantor as b ON a.id_kantor=b.kode_kantor WHERE a.username='$username' AND a.pass='".md5($password)."'");
		
	}
}
?>
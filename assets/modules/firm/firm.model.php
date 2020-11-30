<?php
class firm_model extends CFModels
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
		return $this->_GetRow("SELECT a.*,b.id_osp FROM #__firm a INNER JOIN #__kantor b ON a.kode_kantor=b.kode_kantor WHERE a.no_bukti='$id'");
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__firm");
	}
	public function add($data)
	{
		return $this->_Insert('#__firm',$data,"no_bukti=-1");
	}
	public function edit($data)
	{
		return $this->_Update('#__firm',$data,"no_bukti='$data[no_bukti]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__firm',"no_bukti='$id'");
	}
	public function getMonth($num)
	{
		return $this->_GetRow("SELECT $num as id,function_get_string_month($num) as bulan");
	}
	public function getMatchDetil($no_bukti)
	{
		return $this->_GetRow("SELECT * FROM view_firm2 WHERE no_bukti='$no_bukti'");
	}
	public function getInfo($id_user)
	{	 
		 $where = 'WHERE 1=1';
		 if(Cfsession('bop_last.id_group')>1)
		 $where = "WHERE a.id_member=$id_user";
		 $query = "SELECT COUNT(a.no_bukti) total FROM tc_firm a $where";
		 $arr = $this->_GetRow($query);
		 $out['total'] = $arr['total'];
		 
		 $query = "SELECT COUNT(a.no_bukti) as total FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti $where AND c.no_bukti IS NULL";
		 $arr = $this->_GetRow($query);
		 $out['belum'] = $arr['total'];
		 
		 $query = "SELECT COUNT(a.no_bukti) as total FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti $where AND c.no_bukti IS NOT NULL";
		 $arr = $this->_GetRow($query);
		 $out['sudah'] = $arr['total'];
		 return $out;
	}
	public function getInfoKantor($id_kantor)
	{
		 $where = 'WHERE 1=1';
		 if(Cfsession('bop_last.id_group')>1)
		 $where = "WHERE a.kode_kantor='$id_kantor'";
		 $query = "SELECT COUNT(a.no_bukti) total FROM tc_firm a $where";
		 $arr = $this->_GetRow($query);
		 $out['total'] = $arr['total'];
		 
		 $query = "SELECT COUNT(a.no_bukti) as total FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti $where AND c.no_bukti IS NULL";
		 $arr = $this->_GetRow($query);
		 $out['belum'] = $arr['total'];
		 
		 $query = "SELECT COUNT(a.no_bukti) as total FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti $where AND c.no_bukti IS NOT NULL";
		 $arr = $this->_GetRow($query);
		 $out['sudah'] = $arr['total'];
		 return $out;
	}
    public function getAmount($kode_kantor)
	{
		return $this->_GetRow("SELECT sum(jumlah) AS total FROM tc_firm WHERE kode_kantor='$kode_kantor'");
	}
}
?>
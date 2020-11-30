<?php
class pmu_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getAll($id_osp,$bulan_awal,$tahun_awal,$bulan_akhir,$tahun_akhir)
	{
		$query = "SELECT a.jumlah total_ditransfer,sum(c.jumlah) total_diterima,ABS(sum(c.jumlah)-a.jumlah) selisih,a.no_bukti FROM tc_firm a INNER JOIN tc_kantor b ON a.kode_kantor=b.kode_kantor 
INNER JOIN tc_transfer c ON c.no_bukti=a.no_bukti
WHERE b.id_osp='$id_osp' 
AND str_to_date(CONCAT(a.periode_tahun,'-',a.periode_bulan,'-01'),'%Y-%m-%d')>=str_to_date('$tahun_awal-$bulan_awal-01','%Y-%m-%d')
AND str_to_date(CONCAT(a.periode_tahun,'-',a.periode_bulan,'-01'),'%Y-%m-%d')<=str_to_date('$tahun_akhir-$bulan_akhir-01','%Y-%m-%d')
GROUP BY a.no_bukti";
		$data = $this->_Get($query);
		$total_ditransfer = 0;
		$total_diterima = 0;
		$id_items = array();
		$ni_inc = 0;
		for($i=0;$i<count($data);$i++)
		{
			$total_ditransfer+=$data[$i]['total_ditransfer'];	
			$total_diterima+=$data[$i]['total_diterima'];
			$id_items[] = $data[$i]['no_bukti'];
		}
		$query = "SELECT SUM(b.nominal) total_nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen,count(b.id) as volume FROM tc_transfer_item a
INNER JOIN tc_item_kontrak b ON a.id_item_kontrak=b.id
INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas
INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas
INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen
INNER JOIN tc_komponen f ON f.id=e.id_komponen WHERE a.id_transfer IN(SELECT id FROM  tc_transfer WHERE no_bukti IN ('".(implode("','",$id_items))."')) AND a.id_transfer NOT IN (SELECT id_transfer FROM tc_pmu_listing GROUP BY id_transfer)
GROUP BY d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen";
		$data_item = $this->_Get($query);
		$output['id_osp'] = $id_osp;
		$output['total_ditransfer'] = $total_ditransfer;
		$output['total_diterima'] = $total_diterima;
		$output['list_data'] = $data_item;
		$query  = "SELECT id FROM  tc_transfer WHERE no_bukti IN ('".(implode("','",$id_items))."')";
		$s = $this->_Get($query);
		for($i=0;$i<count($s);$i++)
		{
			$output['id_items'][] = $s[$i]['id'];
		}
		return $output;
	}
	public function addPMU($data)
	{
		if($this->_Insert('#__pmu',$data))
		return $this->insert_id;
		return false;
	}
	public function addpmulist($data)
	{
		return $this->_Insert('#__pmu_listing',$data);
	}
	public function getMatchByIdTransfer($id)
	{
		$query = "SELECT * #__pmu_listing WHERE id_transfer='$id'";
		return $this->_Get($query);
	}
	public function getPaging($query,$total,$start,$mode=false)
	{
		if(!$mode)
		{
			$rs = $this->_Multi_Exec($query);	
			return  $rs->RecordCount();
		}
		else
		{
			$rs = $this->_Multi_Exec($query);	
			return $rs->GetAll();
			//$res = $this->Execute($query);
			return $this->_Paging($query,$total,$start);
		}
	}
}
?>
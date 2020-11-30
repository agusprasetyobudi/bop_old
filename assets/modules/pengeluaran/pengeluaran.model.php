<?php
class pengeluaran_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function savePengeluaran($data)
	{
		return $this->_Insert('#__pengeluaran',$data,'id_item_transfer=-1');
	}
	public function getItemTransferByKodeTransfer($id)
	{
		return $this->_Get("SELECT a.* FROM tc_pengeluaran a INNER JOIN tc_transfer_item b ON a.id_item_transfer=b.id WHERE b.id_transfer='$id'");
	}
	public function editPengeluaran($data)
	{
		return $this->_Update('#__pengeluaran',$data,"id_item_transfer='$data[id_item_transfer]'");
	}
	public function deletePengeluaran($id)
	{
		return $this->_Delete('#__pengeluaran',"id_item_transfer='$id'");
	}
	public function getReportPengeluaranTransfer($kode_kantor,$bulan_awal,$tahun_awal,$bulan_akhir,$tahun_akhir)
	{
		if($kode_kantor==0)
		{
		$query = "SELECT SUM(b.nominal) total_nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen,count(b.id) as volume, CONCAT(function_get_string_month(h.periode_bulan),'/',h.periode_tahun)  periode,SUM(i.jumlah) as total_implementasi
				FROM tc_transfer_item a
INNER JOIN tc_item_kontrak b ON a.id_item_kontrak=b.id
INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas
INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas
INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen
INNER JOIN tc_komponen f ON f.id=e.id_komponen
INNER JOIN tc_transfer g ON g.id=a.id_transfer
INNER JOIN tc_firm h ON h.no_bukti=g.no_bukti
INNER JOIN tc_pengeluaran i ON i.id_item_transfer=a.id
WHERE str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')>=str_to_date('$tahun_awal-$bulan_awal-01','%Y-%m-%d') 
AND str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')<=str_to_date('$tahun_akhir-$bulan_akhir-01','%Y-%m-%d')
GROUP BY d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen";
		}
		else
		{
				$query = "SELECT SUM(b.nominal) total_nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen,count(b.id) as volume, CONCAT(function_get_string_month(h.periode_bulan),'/',h.periode_tahun)  periode,SUM(i.jumlah) as total_implementasi
				FROM tc_transfer_item a
INNER JOIN tc_item_kontrak b ON a.id_item_kontrak=b.id
INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas
INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas
INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen
INNER JOIN tc_komponen f ON f.id=e.id_komponen
INNER JOIN tc_transfer g ON g.id=a.id_transfer
INNER JOIN tc_firm h ON h.no_bukti=g.no_bukti
INNER JOIN tc_pengeluaran i ON i.id_item_transfer=a.id
WHERE str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')>=str_to_date('$tahun_awal-$bulan_awal-01','%Y-%m-%d') 
AND str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')<=str_to_date('$tahun_akhir-$bulan_akhir-01','%Y-%m-%d')  AND h.kode_kantor='$kode_kantor'
GROUP BY d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen";
		}
		return $this->_Get($query);
	}
}
?>
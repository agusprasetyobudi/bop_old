<?php
class transfer_model extends CFModels
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
		return $this->_GetRow("SELECT a.*,b.nama_jabatan,b.osp_name,CONCAT(b.nama_kantor,' - ',b.nama_kabupaten) as kantor FROM view_buat_list_rekap_transfer a INNER JOIN view_firm b ON a.no_bukti=b.no_bukti WHERE a.id_transfer='$id'");
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__transfer LIMIT = 100");
	}
	public function add($data)
	{
		if($this->_Insert('#__transfer',$data))
		return $this->insert_id;
		return false;
	}
	public function addItem($data)
	{
		return $this->_Insert('#__transfer_item',$data);
	}
	public function edit($data)
	{
		return $this->_Update('#__transfer',$data,"id='$data[id]'");
	}
	public function editItem($data)
	{
		return $this->_Update('#__transfer_item',$data,"id_item_kontrak='$data[id_item_kontrak_old]'");
	}
	public function deleteAllItem($id)
	{
		return $this->_Delete('#__transfer_item',"id_transfer='$id'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__transfer',"id='$id'");
	}
	public function getMonth($num)
	{
		return $this->_GetRow("SELECT $num as id,function_get_string_month($num) as bulan");
	}
	public function getItemTransferByKodeTransfer($id)
	{
		return $this->_Get("SELECT a.id,a.id_transfer,a.id_item_kontrak,FORMAT(a.jumlah,0) jumlah ,FORMAT(b.nominal,0) nominal_kontrak,b.dari,b.ke,d.nama_aktifitas ,e.nama_subkomponen,f.nama_komponen,f.read_only as read_only
		FROM #__transfer_item a INNER JOIN #__item_kontrak b ON a.id_item_kontrak=b.id 
		INNER JOIN #__subkomponen_aktifitas c ON b.id_aktifitas=c.id 
		INNER JOIN #__aktifitas d ON c.id_aktifitas=d.id
		INNER JOIN #__subkomponen e ON c.id_subkomponen=e.id
		INNER JOIN #__komponen f ON e.id_komponen=f.id WHERE a.id_transfer='$id';
		");
	}
	public function getItemTransferByIdItemTransfer($id)
	{
		return $this->_GetRow("SELECT a.id,a.id_transfer,a.id_item_kontrak,FORMAT(a.jumlah,0) jumlah ,FORMAT(b.nominal,0) nominal_kontrak,b.dari,b.ke,d.nama_aktifitas ,e.nama_subkomponen,f.nama_komponen,f.read_only as read_only
		FROM #__transfer_item a INNER JOIN #__item_kontrak b ON a.id_item_kontrak=b.id 
		INNER JOIN #__subkomponen_aktifitas c ON b.id_aktifitas=c.id 
		INNER JOIN #__aktifitas d ON c.id_aktifitas=d.id
		INNER JOIN #__subkomponen e ON c.id_subkomponen=e.id
		INNER JOIN #__komponen f ON e.id_komponen=f.id WHERE a.id='$id';
		");
	}
	public function getReportTransfer($mode='top',$osp='',$kode_kantor='',$bulan='',$tahun='')
	{
		$query = "SELECT a.*,b.nama_jabatan,CONCAT(function_get_string_month(a.periode_bulan),'/',a.periode_tahun) as periode FROM tc_firm a 
				INNER JOIN tc_transfer x ON a.no_bukti = x.no_bukti
				INNER JOIN tc_jabatan b ON a.kode_jabatan=b.kode_jabatan INNER JOIN tc_kantor c ON a.kode_kantor = c.kode_kantor ";
		if($osp || $kode_kantor || $bulan || $tahun)
		{
			$query = $query . "WHERE ";
			if($osp)
			{
					$query = $query . "c.id_osp='$osp' AND ";
			}
			if($kode_kantor)
			{
					$query = $query . "a.kode_kantor='$kode_kantor' AND ";
			}
			if($bulan)
			{
					$query = $query . "a.periode_bulan='$bulan' AND ";
			}
			if($tahun)
			{
					$query = $query . "a.periode_tahun='$tahun' AND ";
			}                                
			$query = rtrim($query, " AND ");
		}
		$arr = $this->_Get($query);
		for($i=0;$i<count($arr);$i++)
		{
			$query = "SELECT c.kode_kontrak,e.nama_aktifitas,f.nama_subkomponen,g.nama_komponen,COUNT(c.id) as total
				FROM tc_transfer_item a INNER JOIN tc_transfer b ON a.id_transfer=b.id 
				INNER JOIN tc_item_kontrak c ON c.id=a.id_item_kontrak 
				INNER JOIN tc_subkomponen_aktifitas d ON c.id_aktifitas=d.id 
				INNER JOIN tc_aktifitas e ON e.id=d.id_aktifitas 
				INNER JOIN tc_subkomponen f ON f.id=d.id_subkomponen 
				INNER JOIN tc_komponen g ON g.id=f.id_komponen
				WHERE b.no_bukti='".$arr[$i]['no_bukti']."' GROUP BY g.id,f.id,e.id";
			$arr[$i]['listing'] = $this->_Get($query);
		}
		return $arr;
	}
	public function getReportPenerimaanTransfer($osp,$kode_kantor,$bulan_awal,$tahun_awal,$bulan_akhir,$tahun_akhir)
	{
		if($kode_kantor==0)
		{
			$query = "SELECT SUM(b.nominal) total_nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen,count(b.id) as volume, CONCAT(function_get_string_month(h.periode_bulan),'/',h.periode_tahun)  periode
				FROM tc_transfer_item a
				INNER JOIN tc_item_kontrak b ON a.id_item_kontrak=b.id
				INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas
				INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas
				INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen
				INNER JOIN tc_komponen f ON f.id=e.id_komponen
				INNER JOIN tc_transfer g ON g.id=a.id_transfer
				INNER JOIN tc_firm h ON h.no_bukti=g.no_bukti
				WHERE str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')>=str_to_date('$tahun_awal-$bulan_awal-01','%Y-%m-%d') 
				AND str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')<=str_to_date('$tahun_akhir-$bulan_akhir-01','%Y-%m-%d')
				GROUP BY d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen";
		}
		else
		{
			$query = "SELECT SUM(b.nominal) total_nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen,count(b.id) as volume, CONCAT(function_get_string_month(h.periode_bulan),'/',h.periode_tahun)  periode
				FROM tc_transfer_item a
				INNER JOIN tc_item_kontrak b ON a.id_item_kontrak=b.id
				INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas
				INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas
				INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen
				INNER JOIN tc_komponen f ON f.id=e.id_komponen
				INNER JOIN tc_transfer g ON g.id=a.id_transfer
				INNER JOIN tc_firm h ON h.no_bukti=g.no_bukti 
				INNER JOIN tc_kantor i ON h.kode_kantor = i.kode_kantor
				WHERE 1 ";
			if($tahun_awal && $bulan_awal || $tahun_akhir && $bulan_akhir || $osp || $kode_kantor)
			{
				if($tahun_awal && $bulan_awal)
				{
						$query = $query . "AND str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')>=str_to_date('$tahun_awal-$bulan_awal-01','%Y-%m-%d') ";
				}
				if($tahun_akhir && $bulan_akhir)
				{
						$query = $query . "AND str_to_date(CONCAT(h.periode_tahun,'-',h.periode_bulan,'-01'),'%Y-%m-%d')<=str_to_date('$tahun_akhir-$bulan_akhir-01','%Y-%m-%d') ";
				}
				if($osp)
				{
						$query = $query . "AND i.id_osp='$osp' ";
				}
				if($kode_kantor)
				{
						$query = $query . "AND h.kode_kantor='$kode_kantor' ";
				}
			}
			$query = $query . " GROUP BY d.nama_aktifitas,e.nama_subkomponen,f.nama_komponen";
		}
		return $this->_Get($query);
	}
	public function getInfo()
	{
		$sWhere = '';
		if(Cfsession('bop_last.id_group') && Cfsession('bop_last.id_group')==3)
		{
			$sWhere .= " #__pengguna.id_kantor='".Cfsession('bop_last.id_kantor')."' ";
		}
		else
		{
			$sWhere .= " 1=1 ";
		}
		$query = "SELECT no_bukti,tanggal_transfer,nama_penerima,bank_penerima,rekening_penerima,nilai_kontrak,jumlah_diterima,selisih,tanggal_diterima,periode,id_member,id_transfer FROM view_buat_list_rekap_transfer INNER JOIN #__pengguna ON view_buat_list_rekap_transfer.id_member=#__pengguna.id WHERE $sWhere limit 1";
		
		$query = "SELECT COUNT(no_bukti) total FROM view_buat_list_rekap_transfer INNER JOIN #__pengguna ON view_buat_list_rekap_transfer.id_member=#__pengguna.id WHERE $sWhere limit 1";
		$arr = $this->_GetRow($query);
		ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
		var_dump($query);
		$out['total'] = $arr['total']; 
		return $out;
	}
}
?>
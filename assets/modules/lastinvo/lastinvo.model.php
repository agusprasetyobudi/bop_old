<?php
class lastinvo_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getAmandement($kode_kontrak)
	{
		$query = sprintf("SELECT amandemen FROM #__last_invo WHERE 	id_item_kontrak IN (SELECT a.id FROM tc_item_kontrak a 
		INNER JOIN tc_subkomponen_aktifitas b ON a.id_aktifitas=b.id
		INNER JOIN tc_aktifitas c ON b.id_aktifitas = c.id 
		INNER JOIN tc_subkomponen d ON b.id_subkomponen = d.id
		INNER JOIN tc_komponen e ON d.id_komponen=e.id 
		WHERE a.kode_kontrak='%s') GROUP BY amandemen ORDER BY amandemen",$kode_kontrak);
		return $this->_Get($query);
	}
	public function getManage($kode_kontrak)
	{
		$query = sprintf("SELECT a.*,c.nama_aktifitas,d.nama_subkomponen,e.nama_komponen FROM tc_item_kontrak a 
		INNER JOIN tc_subkomponen_aktifitas b ON a.id_aktifitas=b.id
		INNER JOIN tc_aktifitas c ON b.id_aktifitas = c.id 
		INNER JOIN tc_subkomponen d ON b.id_subkomponen = d.id
		INNER JOIN tc_komponen e ON d.id_komponen=e.id 
		WHERE a.kode_kontrak='%s'
		ORDER BY e.nama_komponen ASC,d.nama_subkomponen ASC, c.nama_aktifitas ASC, a.kode_kantor ASC",$kode_kontrak);
		return $this->_Get($query);
	}
	public function manageReplace($id_item_kontrak,$invoice,$amandemen)
	{
		return $this->_Replace('#__last_invo',array('id_item_kontrak'=>$id_item_kontrak,'nominal'=>$invoice,'amandemen'=>$amandemen),array('id_item_kontrak','amandemen'));
	}
	public function updatePeriode($periode_bulan,$periode_tahun,$id_item_kontrak)
	{
		return $this->_Exec("UPDATE #__last_invo SET periode_tahun='$periode_tahun',periode_bulan='$periode_bulan' WHERE id_item_kontrak='$id_item_kontrak'");
	}
	public function getInvoice($id_item_kontrak,$amandemen='')
	{
		return $this->_GetRow("SELECT * FROM #__last_invo WHERE id_item_kontrak='$id_item_kontrak'".(!empty($amandemen)?" AND amandemen='$amandemen'":''));
	}
	public function getManageOSP($kode_kotrak)
	{
		$query = sprintf("SELECT g.id,g.osp_name FROM tc_item_kontrak a 
		INNER JOIN tc_subkomponen_aktifitas b ON a.id_aktifitas=b.id
		INNER JOIN tc_aktifitas c ON b.id_aktifitas = c.id 
		INNER JOIN tc_subkomponen d ON b.id_subkomponen = d.id
		INNER JOIN tc_komponen e ON d.id_komponen=e.id 
		INNER JOIN tc_kantor f ON a.kode_kantor=f.kode_kantor 
		INNER JOIN tc_osp g ON f.id_osp = g.id
		WHERE a.kode_kontrak='%s'
		GROUP BY g.id",$kode_kotrak);
		return $this->_Get($query);
	}
	public function getManageKantor($kode_kontrak,$id_osp)
	{
		$query = sprintf("SELECT f.kode_kantor,f.nama_kantor FROM tc_item_kontrak a 
		INNER JOIN tc_subkomponen_aktifitas b ON a.id_aktifitas=b.id
		INNER JOIN tc_aktifitas c ON b.id_aktifitas = c.id 
		INNER JOIN tc_subkomponen d ON b.id_subkomponen = d.id
		INNER JOIN tc_komponen e ON d.id_komponen=e.id 
		INNER JOIN tc_kantor f ON a.kode_kantor=f.kode_kantor 
		INNER JOIN tc_osp g ON f.id_osp = g.id
		WHERE a.kode_kontrak='%s' AND g.id='%s'
		GROUP BY f.kode_kantor",$kode_kontrak,$id_osp);
		return $this->_Get($query);
	}
	public function getLastInvoItems($kode_kontrak,$amandemen)
	{
		$query = "SELECT a.kode_kontrak,SUM(b.nominal) nilai_kontrak,d.nama_aktifitas,e.nama_subkomponen FROM tc_kontrak a INNER JOIN tc_item_kontrak b ON a.kode_kontrak=b.kode_kontrak INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen WHERE a.kode_kontrak='$kode_kontrak' 
GROUP BY d.nama_aktifitas,e.nama_subkomponen ORDER BY d.nama_aktifitas";
		$data = $this->_Get($query);
		$output = array();
		for($i=0;$i<count($data);$i++)
		{
			if($data[$i]['nama_aktifitas']=='Activity')
				$data[$i]['nama_aktifitas'] = $data[$i]['nama_subkomponen'];
			if(strpos($data[$i]['nama_aktifitas'],'Transport')!==false)
				$data[$i]['nama_aktifitas'] = 'Transport';
			if(!isset($output[$data[$i]['nama_aktifitas']]))
			{
				$output[$data[$i]['nama_aktifitas']]['kode_kontrak'] = $data[$i]['kode_kontrak'];
				$output[$data[$i]['nama_aktifitas']]['nilai_kontrak'] = $data[$i]['nilai_kontrak'];
				$output[$data[$i]['nama_aktifitas']]['nama_aktifitas'] = $data[$i]['nama_aktifitas'];
				$output[$data[$i]['nama_aktifitas']]['nama_subkomponen'] = $data[$i]['nama_subkomponen'];
			}
			else
			{
				$output[$data[$i]['nama_aktifitas']]['nilai_kontrak'] += $data[$i]['nilai_kontrak'];
			}
			$temp = $this->_GetRow("SELECT nominal,periode_bulan,periode_tahun FROM #__last_invo WHERE kode_kontrak='$kode_kontrak' AND amandemen='$amandemen' AND kode='".$data[$i]['nama_aktifitas']."'");
			$output[$data[$i]['nama_aktifitas']]['invoice'] = isset($temp['nominal'])?$temp['nominal']:0;
			$output[$data[$i]['nama_aktifitas']]['periode_bulan'] = isset($temp['periode_bulan'])?$temp['periode_bulan']:0;
			$output[$data[$i]['nama_aktifitas']]['periode_tahun'] = isset($temp['periode_tahun'])?$temp['periode_tahun']:0;
		}
		return $output;
	}
	public function getManageSave($kode_kontrak,$amandemen,$invoice,$kode,$bulan,$tahun)
	{
		$this->_Delete('#__last_invo',"kode_kontrak='$kode_kontrak' AND amandemen='$amandemen'");
		for($i=0;$i<count($invoice);$i++)
		{
			$invoice[$i] = str_replace(',','',$invoice[$i]);
			$this->_Insert('#__last_invo',array('kode_kontrak'=>$kode_kontrak,'kode'=>$kode[$i],'nominal'=>$invoice[$i],'amandemen'=>$amandemen,'periode_bulan'=>$bulan,'periode_tahun'=>$tahun));
		}
	}
	public function getAmandementNew($kode_kontrak)
	{
		return $this->_Get("SELECT * FROM #__last_invo WHERE kode_kontrak='$kode_kontrak' GROUP BY amandemen");
	}
	public function getLastInvoList()
	{
		$query = "SELECT a.kode_kontrak,SUM(b.nominal) nilai_kontrak,f.id_osp FROM tc_kontrak a INNER JOIN tc_item_kontrak b ON a.kode_kontrak=b.kode_kontrak INNER JOIN tc_subkomponen_aktifitas c ON c.id=b.id_aktifitas INNER JOIN tc_aktifitas d ON d.id=c.id_aktifitas INNER JOIN tc_subkomponen e ON e.id=c.id_subkomponen INNER JOIN tc_kantor f ON f.kode_kantor=b.kode_kantor GROUP BY a.kode_kontrak";
		$data =  $this->_Get($query);
		for($i=0;$i<count($data);$i++)
		{
			$temp = $this->_GetRow("SELECT SUM(nominal) nominal FROM #__last_invo WHERE kode_kontrak='".$data[$i]['kode_kontrak']."' AND amandemen=(SELECT MAX(amandemen) amandemen FROM #__last_invo WHERE kode_kontrak='".$data[$i]['kode_kontrak']."')");
			$data[$i]['invoice'] = isset($temp['nominal'])?$temp['nominal']:0;
		}
		return $data;
	}
}
?>
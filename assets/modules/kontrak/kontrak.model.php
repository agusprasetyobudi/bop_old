<?php
class kontrak_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function getPaging($query,$total,$start)
	{
		return $this->_Paging($query,$total,$start);
	}
	public function getMatch($kode_kontrak)
	{
		$arr  = $this->_GetRow("SELECT a.* FROM #__kontrak as a WHERE a.kode_kontrak='$kode_kontrak'");
		/*$query = "SELECT a.*,
			j.periode_bulan,j.periode_tahun,
			e.id as id_komponen,
			e.nama_komponen,
			d.id as id_subkomponen,
			d.nama_subkomponen,
			c.nama_aktifitas,
			f.id_osp,
			f.nama_kantor,
			g.nama_kabupaten 
			FROM #__item_kontrak a 
			INNER JOIN #__subkomponen_aktifitas b ON a.id_aktifitas=b.id 
			INNER JOIN #__aktifitas c ON c.id=b.id_aktifitas 
			INNER JOIN #__subkomponen d ON d.id=b.id_subkomponen 
			INNER JOIN #__komponen e ON e.id=d.id_komponen
			INNER JOIN #__kantor f ON a.kode_kantor=f.kode_kantor 
			INNER JOIN #__kabupaten g ON f.id_kabupaten=g.id
			LEFT OUTER JOIN #__transfer_item h ON h.id_item_kontrak=a.id
			LEFT OUTER JOIN #__transfer i ON i.id=h.id_transfer
			LEFT OUTER JOIN #__firm j ON j.no_bukti=i.no_bukti
			WHERE a.kode_kontrak='$kode_kontrak'";*/
		$query = "SELECT a.*,
			'' as periode_bulan, '' as periode_tahun,
			e.id as id_komponen,
			e.nama_komponen,
			d.id as id_subkomponen,
			d.nama_subkomponen,
			c.nama_aktifitas,
			f.id_osp,
			f.nama_kantor,
			g.nama_kabupaten 
			FROM #__item_kontrak a 
			INNER JOIN #__subkomponen_aktifitas b ON a.id_aktifitas=b.id 
			INNER JOIN #__aktifitas c ON c.id=b.id_aktifitas 
			INNER JOIN #__subkomponen d ON d.id=b.id_subkomponen 
			INNER JOIN #__komponen e ON e.id=d.id_komponen
			INNER JOIN #__kantor f ON a.kode_kantor=f.kode_kantor 
			INNER JOIN #__kabupaten g ON f.id_kabupaten=g.id
			WHERE a.kode_kontrak='$kode_kontrak'";
		$arr['info'] = $this->_Get($query);
		return $arr;
	}
	public function getAll()
	{
		return $this->_Get("SELECT * FROM #__kontrak");
	}
	public function add($data)
	{
		return $this->_Insert('#__kontrak',$data,"kode_kontrak=-1");
	}
	public function edit($data)
	{
		return $this->_Update('#__kontrak',$data,"kode_kontrak='$data[kode_kontrak]'");
	}
	public function delete($id)
	{
		return $this->_Delete('#__kontrak',"kode_kontrak='$id'");
	}
	public function deleteItemKontrak($kode_kontrak)
	{
		return $this->_Delete('#__item_kontrak',"kode_kontrak='$kode_kontrak'");
	}
    public function deleteSingleItemKontrak($id_item_kontrak)
	{
		return $this->_Delete('#__item_kontrak',"id='$id_item_kontrak'");
	}
	public function deleteSingleItemKontrak1($id_item_kontrak, $data)
	{
        $this->_Update('#__transfer_item',$data,"id_item_kontrak=$data[id_amandemen]");
		return $this->_Delete('#__item_kontrak',"id='$id_item_kontrak'");
	}
	public function addItemKontrak($data)
	{
		return $this->_Insert('#__item_kontrak',$data,"id_aktifitas=-1 AND kode_kontrak=-1");
	}
    public function editItemKontrak($data)
	{
		return $this->_Update('#__item_kontrak',$data,"id='$data[id_item_kontrak]'");
	}
	public function deleteSpace()
	{
		
	}
}
?>
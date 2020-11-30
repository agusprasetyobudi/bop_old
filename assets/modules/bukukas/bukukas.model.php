<?php
class bukukas_model extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function save($data)
	{
		return $this->_Insert('#__buku_kas',$data);
	}
	public function getFirmByPeriode($awal='',$akhir='')
	{
		if(CfSession('bop_last.id_group')==1)
		{
			if(empty($awal) && empty($akhir))
				return $this->_Get("SELECT * FROM #__firm");
			else
				return $this->_Get("SELECT * FROM #__firm WHERE periode_bulan='$awal' AND periode_tahun='$akhir'");
		}	
		else
		{
			if(empty($awal) && empty($akhir))
				return $this->_Get("SELECT * FROM #__firm WHERE kode_kantor='".CfSession('bop_last.id_kantor')."'");
			else
				return $this->_Get("SELECT * FROM #__firm WHERE periode_bulan='$awal' AND periode_tahun='$akhir' AND  kode_kantor='".CfSession('bop_last.id_kantor')."'");
		}
	}
	public function getTransfer($id_firm)
	{
		return $this->_Get("SELECT * FROM #__transfer WHERE no_bukti='$id_firm'");
	}
	public function transaksiDebet($id)
	{
		return $this->_Get("SELECT * FROM #__buku_kas WHERE id_item_transfer='$id'");
	}
	public function tDebetSum($id)
	{
		return $this->_GetRow("SELECT IFNULL(SUM(total),0) total FROM #__buku_kas WHERE id_item_transfer='$id'");
	}
	public function getlist($id='')
	{
		$query = "SELECT a.*,b.jumlah,d.no_bukti no_bukti_transfer FROM #__buku_kas a INNER JOIN #__transfer_item b ON a.id_item_transfer=b.id INNER JOIN #__transfer c ON b.id_transfer=c.id INNER JOIN #__firm d ON d.no_bukti=c.no_bukti WHERE d.kode_kantor='".CfSession('bop_last.id_kantor')."' ORDER BY d.no_bukti ASC,a.tanggal ASC";
		return $this->_Get($query);
	}
}
?>
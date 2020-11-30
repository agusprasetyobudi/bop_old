<?php
class lastinvo_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		$output['breadcrumb'] = array('lastinvo'=>'Invoice Terakhir','list'=>'List Invoice Terakhir');
		$output['content'] = 'lastinvo/list.html';
		// $output['data'] = $this->model()->getLastInvoList();
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function manage($kode='',$amandemen='')
	{
		if(!empty($kode))
		{
			$kode = urldecode($kode);
			$amandemen = empty($amandemen)?1:$amandemen;
			if($this->getField() && $this->getField('invoicesaatini'))
			{
				$kode_kontrak = $this->getField('kode_kontrak');
				$invoice = $this->getField('invoicesaatini');
				$kode = $this->getField('invoice_kode');
				$this->model()->getManageSave($kode_kontrak,$amandemen,$invoice,$kode,$this->getField('periode_bulan'),$this->getField('periode_tahun'));
				redirect('lastinvo/manage/'.$kode_kontrak.'/'.$amandemen);
				exit;
			}
			$output['data'] = $this->model()->getLastInvoItems($kode,$amandemen);
			$output['breadcrumb'] = array('lastinvo'=>'Invoice Terakhir','lastinvo/manage/'.$kode=>'Form Invoice Terakhir','list'=>'List Invoice Terakhir');
			$output['amandemen_aktif'] = $amandemen;
			$output['kode_kontrak'] = $kode;
			for($i=1;$i<=12;$i++)
			{
				$output['list_month'][] = $this->model('firm')->getMonth($i);
			}
			$output['amandemen'] = $this->model()->getAmandementNew($kode);
			$output['content'] = 'lastinvo/form.last.html';
			$this->teil('template')->load('page');
			$this->teil('template')->render($output);
		}
	}
	public function getAjaxKantorKelolaByOSP()
	{
		if($this->getField() && $this->getField('kode_kontrak') && $this->getField('id_osp'))
		{
			die(json_encode(array('error'=>false,'data'=>$this->model()->getManageKantor($this->getField('kode_kontrak'),$this->getField('id_osp')))));
		}
		die(json_encode(array('error'=>true,'message'=>'Your Request Not Found')));
	}
	public function getAjaxKelola()
	{
		if($this->getField() && $this->getField('kode_kontrak') && $this->getField('id_osp') && $this->getField('kode_kantor'))
		{
			die(json_encode(array('error'=>false,'data'=>$this->model()->getManage($kode))));
		}
		die(json_encode(array('error'=>true,'message'=>'Your Request Not Found')));
	}
	public function listing()
	{
		$aColumns = array( 'a.kode_kontrak', 'b.nominal','d.id','e.nominal');
		$sIndexColumn = "id";
	
		$limit_start = 0;
		$limit_length = 0;
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
		{
			$limit_start = intval( $_GET['iDisplayStart'] );
			$limit_length = intval( $_GET['iDisplayLength'] );
		}
	
	
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".
						($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
	
	
	
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "".$aColumns[$i]." LIKE '%".( $_GET['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
	

		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "".$aColumns[$i]." LIKE '%".($_GET['sSearch_'.$i])."%' ";
			}
		}
		$data = $this->model()->getPaging("SELECT a.kode_kontrak,d.id id_osp,FORMAT(IFNULL(SUM(b.nominal),0),0) nilai_kontrak, FORMAT(IFNULL(SUM(e.nominal),0),0) invoice,FORMAT(IFNULL(SUM(b.nominal),0)-IFNULL(SUM(e.nominal),0),0) sisa,a.kode_kontrak kode_kk  FROM tc_kontrak a 
INNER JOIN tc_item_kontrak b ON a.kode_kontrak = b.kode_kontrak 
INNER JOIN tc_kantor c ON b.kode_kantor = c.kode_kantor 
INNER JOIN tc_osp d ON c.id_osp = d.id 
LEFT JOIN (SELECT aa.* FROM (SELECT * FROM tc_last_invo ORDER BY amandemen DESC) aa GROUP BY aa.id_item_kontrak) e ON e.id_item_kontrak=b.id $sWhere GROUP BY a.kode_kontrak $sOrder",$limit_length,$limit_start);
		$iFilteredTotal = count($data['list']);
	
		$iTotal = $data['count'];
	
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);
		$aColumns = array( 'kode_kontrak','id_osp', 'nilai_kontrak','invoice','sisa','kode_kk');
		for($i=0;$i<count($data['list']);$i++)
		{
			$aRow=$data['list'][$i];
			$row=array();
			for ( $j=0 ; $j<count($aColumns) ; $j++ )
			{
				$row[] = $aRow[ $aColumns[$j] ];
			}
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
}
?>
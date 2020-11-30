<?php
class pmu_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('pmu'=>'Rekapitulasi Input Level PMU','list'=>'List Rekapitulasi');
		
		$output['list_osp']  = $this->model('osp')->getAll();
		for($i=1;$i<=12;$i++)
		{
			$output['list_month'][] = $this->model('firm')->getMonth($i);
		}
		
		//include template
		$output['content'] = 'pmu/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function add()
	{
		if($_POST && isset($_POST['mode']) && $_POST['mode']=='addform')
		{	
			$output = array();
			$output = $this->model()->getAll($_POST['id_osp'],$_POST['id_periode_bulan_awal'],$_POST['id_periode_tahun_awal'],$_POST['id_periode_bulan_akhir'],$_POST['id_periode_tahun_akhir']);
			$output['breadcrumb'] = array('pmu'=>'Rekapitulasi Input Level PMU','pmu'=>'Tambah Invoice','list'=>'List Rekapitulasi');
			$output['data']['osp'] = $_POST['id_osp'];
			$tem = $this->model('firm')->getMonth($_POST['id_periode_bulan_awal']);
			$output['data']['periode_awal'] = $tem['bulan'].'/'.$_POST['id_periode_tahun_awal'];
			$tem = $this->model('firm')->getMonth($_POST['id_periode_bulan_akhir']);
			$output['data']['periode_akhir'] = $tem['bulan'].'/'.$_POST['id_periode_tahun_akhir'];
			$output['content'] = 'pmu/form.html';
			$this->teil('template')->load('page');
			$this->teil('template')->render($output);
		}
		elseif($this->getField() && $this->getField('id_transfer') && $this->getField('total_ditagihkan') && $this->getField('mode') && $this->getField('mode')=='saveform')
		{
			$tf = $this->getField('id_transfer');
			$ex = explode(',',$tf);
			$data['invoice'] = str_replace(',','',$this->getField('total_ditagihkan'));
			$data['tanggal'] = time();
			$data['id_user'] = Cfsession('bop_last.id');
			$id = $this->model()->addPMU($data);
			if($id)
			{
				$data = array();
				for($i=0;$i<count($ex);$i++){
					$data['id_pmu'] = $id;
					$data['id_transfer'] = $ex[$i];
					$this->model()->addpmulist($data);
				}
			}
			redirect('pmu');
		}
	}
	public function listing()
	{
		
		$aColumns = array( 'no_bukti','tanggal_transfer','nama_penerima','bank_penerima','rekening_penerima','nilai_kontrak','alokasi','selisih','periode','jumlah_diterima','selisih_total','id_transfer');
		$sIndexColumn = "no_bukti";
	
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
		$sWhere = " ";
		
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere .= " (";
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
		
		$aColumns = array( 'no_bukti','tanggal_transfer','nama_penerima','bank_penerima','rekening_penerima','nilai_kontrak','alokasi','selisih','periode','jumlah_diterima','selisih_total','id_transfer');
		
		$query_TMP  = "DROP TEMPORARY TABLE IF EXISTS temp_to; CREATE TEMPORARY TABLE temp_to ENGINE=MEMORY  as (SELECT a.no_bukti,a.tanggal_transfer,a.nama_penerima,a.bank_penerima,a.rekening_penerima,a.nilai_kontrak,SUM(c.jumlah) alokasi,
(a.nilai_kontrak-SUM(c.jumlah)) selisih,a.periode,a.jumlah_diterima,(a.jumlah_diterima-SUM(c.jumlah)) selisih_total,a.id_transfer FROM view_buat_list_rekap_transfer a
INNER JOIN tc_pengguna b ON a.id_member=b.id
LEFT JOIN tc_transfer_item c ON c.id_transfer=a.id_transfer
		  WHERE  a.id_transfer IN (SELECT id_transfer FROM tc_pmu_listing GROUP BY id_transfer)
		    GROUP BY c.id_transfer ORDER BY  a.no_bukti asc);";
		$sWhere = trim($sWhere);
		$data['count'] = $this->model()->getPaging($query_TMP."SELECT * FROM temp_to ".(!empty($sWhere)?"WHERE ".$sWhere:'').";",'','');
		
		$query_TMP .= "SELECT * FROM temp_to ".(!empty($sWhere)?"WHERE ".$sWhere:'')." $sOrder LIMIT $limit_length OFFSET $limit_start";
		$data['list'] = $this->model()->getPaging($query_TMP,'','',true);
		$iFilteredTotal = count($data['list']);
	
		$iTotal = $data['count'];
	
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);
		
		for($i=0;$i<count($data['list']);$i++)
		{
			$aRow=$data['list'][$i];
			$row=array();
			for ( $j=0 ; $j<count($aColumns) ; $j++ )
			{
				$row[] = $aRow[ $aColumns[$j] ];
			}
			$enables = $this->model('pmu')->getMatchByIdTransfer($data['list'][$i]['id_transfer']);
			if(count($enables)>0)
			{
				$row[] = false;
			}
			else
			{
				$row[] = true;
			}
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
}
?>
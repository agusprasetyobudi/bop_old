<?php
class firm_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('firm'=>'Firm Transfer','list'=>'List Firm Transfer');
		
		//include template
		$output['info'] = $this->model()->getInfo(cfSession('bop_last.id'));
		$output['content'] = 'firm/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function add()
	{
		if($this->getField())
		{
			$arr = $this->getField();
			$arr['tanggal_transfer'] = strtotime($arr['tanggal_transfer']);
			$arr['id_member'] = cfSession('bop_last.id');
            
			if($this->model()->add($arr))
			die(json_encode(array('success'=>true)));
			die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
		}
		
		//breaad crumb
		$output['breadcrumb'] = array('firm'=>'Firm Transfer','firm/add'=>'Tambah Firm Transfer','list'=>'List Firm Transfer');
		
		//collect data
		$output['list_jabatan'] = $this->model('jabatan')->getAll();
		$output['list_osp']  = $this->model('osp')->getAll();
		for($i=1;$i<=12;$i++)
		{
			$output['list_month'][] = $this->model()->getMonth($i);
		}
		
		//include template 
		$output['content'] = 'firm/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);	
	}
	public function edit()
	{
		$id = $this->getRequest(1);
		if(empty($id))
		redirect('firm');
		
		if($this->getField())
		{
			$arr = $this->getField();
			$arr['tanggal_transfer'] = strtotime($arr['tanggal_transfer']);
			if($this->model()->edit($arr))
			die(json_encode(array('success'=>true)));
			die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
		}
		$output = $this->model()->getMatch($id);
		//breaad crumb
		$output['breadcrumb'] = array('firm'=>'Firm Transfer','firm/edit/'.$id=>'Ubah Firm Transfer','list'=>'List Firm Transfer');
		
		//collect data
		$output['list_jabatan'] = $this->model('jabatan')->getAll();
		$output['list_osp']  = $this->model('osp')->getAll();
		for($i=1;$i<=12;$i++)
		{
			$output['list_month'][] = $this->model()->getMonth($i);
		}
		
		//include template
		$output['mode'] = 'edit';
		$output['content'] = 'firm/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function delete()
	{
		if($this->getField())
		{
			$this->model()->delete($this->getField('id'));
		}
	}
	public function listing()
	{
		
		$aColumns = array( 'a.no_bukti','d.id_osp',
		"CONCAT(d.nama_kantor,' / ',e.nama_kabupaten)",
		'DATE_FORMAT(DATE(FROM_UNIXTIME(a.tanggal_transfer)),"%d-%m-%Y")',
		'b.nama_jabatan',
		'a.bank_tujuan',
		'a.ke_no_rek',
		'a.nama_penerima',
		'a.jumlah',
		"CONCAT(function_get_string_month(a.periode_bulan),'/',a.periode_tahun)",
		'a.periode_tahun',
		'a.keterangan');
		$sIndexColumn = "a.no_bukti";
	
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
	
		//check previllage
		if(isset($_GET['id_member']) && !empty($_GET['id_member']))
		{
			$sWhere = "WHERE a.id_member='$_GET[id_member]'";
		}
		if(isset($_GET['kode_kantor']) && !empty($_GET['kode_kantor']))
		{
			$sWhere = "WHERE a.kode_kantor='$_GET[kode_kantor]' AND a.no_bukti NOT IN (SELECT no_bukti FROM tc_transfer) ";
		}
		if(isset($_SESSION['bop_last']['prev']['firm']['owner']) && $_SESSION['bop_last']['prev']['firm']['owner']==1)
		{
			$sWhere = "";
		}
	
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			//check previllage
			if(empty($sWhere))
				$sWhere = "WHERE (";
			else
				$sWhere .= "AND (";
			
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
		$data = $this->model()->getPaging("SELECT 
		a.no_bukti,d.id_osp,
		CONCAT(d.nama_kantor,' / ',e.nama_kabupaten) nama_kantor,
		DATE_FORMAT(DATE(FROM_UNIXTIME(a.tanggal_transfer)),'%d-%m-%Y') as tanggal_transfer,
		b.nama_jabatan,
		a.bank_tujuan,
		a.ke_no_rek,
		a.nama_penerima,
		a.jumlah,
		CONCAT(function_get_string_month(a.periode_bulan),'/',a.periode_tahun) as periode_bulan,
		a.periode_tahun,
		a.keterangan,
		count(c.no_bukti) as enable FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti 
		INNER JOIN tc_kantor d ON a.kode_kantor=d.kode_kantor INNER JOIN tc_kabupaten e ON e.id=d.id_kabupaten
		 $sWhere GROUP BY a.no_bukti $sOrder ",$limit_length,$limit_start);
		$iFilteredTotal = count($data['list']);
// 		ini_set('xdebug.var_display_max_depth', '10');
// ini_set('xdebug.var_display_max_children', '256');
// ini_set('xdebug.var_display_max_data', '1024');
// 		var_dump("SELECT 
// 		a.no_bukti,d.id_osp,
// 		CONCAT(d.nama_kantor,' / ',e.nama_kabupaten) nama_kantor,
// 		DATE_FORMAT(DATE(FROM_UNIXTIME(a.tanggal_transfer)),'%d-%m-%Y') as tanggal_transfer,
// 		b.nama_jabatan,
// 		a.bank_tujuan,
// 		a.ke_no_rek,
// 		a.nama_penerima,
// 		a.jumlah,
// 		CONCAT(function_get_string_month(a.periode_bulan),'/',a.periode_tahun) as periode_bulan,
// 		a.periode_tahun,
// 		a.keterangan,
// 		count(c.no_bukti) as enable FROM tc_firm as a INNER JOIN tc_jabatan b ON a.kode_jabatan = b.kode_jabatan LEFT JOIN tc_transfer c ON a.no_bukti=c.no_bukti 
// 		INNER JOIN tc_kantor d ON a.kode_kantor=d.kode_kantor INNER JOIN tc_kabupaten e ON e.id=d.id_kabupaten
// 		 $sWhere GROUP BY a.no_bukti $sOrder ",$limit_length,$limit_start);

		$iTotal = $data['count'];
	
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);
		$aColumns = array( 'no_bukti','id_osp','nama_kantor','tanggal_transfer','nama_jabatan','bank_tujuan','ke_no_rek','nama_penerima','jumlah','periode_bulan','periode_tahun','keterangan','enable');
		for($i=0;$i<count($data['list']);$i++)
		{
			$aRow=$data['list'][$i];
			$row=array();
			for ( $j=0 ; $j<count($aColumns) ; $j++ )
			{
				if($aColumns[$j]=='jumlah')
					$row[] = number_format($aRow[ $aColumns[$j] ],0,'',',');
				else
					$row[] = $aRow[ $aColumns[$j] ];
			}
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
	
	public function getmatch_ajax()
	{
		if($this->getField('no_bukti'))
		{
			$data = $this->model()->getMatchDetil($this->getField('no_bukti'));
			die(json_encode(array('success'=>true,'data'=>$data)));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
    
    public function getAmount()
	{        
        if($this->getField('kode_kantor'))
		{
			$data = $this->model()->getAmount($this->getField('kode_kantor'));
			die(json_encode(array('success'=>true,'data'=>$data)));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));	
    }
}
?>
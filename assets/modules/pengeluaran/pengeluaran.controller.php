<?php
class pengeluaran_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('pengeluaran'=>'Bukti Pengeluaran','list'=>'List Rekapitulasi Bukti Pengeluaran');
		
		
		//include template
		$output['content'] = 'pengeluaran/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function listing()
	{
		
		$aColumns = array( 'no_bukti','tanggal_transfer','nama_penerima','bank_penerima','rekening_penerima','nilai_kontrak','jumlah_diterima','selisih',"tanggal_diterima",'periode','id_member','total','selisihb','id_transfer');
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
		$sWhere = "WHERE tc_transfer_item.id IN (SELECT id_item_transfer FROM tc_pengeluaran) AND ";
		/*if(Cfsession('bop_last.id_group') && Cfsession('bop_last.id_group')==3)
		{
			$sWhere .= " #__pengguna.id_kantor='".Cfsession('bop_last.id_kantor')."' ";
		}
		else
		{
			$sWhere .= " 1=1 ";
		}*/
        if(Cfsession('bop_last.id_group'))
        {
            if(Cfsession('bop_last.id_group')==5)
            {
                $sWhere .= " #__pengguna.id_group=".Cfsession('bop_last.id_group')." ";
            }
            else if(Cfsession('bop_last.id_group')==3)
            {
                $sWhere .= " #__pengguna.id_kantor='".Cfsession('bop_last.id_kantor')."' ";
                $sWhere .= "AND #__pengguna.id_group=".Cfsession('bop_last.id_group')." ";
            }
            else
            {
                $sWhere .= " 1=1 ";
            }
        }
        else
        {
            $sWhere .= " 1=1 ";
        }
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
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
		$data = $this->model()->getPaging("SELECT no_bukti,tanggal_transfer,nama_penerima,bank_penerima,rekening_penerima,nilai_kontrak,jumlah_diterima,selisih,tanggal_diterima,periode,id_member,SUM(tc_pengeluaran.jumlah) total,(SUM(tc_pengeluaran.jumlah)-nilai_kontrak) selisihb,view_buat_list_rekap_transfer.id_transfer FROM view_buat_list_rekap_transfer INNER JOIN tc_pengguna ON view_buat_list_rekap_transfer.id_member=tc_pengguna.id
INNER JOIN tc_transfer_item ON view_buat_list_rekap_transfer.id_transfer=tc_transfer_item.id_transfer 
INNER JOIN tc_pengeluaran ON tc_pengeluaran.id_item_transfer=tc_transfer_item.id
$sWhere
GROUP BY view_buat_list_rekap_transfer.id_transfer
$sOrder",$limit_length,$limit_start);
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
				$row[] = true;
			}
			else
			{
				$row[] = false;
			}
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
	public function listing_transfer()
	{
		
		$aColumns = array( 'no_bukti','tanggal_transfer','nama_penerima','bank_penerima','rekening_penerima','nilai_kontrak','jumlah_diterima','selisih',"tanggal_diterima",'periode','id_member','id_transfer');
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
		$sWhere = "WHERE tc_transfer_item.id NOT IN (SELECT id_item_transfer FROM tc_pengeluaran) AND ";
		if(Cfsession('bop_last.id_group') && Cfsession('bop_last.id_group')==3)
		{
			$sWhere .= " #__pengguna.id_kantor='".Cfsession('bop_last.id_kantor')."' ";
		}
		else
		{
			$sWhere .= " 1=1 ";
		}
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
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
		$data = $this->model()->getPaging("SELECT no_bukti,tanggal_transfer,nama_penerima,bank_penerima,rekening_penerima,nilai_kontrak,jumlah_diterima,selisih,tanggal_diterima,periode,id_member,view_buat_list_rekap_transfer.id_transfer FROM view_buat_list_rekap_transfer INNER JOIN tc_pengguna ON view_buat_list_rekap_transfer.id_member=tc_pengguna.id
INNER JOIN tc_transfer_item ON view_buat_list_rekap_transfer.id_transfer=tc_transfer_item.id_transfer $sWhere GROUP BY view_buat_list_rekap_transfer.id_transfer $sOrder",$limit_length,$limit_start);
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
				$row[] = true;
			}
			else
			{
				$row[] = false;
			}
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
	public function add()
	{
		$id = $this->getRequest(1);
		if(empty($id))
		redirect('pengeluaran');
		
		if($this->getField() && $this->getField('item_nominal'))
		{
			foreach($this->getField('item_nominal') as $key=>$value)
			{
				$in['id_item_transfer'] = $key;
				$in['jumlah'] = $value;
				$this->model()->savePengeluaran($in);
			}
			die(json_encode(array('success'=>true)));
		}
		
		$output = $this->model('transfer')->getMatch($id);
		$output['list_item'] = $this->model('transfer')->getItemTransferByKodeTransfer($output['id_transfer']);
		//breaad crumb
		$output['breadcrumb'] = array('pengeluaran'=>'Bukti Transfer Pengeluaran','pengeluaran/add/'.$id=>'Tambag Bukti Pengeluaran','list'=>'Form Bukti Transfer Pengeluaran');
		//collect data
		$output['list_komponen'] = $this->model('komponen')->getAll();
		
		//include template
		$output['url'] = site_url('pengeluaran/add/'.$id);
		$output['mode'] = 'detil';	
		$output['content'] = 'pengeluaran/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function edit()
	{
		$id = $this->getRequest(1);
		if(empty($id))
		redirect('pengeluaran');
		
		if($this->getField() && $this->getField('item_nominal'))
		{
			foreach($this->getField('item_nominal') as $key=>$value)
			{
				$in['id_item_transfer'] = $key;
				$in['jumlah'] = $value;
				$this->model()->editPengeluaran($in);
			}
			die(json_encode(array('success'=>true)));
		}
		
		$output = $this->model('transfer')->getMatch($id);
		$output['list_item'] = $this->model('transfer')->getItemTransferByKodeTransfer($output['id_transfer']);
		$temp = $this->model()->getItemTransferByKodeTransfer($output['id_transfer']);
		for($i=0;$i<count($temp);$i++)
		{
			$output['list_item_s'][$temp[$i]['id_item_transfer']] = $temp[$i]['jumlah'];
		}
		for($i=0;$i<count($output['list_item']);$i++)
		{
			if(isset($output['list_item_s'][$output['list_item'][$i]['id']]))
			{
				$output['list_item'][$i]['val_s'] =$output['list_item_s'][$output['list_item'][$i]['id']];
			}
		}
		//breaad crumb
		$output['breadcrumb'] = array('pengeluaran'=>'Bukti Transfer Pengeluaran','pengeluaran/edit/'.$id=>'Ubah Bukti Pengeluaran','list'=>'Form Bukti Transfer Pengeluaran');
		//collect data
		$output['list_komponen'] = $this->model('komponen')->getAll();
		
		//include template
		$output['url'] = site_url('pengeluaran/edit/'.$id);
		$output['mode'] = 'detil';	
		$output['content'] = 'pengeluaran/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function delete()
	{
		if($this->getField() && $this->getField('id'))
		{
			$id = $this->getField('id');
			$output = $this->model('transfer')->getMatch($id);
			$arr = $this->model('transfer')->getItemTransferByKodeTransfer($output['id_transfer']);
			for($i=0;$i<count($arr);$i++)
			{
				$this->model()->deletePengeluaran($arr[$i]['id']);
			}
		}
	}
	public function pengeluaranreport()
	{
		if($this->getField() && $this->getField('toreport'))
		{
			$output= array();
			if($this->getField('excel'))
			{
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=reportpengeluaran.xls");
				$output['_script'] = false;
			}
			
			$output['list_top'] = $this->model()->getReportPengeluaranTransfer($this->getField('kantor'),$this->getField('periode_bulan_awal'),$this->getField('periode_tahun_awal'),$this->getField('periode_bulan_akhir'),$this->getField('periode_tahun_akhir'));
			if(count($output['list_top'])>0)
			{
				$this->teil('template')->load('modules/pengeluaran/pengeluaran.report.list');
				$this->teil('template')->render($output);
			}
			else
				echo "Data Not Found";
			exit;
		}
		//breaad crumb
		  $output['breadcrumb'] = array('pengeluaran/pengeluaranreport'=>'Report Pengeluaran','list'=>'Report');
		
		
		//collect data
		for($i=1;$i<=12;$i++)
		$output['list_month'][] = $this->model('firm')->getMonth($i);
		$output['list_osp'] = $this->model('osp')->getAll();
		//include template
		$output['content'] = 'pengeluaran/pengeluaran.report.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
}
?>
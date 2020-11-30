<?php
class transfer_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('transfer'=>'Bukti Transfer','list'=>'List Rekapitulasi Bukti Transfer');
		
		//include template
		// $output['info'] = $this->model()->getInfo();
		$output['content'] = 'transfer/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function add()
	{
		if($this->getField())
		{
			$arr = $this->getField();
			$arr['tanggal_diterima'] = strtotime($arr['tanggal_diterima']);
			$arr['id_member'] = cfSession('bop_last.id');
			$arr['date_created'] = time();
			$item_nominal = $arr['item_nominal'];
			$item_kontrak = $arr['id_item_kontrak'];
			unset($arr['item_nominal']);
			unset($arr['id_item_kontrak']);
			$id = $this->model()->add($arr);
			if($id)
			{
				for($i=0;$i<count($item_kontrak);$i++)
				{
					$this->model()->addItem(array('id_item_kontrak'=>$item_kontrak[$i],'jumlah'=>$item_nominal[$i],'id_transfer'=>$id));
				}
				die(json_encode(array('success'=>true)));
			}
			die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
		}
		
		//breaad crumb
		$output['breadcrumb'] = array('transfer'=>'Bukti Transfer','transfer/add'=>'Tambah Bukti Transfer','list'=>'From Bukti Transfer');
		
		//collect data
		$output['list_komponen'] = $this->model('komponen')->getAll();
		
		
		//include template
		// var_dump($output);
		$output['content'] = 'transfer/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);	
	}
	public function edit()
	{
		$id = $this->getRequest(1);
		if(empty($id))
		redirect('transfer');
		
		if($this->getField())
		{
			$arr = $this->getField();
			$arr['tanggal_diterima'] = strtotime($arr['tanggal_diterima']);
			$item_nominal = $arr['item_nominal'];
			$item_kontrak = $arr['id_item_kontrak'];
			unset($arr['item_nominal']);
			unset($arr['id_item_kontrak']);
			if($this->model()->edit($arr))
			{
				$this->model()->deleteAllItem($arr['id']);
				for($i=0;$i<count($item_kontrak);$i++)
				{
					$this->model()->addItem(array('id_item_kontrak'=>$item_kontrak[$i],'jumlah'=>$item_nominal[$i],'id_transfer'=>$arr['id']));
				}
				die(json_encode(array('success'=>true)));
			}
			die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
		}
		$output = $this->model()->getMatch($id);
		$ss = $this->model('firm')->getMatchDetil($output['no_bukti']);
		$output['jumlah_tf'] = $ss['jumlah'];
		$output['list_item'] = $this->model()->getItemTransferByKodeTransfer($output['id_transfer']);
		//breaad crumb
		$output['breadcrumb'] = array('transfer'=>'Bukti Transfer','transfer/edit/'.$id=>'Ubah Bukti Transfer','list'=>'Form Bukti Transfer');
		
		//collect data
		$output['list_komponen'] = $this->model('komponen')->getAll();
		
		//include template
		$output['mode'] = 'edit';	
		$output['content'] = 'transfer/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function detil()
	{
		$id = $this->getRequest(1);
		if(empty($id))
		redirect('transfer');
		
		
		$output = $this->model()->getMatch($id);
		$output['list_item'] = $this->model()->getItemTransferByKodeTransfer($output['id_transfer']);
		//breaad crumb
		$output['breadcrumb'] = array('transfer'=>'Bukti Transfer','transfer/detil/'.$id=>'Detil Bukti Transfer','list'=>'Form Bukti Transfer');
		
		//collect data
		$output['list_komponen'] = $this->model('komponen')->getAll();
		
		//include template
		$output['mode'] = 'detil';	
		$output['content'] = 'transfer/form.html';
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
		$sWhere = "WHERE ";
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
		// var_dump("SELECT no_bukti,tanggal_transfer,nama_penerima,bank_penerima,rekening_penerima,nilai_kontrak,jumlah_diterima,selisih,tanggal_diterima,periode,id_member,id_transfer FROM view_buat_list_rekap_transfer INNER JOIN #__pengguna ON view_buat_list_rekap_transfer.id_member=#__pengguna.id  $sWhere $sOrder",$limit_length,$limit_start); exit;
		$data = $this->model()->getPaging("SELECT no_bukti,tanggal_transfer,nama_penerima,bank_penerima,rekening_penerima,nilai_kontrak,jumlah_diterima,selisih,tanggal_diterima,periode,id_member,id_transfer FROM view_buat_list_rekap_transfer INNER JOIN #__pengguna ON view_buat_list_rekap_transfer.id_member=#__pengguna.id  $sWhere $sOrder",$limit_length,$limit_start);
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
	public function report()
	{
		if($this->getField() && $this->getField('toreport'))
		{
			$output= array();
			if($this->getField('excel'))
			{
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=reporttransfer.xls");
				$output['_script'] = false;
			}
			
			$output['list_top'] = $this->model()->getReportTransfer('top',$this->getField('osp'),$this->getField('kantor'),$this->getField('periode_bulan'),$this->getField('periode_tahun'));
			if(count($output['list_top'])>0)
			{
				$this->teil('template')->load('modules/transfer/report.list');
				$this->teil('template')->render($output);
			}
			else
				echo "Data Not Found";
			exit;
		}
		//breaad crumb
		  $output['breadcrumb'] = array('transfer/report'=>'Report Bukti Transfer','list'=>'Report');
		
		
		//collect data
		for($i=1;$i<=12;$i++)
		$output['list_month'][] = $this->model('firm')->getMonth($i);
		$output['list_osp'] = $this->model('osp')->getAll();
		//include template
		$output['content'] = 'transfer/report.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function penerimaanreport()
	{
		if($this->getField() && $this->getField('toreport'))
		{
			$output= array();
			if($this->getField('excel'))
			{
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=reporttransfer.xls");
				$output['_script'] = false;
			}
			
			$output['list_top'] = $this->model()->getReportPenerimaanTransfer($this->getField('osp'),$this->getField('kantor'),$this->getField('periode_bulan_awal'),$this->getField('periode_tahun_awal'),$this->getField('periode_bulan_akhir'),$this->getField('periode_tahun_akhir'));
			if(count($output['list_top'])>0)
			{
				$this->teil('template')->load('modules/transfer/penerimaan.report.list');
				$this->teil('template')->render($output);
			}
			else
				echo "Data Not Found";
			exit;
		}
		//breaad crumb
		  $output['breadcrumb'] = array('transfer/penerimaanreport'=>'Report Penerimaan Transfer','list'=>'Report');
		
		
		//collect data
		for($i=1;$i<=12;$i++)
		$output['list_month'][] = $this->model('firm')->getMonth($i);
		$output['list_osp'] = $this->model('osp')->getAll();
		//include template
		$output['content'] = 'transfer/penerimaan.report.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
}
?>
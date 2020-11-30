<?php
class kantor_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('kantor'=>'kantor','list'=>'List kantor');
		
		//collect data
		$output['list_osp'] = $this->model('osp')->getAll();
		$output['list_propinsi'] = $this->model('propinsi')->getAll();
		
		//include template
		$output['content'] = 'kantor/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function getlist_by_osp_ajax()
	{
		if($this->getField('id_osp'))
		{
			$data = $this->model()->getListByOsp($this->getField('id_osp'));
			die(json_encode(array('success'=>true,'data'=>$data)));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));	
	}
	public function getmatch_ajax()
	{
		if($this->getField('kode_kantor'))
		{
			die(json_encode(array('success'=>true,'data'=>$this->model()->getmatch($this->getField('kode_kantor')))));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function add()
	{
		if($this->model()->add($this->getField()))
			die(json_encode(array('success'=>true)));
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function edit()
	{
		if($this->model()->edit($this->getField()))
			die(json_encode(array('success'=>true)));
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
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
		
		$aColumns = array( 'kode_kantor','osp_name','nama_propinsi','nama_kabupaten','nama_kantor','1');
		$sIndexColumn = "kode_kantor";
	
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
		$data = $this->model()->getPaging("SELECT * FROM view_kantor_listing $sWhere $sOrder",$limit_length,$limit_start);
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
			$output['aaData'][] = $row;
		}
		
		die(json_encode( $output ));
	}
}
?>
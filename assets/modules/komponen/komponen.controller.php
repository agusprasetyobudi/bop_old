<?php
class komponen_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('komponen'=>'Komponen Biaya','list'=>'List Komponen Biaya');
		
		//include template
		$output['content'] = 'komponen/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
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
		
		$aColumns = array( 'a.id', 'a.nama_komponen','a.read_only','total');
		$sIndexColumn = "a.id";
	
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
		$data = $this->model()->getPaging("SELECT a.id, a.nama_komponen,a.read_only,COUNT(b.id) as total FROM #__komponen a LEFT JOIN #__subkomponen b on a.id=b.id_komponen $sWhere GROUP BY a.id $sOrder ",$limit_length,$limit_start);
		$iFilteredTotal = count($data['list']);
	
		$iTotal = $data['count'];
	
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);
		$aColumns = array( 'id', 'nama_komponen','read_only','total');
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
	
	//sub komponen
	public function subkomponen()
	{
		$id_komponen = $this->getRequest(1);
		if(!empty($id_komponen))
		{
			//breaad crumb
			$output['breadcrumb'] = array('komponen'=>'Komponen Biaya','komponen/subkomponen/'.$id_komponen=>'Sub Komponen Biaya','list'=>'List Sub Komponen Biaya');
			
			//collect data
			$output['id_komponen'] = $id_komponen;
			
			//include template
			$output['content'] = 'komponen/list_subkomponen.html';
			$this->teil('template')->load('page');
			$this->teil('template')->render($output);
			exit;
		}
		redirect('komponen');
	}
	public function listing_subkomponen()
	{
		$id_komponen = $this->getRequest(1);
		$aColumns = array( 'a.id','b.nama_komponen','a.nama_subkomponen','a.p','a.a','a.k','1');
		$sIndexColumn = "a.id";
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
	
	
	
		$sWhere = "WHERE a.id_komponen='$id_komponen' ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "AND (";
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
		$data = $this->model()->getPaging("SELECT a.id,b.nama_komponen,a.nama_subkomponen,a.p,a.a,a.k,1 FROM #__subkomponen a INNER JOIN #__komponen b ON b.id=a.id_komponen $sWhere $sOrder",$limit_length,$limit_start);
		$iFilteredTotal = count($data['list']);
	
		$iTotal = $data['count'];
	
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iTotal,
			"aaData" => array()
		);
		$aColumns = array( 'id','nama_komponen','nama_subkomponen','p','a','k','1');
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
	public function subkomponen_add()
	{
		if($this->model()->subadd($this->getField()))
			die(json_encode(array('success'=>true)));
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function subkomponen_edit()
	{
		if($this->model()->subedit($this->getField()))
			die(json_encode(array('success'=>true)));
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function subkomponen_delete()
	{
		if($this->getField())
		{
			$this->model()->subdelete($this->getField('id'));
		}
	}
	public function subkomponen_akfitias_add()
	{
		if($this->getField())
		{
			if($this->model()->subkomponent_aktifitas_add($this->getField()))
			die(json_encode(array('success'=>true)));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function deletesubkomponenaktifitas()
	{
		if($this->getField('id'))
		{
			if($this->model()->subkomponent_aktifitas_delete($this->getField('id')))
			{
				die(json_encode(array('success'=>true,'message'=>'Please Check Your Input')));		
			}
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function getsubkomponen_by_komponen_ajax()
	{
		if($this->getField('id_komponen'))
		{
			$data = $this->model()->getlistby_komponen($this->getField('id_komponen'));
			die(json_encode(array('success'=>true,'data'=>$data)));		
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function readonly()
	{
		if($this->getField('id'))
		{
			$data = $this->model()->setReadOnly($this->getField('id'));
			die(json_encode(array('success'=>true)));		
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function ajax_get_match()
	{
		if($this->getField('id'))
		{
			$data = $this->model()->getMatch($this->getField('id'));
			die(json_encode(array('success'=>true,'data'=>$data)));
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
	public function ajax_set_sub_komp()
	{
		if($this->getField('ids') && $this->getField('mode'))
		{
			$arr = $this->model()->submatch($this->getField('ids'));
			$in[$this->getField('mode')] = abs($arr[$this->getField('mode')]-1);
			$in['id'] = $this->getField('ids');
			$this->model()->subedit($in);
		}
		die(json_encode(array('success'=>true)));
	}
}
?>
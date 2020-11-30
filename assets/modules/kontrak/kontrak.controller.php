<?php
class kontrak_controller extends CFControllers
{
    public
    function cfs()
    {
        parent::Boot();
    }
    public
    function index()
    {
        //breaad crumb
        $output['breadcrumb'] = array('kontrak'=>'Kontrak', 'list'=>'List Kontrak');
        // $this->model()->deleteSpace();
        //include template
        $output['content'] = 'kontrak/list.html';
        $this->teil('template')->load('page');
        $this->teil('template')->render($output);
    }
    public
    function add()
    {
		try {
			if ($this->getField())
			{
				$arr = $this->getField();
				$arr['tanggal_kontrak'] = strtotime($arr['tanggal_kontrak']);
				$arr['tanggal_kontrak_mulai'] = strtotime($arr['tanggal_kontrak_mulai']);
				$arr['tanggal_kontrak_akhir'] = strtotime($arr['tanggal_kontrak_akhir']);				
				$info = $arr['info'];
				unset($arr['info']);
				$updates = array();
				if ($this->model()->add($arr))
				{
					for ($i = 0; $i < count($info); $i++)
					{
						$temp = explode(']|[', $info[$i]);
						$fields = array();
						$fields['kode_kontrak'] = $arr['kode_kontrak'];
						$update = array();
						for ($j = 0; $j < count($temp); $j++)
						{
							$ss = explode('=', $temp[$j]);
							$fields[$ss[0]] = $ss[1];
							if($ss[0] == 'id_amandemen' && $ss[1] && $ss[1] != '')
							{
								$update[$ss[0]] = $ss[1];
							}
						}
						$this->model()->addItemKontrak($fields);
						if(sizeof($update)) {
							$update['id_item_kontrak'] = $this->model()->insert_id;
							$updates[$update['id_amandemen']] = $update;
						}
					}					
				}
				if($arr['id_tobedeleted']) {
					$id_tobedeleted = $arr['id_tobedeleted'];
					$id_tobedeleted = json_decode(str_replace('&#34;', '"', $id_tobedeleted), true);				
					for ($j = 0; $j < count($id_tobedeleted); $j++)
					{
						$id_item_kontrak = $id_tobedeleted[$j];
						if ($updates[$id_item_kontrak])
						{
							$this->model()->deleteSingleItemKontrak1($id_item_kontrak, $updates[$id_item_kontrak]);
						}
						else if ($id_item_kontrak)
						{
							$this->model()->deleteSingleItemKontrak($id_item_kontrak);
						}
					}					
				}
				die(json_encode(array('success'=>true)));
				//die(json_encode(array('success'=>false, 'message'=>'Please Check Your Input')));
			}		
		} catch (Exception $e) {
			die(json_encode(array('success'=>false, 'message'=>$e)));
		}
        //bread crumb
        $output['breadcrumb'] = array('kontrak'=>'Kontrak', 'kontrak/add'=>'Tambah Kontrak', 'list'=>'Form Kontrak');
        //collect data
        $output['list_osp'] = $this->model('osp')->getAll();
        $output['list_propinsi'] = $this->model('propinsi')->getAll();
        $output['list_komponen'] = $this->model('komponen')->getAll();
        //include template
        $output['content'] = 'kontrak/form.html';
        $this->teil('template')->load('page');
        $this->teil('template')->render($output);
    }
    public
    function edit()
    {
        $id = $this->getRequest(1);
        if ($this->getField())
        {
            $arr = $this->getField();
            $arr['tanggal_kontrak'] = strtotime($arr['tanggal_kontrak']);
            $arr['tanggal_kontrak_mulai'] = strtotime($arr['tanggal_kontrak_mulai']);
            $arr['tanggal_kontrak_akhir'] = strtotime($arr['tanggal_kontrak_akhir']);
            $info = $arr['info'];
            unset($arr['info']);
            if ($this->model()->edit($arr))
            {
                $this->model()->deleteItemKontrak($arr['kode_kontrak']);
                for ($i = 0; $i < count($info); $i++)
                {
                    $temp = explode(']|[', $info[$i]);
                    $fields = array();
                    $fields['kode_kontrak'] = $arr['kode_kontrak'];
                    for ($j = 0; $j < count($temp); $j++)
                    {
                        $ss = explode('=', $temp[$j]);
                        $fields[$ss[0]] = $ss[1];
                    }
                    $this->model()->addItemKontrak($fields);
                }
                die(json_encode(array('success'=>true)));
            }
            die(json_encode(array('success'=>false, 'message'=>'Please Check Your Input')));
        }
        if (!empty($id))
            $output = $this->model()->getMatch($id);
        else
            redirect('kontrak');
        //breaad crumb
        $output['breadcrumb'] = array('kontrak'=>'Kontrak', 'kontrak/edit'=>'Ubah Kontrak', 'list'=>'Form Kontrak');
        //collect data
        $output['list_osp'] = $this->model('osp')->getAll();
        $output['list_propinsi'] = $this->model('propinsi')->getAll();
        $output['list_komponen'] = $this->model('komponen')->getAll();
        $output['mode'] = 'edit';
        //include template
        $output['content'] = 'kontrak/form.html';
        $this->teil('template')->load('page');
        $this->teil('template')->render($output);
    }
    public
    function delete()
    {
        if ($this->getField('kode_kontrak'))
        {
            $this->model()->delete($this->getField('kode_kontrak'));
        }
    }
    public
    function deleteItemKontrak()
    {
        if ($this->getField('id_item_kontrak'))
        {
            $this->model()->deleteSingleItemKontrak($this->getField('id_item_kontrak'));
        }
    }
    public
    function listing()
    {
        $aColumns = array('a.kode_kontrak', 'DATE( FROM_UNIXTIME( a.tanggal_kontrak ))', 'DATE( FROM_UNIXTIME( a.tanggal_kontrak_mulai ))', 'DATE( FROM_UNIXTIME( a.tanggal_kontrak_akhir ))', '1');
        $sIndexColumn = "a.kode_kontrak";
        $limit_start = 0;
        $limit_length = 0;
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
        {
            $limit_start = intval($_GET['iDisplayStart']);
            $limit_length = intval($_GET['iDisplayLength']);
        }
        $sOrder = "";
        if (isset($_GET['iSortCol_0']))
        {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++)
            {
                if ($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == "true")
                {
                    $sOrder .= "".$aColumns[intval($_GET['iSortCol_'.$i])]." ".($_GET['sSortDir_'.$i] === 'asc' ? 'asc' : 'desc').", ";
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY")
            {
                $sOrder = "";
            }
        }
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "")
        {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++)
            {
                $sWhere .= "".$aColumns[$i]." LIKE '%".($_GET['sSearch'])."%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        for ($i = 0; $i < count($aColumns); $i++)
        {
            if (isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '')
            {
                if ($sWhere == "")
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
        $data = $this->model()->getPaging("SELECT a.kode_kontrak, DATE( FROM_UNIXTIME( a.tanggal_kontrak ) ) AS tanggal_kontrak, DATE( FROM_UNIXTIME( a.tanggal_kontrak_mulai ) ) AS tanggal_kontrak_mulai, DATE( FROM_UNIXTIME( a.tanggal_kontrak_akhir ) ) AS tanggal_kontrak_akhir,1 FROM #__kontrak a $sWhere $sOrder", $limit_length, $limit_start);
        $iFilteredTotal = count($data['list']);
        $iTotal = $data['count'];
        $output = array(
            "sEcho"=>intval($_GET['sEcho']),
            "iTotalRecords"=>$iTotal,
            "iTotalDisplayRecords"=>$iTotal,
            "aaData"=>array()
        );
        $aColumns = array('kode_kontrak', 'tanggal_kontrak', 'tanggal_kontrak_mulai', 'tanggal_kontrak_akhir', '1');
        for ($i = 0; $i < count($data['list']); $i++)
        {
            $aRow = $data['list'][$i];
            $row = array();
            for ($j = 0; $j < count($aColumns); $j++)
            {
                $row[] = $aRow[$aColumns[$j]];
            }
            $output['aaData'][] = $row;
        }
        die(json_encode($output));
    }
    public
    function getkontrak_rekap_bukti_transfer_ajax_list()
    {
        $aColumns = array('a.kode_kontrak', 'b.nama_aktifitas', 'FORMAT(a.nominal,0)', 'a.dari', 'a.ke', 'a.id');
        $sIndexColumn = "a.kode_kontrak";
        $limit_start = 0;
        $limit_length = 0;
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
        {
            $limit_start = intval($_GET['iDisplayStart']);
            $limit_length = intval($_GET['iDisplayLength']);
        }
        $sOrder = "";
        if (isset($_GET['iSortCol_0']))
        {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++)
            {
                if ($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == "true")
                {
                    $sOrder .= "".$aColumns[intval($_GET['iSortCol_'.$i])]." ".($_GET['sSortDir_'.$i] === 'asc' ? 'asc' : 'desc').", ";
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY")
            {
                $sOrder = "";
            }
        }
        $_GET['kode_kantor'] = isset($_GET['kode_kantor']) ? $_GET['kode_kantor'] : '';
        $_GET['id_aktifitas'] = isset($_GET['id_aktifitas']) ? $_GET['id_aktifitas'] : '';
        $_GET['id_subkomponen'] = isset($_GET['id_subkomponen']) ? $_GET['id_subkomponen'] : '';
        $_GET['periode_date'] = isset($_GET['periode_date']) ? $_GET['periode_date'] : '';
        $sWhere = "WHERE ((a.start_periode IS NULL AND a.finish_periode IS NULL) OR (a.start_periode IS NOT NULL AND a.finish_periode IS NOT NULL AND year(a.start_periode) <= year('$_GET[periode_date]') AND month(a.start_periode) <= month('$_GET[periode_date]') AND year(a.finish_periode) >= year('$_GET[periode_date]') AND month(a.finish_periode) >= month('$_GET[periode_date]'))) AND (a.amandemen_flg <> '1' OR a.amandemen_flg IS NULL) AND a.kode_kantor = '$_GET[kode_kantor]' AND b.id='$_GET[id_aktifitas]' AND c.id_subkomponen='$_GET[id_subkomponen]'";
        /*if(cfSession('bop_last.id_group')==3)
		{
			$pref = substr(cfSession('bop_last.id_kantor'),0,1);
			if(strtolower($pref)=='k')
			{
				$sWhere .= " AND a.kode_kantor IN (SELECT kode_kantor FROM #__kantor WHERE id_osp='".cfSession('bop_last.id_kantor')."') ";
			}
		}*/
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "")
        {
            $sWhere .= "AND (";
            for ($i = 0; $i < count($aColumns); $i++)
            {
                $sWhere .= "".$aColumns[$i]." LIKE '%".($_GET['sSearch'])."%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        for ($i = 0; $i < count($aColumns); $i++)
        {
            if (isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '')
            {
                if ($sWhere == "")
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
        $data = $this->model()->getPaging("SELECT a.kode_kontrak,b.nama_aktifitas,FORMAT(a.nominal,0) nominal,a.dari,a.ke,a.id FROM `tc_item_kontrak` a INNER JOIN tc_subkomponen_aktifitas c ON c.id=a.id_aktifitas INNER JOIN tc_aktifitas b ON b.id=c.id_aktifitas $sWhere $sOrder", $limit_length, $limit_start);
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump("SELECT a.kode_kontrak,b.nama_aktifitas,FORMAT(a.nominal,0) nominal,a.dari,a.ke,a.id FROM `tc_item_kontrak` a INNER JOIN tc_subkomponen_aktifitas c ON c.id=a.id_aktifitas INNER JOIN tc_aktifitas b ON b.id=c.id_aktifitas $sWhere $sOrder", $limit_length, $limit_start);
        $iFilteredTotal = count($data['list']);
        $iTotal = $data['count'];
        $output = array(
            "sEcho"=>intval($_GET['sEcho']),
            "iTotalRecords"=>$iTotal,
            "iTotalDisplayRecords"=>$iTotal,
            "aaData"=>array()
        );
        $aColumns = array('kode_kontrak', 'nama_aktifitas', 'nominal', 'dari', 'ke', 'id');
        for ($i = 0; $i < count($data['list']); $i++)
        {
            $aRow = $data['list'][$i];
            $row = array();
            for ($j = 0; $j < count($aColumns); $j++)
            {
                $row[] = $aRow[$aColumns[$j]];
            }
            $output['aaData'][] = $row;
        }
        die(json_encode($output));
    }
}?>

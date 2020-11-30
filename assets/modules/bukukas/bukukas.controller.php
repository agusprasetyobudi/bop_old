<?php
class bukukas_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		//breaad crumb
		$output['breadcrumb'] = array('bukubank'=>'Buku Bank','list'=>'List Data Buku Bank');
		
		//include template
		$output['list'] = $this->model()->getlist();
		$item = '';
		$total = 0;
		$list = array();
		for($i=0;$i<count($output['list']);$i++)
		{
			if($item!=$output['list'][$i]['id_item_transfer'])
			{
				$item = $output['list'][$i]['id_item_transfer'];
				$total = $output['list'][$i]['jumlah'];
			}
			else
			{
				$total = $total-$output['list'][$i]['total'];
				$output['list'][$i]['jumlah'] = $total;
			}
			$output['list'][$i]['uraian'] = $this->model('transfer')->getItemTransferByIdItemTransfer($output['list'][$i]['id_item_transfer']);
			$output['list'][$i]['firm'] = $this->model('firm')->getMatch($output['list'][$i]['no_bukti_transfer']);
		}
		$output['content'] = 'bukukas/list.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function add()
	{
		$search = $this->getField('search');
		if($this->getField() && $search==1)
		{
			$output['listing_oj'] = array();
			$output['listing_omax'] = array();
			$periode_bulan = $this->getField('periode_bulan');
			$periode_tahun = $this->getField('periode_tahun');
			$output['periode_bulan'] = $periode_bulan;
			$output['periode_tahun'] = $periode_tahun;
			$output['firm_list'] = $this->model()->getFirmByPeriode($periode_bulan,$periode_tahun);
			for($i=0;$i<count($output['firm_list']);$i++)
			{
				$output['firm_list'][$i]['periode_bulan_label'] = $this->model('firm')->getMonth($output['firm_list'][$i]['periode_bulan']);
				$output['firm_list'][$i]['transfer_list'] = $this->model()->getTransfer($output['firm_list'][$i]['no_bukti']);
				$transfer_list = $output['firm_list'][$i]['transfer_list'];
				for($j=0;$j<count($transfer_list);$j++)
				{
					$output['firm_list'][$i]['transfer_list'][$j]['items'] = $this->model('transfer')->getItemTransferByKodeTransfer($transfer_list[$j]['id']);
					
					for($k=0;$k<count($output['firm_list'][$i]['transfer_list'][$j]['items']);$k++)
					{
						$output['firm_list'][$i]['transfer_list'][$j]['items'][$k]['no_bukti'] = $output['firm_list'][$i]['no_bukti'];
						
						$output['firm_list'][$i]['transfer_list'][$j]['items'][$k]['t_debet'] = $this->model()->transaksiDebet($output['firm_list'][$i]['transfer_list'][$j]['items'][$k]['id']);
						$total = $this->model()->tDebetSum($output['firm_list'][$i]['transfer_list'][$j]['items'][$k]['id']);
						$jumlah = str_replace(',','',$output['firm_list'][$i]['transfer_list'][$j]['items'][$k]['jumlah']);						
						if(($total['total']<$jumlah))
						{
							$output['listing_oj'][] = $output['firm_list'][$i]['transfer_list'][$j]['items'][$k];
							$output['listing_omax'][] = $jumlah-$total['total'];
						}
					}
				}
			}

		}
		//breaad crumb
		$output['breadcrumb'] = array('bukubank'=>'Buku Kas','add'=>'Tambah Data');
		$output['kantor'] = $this->model('kantor')->getmatch(CfSession('bop_last.id_kantor'));
		$output['kabupaten'] = $this->model('kabupaten')->getMatch($output['kantor']['id_kabupaten']);
		//include template
		$output['list_prop'] = $this->model('propinsi')->getAll();
		for($i=1;$i<=12;$i++)
		{
			$output['list_month'][] = $this->model('firm')->getMonth($i);
		}
		$output['content'] = 'bukukas/form.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function report()
	{
		//breaad crumb
		$output['breadcrumb'] = array('bukubank'=>'Buku Bank','list'=>'Report');
		
		//include template
		$output['list_prop'] = $this->model('propinsi')->getAll();
		for($i=1;$i<=12;$i++)
		{
			$output['list_month'][] = $this->model('firm')->getMonth($i);
		}
		$output['content'] = 'bukubank/report.html';
		$this->teil('template')->load('page');
		$this->teil('template')->render($output);
	}
	public function save()
	{
		if($this->getField())
		{
			$in['total'] = str_replace(',','',$this->getField('total'));
			$in['tanggal'] = strtotime($this->getField('tanggal'));
			$in['id_item_transfer'] = $this->getField('id_item_transfer');
			$in['no_bukti'] = $this->getField('no_bukti');
			if($this->model()->save($in))
			{
				die(json_encode(array('success'=>true)));
			}
		}
		die(json_encode(array('success'=>false,'message'=>'Please Check Your Input')));
	}
}
?>
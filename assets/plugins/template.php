<?php
class teil_template extends CFModels
{
	private $loader;
	private $twig;
	private $loaders;
	public function run()
	{
		
	}
	public function cfs()
	{
		parent::Boot();
	}
	public function load($file)
	{
		require_once(getCFSetting('library_dir').'Twig/Autoloader.php');
		$file .= ".".getCFSetting('SYS_TEMPLATE_EXTENSION');
		Twig_Autoloader::register();
		$this->loader = new Twig_Loader_Filesystem(getCFSetting('themes'));
		$reload = getCFSetting('development');
		$this->twig = new Twig_Environment($this->loader, array('cache' =>getCFSetting('SYS_TEMPLATES_COMPATH'),'auto_reload'=>$reload));
		#setting function to load

		$func = get_defined_functions();
		if(isset($func['user']))
		{
			for($i=0;$i<count($func['user']);$i++)
			{
				$this->twig->addFunction(strtoupper($func['user'][$i]), new Twig_Function_Function($func['user'][$i]));	
			}
		}
		$this->loaders = $this->twig->loadTemplate($file);
	}
	public function render($arr=array(),$mode='attach')
	{
		$arr['__SETTINGS'] = GetAllSetting();
		$arr['__REQUEST']  = $_REQUEST['CFRequest'];
		if(isset($arr['content_tpl']))
		$arr['content_tpl'] = basename(getCFSetting('application')).'/'.strtolower($arr['__REQUEST']['object']).'/'.$arr['content_tpl'];
		$arr['__SESSION']  = isset($_SESSION)?$_SESSION:array();
		if($mode=='attach')
			die($this->loaders->render($arr));
		elseif($mode=='fetch');
			return $this->loaders->render($arr);
	}
	public function sliding($total,$perpage,$delta,$parameter)
	{
		$params = array(
            'separator'  => ',',
            'spacesBeforeSeparator' => 0,
            'spacesAfterSeparator'  => 3,
            'perPage'    => $perpage,
            'delta'      => $delta,
            'urlVar'     => $parameter,
            'altPrev'    => 'Pagina precedente',
            'altNext'    => 'Pagina successiva',
            'altPage'    => 'pagina n.',
            'linkClass'  => 'myClass',
            'firstPagePre'  => '',
            'firstPagePost' => '',
            'lastPagePre'   => '{',
            'lastPagePost'  => '}',
            'totalItems'   => $total
            );
		require_once(getCFSetting('library_dir').'sliding.php');
		$pager = &new Pager_Sliding($params);
		$data  = $pager->getPageData();
		$links = $pager->getLinks();
		return $links;
	}
	public function getMonth($key='')
	{
		$arr_month = array(
		1=>'Januari',
		2=>'Februari',
		3=>'Maret',
		4=>'April',
		5=>'Mei',
		6=>'Juni',
		7=>'Juli',
		8=>'Agustus',
		9=>'September',
		10=>'Oktober',
		11=>'November',
		12=>'Desember');
		if(empty($key))
		{
			return $arr_month;
		}
		
		return $arr_month[$key];
	}
	public function getField($key,$mode='')
	{
		$field = array(
			'periode_bulan'=>'Periode Bulan',
			'periode_tahun'=>'Periode Tahun',
			'id'=>'No', 
			'no_bukti_transfer'=>'No Bukti Transfer', 
			"tanggal"=>'Tanggal', 
			'nama_penerima'=>'Nama Penerima', 
			'jabatan'=>'Jabatan',
			'bank_penerima'=>'Bank Penerima',
			'no_rek_penerima'=>'No Rek Penerima',
			'jumlah'=>'Jumlah',
			'item_dikontrak'=>'Item Dikontrak',
			'OSA_kode' =>'OSA Kode',
			'OSA_total_sub'=>'OSA total',
			'OSA_periode_bulan_sub'=>'Periode Bulan OSA',
			'OSA_periode_tahun_sub'=>'Periode Tahun OSA',
			'Transport_kode'=>'Transport Kode',
			'Transport_total_sub'=>'Transport Total',
			'Transport_periode_bulan_sub'=>'Periode Bulan Transport',
			'Transport_periode_tahun_sub'=>'Periode Tahun Transport',
			'InLandTransport_kode' =>'In Land Transport Kode',
			'InLandTransport_total_sub'=>'In Land Transport Total',
			'InLandTransport_periode_bulan_sub'=>'Periode Bulan In Land Transport',
			'InLandTransport_periode_tahun_sub'=>'Periode Tahun In Land Transport',
			'Accommodation__kode'=>'Accommodation Kode',
			'Accommodation__total_sub'=>'Accommodation Total',
			'Accommodation__periode_bulan_sub' => 'Periode Bulan Accommodation',
			'Accommodation__periode_tahun_sub' => 'Periode Tahun Accommodation',
			'OfficeRunningCost__kode' => 'Office Running Cost Kode',
			'OfficeRunningCost__total_sub' =>'Office Running Cost Total',
			'OfficeRunningCost__periode_bulan_sub'=> 'Periode Bulan Office Running Cost',
			'OfficeRunningCost__periode_tahun_sub'=> 'Periode Tahun Office Running Cost',
			'OfficeSupplyConsumable__kode' => 'Office Supply Consumable Kode',
			'OfficeSupplyConsumable__total_sub' => 'Office Supply Consumable Total',
			'OfficeSupplyConsumable__periode_bulan_sub' => 'Periode Bulan Office Supply Consumable',
			'OfficeSupplyConsumable__periode_tahun_sub' => 'Peridode Tahun Office Supply Consumable',
			'CommunicationCost__kode'=> 'Communication Cost Kode',
			'CommunicationCost__total_sub'=>'Communication Cost Total',
			'CommunicationCost__periode_bulan_sub'=>'Periode Bulan Communication Cost',
			'CommunicationCost__periode_tahun_sub'=>'Periode Tahun Communication Cost',
			'LaptopNotebook__kode' => 'Laptop Notebook Kode',
			'LaptopNotebook__total_sub' => 'Laptop Total',
			'LaptopNotebook__periode_bulan_sub' => 'Periode Bulan Laptop Notebook',
			'LaptopNotebook__periode_tahun_sub' => 'Periode Tahun Laptop Notebook',
			'DesktoopComputer__kode'=>'Desktoop Computer Kode',
			'DesktoopComputer__total_sub'=>'Desktoop Computer Total',
			'DesktoopComputer__periode_bulan_sub'=>'Periode Bulan Desktoop Computer',
			'DesktoopComputer__periode_tahun_sub'=>'Periode Tahun Desktoop Computer',
			'PrintLaserJet__kode'=>'PrintLaserJet kode',
			'PrintLaserJet__total_sub'=>'PrintLaserJet Total',
			'PrintLaserJet__periode_bulan_sub'=>'Periode Bulan PrintLaserJet',
			'PrintLaserJet__periode_tahun_sub'=>'Periode Tahun PrintLaserJet',
			'Scanner__kode'=>'Scanner Kode',
			'Scanner__total_sub'=>'Scanner Total',
			'Scanner__periode_bulan_sub'=>'Periode Bulan Scanner',
			'Scanner__periode_tahun_sub'=>'Periode Tahun Scanner',
			'OfficeSpace__kode'=>'OfficeSpace Kode',
			'OfficeSpace__total_sub'=>'OfficeSpace Total',
			'OfficeSpace__periode_bulan_sub'=>'Periode Bulan OfficeSpace',
			'OfficeSpace__periode_tahun_sub'=>'Periode Tahun OfficeSpace',
			'Vehicle__kode'=>'Vehicle Kode',
			'Vehicle__total_sub'=>'Vehicle Total',
			'Vehicle__periode_bulan_sub'=>'Periode Bulan Vehicle',
			'Vehicle__periode_tahun_sub'=>'Periode Tahun Vehicle',
			'Motorcycle__kode'=>'Motorcycle Kode',
			'Motorcycle__total_sub'=>'Motorcycle Total',
			'Motorcycle__periode_bulan_sub'=>'Periode Bulan Motorcycle',
			'Motorcycle__periode_tahun_sub'=>'Periode Tahun Motorcycle'
			);
		if($mode=='AllKey')
		{
			return array_keys($field);
		}
		if(array_key_exists($key,$field))
			return $field[$key];
		else
			return '';
	}
	public function subkomponen($key)
	{
		//same rate
		//$subkomponent[1][]=
		//different rate
		//1.CB ACTIVITY FOR ASKOT 2.COORDINATION MEETING TO JAKARTA 3.SPECIAL EVENT FROM KABUPATEN 4.SPOT CHECK KOTA KABUPATEN FOR KORKOT
		$subkomponent[1][1]	='COORDINATION/SUPERVISION PD TO OTHER PROVINCE';
		$subkomponent[1][2]	='EGM TO JAKARTA  FOR TENAGA AHLI';
		$subkomponent[1][4]	='COORDINATION MEETING TO JAKARTA  (by request)';
		$subkomponent[1][5]	='SEVERAL TRAINING TO JAKARTA BY REQUEST';
		$subkomponent[1][7]	='SPOOTCHECK KOTA/KAB FOR KORKOT & ASKOT IN THE CITY';
		$subkomponent[1][15]='FROM OSP LEVEL TO KAB/KOTA';
		
		$subkomponent[2][1]='SPOTCHECK PROVINCE TO KELURAHAN';
		$subkomponent[2][3]='CB ACTIVITY ASKOT TO FASKEL';
		$subkomponent[2][6]='SEVERAL TRAINING & SPECIAL EVENT FROM KABUPATEN';
		$subkomponent[2][7]='SPOTCHECK KOTA/KAB FOR ASS. CITY COORDINATOR INFRA AND FM - OUT OF TOWN';
		$subkomponent[2][12]='FROM KAB/KOTA TO TL OFFICE FOR COORDINATION MEETING';
		$subkomponent[2][13]='FROM PROVINCE TO REGIONAL FOR WORKSHOP & COORDINATION MEETING AT OSP';
		$subkomponent[2][14]='FROM TL TO KAB/KOTA FOR COORDINATION MEETING';
/*		$subkomponent[2][3]='FOR TRAINING ON OSP CONSOLIDATION';
		$subkomponent[2][4]='SPECIAL EVENT BY REQUEST';
		$subkomponent[2][5]='FROM KAB/KOTA TO TL OFFICE FOR COORDIANTION MEETING';
		$subkomponent[2][6]='FROM PROVINCE TO REGIONAL FOR WORKSHOP & COORDINATION MEETING AT OC';
		$subkomponent[2][7]='FROM PROVINCE TO REGIONAL FOR WORKSHOP & COORDINATION MEETING AT OSP';
		$subkomponent[2][8]='SPOOTCHECK KOTA/KAB FOR ASS. CITY COORDINATOR INFRA AND FM';
		$subkomponent[2][9]='SPOOTCHECK KOTA/KAB FOR ASS. CITY COORDINATOR INFRA AND FM - OUT OF TOWN';
		$subkomponent[2][10]='FOR SEVERAL TRAINING & SPECIAL EVENT';*/
		
		//office operational expenses
		$subkomponent[3][1] = 'Office Running Cost';
		$subkomponent[3][2] = 'Office Consumable & supply';
		$subkomponent[3][3] = 'Communication Cost';
		
		//office equiment expenses
		$subkomponent[4][1] = 'Desktop Computer';
		$subkomponent[4][2] = 'Laptop/Notebook';
		$subkomponent[4][3] = 'Printer Laser Jet';
		$subkomponent[4][4] = 'Printer Color A3';
		$subkomponent[4][5] = 'Digital Camera 6.GPS tools';
		$subkomponent[4][6] = 'GPS tools';
		$subkomponent[4][7] = 'LCD Projector';
		$subkomponent[4][8] = 'Scanner';
		$subkomponent[4][9] = 'Equipment Maintenance (Include existing equipment)';
		
		//rental expenses
		$subkomponent[5]['BBM'] = 'BBM';
		$subkomponent[5]['BBM-O&M'] = 'BBM-O&M';
		$subkomponent[5]['BBM-Supir'] = 'BBM-Supir';
		$subkomponent[5]['BBM-Supir-O&M'] = 'BBM-Supir-O&M';
		$subkomponent[5]['Kendaraan'] = 'Kendaraan';
		$subkomponent[5]['Kendaraan-BBM'] = 'Kendaraan-BBM';
		$subkomponent[5]['Kendaraan-BBM-O&M'] = 'Kendaraan-BBM-O&M';
		$subkomponent[5]['Kendaraan-BBM-Supir'] = 'Kendaraan-BBM-Supir';
		$subkomponent[5]['Kendaraan-BBM-Supir-O&M'] = 'Kendaraan-BBM-Supir-O&M';
		$subkomponent[5]['Kendaraan-O&M'] = 'Kendaraan-O&M';
		$subkomponent[5]['Kendaraan-Supir'] = 'Kendaraan-Supir';
		$subkomponent[5]['Kendaraan-Supir-O&M'] = 'Kendaraan-Supir-O&M';
		$subkomponent[5]['O&M'] = 'O&M';
		$subkomponent[5]['Supir'] = 'Supir';
		$subkomponent[5]['Supir-O&M'] = 'Supir-O&M';
		
		
		
		
		return isset($subkomponent[$key]) ? $subkomponent[$key] : array();
	}
}
?>
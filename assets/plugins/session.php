<?php
class teil_session extends CFModels
{
	public function cfs()
	{
		parent::Boot();
	}
	public function run()
	{
		$this->checkCookie();
		if($_REQUEST['CFRequest']['object']!='oauth' && !isset($_SESSION['bop_last']['id']))
		{
			redirect('oauth');
		}
		elseif($_REQUEST['CFRequest']['object']=='oauth' && isset($_SESSION['bop_last']['id']))
		{
			redirect('');
		}
		$this->checkPrevillage();
	}
	private function checkPrevillage()
	{
		if(isset($_SESSION['bop_last']['id']))
		{
			$data = $this->_Get("SELECT a.*,b.module_name,b.path FROM #__module_previllage a INNER JOIN tc_module b ON a.id_module=b.id  WHERE a.id_group_pengguna='".$_SESSION['bop_last']['id_group']."'");
			$output = array();
			for($i=0;$i<count($data);$i++)
			{
				$output[$data[$i]['path']] = $data[$i];
			}
			$_SESSION['bop_last']['prev'] = $output;
		}
	}
	private function checkCookie()
	{
		if(isset($_COOKIE['bop_last']) && !empty($_COOKIE['bop_last']))
		$_SESSION['bop_last'] = unserialize(unobfuscate_link($_COOKIE['bop_last']));
	}
	public function setSession($data)
	{
		$_SESSION['bop_last'] = $data;
	}
	public function setCookie($data)
	{
		setcookie("bop_last",obfuscate_link(serialize($data)),time()+3600);
	}
	public function unsetSession()
	{
		unset($_SESSION['bop_last']);
		unset($_COOKIE['bop_last']);
		setcookie("bop_last",'',time()-3600);
		session_destroy();
	}
}
?>
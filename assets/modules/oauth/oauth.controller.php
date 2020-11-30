<?php
class oauth_controller extends CFControllers
{
	public function cfs()
	{
		parent::Boot();
	}
	public function index()
	{
		$this->teil('template')->load('login');
		$this->teil('template')->render();
	}
	public function auth()
	{ 
		if($this->getField('username') && $this->getField('pass'))
		{			
			$arr = $this->model()->getUser($this->getField('username'),$this->getField('pass'));
			var_dump($arr);
			if(isset($arr['id']))
			{
				$this->teil('session')->setSession($arr);
				if($this->getField('remember'))
				{
					$this->teil('session')->setCookie($arr);
				}
				redirect(''); 
			}
		}
	} 
	public function signout()
	{
		$this->teil('session')->unsetSession();
		redirect('oauth');
	}
}
?>
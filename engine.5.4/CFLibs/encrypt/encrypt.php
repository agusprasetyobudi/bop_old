<?php
class CFBiblio_encrypt
{
    private static $cypher = 'blowfish';
    private static $mode   = 'cfb';
    private  $key    = '1a2s3d4f5g6h';
	public static function getInstance() 
	{
		#set class instance
		$class = __CLASS__;
		return new $class();
    }
	public function setParams($params=array())
	{
		if(count($params)>0)
		{
			foreach($params as $key=>$value)
			{
				$this->$key = $value;
			}
		}
	}
    public function encrypt($plaintext)
    {
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->key), $plaintext, MCRYPT_MODE_CBC, md5(md5($this->key))));
		return $encrypted;
    }
    public function decrypt($crypttext)
    {
       $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->key), base64_decode($crypttext), MCRYPT_MODE_CBC, md5(md5($this->key))), "\0");
	   return $decrypted;
    }
}
// Encrypt text
//$encrypted_text = Encryption::encrypt('this text is unencrypted');
// Decrypt text
//$decrypted_text = Encryption::decrypt($encrypted_text);
?>
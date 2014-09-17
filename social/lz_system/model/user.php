<?php
class LZ_User extends LZ_Model
{
	function LZ_User()
	{
		$this->table = LZ_MYSQL_PREFIX.'user';
		$this->id = 'user_id';
		$this->order_id = 'user_id';
	}
	
	function exists($name)
	{
		return parent::exists( array('name'=>$name));
	}
	
	function check_password($name,$password)
	{
		return parent::get_one( array('name'=>$name,'password'=>$password));
	}
	
	function get_array()
	{
		$arr = $this->get_list();
		$re = array();
		foreach($arr as $user)
		{
			$re[$user[$this->id]] = $user['name'];
		}
		return $re;
	}
}
?>
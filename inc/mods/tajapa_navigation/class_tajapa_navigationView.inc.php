<?
class tajapa_navigation_view extends modView 
{
	var $mod_name = 'tajapa_navigation';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		switch(strtolower($method_name)) 
		{
			case 'market':					$this->market();							break;
			case 'tajapa_navigation':			
			default:						$this->tajapa_navigation();					break;
		}
	}
	/**
	*	create a marketplace related navigation
	*/
	function market()
	{
		if($this->CLIENT->usr['is_default'])
		{
			echo '
			<li '.($this->OPC->pid()==4?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>4)).'">'.e::o('home').'</a></li>
			<li><a href="#" style="color:#999">'.e::o('my_requests').'</a></li>
			<li><a href="#" style="color:#999">'.e::o('my_offers').'</a></li>
			<li><a href="#" style="color:#999">'.e::o('my_transactions').'</a></li>
			<li><a href="#" style="color:#999">'.e::o('my_messages').'</a></li>
			<li '.($this->OPC->pid()==8?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>8)).'" style="color:#F00">'.e::o('register').'</a></li>
			';
		}
		else
		{
			echo '
			<li '.($this->OPC->pid()==4?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>4)).'">'.e::o('home').'</a></li>
			<li '.($this->OPC->pid()==5?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>5)).'">'.e::o('my_requests').'</a></li>
			<li '.($this->OPC->pid()==6?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>6)).'">'.e::o('my_offers').'</a></li>
			<li '.($this->OPC->pid()==7?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>7)).'">'.e::o('my_transactions').'</a></li>
			<li '.($this->OPC->pid()==9?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>9)).'">'.e::o('my_messages').'</a></li>
			';
		}
	}
	/**
	*	start here to learn how to work with contrails
	*/
	function tajapa_navigation()
	{
		echo '
		<li '.($this->OPC->pid()==1?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>1)).'">'.e::o('home').'</a></li>
		<li '.($this->OPC->pid()==2?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>2)).'">'.e::o('open').'</a></li>
		<li '.($this->OPC->pid()==3?'class="active"':'').'><a href="'.$this->OPC->lnk(array('pid'=>3)).'">'.e::o('find').'</a></li>
		';
	}
}
?>

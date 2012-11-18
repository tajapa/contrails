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
		
	}
	/**
	*	start here to learn how to work with contrails
	*/
	function tajapa_navigation()
	{
		echo '
		<li><a href="'.$this->OPC->lnk(array('pid'=>2)).'">Open</a></li>
		<li><a href="'.$this->OPC->lnk(array('pid'=>3)).'">Find</a></li>
		';
	}
}
?>

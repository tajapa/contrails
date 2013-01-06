<?

class tajapa_user
{
	/**
	*	show a short summary of the user (one line)
	*	with 
	*		- number of successful requests/offers
	*		- overall activity 
	*		- rating
	*		- number of comments
	*		- link to open the overview
	*/
	function short($uid,$subject=null)
	{
		if($uid == CONF::guest())
		{
			return;
		}
		// get the model
		$m = &MF::singleton();
		$u = $m->obtain('mod_usradmin_usr',$uid);
		// get the rank for this user
		$db = &DB::singleton();
		$r = $db->query("SELECT AVG(stars), COUNT(stars) FROM tajapa_rank WHERE uid_to = ".$uid);
		$mc = &MC::singleton();
		$lnk = $mc->call('tajapa_messaging','lnk',array('to'=>$u->usr(),'subject'=>$subject));
		return '<a href="'.$lnk.'">'.$u->usr()." [ ".round($r->f('AVG(stars)'))." stars from ".$r->f('COUNT(stars)')." activities ]</a>";
	}
}

?>
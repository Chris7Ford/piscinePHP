<?php
class UnholyFactory
{
	private $_arr = array();

	public function absorb($fighter)
	{
		$fighter = get_class($fighter);
		if (!in_array($fighter, $this->_arr) && get_parent_class($fighter) == "Fighter")
		{
			echo "(Factory absorbed a fighter of type ".$fighter.")".PHP_EOL;
			$this->_arr[] = $fighter->show_name();
		}
		else if (in_array($fighter, $this->_arr))
		{
			echo "(Factor already absorbed a fighter of type ".$fighter.")".PHP_EOL;
		}
		else
		{
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
		}
	}

	public function fabricate($elem)
	{
		var_dump($elem);
		echo "\n";
		var_dump($this->_arr);
		echo "\n";
		echo "\n";
		echo "\n";
		if (in_array(strtolower($elem), $this->_arr))
		{
			echo "(Factory fabricates a fighter of type ".$elem.")".PHP_EOL;
			return ($elem);
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type ".$elem.")".PHP_EOL;
			return (null);
		}
	}
}
?>

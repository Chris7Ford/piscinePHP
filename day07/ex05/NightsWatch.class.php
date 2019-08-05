<?php

include_once "IFighter.class.php";

class NightsWatch
{
	private $_fighters = array();
	public function recruit($char)
	{
			$this->_fighters[] = $char;
	}
	public function fight()
	{
		foreach ($this->_fighters as $char)
			if ($char instanceof IFighter)
				$char->fight();
	}
}
?>

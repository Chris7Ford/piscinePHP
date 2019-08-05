<?php

class Fighter
{
	protected $name;
	public function __construct($fighter)
	{
		$this->name = $fighter;
	}
	protected function show_name()
	{
		return ($this->name);
	}
}
?>

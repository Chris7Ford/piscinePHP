<?php

class Color {

	public $red;
	public $green;
	public $blue;
	static $verbose = false;
	static function doc()
	{
		$fd = fopen("Color.doc.txt", "r");
		echo fread($fd, filesize("Color.doc.txt"));
		fclose($fd);
	}
	public function __construct ($color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (isset($color['rgb']))
		{
			$this->red = intval($color['rgb'] & 16711680) / 256 / 256;
			$this->green = intval($color['rgb'] & 65280) / 256;
			$this->blue = intval($color['rgb'] & 255);
		}
		if (self::$verbose)
		{
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.".PHP_EOL, $this->red, $this->green, $this->blue);
		}
	}

	public function __destruct()
	{
		if (self::$verbose)
		{
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.".PHP_EOL, $this->red, $this->green, $this->blue);
		}
		
	}

	public function add($color)
	{
		return (new Color(array( 'red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
	}

	public function sub($color)
	{
		return (new Color(array( 'red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue)));
	}

	public function mult($num)
	{
		return (new Color(array( 'red' => $this->red * $num, 'green' => $this->green * $num, 'blue' => $this->blue * $num)));
	}

	public function __toString()
	{
		return (sprintf( "Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}
}

?>

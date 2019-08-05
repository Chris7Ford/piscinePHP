<?php

require_once 'Color.class.php';

class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = false;
	static function doc()
	{
		$fd = fopen("Vertex.doc.txt", "r");
		echo fread($fd, filesize("Vertex.doc.txt"));
		fclose($fd);
	}
	public function __construct ($data)
	{
		if (isset($data['x']) && isset($data['y']) && isset($data['z']))
		{
			$this->_x = $data['x'];
			$this->_y = $data['y'];
			$this->_z = $data['z'];
		}
		if (isset($data['w']))
			$this->_w = $data['w'];
		else
			$this->_w = 1;
		if (isset($data['color']))
			$this->_color = $data['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose)
		{
			printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed".PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	public function __destruct()
	{
		if (self::$verbose)
		{
			printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed".PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	public function __toString()
	{
		if (self::$verbose)
			return (sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
			return (sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f )", $this->_x, $this->_y, $this->_z, $this->_w));

	}
}
?>

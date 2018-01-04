<?php
/**
* Libreria para cargar CSS y JavaScript en las paginas
*/
class Resources
{
	protected $ci;
	protected $path		= 'assets/';
	protected $css_files	= [];
	protected $js_files		= [];
	
	function __construct($params = [])
	{
		$this->ci =& get_instance();

		if (count($params) > 0) {
			$this->initialize($params);
		}
	}

	public function initialize($params = [])
	{
		$this->ci->load->helper('url');
		$this->ci->load->helper('html');

		foreach ($params as $name => $value) {
			if (isset($this->$name)) {
				$this->$name = $value;
			}
		}
	}

	public function css()
	{
		$content = NULL;

		foreach ($this->css_files as $name => $value) {
			$content .= '<!-- '.$name.' --> '.link_tag($this->path . $value . '.css');
		}
		return $content;
	}

	public function js()
	{
		$content = NULL;

		foreach ($this->js_files as $name => $value) {
			$content .= "\r\n".' <!-- '.$name.' --> <script src="' . base_url() . $this->path . $value . '.js"></script>';
		}
		return $content."\r\n";
	}
}
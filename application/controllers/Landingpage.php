<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

	public function index()
	{
		$this->template->load('template/layout_landingpage', 'landingpage/index');
	}
}
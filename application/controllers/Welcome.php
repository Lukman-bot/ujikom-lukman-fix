<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mod_welcome', 'MW');
	}

	public function index()
	{
		$data = [
			'title'			=> 'HotelAYO!',
			'datakamar'		=> $this->MW->getDataKamar()->result(),
			'datafasilitas'	=> $this->MW->getDataFasilitas()->result()
		];
		$this->template->load('Users/Template', 'Users/Dashboard', $data);
	}
}

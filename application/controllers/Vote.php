<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function index()
	{
		$this->load->view('vote');		
	}

}

/* End of file Vote.php */
/* Location: ./application/controllers/Vote.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function index()
	{
		$this->load->model('Kriteria_Model');
		$data['kriteria']=$this->Kriteria_Model->loadKriteria();
		$this->load->view('vote',$data);		
	}

}

/* End of file Vote.php */
/* Location: ./application/controllers/Vote.php */
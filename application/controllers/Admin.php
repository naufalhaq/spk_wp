<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('Vote_Model');
		$this->load->model('Kriteria_Model');
		$this->load->model('Alternatif_Model');

		$data['vote_normalisasi']=$this->Vote_Model->dataVoteAlternatif();
		$data['vote']=$this->Vote_Model->dataVoteraw();
		$data['kriteria']=$this->Kriteria_Model->loadKriteria();
		$data['alternatif']=$this->Alternatif_Model->loadAlternatif();
		
		$this->load->view('admins',$data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
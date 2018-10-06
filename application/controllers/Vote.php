<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function index($id)
	{
		$this->load->model('Kriteria_Model');
		$this->load->model('Alternatif_Model');
		$data['kriteria']=$this->Kriteria_Model->loadKriteria();
		$data['alternatif']=$this->Alternatif_Model->loadAlternatifId($id);
		$this->load->view('vote',$data);		
	}

	public function input($id)
	{
		$this->load->model('Vote_Model');
		for ($i=1; $i<= 6 ; $i++) { 
	    $data = array(
	        'nilai_vote' => $this->input->post($i),
	        'id_alternatif' => $id,
	        'id_kriteria' => $i
	     );
		$this->Vote_Model->vote($data);
		}

		$this->vector();
		$this->preferensi();
		redirect('home','refresh');
	}

	public function vector()
	{
		$this->load->model('Vote_Model');
		$this->load->model('Kriteria_Model');
		$kri = $this->Kriteria_Model->loadKriteria();
		$alt =$this->Vote_Model->dataVoteAlternatif();
		$a = 1;
		foreach ($alt as $key ) {
		 	$a = pow($key->C1,$kri[0]['wj'])*pow($key->C2,$kri[1]['wj'])*pow($key->C3,$kri[2]['wj'])*pow($key->C4,$kri[3]['wj'])*pow($key->C5,$kri[4]['wj'])*pow($key->C6,$kri[5]['wj']);
		 	//echo($key->id_alternatif)."<BR>";
		 	$this->Vote_Model->updVector($a,$key->id_alternatif);
		 } 
	}

	public function preferensi()
	{
		$this->load->model('Vote_Model');
		$this->load->model('Alternatif_Model');

		$vectorsum = $this->Vote_Model->getSumVector();
		$alternatif = $this->Alternatif_Model->loadAlternatif();

		foreach ($alternatif as $key) {
			$a=$key->nilai_vector;
			$prf = $a/$vectorsum[0]->sumvector;
			//echo $prf."<br>";
			$this->Vote_Model->updPreferensi($prf,$key->id_alternatif);
		}
	}

}

/* End of file Vote.php */
/* Location: ./application/controllers/Vote.php */
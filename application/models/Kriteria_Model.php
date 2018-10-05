<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_Model extends CI_Model {

public function loadKriteria()
	{
		$query= $this->db->query('SELECT * FROM kriteria');
		return $query->result_array();
	}	

}

/* End of file Kriteria_Model.php */
/* Location: ./application/models/Kriteria_Model.php */
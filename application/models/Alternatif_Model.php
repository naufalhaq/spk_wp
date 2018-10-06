<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_Model extends CI_Model {

	public function alter()
	{
		return $this->db->query('SELECT * FROM alternatif ORDER BY nilai_preferensi DESC')->result();
	}
	public function loadAlternatif()
	{
		return $this->db->get('alternatif')->result();
	}
	public function loadAlternatifId($id)
	{
		$this->db->where('id_alternatif', $id);	
		return $this->db->get('alternatif')->result();
	}

}

/* End of file Alternatif_Model.php */
/* Location: ./application/models/Alternatif_Model.php */
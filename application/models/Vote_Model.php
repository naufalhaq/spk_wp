<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_Model extends CI_Model {

	public function vote($data)
		{
			$this->db->insert('vote', $data);
		}	

	public function dataVoteAlternatif()
	{
		return $this->db->query("SELECT vote.id_alternatif,`nama_alternatif`,AVG(IF(`id_kriteria`=1,`nilai_vote`,NULL)) AS C1,AVG(IF(`id_kriteria`=2,`nilai_vote`,NULL)) AS C2,AVG(IF(`id_kriteria`=3,`nilai_vote`,NULL)) AS C3,AVG(IF(`id_kriteria`=4,`nilai_vote`,NULL)) AS C4,AVG(IF(`id_kriteria`=5,`nilai_vote`,NULL)) AS C5,AVG(IF(`id_kriteria`=6,`nilai_vote`,NULL)) AS C6 FROM vote JOIN alternatif ON vote.`id_alternatif` = alternatif.`id_alternatif` GROUP BY vote.id_alternatif")->result();
	}
	public function dataVoteraw()
	{
		return $this->db->query("SELECT `nama_alternatif`,`id_kriteria`,SUM(`nilai_vote`) AS total ,AVG(`nilai_vote`) AS rata2 ,COUNT(`nilai_vote`) AS voter FROM vote JOIN alternatif ON vote.`id_alternatif` = alternatif.`id_alternatif` GROUP BY vote.id_alternatif,`id_kriteria`")->result();
	}

	public function updVector($data,$id)
	{
		$array = array('nilai_vector' => $data);
		$this->db->where('id_alternatif', $id);
		$this->db->update('alternatif',$array);		
	}
	public function updPreferensi($data,$id)
	{
		$array = array('nilai_preferensi' => $data);
		$this->db->where('id_alternatif', $id);
		$this->db->update('alternatif',$array);		
	}

	public function getSumVector()
	{
		return $this->db->query("SELECT SUM(nilai_vector) AS sumvector FROM alternatif")->result();
	}

}

/* End of file Vote_Model.php */
/* Location: ./application/models/Vote_Model.php */
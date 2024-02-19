<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->load->database();
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->load->database();
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->load->database();
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $this->load->database();
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->load->database();
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    public function relasialbum() {
        $this->db->select('namaalbum');
        $this->db->from('album');
        $query = $this->db->get();

        return $query->result();
    }

    public function hitung_like($userid, $fotoid = null){
        $sql = "SELECT COUNT(likeid) AS jumlah FROM likefoto WHERE fotoid = '{$fotoid}'";
    
    
        return $this->db->query($sql)->row();
    }

    public function getAlbumId() {
        return $this->input->post('album_id');
    }
    

    // Ini versi baru
	function tambahKomentar($data)
	{
		$this->load->database();
		$this->db->insert('komentarfoto', $data);
	}

    // Ini Versi baru
	public function GettambahKomentarByFotoId($fotoid) {
		$this->db->select('k.isikomentar, u.username');
		$this->db->from('komentarfoto k');
		$this->db->join('user u', 'u.userid = k.userid');
		$this->db->where('k.fotoid', $fotoid);
		$query = $this->db->get();
		return $query->result_array();
	}
    
    public function getUsername($userid) {
        $this->db->select('username');
        $this->db->where('userid', $userid);
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
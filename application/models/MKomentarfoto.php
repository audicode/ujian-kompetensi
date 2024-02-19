<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKomentarfoto extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambahKomentar($data)
    {
        $this->db->insert('komentarfoto', $data);
        return $this->db->komentarid(); // Mengembalikan ID dari komentar yang baru ditambahkan
    }

    public function getKomentarByFotoId($fotoid)
    {
        $this->db->where('fotoid', $fotoid);
        $query = $this->db->get('komentarfoto');
        return $query->result();
    }

    // Jika diperlukan, tambahkan fungsi lain untuk pemrosesan komentar
}

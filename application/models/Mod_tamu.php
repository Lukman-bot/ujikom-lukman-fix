<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_tamu extends CI_Model
{

    var $tabel = 'tamu';

    public function Simpan($data)
    {
        $this->db->insert($this->tabel, $data);
    }

    public function Ubah($data,$id)
    {
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($this->tabel);
    }
    
    public function Ambil($data)
    {
        $this->db->where($data);
        return $this->db->get($this->tabel);
    }

    public function AmbilALL()
    {
        return $this->db->get($this->tabel);
    }

    public function AmbilTamu()
    {
        $this->db->select('tamu.*');
        $this->db->from($this->tabel);
        return $this->db->get()->result(); 
    }

    public function get_detail($id)
    {
        return $this->db->get_where('vw_detail_barang',['id' => $id]);
        // return $this->db->get('vw_detail_barang',['id' => $id]);
        // return $this->db->get('vw_detail_barang', $id);
    }

    public function AmbilDetailTamu($id)
    {
        $datatamu = $this->db->select('tamu.nik, tamu.nama, review.review')
            ->from($this->tabel)
            ->join('review', 'tamu.idtamu=review.tamuid', 'left')
            ->where('tamu.idtamu', $id)
            ->get()->result();
        return
        [
            'datatamu'     => $datatamu,
        ];
    }
    
}
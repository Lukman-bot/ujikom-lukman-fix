<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_reservasi extends CI_Model
{

    var $tabel = 'reservasi';

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

    public function AmbilDataReservasi()
    {
        $this->db->select('reservasi.idreservasi, reservasi.startdate, reservasi.enddate, reservasi.qtykamar, reservasi.lama, reservasi.status, tamu.nama, kamar.namakamar');
        $this->db->from($this->tabel);
        $this->db->join('tamu','reservasi.tamuid=tamu.idtamu','left');
        $this->db->join('kamar','reservasi.kamarid=kamar.idkamar','left');
        return $this->db->get();
    }

    public function getDetailReservasi($id)
    {
        $query = $this->db->select('reservasi.idreservasi, reservasi.startdate, reservasi.qtykamar, reservasi.lama, reservasi.status,tamu.nik, tamu.nama,tamu.jeniskelamin,tamu.alamat,tamu.telepon, kamar.namakamar')
            ->from($this->tabel)
            ->join('tamu', 'reservasi.tamuid=tamu.idtamu', 'left')
            ->join('kamar', 'reservasi.kamarid=kamar.idkamar', 'left')
            ->where('reservasi.idreservasi', $id)
            ->get()->result(); 
        return [
            'datadetail'        => $query
        ];
    }

    public function countReservasi()
    {
        $this->db->where('reservasi.status', 'reservasi');
        return $this->db->count_all_results('reservasi');
    }

    public function DetailReservasi()
    {
        $this->db->select('reservasi.idreservasi, reservasi.enddate, reservasi.startdate, reservasi.qtykamar, reservasi.lama, reservasi.status,tamu.nik, tamu.nama,tamu.jeniskelamin,tamu.alamat,tamu.telepon, kamar.namakamar');
        $this->db->from($this->tabel);
        $this->db->join('tamu', 'reservasi.tamuid=tamu.idtamu', 'left');
        $this->db->join('kamar', 'reservasi.kamarid=kamar.idkamar', 'left');
        return $this->db->get()->result(); 
    }

}
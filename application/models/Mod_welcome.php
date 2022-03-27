<?php

class Mod_welcome extends CI_Model
{
    public function getDataKamar()
    {
        return $this->db->select('kamar.*, kamargalery.url, tipekamar.tipekamar')
            ->from('kamar')
            ->join('kamargalery', 'kamar.idkamar=kamargalery.kamarid', 'left')
            ->join('tipekamar', 'kamar.tipekamarid=tipekamar.idtipekamar', 'left')
            ->get();
    }

    public function getDataFasilitas()
    {
        return $this->db->where('jenisfasilitas', 'Hotel')->get('fasilitas');
    }
}
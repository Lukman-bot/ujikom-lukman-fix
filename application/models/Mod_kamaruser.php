<?php

class Mod_kamaruser extends CI_Model
{
    var $tabel = 'kamar'; 
    public function getDataJson($id)
    {
        $datakamar = $this->db->select('kamar.*, kamargalery.url, tipekamar.tipekamar')
            ->from($this->tabel)
            ->join('kamargalery', 'kamar.idkamar=kamargalery.kamarid', 'left')
            ->join('tipekamar', 'kamar.tipekamarid=tipekamar.idtipekamar', 'left')
            ->where('kamar.idkamar', $id)
            ->get()->result();
        $datafasilitaskamar = $this->db->select('fasilitas.namafasilitas,fasilitas.icon, detailfasilitaskamar.kamarid, kamar.namakamar')
            ->from('fasilitas')
            ->join('detailfasilitaskamar', 'fasilitas.idfasilitas=detailfasilitaskamar.fasilitasid', 'left')
            ->join('kamar', 'kamar.idkamar=detailfasilitaskamar.kamarid', 'left')
            ->where('detailfasilitaskamar.kamarid', $id)
            ->get()->result();
        $datarating = $this->db->select('AVG(value) as rata2')
            ->from('rating')
            ->where('kamarid', $id)
            ->get()->result();
        $datadetailkomentar = $this->db->select('review.idreview,tamu.nama,review.review,review.created_at, kamar.idkamar,kamar.namakamar')
            ->from('review')
            ->join('tamu', 'review.tamuid=tamu.idtamu', 'left')
            ->join('kamar', 'review.kamarid=kamar.idkamar', 'left')
            ->where('kamar.idkamar', $id)
            ->get()->result();
        return
        [
            'datakamar'     => $datakamar,
            'datafasilitas' => $datafasilitaskamar,
            'datarating'    => $datarating, 
            'datakomentar'  => $datadetailkomentar 
        ]; 
    }
    public function getDataReservasi($iduser, $idkamar)
    {
        $datauser = $this->db->get_where('tamu', ['idtamu' => $iduser])->result();
        $datakamar = $this->db->get_where('kamar', ['idkamar' => $idkamar])->result();
        $dataextra = $this->db->get('extra')->result();
        return
        [
            'datakamar'     => $datakamar,
            'datauser'      => $datauser,
            'dataextra'     => $dataextra
        ];
    }
    public function getDataDetailReservasiku($iduser)
    {
        $this->db->select('reservasi.*, kamar.namakamar');
            $this->db->from('reservasi');
            $this->db->join('kamar', 'reservasi.kamarid=kamar.idkamar', 'left');
            $this->db->where('reservasi.tamuid', $iduser);
        return $this->db->get();
    }
    public function ambilDataExtra()
    {
        return $this->db->get('extra');
    }
    public function getDataTamu($iduser)
    {
        $this->db->select('tamu.*');
        $this->db->from('tamu');
        $this->db->where('tamu.idtamu',$iduser);
        return $this->db->get();
    }
    public function select($columns)
    {
        // Param columns beripe array
        $this->db->select($columns);
        return $this;
    } 

    public function where($column, $condition)
    {
        $this->db->where($column, $condition);
        return $this;
    }

    public function Simpan($data)
    {
        $this->db->insert('reservasi', $data);
    }

    public function AmbilDetailReservasi($idreservasi)
    {
        $datareservasi = $this->db->select('reservasi.*, kamar.idkamar, kamar.namakamar, tamu.nik, tamu.nama, tamu.alamat, tamu.telepon, extra.idextra, detailreservasi.extraid, extra.namapesanan')
            ->from('reservasi')
            ->join('kamar', 'kamar.idkamar=reservasi.kamarid', 'left')
            ->join('tamu', 'tamu.idtamu=reservasi.tamuid', 'left')
            ->join('detailreservasi', 'reservasi.idreservasi=detailreservasi.reservasiid', 'left')
            ->join('extra', 'extra.idextra=detailreservasi.extraid', 'left')
            ->where('reservasi.idreservasi', $idreservasi)
            ->get()->result();

        return 
        [
            'datareservasi'     => $datareservasi
        ];
    }
}
<?php

class Reservasiku extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kamaruser', 'MKU');
    }
    public function index()
    {
        $data = [
            'title'     => 'Hotel AYO!!',
            'idtamu'    => $this->session->userdata('id_user'),
            'datareservasiku'   => $this->MKU->getDataDetailReservasiku($this->session->userdata('id_user'))->result()
        ];
        $this->template->load('Users/Template', 'Users/Reservasiku', $data);
    }

    public function Detail($idreservasi=null)
    {
        $data = [
            'title'     => 'Hotel AYO!! | Detail Reservasi',
            'idreservasi'   => $idreservasi
        ];
        $this->template->load('Users/Template', 'Users/DetailReservasi', $data);
    }

    public function getJsonDetail($idreservasi=null)
    {
        $jsonnya = $this->MKU->AmbilDetailReservasi($idreservasi);
        echo json_encode($jsonnya);
    }
}
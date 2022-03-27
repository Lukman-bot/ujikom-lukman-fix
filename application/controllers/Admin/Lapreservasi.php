<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapreservasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_laporan','ML');
        $this->load->model('Mod_reservasi', 'MR');
        cek_login();
    }

    public function Index()
    {
        $data=[
                'title'                 => 'Hotel AYO!! | Laporan',
                'judul'                 => 'Laporan',
                'subjudul'              => 'Reservasi',
                'breadcrumb1'           => 'Laporan',
                'breadcrumb2'           => 'Reservasi',
                'menu_navigation'       => 'Laporan',
                'submenu_navigation'    => 'Laporan Reservasi',
                'datareservasi'         => $this->MR->AmbilDataReservasi()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/LaporanReservasi/Index',$data);
    }

    public function Periode()
    {
        $this->form_validation->set_rules('tanggalawal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggalakhir', 'Tanggal Akhir', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'title'                 => 'Hotel AYO!! | Laporan',
                'judul'                 => 'Laporan',
                'subjudul'              => 'Reservasi',
                'breadcrumb1'           => 'Laporan',
                'breadcrumb2'           => 'Reservasi',
                'menu_navigation'       => 'Laporan',
                'submenu_navigation'    => 'Laporan Reservasi',
                'tanggalawal'           => $this->input->post('tanggalawal'),
                'tanggalakhir'          => $this->input->post('tanggalakhir'),
                'datalaporan'           => $this->ML->ambilLaporanPeriode($this->input->post('tanggalawal'), $this->input->post('tanggalakhir'))->result()
            ];
            $this->template->load('Admin/Template', 'Admin/LaporanReservasi/Periode', $data);
        }
    }

    public function Perstatus()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'title'                 => 'Hotel AYO!! | Laporan',
                'judul'                 => 'Laporan',
                'subjudul'              => 'Reservasi',
                'breadcrumb1'           => 'Laporan',
                'breadcrumb2'           => 'Reservasi',
                'menu_navigation'       => 'Laporan',
                'submenu_navigation'    => 'Laporan Reservasi',
                'tanggal'               => $this->input->post('tanggal'),
                'status'                => $this->input->post('status'),
                'datalaporan'           => $this->ML->ambilLaporanPerstatus($this->input->post('tanggal'), $this->input->post('status'))->result()
            ];
            $this->template->load('Admin/Template', 'Admin/LaporanReservasi/Perstatus', $data);
        }
    }
    
}
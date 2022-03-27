<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_reservasi','MR');
        cek_login();
    }

    public function Index()
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Reservasi',
            'judul'                 => 'Reservasi',
            'subjudul'              => 'Reservasi',
            'breadcrumb1'           => 'Reservasi',
            'breadcrumb2'           => 'Reservasi',
            'menu_navigation'       => 'Transaksi',
            'submenu_navigation'    => 'Reservasi',
            'datareservasi'         => $this->MR->AmbilDataReservasi()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Reservasi/Index',$data);
    }

    public function Detail($id=null)
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Reservasi',
            'judul'                 => 'Reservasi',
            'subjudul'              => 'Reservasi',
            'breadcrumb1'           => 'Reservasi',
            'breadcrumb2'           => 'Reservasi',
            'menu_navigation'       => 'Transaksi',
            'submenu_navigation'    => 'Reservasi',
            'id'                    => $id
        ];
        $this->template->load('Admin/Template', 'Admin/Reservasi/Detail',$data);
    }

    public function getDetailReservasi($id=null)
    { 
        $json = $this->MR->getDetailReservasi($id);
        echo json_encode($json);
    }

    public function Checkin()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => "Checkin"
            ];
            $this->MR->ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', 'Data berhaisl di perbaharui');
        }
    }

    public function Checkout()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => "checkout"
            ];
            $this->MR->ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', 'Data berhaisl di perbaharui');
        }
    }

    public function Cancel()
    {
        $this->form_validation->set_rules('idnya', 'id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'status'    => "checkout"
            ];
            $this->MR->ubah($data, ['idreservasi' => $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan', 'Data berhaisl di perbaharui');
        }
    }

}

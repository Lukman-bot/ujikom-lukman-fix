<?php

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kamaruser', 'MKU');
    }
    public function index()
    {

    }
    public function Detail($id = null)
    {
        $data = [
            'title'     => "Hotel AYO!!",
            'id'        => $id
        ];
        $this->template->load('Users/Template', 'Users/DetailKamar', $data);
    }
    public function getJsonDetailKamar($id=null)
    {
        $json = $this->MKU->getDataJson($id);
        echo json_encode($json);
    }
    public function Berirating1()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('rating');
            if($query->row_array() > 0) {
                $data = [
                    'value' => 1
                ];
                $this->db->set($data);
                $this->db->update('rating');
            } else {
                $data = [
                    'value'     => 1,
                    'tamuid'    => $this->input->post('id_user'),
                    'kamarid'   => $this->input->post('id_kamar')
                ];
                $this->db->insert('rating', $data);
            }
            echo json_encode(array('status'=>true));
        } else {
            echo json_encode(array('status'=>false));
        }
    }
    public function Berirating2()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('rating');
            if($query->row_array() > 0) {
                $data = [
                    'value' => 2
                ];
                $this->db->set($data);
                $this->db->update('rating');
            } else {
                $data = [
                    'value'     => 2,
                    'tamuid'    => $this->input->post('id_user'),
                    'kamarid'   => $this->input->post('id_kamar')
                ];
                $this->db->insert('rating', $data);
            }
            echo json_encode(array('status'=>true));
        } else {
            echo json_encode(array('status'=>false));
        }
    }
    public function Berirating3()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('rating');
            if($query->row_array() > 0) {
                $data = [
                    'value' => 3
                ];
                $this->db->set($data);
                $this->db->update('rating');
            } else {
                $data = [
                    'value'     => 3,
                    'tamuid'    => $this->input->post('id_user'),
                    'kamarid'   => $this->input->post('id_kamar')
                ];
                $this->db->insert('rating', $data);
            }
            echo json_encode(array('status'=>true));
        } else {
            echo json_encode(array('status'=>false));
        }
    }
    public function Berirating4()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('rating');
            if($query->row_array() > 0) {
                $data = [
                    'value' => 4
                ];
                $this->db->set($data);
                $this->db->update('rating');
            } else {
                $data = [
                    'value'     => 4,
                    'tamuid'    => $this->input->post('id_user'),
                    'kamarid'   => $this->input->post('id_kamar')
                ];
                $this->db->insert('rating', $data);
            }
            echo json_encode(array('status'=>true));
        } else {
            echo json_encode(array('status'=>false));
        }
    }
    public function Berirating5()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        if($this->form_validation->run() == TRUE) {
            $this->db->where('tamuid', $this->input->post('id_user'));
            $this->db->where('kamarid', $this->input->post('id_kamar'));
            $query = $this->db->get('rating');
            if($query->row_array() > 0) {
                $data = [
                    'value' => 5
                ];
                $this->db->set($data);
                $this->db->update('rating');
            } else {
                $data = [
                    'value'     => 5,
                    'tamuid'    => $this->input->post('id_user'),
                    'kamarid'   => $this->input->post('id_kamar')
                ];
                $this->db->insert('rating', $data);
            }
            echo json_encode(array('status'=>true));
        } else {
            echo json_encode(array('status'=>false));
        }
    }
    public function KirimKomentar()
    {
        $this->form_validation->set_rules('id_tamu', 'ID Tamu', 'required');
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');
        if($this->form_validation->run() == TRUE){
            $data = [
                'review'        => $this->input->post('komentar'),
                'tamuid'        => $this->input->post('id_tamu'),
                'kamarid'       => $this->input->post('id_kamar'),
            ];
            $this->db->insert('review', $data);
        }
    }
    public function Reservasi($id = null)
    {
        $akses = $this->session->userdata('id_user');
        if($akses == "")
        {
            redirect('Auth', 'refresh');
        } else {
            $data = 
            [
                'title'     => 'Hotel AYO!!',
                'dataextra' => $this->MKU->ambilDataExtra()->result()
            ];
            $this->template->load('Users/Template', 'Users/FormReservasi', $data);
        }
    }
    public function getDataReservasi($iduser = null, $idkamar = null)
    {
        $json = $this->MKU->getDataReservasi($iduser, $idkamar);
        echo json_encode($json);
    }
    // public function PesanKamar()
    // {
    //     $data = [
    //         'tamuid'        => $this->input->post('idtamu'),
    //         'kamarid'       => $this->input->post('idkamar'),
    //         'startdate'     => $this->input->post('tanggalcheckin'),
    //         'qtykamar'      => 1,
    //         'lama'          => $this->input->post('lamainap')
    //     ];
    //     $this->db->insert('reservasi', $data);
    //     redirect('', 'refresh');
    // }
    public function PesanKamar()
    {
        $this->form_validation->set_rules('tanggalcheckin', 'Tanggal Checkin', 'required');
        $this->form_validation->set_rules('jumlahkamar', 'Jumlah Kamar', 'required|numeric');
        $this->form_validation->set_rules('lamainap', 'Lama Menginap', 'required|numeric');
        $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
        $this->form_validation->set_message('numeric', '{field} Harus Berupa Angka');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Hotel AYO!! | Form Reservasi',
            ];
            $this->template->load('Users/Template', 'Users/FormReservasi', $data);
        } else {
            $p = $this->input->post();
            $detailextra = [];
            $datareservasi = [
                'tamuid'        => $this->input->post('idtamu'),
                'kamarid'       => $this->input->post('idkamar'),
                'startdate'     => $this->input->post('tanggalcheckin'),
                'qtykamar'      => $this->input->post('jumlahkamar'),
                'lama'          => $this->input->post('lamainap')
            ];
            $this->MKU->Simpan($datareservasi);
            $idkamar = $this->input->post('idkamar');
            $idreservasi = $this->db->insert_id();

            if (@$p['extra']) {
                foreach ($p['extra'] as $i => $x) {
                    $detailextra[] = [
                        'reservasiid'       => $idreservasi,
                        'kamar_idkamar'     => $idkamar,
                        'extraid'           => $x
                    ];
                }
            }
            if (count($detailextra) > 0) {
                $this->db->insert_batch('detailreservasi', $detailextra);
            }
            
            $this->session->set_flashdata('pesan', 'Berhasil melakukan reservasi!');
            redirect('', 'refresh');
        }
    }

    public function getExtraKamar()
    {
        $jsonnya = $this->MKU->ambilJsonExtra();
        echo json_encode($jsonnya);
    }

    public function CheckExtra()
    {
        $this->db->where('reservasiid', $this->input->post('reservasiid'));
        $this->db->where('extraid', $this->input->post('extraid'));
        $this->db->where('kamar_idkamar', $this->input->post('kamar_idkamar'));
        $cari = $this->db->get('detailreservasi');
        if ($cari->num_rows() > 0){
            $this->db->where('reservasiid', $this->input->post('reservasiid'));
            $this->db->where('extraid', $this->input->post('extraid'));
            $this->db->where('kamar_idkamar', $this->input->post('kamar_idkamar'));
            $this->db->delete('detailreservasi');
        } else {
            $data = [
                'reservasiid'       => $this->input->post('reservasiid'),
                'extraid'           => $this->input->post('extraid'),
                'kamar_idkamar'     => $this->input->post('kamar_idkamar')
            ];
            $this->db->insert('detailreservasi', $data);
        }
    }
}
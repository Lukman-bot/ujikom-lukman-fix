<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_tamu', 'tamu');
        cek_login();
    }
        
    public function Index()
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Laporan Tamu',
            'judul'                 => 'Laporan Tamu',
            'subjudul'              => 'Tamu',
            'breadcrumb1'           => 'Laporan Tamu',
            'breadcrumb2'           => 'Tamu',
            'menu_navigation'       => 'Master',
            'submenu_navigation'    => 'Tamu',
            'dataTamu'              => $this->tamu->AmbilAll()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Tamu/Index',$data);
    }

    public function Add()
    {
        $this->form_validation->set_rules('nik','NIK User','required');
        $this->form_validation->set_rules('nama','Nama User','required');
        $this->form_validation->set_rules('jeniskelamin','Jenis Kelamin User','required');
        $this->form_validation->set_rules('alamat','Alamat User','required');
        $this->form_validation->set_rules('telepon','Nomor Telepon User','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('ismember','Status Member','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Tambah Tamu',
                'judul'                 => 'Laporan Tamu',
                'subjudul'              => 'Tambah Tamu',
                'breadcrumb1'           => 'Tambah Tamu',
                'breadcrumb2'           => 'Tamu',   
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Tamu',                
            ];
            $this->template->load('Admin/Template', 'Admin/Tamu/Add',$data);
        }else{
           
            $data=[
                'nik'           => $this->input->post('nik',TRUE),
                'nama'          => $this->input->post('nama',TRUE),
                'jeniskelamin'  => $this->input->post('jeniskelamin',TRUE),
                'alamat'        => $this->input->post('alamat',TRUE),
                'telepon'       => $this->input->post('telepon',TRUE),
                'username'      => $this->input->post('username',TRUE),
                'password'      => $this->input->post('password', TRUE),
                'ismember'      => $this->input->post('ismember',TRUE),
            ];
            $this->tamu->Simpan($data);
                
            $this->session->set_flashdata('pesan','Data berhasil di simpan.!');
            redirect('Admin/Tamu', 'refresh');
        }
    }

    public function Ubah($id = null)
    {
        $this->form_validation->set_rules('nik','NIK User','required');
        $this->form_validation->set_rules('nama','Nama User','required');
        $this->form_validation->set_rules('jeniskelamin','Jenis Kelamin User','required');
        $this->form_validation->set_rules('alamat','Alamat User','required');
        $this->form_validation->set_rules('telepon','Nomor Telepon User','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('ismember','Status Member','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if ($this->form_validation->run()== FALSE) 
        {
            $data=[
                'title'                 => 'Hotel AYO!! | Laporan Tamu',
                'judul'                 => 'Laporan Tamu',
                'subjudul'              => 'Edit Tamu',
                'breadcrumb1'           => 'Laporan Tamu',
                'breadcrumb2'           => 'Tamu', 
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Tamu',  
                'id'                    => $id,
                'dataubahtamu'          => $this->tamu->Ambil(['idtamu'=>$id])->result()
            ];
            $this->template->load('Admin/Template', 'Admin/Tamu/Ubah',$data);
        } else {
            
            $data=[
                'nik'           => $this->input->post('nik',TRUE),
                'nama'          => $this->input->post('nama',TRUE),
                'jeniskelamin'  => $this->input->post('jeniskelamin',TRUE),
                'alamat'        => $this->input->post('alamat',TRUE),
                'telepon'       => $this->input->post('telepon',TRUE),
                'username'      => $this->input->post('username',TRUE),
                'password'      => $this->input->post('password', TRUE),
                'ismember'      => $this->input->post('ismember',TRUE)
            ];
            $this->tamu->Ubah($data,['idtamu'=> $id]);
                
            $this->session->set_flashdata('pesan','Data berhasil di Perbaharui.!');
            redirect('Admin/Tamu', 'refresh');
        }
    }

    public function LapTamu()
    {
        $data = [
            'title'                 => 'Hotel AYO!! | Laporan Tamu',
            'judul'                 => 'Laporan Tamu',
            'subjudul'              => 'Laporan Tamu',
            'breadcrumb1'           => 'Laporan Tamu',
            'breadcrumb2'           => 'Tamu', 
            'menu_navigation'       => 'Laporan',
            'submenu_navigation'    => 'Tamu',
            'dataTamu'              => $this->tamu->AmbilAll()->result()
        ];

        $this->template->load('Admin/Template', 'Admin/LaporanTamu/Index', $data);
    }

    public function LapPertamu($id=null)
    {
        $data = [
            'title'                 => 'Hotel AYO!! | Laporan Tamu',
            'judul'                 => 'Laporan Tamu',
            'subjudul'              => 'Laporan Tamu',
            'breadcrumb1'           => 'Laporan Tamu',
            'breadcrumb2'           => 'Tamu', 
            'menu_navigation'       => 'Laporan',
            'submenu_navigation'    => 'Tamu',
            'id'                    => $id,
        ];

        $this->template->load('Admin/Template', 'Admin/LaporanTamu/Pertamu', $data);
    }

    public function getJsonDetail($id = null)
    {
        $jsonnya = $this->tamu->AmbilDetailTamu($id);
        echo json_encode($jsonnya);
    }

    public function GetkodeTamu($idtamu=null)
	{
		$this->db->where('idtamu', $idtamu);
		$data=$this->db->get('tamu')->row();
		echo json_encode($data);
	}

    public function Delete()
	{
		$idtamu=$this->input->post('id_hapus');
		$this->db->trans_start();
		$this->db->where('idtamu', $idtamu);
		$this->db->delete('tamu');
		$this->db->trans_complete();
		if ($this->db->trans_status()== FALSE) {
			$this->session->set_flashdata('pesan', 'Data User tidak bisa dihapus, karena masih berelasi dengan tabel lain');
		}else{
			$this->session->set_flashdata('pesan', 'Data User berhasil dihapus');
			redirect('Admin/Tamu/', 'refresh');
		}
	}

}
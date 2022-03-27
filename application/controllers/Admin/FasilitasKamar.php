<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FasilitasKamar extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_fasilitaskamar','MFK');
        cek_login();
    }

    public function Index()
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Master Data',
            'judul'                 => 'Master Data',
            'subjudul'              => 'Fasilitas Kamar',
            'breadcrumb1'           => 'Master Data',
            'breadcrumb2'           => 'Fasilitas Kamar',
            'menu_navigation'       => 'Master',
            'submenu_navigation'    => 'Fasilitas Kamar',
            'datafasilitaskamar'    => $this->MFK->AmbilKamar()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/FasilitasKamar/Index',$data);
    }

    public function Add()
    {
        $this->form_validation->set_rules('fasilitaskamar','Fasilitas Kamar','required');
        $this->form_validation->set_rules('icon','Icon','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Fasilitas Kamar',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Tambah Fasilitas Kamar',
                'breadcrumb1'           => 'Tambah Fasilitas Kamar',
                'breadcrumb2'           => 'Fasilitas Kamar',
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Fasilitas Kamar',
               
            ];
            $this->template->load('Admin/Template', 'Admin/FasilitasKamar/Add',$data);
        }else{
            $data=[
                'namafasilitas'     => $this->input->post('fasilitaskamar',TRUE),
                'icon'              => $this->input->post('icon',TRUE),
                'jenisfasilitas'    => 'Kamar'
            ];
            $this->MFK->Simpan($data);
            $this->session->set_flashdata('pesan','Data berhasil di simpan.!');
            redirect('Admin/FasilitasKamar', 'refresh');
        }
    }

    public function Ubah($id=null)
    {
        $this->form_validation->set_rules('fasilitaskamar','Fasilitas Kamar','required');
        $this->form_validation->set_rules('icon','Icon','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Fasilitas Kamar',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Tambah Fasilitas Kamar',
                'breadcrumb1'           => 'Tambah Fasilitas Kamar',
                'breadcrumb2'           => 'Fasilitas Kamar',
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Fasilitas Kamar',
                'id'                    => $id,
                'datafasilitaskamar'    => $this->MFK->Ambil(['idfasilitas'=>$id])->result()
            ];
            $this->template->load('Admin/Template', 'Admin/FasilitasKamar/Ubah',$data);
        }else{ 
            $data=[
                'namafasilitas'     => $this->input->post('fasilitaskamar',TRUE),
                'icon'              => $this->input->post('icon',TRUE),
                'jenisfasilitas'    => 'Kamar'
            ];
            $this->MFK->Ubah($data, ['idfasilitas' => $id]);  
            $this->session->set_flashdata('pesan','Data berhasil di simpan.!');
            redirect('Admin/FasilitasKamar', 'refresh');
        }
    }

    public function GetkodeFasilitasKamar($idfasilitas=null)
	{
		$this->db->where('idfasilitas', $idfasilitas);
		$data=$this->db->get('fasilitas')->row();
		echo json_encode($data);
	}

    public function Delete()
	{
		$idfasilitas=$this->input->post('id_hapus');
		$this->db->trans_start();
		$this->db->where('idfasilitas', $idfasilitas);
		$this->db->delete('fasilitas'); 
		$this->db->trans_complete();
		if ($this->db->trans_status()== FALSE) {
			$this->session->set_flashdata('pesan', 'Data Tipe Kamar tidak bisa dihapus, karena masih berelasi dengan tabel lain');
		}else{
			$this->session->set_flashdata('pesan', 'Data Tipe Kamar berhasil dihapus');
			redirect('Admin/FasilitasKamar/', 'refresh');
		}
	}

}
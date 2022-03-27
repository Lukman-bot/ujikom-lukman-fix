<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kamar','MK');
        cek_login();
    }

    public function Index()
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Master Data',
            'judul'                 => 'Master Data',
            'subjudul'              => 'Kamar Hotel',
            'breadcrumb1'           => 'Master Data',
            'breadcrumb2'           => 'Kamar',
            'menu_navigation'       => 'Master',
            'submenu_navigation'    => 'Kamar',
            'datakamar'             => $this->MK->AmbilDataKamar()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Kamar/Index',$data);
    }

    public function Add()
    {
        $this->form_validation->set_rules('namakamar','namakamar','required');
        $this->form_validation->set_rules('harga','harga','required|numeric');
        $this->form_validation->set_rules('jumlahqty','jumlahqty','required|numeric');
        $this->form_validation->set_rules('description','description','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric','{field} Harus berupa angka');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Master Data',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Tambah Kamar',
                'breadcrumb1'           => 'Tambah Kamar',
                'breadcrumb2'           => 'Kamar',
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Kamar',
                'datatipekamar'         => $this->MK->AmbilTipeKamar()->result()
            ];
            $this->template->load('Admin/Template', 'Admin/Kamar/Add',$data);
        }else{
            $p = $this->input->post();
            $detailfasilitas = [];
            // Proses Penyimpanan Kamar
            $datakamar = [
                'namakamar'     => $this->input->post('namakamar'),
                'harga'         => $this->input->post('harga'),
                'jumlahqty'     => $this->input->post('jumlahqty'),
                'description'   => $this->input->post('description'),
                'tipekamarid'   => $this->input->post('tipekamar')
            ];
            $this->MK->Simpan($datakamar);
            $idkamar = $this->db->insert_id();
            // Proses Penyimpanan Detail Fasilitas
            if (@$p['fasilitas']) {
                foreach ($p['fasilitas'] as $i => $x) {
                    $detailfasilitas[] = [
                        'kamarid'       => $idkamar,
                        'fasilitasid'   => $x
                    ];
                }
            }
            if (count($detailfasilitas) > 0) {
                $this->db->insert_batch('detailfasilitaskamar', $detailfasilitas);
            }
            // Proses Penyimpanan Kamar Galery
            $acak = rand(1000,9999);
            $foto = $acak . '-IMG-Picture.jpg';
            $config['upload_path']        = './upload/kamar';
            $config['allowed_types']      = 'jpg|jpeg|png|JPG|PNG';
            $config['max_size']           = 6024;
            $config['max_width']          = 0;
            $config['max_height']         = 0;
            $config['overwrite']          = TRUE;
            $config['file_ext_tolower']   = TRUE;
            $config['file_name']          = $foto;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('galery')) {
                $datagalerykamar = [
                    'url'       => $foto,
                    'kamarid'   => $idkamar
                ];
                $this->MK->SimpanGaleryKamar('kamargalery', $datagalerykamar);
            }
            $this->session->set_flashdata('pesan', 'Data Kamar Berhasil Di Simpan');
            redirect('Admin/Kamar', 'refresh');
        }
    }

    public function getFasilitasKamar()
    {
        $json = $this->MK->ambilJsonFasilitas();
        echo json_encode($json);
    }

    public function Ubah($id=null)
    {
        $this->form_validation->set_rules('namakamar','namakamar','required');
        $this->form_validation->set_rules('harga','harga','required|numeric');
        $this->form_validation->set_rules('jumlahqty','jumlahqty','required|numeric');
        $this->form_validation->set_rules('description','description','required');
        $this->form_validation->set_rules('tipekamar','tipekamar','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric','{field} Harus berupa angka');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Master Data',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Edit Kamar',
                'breadcrumb1'           => 'Edit Kamar',
                'breadcrumb2'           => 'Kamar',
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'Kamar',
                'datatipekamar'         => $this->MK->AmbilTipeKamar()->result(),
                'id'                    => $id,
                'datafasilitas'         => $this->MK->ambilDataFasilitas()->result()
            ];
            $this->template->load('Admin/Template', 'Admin/Kamar/Ubah',$data);
        }else{
            // Proses Penyimpanan Kamar
            $datakamar = [
                'namakamar'     => $this->input->post('namakamar'),
                'harga'         => $this->input->post('harga'),
                'jumlahqty'     => $this->input->post('jumlahqty'),
                'description'   => $this->input->post('description'),
                'tipekamarid'   => $this->input->post('tipekamar')
            ];
            $this->db->set($datakamar);
            $this->db->where('idkamar', $id);
            $this->db->update('kamar');
            // Proses Ubah Data Galery
            if (!empty($_FILES['galery']['name'])) {
                $acak = rand(1000,9999);
                $foto = $acak . '-IMG-Picture.jpg';
                $config['upload_path']        = './upload/kamar';
                $config['allowed_types']      = 'jpg|jpeg|png|JPG|PNG';
                $config['max_size']           = 6024;
                $config['max_width']          = 0;
                $config['max_height']         = 0;
                $config['overwrite']          = TRUE;
                $config['file_ext_tolower']   = TRUE;
                $config['file_name']          = $foto;
                $this->load->library('upload', $config);
                $this->upload->do_upload('galery');
                $datagalery = [
                    'url'       => $foto,
                    'kamarid'   => $id
                ];
                $this->db->set($datagalery);
                $this->db->where('idkamargalery', $this->input->post('idgalery'));
                $this->db->update('kamargalery');
            }
            $this->session->set_flashdata('pesan', 'Data Kamar Berhasil di perbaharui');
            redirect('Admin/Kamar','refresh');
        }
    }

    public function JsonUbahKamar($id)
    {
        $json = $this->MK->getJsonUbahKamar($id);
        echo json_encode($json);
    } 

    public function CheckFasilitas() 
    {
        $this->db->where('kamarid', $this->input->post('kamarid'));
        $this->db->where('fasilitasid', $this->input->post('fasilitasid'));
        $cari = $this->db->get('detailfasilitaskamar');
        if ($cari->num_rows() > 0){
            $this->db->where('kamarid', $this->input->post('kamarid'));
            $this->db->where('fasilitasid', $this->input->post('fasilitasid'));
            $this->db->delete('detailfasilitaskamar');
        } else {
            $data = [
                'kamarid'       => $this->input->post('kamarid'),
                'fasilitasid'   => $this->input->post('fasilitasid'),
            ];
            $this->db->insert('detailfasilitaskamar', $data);
        }
    }

    public function Detail($id=null)
    {
        $data = [
            'title'                 => 'Hotel AYO!! | Master Data',
            'judul'                 => 'Master Data',
            'subjudul'              => 'Detail Kamar',
            'breadcrumb1'           => 'Detail Kamar',
            'breadcrumb2'           => 'Kamar',
            'menu_navigation'       => 'Master',
            'submenu_navigation'    => 'Kamar',
            'id'                    => $id, 
        ]; 
        $this->template->load('Admin/Template', 'Admin/Kamar/Detail',$data);
    }

    public function getJsonDetail($id = null)
    {
        $jsonnya = $this->MK->AmbilDetailKamar($id);
        echo json_encode($jsonnya);
    }

    public function GetkodeKamar($idkamar=null)
	{
		$this->db->where('idkamar', $idkamar);
		$data=$this->db->get('kamar')->row();
		echo json_encode($data);
	}
    
    public function Delete()
	{
		$idkamar=$this->input->post('id_hapus');
		$this->db->trans_start();
		$this->db->where('idkamar', $idkamar);
		$this->db->delete('kamar');
		$this->db->trans_complete();
		if ($this->db->trans_status()== FALSE) {
			$this->session->set_flashdata('pesan', 'Data Tipe Kamar tidak bisa dihapus, karena masih berelasi dengan tabel lain');
		}else{
			$this->session->set_flashdata('pesan', 'Data Tipe Kamar berhasil dihapus');
			redirect('Admin/Kamar/', 'refresh');
		}
	}
    
}
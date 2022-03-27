<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
        cek_login();
    }
        
    public function Index()
    {
        $data=[
            'title'                 => 'Hotel AYO!! | Master Data',
            'judul'                 => 'Master Data',
            'subjudul'              => 'User',
            'breadcrumb1'           => 'Master Data',
            'breadcrumb2'           => 'User',
            'menu_navigation'       => 'Master',
            'submenu_navigation'    => 'User',
            'dataUser'              => $this->user->AmbilAll()->result()
        ];
        $this->template->load('Admin/Template', 'Admin/User/Index',$data);
    }

    public function Add()
    {
        $this->form_validation->set_rules('namauser','Nama User','required');
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('notelepon','Nomor Telepon','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('is_active','Status Aktif','required');
        $this->form_validation->set_rules('role','Role','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if($this->form_validation->run() == false) 
        {
            $data = [
                'title'                 => 'Hotel AYO!! | Tambah User',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Tambah User',
                'breadcrumb1'           => 'Tambah User',
                'breadcrumb2'           => 'User',   
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'User',                
            ];
            $this->template->load('Admin/Template', 'Admin/User/Add',$data);
        }else{
            $acak = rand(1000,9999);
            $foto = $acak . '-IMG-Picture.jpg';
            $config['upload_path']          = './upload/user/';
            $config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG';
            $config['max_size']             = 6024;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = TRUE;
            $config['file_ext_tolower']     = TRUE;
            $config['file_name']            = $foto;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('galery')) {
                $this->session->set_flashdata('pesan','Data gagal di upload.!');
                redirect('Admin/User','refresh');
            }else {
                $passwordhash=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $data=[
                    'namauser'      => $this->input->post('namauser',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'notelepon'     => $this->input->post('notelepon',TRUE),
                    'username'      => $this->input->post('username',TRUE),
                    'password'      => $passwordhash,
                    'is_active'     => $this->input->post('is_active',TRUE),
                    'role'          => $this->input->post('role',TRUE),
                    'photo'         => $foto
                ];
                $this->user->Simpan($data);
                
                $this->session->set_flashdata('pesan','Data berhasil di simpan.!');
                redirect('Admin/User', 'refresh');
            }
        }
    }

    public function Ubah($id = null)
    {
        $this->form_validation->set_rules('namauser','Nama User','required');
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('notelepon','Nomor Telepon','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('is_active','Status Aktif','required');
        $this->form_validation->set_rules('role','Role','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if ($this->form_validation->run()== FALSE) 
        {
            $data=[
                'title'                 => 'Hotel AYO!! | Master Data',
                'judul'                 => 'Master Data',
                'subjudul'              => 'Edit User',
                'breadcrumb1'           => 'Master Data',
                'breadcrumb2'           => 'User', 
                'menu_navigation'       => 'Master',
                'submenu_navigation'    => 'User',  
                'id'                    => $id,
                'dataubahuser'          => $this->user->Ambil(['idusers'=>$id])->result()
            ];
            $this->template->load('Admin/Template', 'Admin/User/Ubah',$data);
        } else {
            $acak = rand(1000,9999);
            $foto = $acak . '-IMG-Picture.jpg';
            $config['upload_path']          = './upload/user';
            $config['allowed_types']        = 'jpg|jpeg|png|JPG|PNG';
            $config['max_size']             = 6024;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = TRUE;
            $config['file_ext_tolower']     = TRUE;
            $config['file_name']            = $foto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('galery')) {
                // Jika diubah tanpa gambar 
                $passwordhash=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $dataubahtanpagambar=[
                    'namauser'      => $this->input->post('namauser',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'notelepon'     => $this->input->post('notelepon',TRUE),
                    'username'      => $this->input->post('username',TRUE),
                    'password'      => $passwordhash,
                    'is_active'     => $this->input->post('is_active',TRUE),
                    'role'          => $this->input->post('role',TRUE),
                ];
                $this->user->Ubah($dataubahtanpagambar,['idusers' => $id]);
                $this->session->set_flashdata('pesan','Data berhasil di perbaharui.!');
                redirect('Admin/User','refresh');
            } else {
                // Jika di ubah dengan gambar
                $passwordhash=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $data=[
                    'namauser'      => $this->input->post('namauser',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'notelepon'     => $this->input->post('notelepon',TRUE),
                    'username'      => $this->input->post('username',TRUE),
                    'password'      => $passwordhash,
                    'is_active'     => $this->input->post('is_active',TRUE),
                    'role'          => $this->input->post('role',TRUE),
                    'photo'         => $foto
                ];
                $this->user->Ubah($data,['idusers'=> $id]);
                
                $this->session->set_flashdata('pesan','Data berhasil di Perbaharui.!');
                redirect('Admin/User', 'refresh');
            }
        }
    }

    public function GetkodeUser($idusers=null)
	{
		$this->db->where('idusers', $idusers);
		$data=$this->db->get('users')->row();
		echo json_encode($data);
	}

    public function Delete()
	{
		$idusers=$this->input->post('id_hapus');
		$this->db->trans_start();
		$this->db->where('idusers', $idusers);
		$this->db->delete('users');
		$this->db->trans_complete();
		if ($this->db->trans_status()== FALSE) {
			$this->session->set_flashdata('pesan', 'Data User tidak bisa dihapus, karena masih berelasi dengan tabel lain');
		}else{
			$this->session->set_flashdata('pesan', 'Data User berhasil dihapus');
			redirect('Admin/User/', 'refresh');
		}
	}
}
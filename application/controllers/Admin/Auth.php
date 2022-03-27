<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('role') == 'ADMIN') {
            redirect('Admin/Dashboard', 'refresh');
        }
        $this->validasi(); 
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Login Page';
            $this->load->view('Login', $data);
        } else {
            $this->db->where('username', $this->input->post('username', TRUE));
            $this->db->where('is_active', 'Y');
            $query = $this->db->get('users');
            if ($query->row_array() > 0) {
                foreach ($query->result() as $k) {
                    if (password_verify($this->input->post('password', TRUE), $k->password)) {
                        $session_data = array(
                            'idusers'        => $k->idusers,
                            'username'     => $k->username, 
                            'role'      => $k->role,
                            'namauser'      => $k->namauser,
                            'photo'     => $k->photo
                        );
                        $this->session->set_userdata($session_data);

                        redirect('Admin/Dashboard');
                    } else {
                        $this->session->set_flashdata('pesan', 'Password yang anda masukkan tidak sesuai, silahkan cek kembali');
                        $data['title']      = 'Login Page';
                        $this->load->view('Login', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', 'User yang anda cari tidak ditemukan.!');
                $data['title']      = 'Login Page';
                $this->load->view('Login', $data);
            }
        }
    }

    public function validasi()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin/Auth', 'refresh');
        die();
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
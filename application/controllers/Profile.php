<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kamaruser', 'tamu');
    }
    
    public function index()
    {
        $data = [
            'title'                 => 'Hotel AYO!! | Profile',
            // 'id_user'               => $id_user,
            // 'dataubahtamu'          => $this->tamu->Ambil(['idtamu'=>$id_user])->result()
			'idtamu'    => $this->session->userdata('id_user'),
            'dataubahtamu'   => $this->tamu->getDataTamu($this->session->userdata('id_user'))->result()
        ];
        $this->template->load('Users/Template', 'Users/Profile', $data);
    }
}
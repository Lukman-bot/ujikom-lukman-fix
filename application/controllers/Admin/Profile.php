<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
        cek_login();
    }
    
    public function index($idusers = null)
    {
        $data = [
            'title'                 => 'Hotel AYO!! | Profile',
            'menu_navigation'       => 'Profile',
            'submenu_navigation'    => 'Profile',
            'judul'                 => 'Dashboard',
            'subjudul'              => 'Dashboard',
            'breadcrumb1'           => 'Profile',
            'breadcrumb2'           => 'Profile',
            'idusers'               => $idusers,
            'dataubahuser'          => $this->user->Ambil(['idusers'=>$idusers])->result()
        ];
        $this->template->load('Admin/Template', 'Admin/Profile/Index', $data);
    }
}
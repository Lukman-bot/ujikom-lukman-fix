<?php

function check_akses($kamarid, $fasilitasid)
{
    $ci = get_instance();
    $ci->db->where('kamarid', $kamarid);
    $ci->db->where('fasilitasid', $fasilitasid);
    $result = $ci->db->get('detailfasilitaskamar');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function cek_login()
{
    $ci = get_instance();
    $ci->db->where('username', $ci->session->userdata('username'));
    $hasil = $ci->db->get('users');
    if($hasil->row_array() <= 0) {
        redirect('Admin/Auth', 'refresh');
    }
}
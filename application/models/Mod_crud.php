<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_crud extends CI_Model {

	public function simpan($table,$data)
	{
        if ($this->db->insert($table, $data)) {
            return array('status' => 'berhasil','id' => $this->db->insert_id());
        }else{
            return array('status' => 'gagal');
        }
	}
    public function simpan2($table,$data)
    { 
        if ($this->db->insert_batch($table, $data)) {
            return array('status' => 'berhasil','id' => $this->db->insert_id());
        }else{
            return array('status' => 'gagal');
        }
    }
	public function menghapus($tabel, $data = null)
    {
        if ($data != null) {
            $this->db->where($data);
        }
        if ($this->db->delete($tabel)) {
            return array('status' => 'berhasil');
        } else {
            return array('status' => 'gagal');
        }
    }
    public function mengambil($table,$data = null)
    {
    	if ($data != null) {
    		return $this->db->get_where($table,$data);
    	}elseif($data ==null){
    		return $this->db->get($table);
    	}else{
            return array('status' => 'gagal');
        }
    }
    public function mengambil_paket($table,$data)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('jenis', 'paket.jenis_paket = jenis.id_jenis_paket', 'left');
        $this->db->where($data);
        $this->db->group_by('jenis_paket');
        return $this->db->get();
    }
    public function mengambil_user($table,$data = null)
    {
        if ($data != null) {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('outlet', 'user.id_outlet = outlet.id_outlet', 'left');
            $this->db->where($data);
            return $this->db->get();
        }elseif($data ==null){
            return $this->db->get($table);
        }else{
            return array('status' => 'gagal');
        }
    }
    public function mengambil2($table,$data,$data2,$data3)
    {
        $this->db->where($data3);
        $this->db->where($data);
        $this->db->where($data2);
        return $this->db->get($table);
    }
    public function ubah($table,$data,$id = null)
    {
    	if ($id != null) {
    		$this->db->where($id);
    	}else{
    		return array('status' => 'gagal');
    	}
    	if ($this->db->update($table, $data)) {
    		return array('status' => 'berhasil');
    	}else{
    		return array('status' => 'gagal');
    	}

    		
    }
    function kiloan($table,$data){
        $this->db->select('kiloan');
        $this->db->from($table);
        $this->db->where($data);
        return $this->db->get();
    }
    function satuan($table,$data){
        $this->db->select('satuan');
        $this->db->from($table);
        $this->db->where($data);
        return $this->db->get();
    }

}

/* End of file Mod_crud.php */
/* Location: ./application/models/Mod_crud.php */
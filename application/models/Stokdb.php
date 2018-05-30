<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokdb extends CI_Model {
	function ambil_data($where='') { 
        $query = $this->db->query('select * from brg '.$where.' ORDER BY id DESC');
        return $query->result_array(); 
    }
 
    function simpan_data($tabel, $data) 
    {
        $query = $this->db->insert($tabel,$data); 
        return $query;
    }
 
    function ubah_data($data, $where) 
    {
        $this->db->where('id', $where);
        $query = $this->db->update('brg', $data);
        return $query;
    }
 
    function hapus_data($where) 
    {
        $this->db->where('id', $where);
        $query = $this->db->delete('brg');
        return $query;
    }

    function login($user, $pass)
    {
        $this->db->where('user', $user)
                ->where('pass', md5($pass));
        $query = $this->db->get('login');
        return $query->result_array();
    }

    function lihat_data($number, $offset){
        $this->db->order_by('id DESC');
        $query = $this->db->get('brg',$number,$offset);
        return $query->result();
    }
 
    function total_data(){
        $query = $this->db->get('brg')->num_rows();
        return $query;
    }

    function cari_data($batas=null, $offset=null, $search=null)
    {
        $this->db->from('brg');
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($search != null) {
           $this->db->or_like($search);
        }
        $this->db->order_by('id DESC');
        $query = $this->db->get();
     
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function total_cari($search)
    {
        $this->db->from('brg');
        $this->db->or_like($search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total()
    {
        $this->db->select_sum('ttl');
        $query = $this->db->get('brg');
        return $query->result();
    }
}
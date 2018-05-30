<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stokdb');
        $this->load->library('Fungsi');
    }


	function index()
	{
		if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        }else{
            $total = $this->Stokdb->total_data();
            $config['base_url'] = base_url('data/index');
            $config['total_rows'] = $total;
            $config['per_page'] = 25;
            $config['full_tag_open']    = '<ul class="pagination">';
            $config['full_tag_close']   = '</ul>';
            $config['first_link']       = 'Awal';
            $config['last_link']        = 'Akhir';
            $config['first_tag_open']   = '<li>';
            $config['first_tag_close']  = '</li>';
            $config['prev_link']        = '&laquo';
            $config['prev_tag_open']    = '<li class="prev">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = '&raquo';
            $config['next_tag_open']    = '<li>';
            $config['next_tag_close']   = '</li>';
            $config['last_tag_open']    = '<li>';
            $config['last_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="active"><a href="">';
            $config['cur_tag_close']    = '</a></li>';
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';
            $this->pagination->initialize($config);
            $from = $this->uri->segment(3);
            $data = array(
                'halaman'   => $this->pagination->create_links(),
                'result'    => $this->Stokdb->lihat_data($config['per_page'], $from),
                'ttlbrg'    => $this->Stokdb->total(),
                'jmlbrg'    => $total
            );
            $this->fungsi->template('tabeldata', $data);
        } 
	}

    function search()
    {
        if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        }else{
            $kunci = $this->input->get('s'); 
            $halaman =$this->input->get('per_page');
            $cari =array('nm' => $kunci);
            $batas = 25;
            if(!$halaman){
                $offset = 0;
            }else{
                $offset = $halaman;
            }
            $total = $this->Stokdb->total_cari($cari);
            $config['page_query_string'] = TRUE;
            $config['base_url'] = base_url('data/search?s='.$kunci);
            $config['total_rows'] = $total;
            $config['per_page'] = $batas;
            $config['uri_segment'] = $halaman;
            $config['full_tag_open']    = '<ul class="pagination">';
            $config['full_tag_close']   = '</ul>';
            $config['first_link']       = 'Awal';
            $config['last_link']        = 'Akhir';
            $config['first_tag_open']   = '<li>';
            $config['first_tag_close']  = '</li>';
            $config['prev_link']        = '&laquo';
            $config['prev_tag_open']    = '<li class="prev">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = '&raquo';
            $config['next_tag_open']    = '<li>';
            $config['next_tag_close']   = '</li>';
            $config['last_tag_open']    = '<li>';
            $config['last_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="active"><a href="">';
            $config['cur_tag_close']    = '</a></li>';
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';
            $this->pagination->initialize($config);
            $jmlbrg = $this->Stokdb->total_data();
            $data = array(
                'halaman'   => $this->pagination->create_links(),
                'result'    => $this->Stokdb->cari_data($batas, $offset, $cari),
                'src'       => $kunci,
                'ttlbrg'    => $this->Stokdb->total(),
                'jmlbrg'    => $jmlbrg
            );
            $this->fungsi->template('tabeldata', $data);
        }
    }

	function insert()
    {
		if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        } else {
            $this->fungsi->template('insert');
    	}
    }	

	function save()
    {
		if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        } else {
        	$data = array( 
                'nm'    => $this->input->post('nm'),
                'stk'   => $this->input->post('stk'),
                'hrg'   => $this->input->post('hrg'),
                'ttl'   => $this->input->post('ttl')
        	);
        	$simpan = $this->Stokdb->simpan_data('brg', $data); 
            if ($simpan) {
                $this->session->set_flashdata('message', 'Data Barang <b>BERHASIL</b> Ditambahkan');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('message', 'Data Barang <b>GAGAL</b> Ditambahkan');
                redirect(base_url());
            }
        }
    }

    function edit($id) 
    {
		if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        } else {
        	$result = $this->Stokdb->ambil_data("WHERE id = '$id'"); 
        	$data = array( 
            	'id'       => $result[0]['id'],
            	'nama'     => $result[0]['nm'],
            	'stok'     => $result[0]['stk'],
            	'harga'    => $result[0]['hrg'],
            	'total'    => $result[0]['ttl']
        	);
            $this->fungsi->template('edit', $data);
    	}
    }

    function update() 
    {
    	if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        } else {
        	$id = $this->input->post('id');
        	$data = array( 
                'nm' => $this->input->post('nm'),
                'stk' => $this->input->post('stk'),
                'hrg' => $this->input->post('hrg'),
                'ttl' => $this->input->post('ttl')
        	);
        	$simpan = $this->Stokdb->ubah_data($data, $id); 
        	if ($simpan) {
                $this->session->set_flashdata('message', 'Data Barang <b>BERHASIL</b> Diubah');
            	redirect(base_url());
        	} else {
            	$this->session->set_flashdata('message', 'Data Barang <b>GAGAL</b> Diubah');
            	redirect(base_url('data/edit/'.$id));
        	}
    	}
    }
 
    function delete($id) 
    {
    	if (!$this->session->userdata('login')) { 
            redirect(base_url('data/login'));
        } else {
    		$hapus = $this->Stokdb->hapus_data($id); 
	    	if ($hapus) {
        	   	$this->session->set_flashdata('message', 'Data Barang <b>BERHASIL</b> Dihapus');
                redirect(base_url());
        	} else {
            	$this->session->set_flashdata('message', 'Data Barang <b>GAGAL</b> Dihapus');
                redirect(base_url());
        	}
        }  
    }

    function login()
    {
        if (!$this->session->userdata('login')) { 
            $this->fungsi->template('login');
        } else {
            redirect(base_url());
        }
    }

    function auth() 
    {
        $user = $this->input->post('user'); 
        $pass = $this->input->post('pass');
        $login = $this->Stokdb->login($user, $pass); 
        if ($login) { 
            $sesi = array(
                'login' => $login[0]['user']
            );
            $this->session->set_userdata($sesi);
            redirect(base_url());
        } else {
            $this->session->set_flashdata('message', 'Login Gagal');
            redirect(base_url('data/login'));
        }
    }
  
    function logout() 
    {
        session_destroy();
        redirect(base_url());
    }
}
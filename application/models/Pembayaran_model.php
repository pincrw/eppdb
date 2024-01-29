<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    public $table = 'pembayaran';
    public $id = 'id_pembayaran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->datatables->from('pembayaran');
        //add this line for join
        //$this->datatables->join('table2', 'pembayaran.field = table2.field');
        $this->datatables->join('users', 'pembayaran.id_users = users.id');
        $this->datatables->add_column('action', 
            // anchor(site_url('pembayaran/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('pembayaran/transactions/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Print transactions" target="blank"')."  ".
            anchor(site_url('pembayaran/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('pembayaran/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'pembayaran/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_pembayaran');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all_()
    {      
        $this->db->select('no_pendaftaran,nisn,nama_peserta,nomor_hp,sum(jumlah_bayar) as jumlah,ket');
        $this->db->join('peserta', 'pembayaran.id_users = peserta.id_users');
        $this->db->join('tahunpelajaran', 'tahunpelajaran.id_tahun = peserta.id_tahun');
        $this->db->where('status_tahun', 'Aktif');  
        $this->db->where('jenis_bayar', 'Daftar ulang');  
        $this->db->where('status_bayar','Sudah bayar');  
        $this->db->group_by('pembayaran.id_users');   
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all pendafatarn
    function get_all_pendaftaran()
    {      
        $this->db->select('no_pendaftaran,nisn,nama_peserta,nomor_hp,sum(jumlah_bayar) as jumlah,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('peserta', 'peserta.id_users = pembayaran.id_users');
        $this->db->join('tahunpelajaran', 'tahunpelajaran.id_tahun = peserta.id_tahun');
        $this->db->where('status_tahun', 'Aktif');  
        $this->db->where('jenis_bayar', 'Pendaftaran');  
        $this->db->where('status_bayar','Sudah bayar');  
        $this->db->group_by('pembayaran.id_users');   
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }    

    // get data by id
    function get_by_id($id)
    { 
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');             
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id_users
    function get_by_id_users()
    {
        $user = $this->ion_auth->user()->row();   
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);
        return $this->db->get($this->table)->result();
    }

    // get data by pendaftaran
    function get_by_pendaftaran()
    {
        $user = $this->ion_auth->user()->row();   
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);
        $this->db->where('jenis_bayar', 'Pendaftaran');
        return $this->db->get($this->table)->result();
    }

    // get data by daftar ulang
    function get_by_daftar_ulang()
    {
        $user = $this->ion_auth->user()->row();   
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);
        $this->db->where('jenis_bayar', 'Daftar ulang');
        return $this->db->get($this->table)->result();
    }   

    // get data by user daftar ulang
    function get_by_user_du()
    {
        $user = $this->ion_auth->user()->row();   
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);
        $this->db->where('jenis_bayar', 'Daftar ulang');
        return $this->db->get($this->table)->row();
    }     

    // get data by id_user
    function get_by_id_user()
    {
        $user = $this->ion_auth->user()->row();   
        $this->db->select('id_pembayaran,no_transaksi,id_users,full_name,pembayaran,jumlah_bayar,tanggal_bayar,petugas,bukti_bayar,jenis_bayar,status_bayar');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);
        return $this->db->get($this->table)->row();
    }    

    // get_count by sudah bayar
    function get_countdu()
    {
        $this->db->select('count(DISTINCT id_users) as count');        
        $this->db->where('status_bayar','Sudah bayar');   
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
    } 

    // get_count by sudah bayar
    function get_countbayar()
    {
        $this->db->where('status_bayar','Sudah bayar'); 
        return $query = $this->db->get($this->table)->num_rows();
    } 

    // get_count by pending
    function get_countpending()
    {
        $this->db->where('status_bayar','Pending'); 
        return $query = $this->db->get($this->table)->num_rows();
    }  

    // get total bayar
    function get_tot_bayar()
    {
        $this->db->select('sum(jumlah_bayar) as total');
        $this->db->where('status_bayar','Sudah bayar');
        return $this->db->get($this->table)->row();
    }        

    // get total bayar by id user
    function get_tot_bayar_user()
    {
        $user = $this->ion_auth->user()->row();  
        $this->db->select('sum(jumlah_bayar) as total');
        $this->db->join('users', 'pembayaran.id_users = users.id');         
        $this->db->where('id_users', $user->id);        
        $this->db->where('status_bayar','Sudah bayar');
        $this->db->where('jenis_bayar','Daftar ulang');
        return $this->db->get($this->table)->row();
    }   

    // get total pendaftaran
    function get_tot_pendaftaran()
    {
        $this->db->select('sum(jumlah_bayar) as total');
        $this->db->join('peserta', 'pembayaran.id_users = peserta.id_users');
        $this->db->join('tahunpelajaran', 'tahunpelajaran.id_tahun = peserta.id_tahun');
        $this->db->where('status_tahun', 'Aktif');  
        $this->db->where('jenis_bayar', 'Pendaftaran');  
        $this->db->where('status_bayar','Sudah bayar');   
        return $this->db->get($this->table)->row();
    } 

    // get total daftar ulang
    function get_tot_du()
    {
        $this->db->select('sum(jumlah_bayar) as total');
        $this->db->join('peserta', 'pembayaran.id_users = peserta.id_users');
        $this->db->join('tahunpelajaran', 'tahunpelajaran.id_tahun = peserta.id_tahun');
        $this->db->where('status_tahun', 'Aktif');  
        $this->db->where('jenis_bayar', 'Daftar ulang');  
        $this->db->where('status_bayar','Sudah bayar');   
        return $this->db->get($this->table)->row();
    }         

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_pembayaran', $q);
    	$this->db->or_like('no_transaksi', $q);
    	$this->db->or_like('id_users', $q);
    	$this->db->or_like('pembayaran', $q);
    	$this->db->or_like('jumlah_bayar', $q);
    	$this->db->or_like('tanggal_bayar', $q);
    	$this->db->or_like('petugas', $q);
    	$this->db->or_like('bukti_bayar', $q);
        $this->db->or_like('jenis_bayar', $q);
    	$this->db->or_like('status_bayar', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pembayaran', $q);
    	$this->db->or_like('no_transaksi', $q);
    	$this->db->or_like('id_users', $q);
    	$this->db->or_like('pembayaran', $q);
    	$this->db->or_like('jumlah_bayar', $q);
    	$this->db->or_like('tanggal_bayar', $q);
    	$this->db->or_like('petugas', $q);
    	$this->db->or_like('bukti_bayar', $q);
        $this->db->or_like('jenis_bayar', $q);
    	$this->db->or_like('status_bayar', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./assets/uploads/attachment/$row->bukti_bayar");
        $this->db->delete($this->table, array($this->id => $id));        
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}
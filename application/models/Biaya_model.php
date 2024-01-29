<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya_model extends CI_Model
{

    public $table = 'biaya';
    public $id = 'id_biaya';
    public $order = 'asc';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->datatables->from('biaya');
        $this->datatables->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun');
        $this->datatables->where('status_tahun','Aktif'); 
        $this->datatables->add_column('action', 
            // anchor(site_url('biaya/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('biaya/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('biaya/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'biaya/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_biaya');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->where('status_tahun','Aktif');          
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all wajib pendaftaran
    function get_all_wajib()
    {
        $this->db->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->where('status_tahun','Aktif');        
        $this->db->where('jenis_biaya','Pendaftaran');
        $this->db->where('status_biaya','Wajib');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }   

    // get all wajib daftar ulang
    function get_all_wajib_du()
    {
        $this->db->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->where('status_tahun','Aktif');           
        $this->db->where('jenis_biaya','Daftar ulang');
        $this->db->where('status_biaya','Wajib');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }   

    // get all wajib daftar ulang per peserta
    function get_all_wajib_du_peserta($id)
    {
        $this->db->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun');
        $this->db->join('peserta', 'peserta.id_tahun = tahunpelajaran.id_tahun');  
        // $this->db->where('status_tahun','Aktif');           
        $this->db->where('jenis_biaya','Daftar ulang');
        $this->db->where('status_biaya','Wajib');
        $this->db->where('id_peserta',$id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }         

    // get total biaya pendaftaran
    function get_tot_biaya()
    {
        $this->db->select('sum(jumlah_biaya) as total');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->where('status_tahun','Aktif');          
        $this->db->where('jenis_biaya','Pendaftaran');
        $this->db->where('status_biaya','Wajib');
        return $this->db->get($this->table)->row();
    } 

    // get total biaya daftar ulang
    function get_tot_biaya_du()
    {
        $this->db->select('sum(jumlah_biaya) as total');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->where('status_tahun','Aktif');          
        $this->db->where('jenis_biaya','Daftar ulang');
        $this->db->where('status_biaya','Wajib');
        return $this->db->get($this->table)->row();
    } 

    // get total biaya daftar ulang per peserta
    function get_tot_biaya_du_peserta($id)
    {
        $this->db->select('sum(jumlah_biaya) as total');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun'); 
        $this->db->join('peserta', 'peserta.id_tahun = tahunpelajaran.id_tahun');  
        // $this->db->where('status_tahun','Aktif');          
        $this->db->where('jenis_biaya','Daftar ulang');
        $this->db->where('status_biaya','Wajib');
        $this->db->where('id_peserta',$id);
        return $this->db->get($this->table)->row();
    }          

    // get data by id biaya
    function get_by_id($id)
    {
        $this->db->select('id_biaya,nama_biaya,jumlah_biaya,jenis_biaya,status_biaya,tahunpelajaran.id_tahun,tahun_pelajaran,ket');
        $this->db->join('tahunpelajaran', $this->table.'.id_tahun = tahunpelajaran.id_tahun');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_biaya', $q);
    	$this->db->or_like('nama_biaya', $q);
    	$this->db->or_like('jumlah_biaya', $q);
        $this->db->or_like('jenis_biaya', $q);
    	$this->db->or_like('status_biaya', $q);        
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_biaya', $q);
    	$this->db->or_like('nama_biaya', $q);
    	$this->db->or_like('jumlah_biaya', $q);
        $this->db->or_like('jenis_biaya', $q);
    	$this->db->or_like('status_biaya', $q);        
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
        $this->db->delete($this->table);
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
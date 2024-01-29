<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Raporsemester_model extends CI_Model
{

    public $table = 'raporsemester';
    public $id = 'id_raporsemester';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_raporsemester,peserta.id_peserta,peserta.no_pendaftaran,peserta.nama_peserta,mapel,satu,dua,tiga,empat,lima');
        $this->datatables->from('raporsemester');
        //add this line for join
        //$this->datatables->join('table2', 'raporsemester.field = table2.field');
        $this->datatables->join('peserta', 'raporsemester.id_peserta = peserta.id_peserta');
        $this->datatables->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->datatables->where('status_tahun','Aktif');
        $this->datatables->add_column('action', 
            anchor(site_url('raporsemester/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('raporsemester/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('raporsemester/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'raporsemester/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_raporsemester');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_raporsemester,peserta.id_peserta,peserta.nisn,peserta.no_pendaftaran,peserta.nama_peserta,mapel,satu,dua,tiga,empat,lima');
        $this->db->join('peserta', 'raporsemester.id_peserta = peserta.id_peserta');        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_raporsemester,peserta.id_peserta,peserta.nisn,peserta.no_pendaftaran,peserta.nama_peserta,mapel,satu,dua,tiga,empat,lima');
        $this->db->join('peserta', 'raporsemester.id_peserta = peserta.id_peserta');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_raporsemester', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('mapel', $q);
    	$this->db->or_like('satu', $q);
    	$this->db->or_like('dua', $q);
    	$this->db->or_like('tiga', $q);
    	$this->db->or_like('empat', $q);
    	$this->db->or_like('lima', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_raporsemester', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('mapel', $q);
    	$this->db->or_like('satu', $q);
    	$this->db->or_like('dua', $q);
    	$this->db->or_like('tiga', $q);
    	$this->db->or_like('empat', $q);
    	$this->db->or_like('lima', $q);
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
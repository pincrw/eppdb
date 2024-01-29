<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tesdanwawancara_model extends CI_Model
{

    public $table = 'tesdanwawancara';
    public $id = 'id_tesdanwawancara';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_tesdanwawancara,peserta.id_peserta,nama_peserta,no_pendaftaran,nilai_tes,nilai_wawancara,kesimpulan');
        $this->datatables->from('tesdanwawancara');
        //add this line for join
        //$this->datatables->join('table2', 'tesdanwawancara.field = table2.field');
        $this->datatables->join('peserta', 'tesdanwawancara.id_peserta = peserta.id_peserta');       
        $this->datatables->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->datatables->where('status_tahun','Aktif');          
        $this->datatables->add_column('action', 
            // anchor(site_url('tesdanwawancara/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('tesdanwawancara/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('tesdanwawancara/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'tesdanwawancara/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_tesdanwawancara');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_tesdanwawancara,peserta.id_peserta,nama_peserta,no_pendaftaran,nilai_tes,nilai_wawancara,kesimpulan');
        $this->db->join('peserta', 'tesdanwawancara.id_peserta = peserta.id_peserta');       
        $this->db->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->db->where('status_tahun','Aktif');          
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_tesdanwawancara,peserta.id_peserta,nisn,nama_peserta,no_pendaftaran,nilai_tes,nilai_wawancara,kesimpulan');
        $this->db->join('peserta', 'tesdanwawancara.id_peserta = peserta.id_peserta');       
        $this->db->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->db->where('status_tahun','Aktif');         
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id peserta
    function get_by_id_peserta($id_peserta)
    {
        $this->db->select('id_tesdanwawancara,peserta.id_peserta,nisn,nama_peserta,no_pendaftaran,nilai_tes,nilai_wawancara,kesimpulan');
        $this->db->join('peserta', 'tesdanwawancara.id_peserta = peserta.id_peserta');       
        $this->db->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->db->where('status_tahun','Aktif');         
        $this->db->where('peserta.id_peserta', $id_peserta);
        return $this->db->get($this->table)->row();
    }    

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_tesdanwawancara', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('nilai_tes', $q);
    	$this->db->or_like('nilai_wawancara', $q);
        $this->db->or_like('kesimpulan', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tesdanwawancara', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('nilai_tes', $q);
    	$this->db->or_like('nilai_wawancara', $q);
        $this->db->or_like('kesimpulan', $q);
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
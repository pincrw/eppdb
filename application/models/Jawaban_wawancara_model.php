<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jawaban_wawancara_model extends CI_Model
{

    public $table = 'jawaban_wawancara';
    public $table1 = 'tesdanwawancara';
    public $id = 'id_jawaban';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_jawaban,peserta.id_peserta,no_pendaftaran,nama_peserta,nomor_hp,asal_sekolah,nilai_wawancara,kesimpulan');
        $this->datatables->from('jawaban_wawancara');
        //add this line for join
        //$this->datatables->join('table2', 'jawaban_wawancara.field = table2.field');
        $this->datatables->join('peserta', 'peserta.id_peserta = jawaban_wawancara.id_peserta');  
        $this->datatables->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->datatables->join('tesdanwawancara', 'tesdanwawancara.id_peserta = peserta.id_peserta','left'); 
        $this->datatables->group_by('peserta.id_peserta');          
        $this->datatables->add_column('action', 
            anchor(site_url('jawaban_wawancara/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('jawaban_wawancara/printwawancara/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs btn-info btn-flat" data-toggle="tooltip" title="Print Wawancara" target="blank"')."  ".              
            anchor(site_url('jawaban_wawancara/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'jawaban_wawancara/delete/$1\')" data-toggle="tooltip" title="Delete"')
            , 'id_jawaban');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_jawaban,peserta.id_peserta,no_pendaftaran,nama_peserta,nomor_hp,asal_sekolah,wawancara.id_wawancara,pertanyaan,jawaban');
        $this->db->join('peserta', 'peserta.id_peserta = jawaban_wawancara.id_peserta');  
        $this->db->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->db->join('wawancara', 'wawancara.id_wawancara = jawaban_wawancara.id_wawancara');         
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_jawaban,peserta.id_peserta,no_pendaftaran,nama_peserta,tanggal_lahir,nomor_hp,asal_sekolah,tahun_pelajaran,tanggal_daftar,qrcode');
        $this->db->join('peserta', 'peserta.id_peserta = jawaban_wawancara.id_peserta');  
        $this->db->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->db->join('tahunpelajaran', 'tahunpelajaran.id_tahun = peserta.id_tahun');           
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get jawaban wawancara by id_peserta
    function jawaban($id_peserta)
    {
        $this->db->select('id_jawaban,peserta.id_peserta,no_pendaftaran,nama_peserta,nomor_hp,asal_sekolah,wawancara.id_wawancara,pertanyaan,jawaban');
        $this->db->join('peserta', 'peserta.id_peserta = jawaban_wawancara.id_peserta');  
        $this->db->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->db->join('wawancara', 'wawancara.id_wawancara = jawaban_wawancara.id_wawancara'); 
        $this->db->where('peserta.id_peserta', $id_peserta);
        return $this->db->get($this->table)->result();                
    }       

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_jawaban', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('id_wawancara', $q);
    	$this->db->or_like('jawaban', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jawaban', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('id_wawancara', $q);
    	$this->db->or_like('jawaban', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table1, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id_peserta)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in('id_peserta', $arr_id);
        return $this->db->delete($this->table);
    }
}
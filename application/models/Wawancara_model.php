<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wawancara_model extends CI_Model
{

    public $table = 'wawancara';
    public $id = 'id_wawancara';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {
        $this->datatables->select('id_wawancara,pertanyaan');
        $this->datatables->from('wawancara');
        //add this line for join
        //$this->datatables->join('table2', 'wawancara.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('wawancara/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('wawancara/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('wawancara/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'wawancara/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_wawancara');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_wawancara', $q);
    	$this->db->or_like('pertanyaan', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_wawancara', $q);
    	$this->db->or_like('pertanyaan', $q);
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
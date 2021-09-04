<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggaran_model extends CI_Model
{

    public $table = 'tbl_pelanggaran';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('pelanggaran', $q);
        $this->db->or_like('sanksi', $q);
        $this->db->or_like('kelas', $q);
        $this->db->or_like('tgl', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('pelanggaran', $q);
        $this->db->or_like('sanksi', $q);
        $this->db->or_like('kelas', $q);
        $this->db->or_like('tgl', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function count_all()
    {
        return $this->db->get($this->table)->num_rows();
    }

    function get_where($field, $data)
    {
        $this->db->where('$field', '$data');
        return $this->db->get($this->table)->row_array();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
}

/* End of file Pelanggaran_model.php */
/* Location: ./application/models/Pelanggaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-28 09:45:48 */
/* http://harviacode.com */
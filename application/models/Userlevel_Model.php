<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlevel_Model extends CI_Model
{
    public $table = 'tbl_user_level';
    public $id = 'id_user_level';
    public $order = 'ASC';

    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    function count_all()
    {
        return $this->db->get($this->table)->num_rows();
    }

    function get_where($field, $data)
    {
        $this->db->where("$field", "$data");
        return $this->db->get($this->table)->row_array();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

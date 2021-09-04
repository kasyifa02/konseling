<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mastercrud extends CI_Model
{

    function get_where($field, $data, $table)
    {
        $this->db->where("$field", "$data");
        return $this->db->get("$table")->row_array();
    }

    function get_by_id($table, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->get($table)->row();
    }

    function query($query)
    {
        return $this->db->query($query)->row();
    }

    // insert data
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // update data
    function update($table, $field, $id, $data)
    {
        $this->db->where($field, $id);
        $this->db->update($table, $data);
    }

    // delete data
    function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('type');
        if($id)
        {
            $this->db->where('id_type', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getDataStock($id = null)
    {
        $this->db->from('stock');
        if($id)
        {
            $this->db->where('id_type', $id['id']);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'name' => htmlspecialchars($data['name']),
            'description' => htmlspecialchars($data['description']),
            'unit_price' => htmlspecialchars($data['unit_price']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('type', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'name' => htmlspecialchars($data['name']),
            'description' => htmlspecialchars($data['description']),
            'unit_price' => htmlspecialchars($data['unit_price']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_type', $data['id']);
        $this->db->update('type', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_type', $data['id']);
        $this->db->update('type', $params);
    }

}

?>
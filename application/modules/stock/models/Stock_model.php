<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('stock');
        $this->db->join('type', 'type.id_type = stock.id_type');
        if($id)
        {
            $this->db->where('stock.id_stock', $id);
        }
        $this->db->where('stock.deleted_at', null);
        return $this->db->get();
    }

    public function getDataType($id = null)
    {
        $this->db->from('stock');
        if($id)
        {
            $this->db->where('id_type', $id['id_type']);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_type' => htmlspecialchars($data['id_type']),
            'qty' => htmlspecialchars($data['qty']),
            'type' => 'in',
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('stock', $params);
    }

    public function jumlah($data, $jumlah)
    {
        $id = $data['id_type'];
        $total = $jumlah + $data['qty'];
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'qty' => htmlspecialchars($total),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_type', $data['id_type']);
        $this->db->update('stock', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_stock', $data['id']);
        $this->db->update('stock', $params);
    }

}

?>
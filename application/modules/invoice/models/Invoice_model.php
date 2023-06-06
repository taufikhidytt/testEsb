<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('invoice.*, type.name, type.unit_price, type.description as description_type, stock.qty as total_qty');
        $this->db->from('invoice');
        $this->db->join('type', 'type.id_type = invoice.id_type');
        $this->db->join('stock', 'stock.id_stock = invoice.id_stock');
        if($id)
        {
            $this->db->where('id_invoice', $id);
        }
        $this->db->where('invoice.deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_type' => htmlspecialchars($data['id_type']),
            'id_stock' => htmlspecialchars($data['id_stock']),
            'subject' => htmlspecialchars($data['subject']),
            'qty' => htmlspecialchars($data['qty']),
            'tax' => htmlspecialchars($data['tax']),
            'status' => htmlspecialchars($data['status']),
            'from' => htmlspecialchars($data['from']),
            'alamat_pengirim' => htmlspecialchars($data['alamat_pengirim']),
            'for' => htmlspecialchars($data['for']),
            'alamat_penerima' => htmlspecialchars($data['alamat_penerima']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('invoice', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_type' => htmlspecialchars($data['id_type']),
            'id_stock' => htmlspecialchars($data['id_stock']),
            'subject' => htmlspecialchars($data['subject']),
            'qty' => htmlspecialchars($data['qty']),
            'tax' => htmlspecialchars($data['tax']),
            'status' => htmlspecialchars($data['status']),
            'from' => htmlspecialchars($data['from']),
            'alamat_pengirim' => htmlspecialchars($data['alamat_pengirim']),
            'for' => htmlspecialchars($data['for']),
            'alamat_penerima' => htmlspecialchars($data['alamat_penerima']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_invoice', $data['id_invoice']);
        $this->db->update('invoice', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_invoice', $data['id']);
        $this->db->update('invoice', $params);
    }

}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model', 'stock');
        $this->load->model('item_type/Type_model', 'type');
    }

    public function index()
    {
        $data['title'] = 'Stock | Invoice App';
        $data['judul'] = 'Stock';
        $data['data'] = $this->stock->getData();
        $this->template->load('template', 'stock/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name Item Type', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Stock | Invoice App';
            $data['judul'] = 'Add Stock';
            $data['data'] = $this->type->getData();
            $this->template->load('template', 'stock/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $query = $this->stock->getDataType($data)->row_array();
            if($query == !NULL){
                $this->stock->jumlah($data, $query['qty']);
            }else{
                $this->stock->add($data);
            }
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Stock Baru');
                redirect('stock');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Stock Baru');
                redirect('stock');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->stock->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
            redirect('stock');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('stock');
        }
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_type extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Type_model', 'type');
    }

    public function index()
    {
        $data['title'] = 'Item Type | Invoice App';
        $data['judul'] = 'Item Type';
        $data['data'] = $this->type->getData();
        $this->template->load('template', 'item_type/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name Item Type', 'required');
        $this->form_validation->set_rules('description', 'Description Item Type', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Item Type | Invoice App';
            $data['judul'] = 'Add Item Type';
            $this->template->load('template', 'item_type/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->type->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('item_type');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('item_type');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name Item Type', 'required');
        $this->form_validation->set_rules('description', 'Description Item Type', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->type->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Item Type | Invoice App';
                $data['judul'] = 'Update Item Type';
                $data['data'] = $query->row();
                $this->template->load('template', 'item_type/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('item_type');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->type->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('item_type');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('item_type');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $query = $this->type->getDataStock($data);
        if($query->num_rows() > 0)
        {
            $this->session->set_flashdata('warning', 'Tidak Bisa Menghapus Data, Data Masih Di Gunakan Di Modul Stock');
            redirect('item_type');
        }else{
            $this->type->del($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
                redirect('item_type');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
                redirect('item_type');
            }
        }
    }
}
?>
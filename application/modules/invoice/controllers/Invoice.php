<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model', 'invoice');
        $this->load->model('stock/Stock_model', 'stock');
    }

    public function index()
    {
        $data['title'] = 'Data Invoice | Invoice App';
        $data['judul'] = 'Data Invoice';
        $data['data'] = $this->invoice->getData();
        $this->template->load('template', 'invoice/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name Item Type', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('tax', 'Tax', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('from', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('for', 'Nama Penerima', 'required');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Invoice | Invoice App';
            $data['judul'] = 'Add Invoice';
            $data['data'] = $this->stock->getData();
            $this->template->load('template', 'invoice/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->invoice->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('invoice');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('invoice');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name Item Type', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('tax', 'Tax', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('from', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('for', 'Nama Penerima', 'required');
        $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->invoice->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Invoice | Invoice App';
                $data['judul'] = 'Update Invoice';
                $data['data'] = $query->row();
                $this->template->load('template', 'invoice/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('invoice');
            }
        } else {
            $data = $this->input->post(null, true);
            // var_dump($data);
            // die();
            $this->invoice->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('invoice');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('invoice');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->invoice->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
            redirect('invoice');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('invoice');
        }
    }
}
?>
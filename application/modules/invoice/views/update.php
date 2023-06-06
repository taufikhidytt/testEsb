<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('invoice')?>">Data Invoice</a></li>
            <li class="breadcrumb-item active"><?= $judul?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('invoice')?>" class="btn btn-secondary btn-sm">
                <i class="fa fa-reply-all"></i> Back
            </a>
        </div>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <p><b>Nama Item :</b></p>
            <div class="form-group input-group input-group-sm">
              <input type="hidden" name="id_invoice" id="id_invoice" value="<?= $this->input->post('id_invoice') ?? $data->id_invoice ?>">
              <input type="hidden" name="id_type" id="id_type" value="<?= $this->input->post('id_type') ?? $data->id_type ?>">
              <input type="hidden" name="id_stock" id="id_stock" value="<?= $this->input->post('id_stock')?? $data->id_stock?>">
              <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Masukan Name Item Type" readonly value="<?= $this->input->post('name') ?? $data->name ?>">
            </div>
            <span class="text-red"><?= form_error('name')?></span>
            <div class="form-group">
                <label for="total_qty">Total Quantity</label>
                <input type="text" name="total_qty" id="total_qty" class="form-control" readonly value="<?= $this->input->post('total_qty') ?? $data->total_qty?>" placeholder="-">
            </div>
            <div class="form-group">
                <label for="price">Price/Item</label>
                <input type="text" name="price" id="price" class="form-control" readonly value="<?= $this->input->post('price') ?? $data->unit_price ?>" placeholder="-">
            </div>
            <div class="form-group">
                <label for="qty">Quantity :</label>
                <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : null ?>" id="qty" name="qty" placeholder="Masukan Quantity Item" value="<?= $this->input->post('qty') ?? $data->qty?>" min="0" max="1">
                <span class="text-red"><?= form_error('qty')?></span>
            </div>
            <div class="form-group">
                <label for="subject">Subject :</label>
                <input type="text" class="form-control <?= form_error('subject') ? 'is-invalid' : null ?>" id="subject" name="subject" placeholder="Masukan Subject Invoice" value="<?= $this->input->post('subject') ?? $data->subject ?>">
                <span class="text-red"><?= form_error('subject')?></span>
            </div>
            <div class="form-group">
                <label for="tax">Tax Invoice :</label>
                <input type="number" class="form-control <?= form_error('tax') ? 'is-invalid' : null ?>" id="tax" name="tax" placeholder="Masukan Tax Invoice" value="<?= $this->input->post('tax') ?? $data->tax ?>">
                <span class="text-red"><?= form_error('tax')?></span>
            </div>
            <div class="form-group">
                <label for="status">Status :</label>
                <select name="status" id="status" class="form-control">
                  <option value="">--Pilih--</option>
                  <option value="unpaid" <?= set_value('status', $data->status ) == 'unpaid' ? 'selected' : null ?> >Unpaid</option>
                  <option value="paid" <?= set_value('status', $data->status ) == 'paid' ? 'selected' : null ?>>Paid</option>
                </select>
                <span class="text-red"><?= form_error('status')?></span>
            </div>
            <div class="form-group">
                <label for="from">Nama Pengirim :</label>
                <input type="text" class="form-control <?= form_error('from') ? 'is-invalid' : null ?>" id="from" name="from" placeholder="Masukan Nama Pengirim" value="<?= $this->input->post('from') ?? $data->from?>">
                <span class="text-red"><?= form_error('from')?></span>
            </div>
            <div class="form-group">
                <label for="alamat_pengirim">Alamat Pengirim :</label>
                <textarea name="alamat_pengirim" id="alamat_pengirim" class="form-control <?= form_error('alamat_pengirim') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat Pengirim"><?= $this->input->post('alamat_pengirim') ?? $data->alamat_pengirim ;?></textarea>
                <span class="text-red"><?= form_error('alamat_pengirim')?></span>
            </div>
            <div class="form-group">
                <label for="for">Nama Penerima :</label>
                <input type="text" class="form-control <?= form_error('for') ? 'is-invalid' : null ?>" id="for" name="for" placeholder="Masukan Nama Penerima" value="<?= $this->input->post('for') ?? $data->for ?>">
                <span class="text-red"><?= form_error('for')?></span>
            </div>
            <div class="form-group">
                <label for="alamat_penerima">Alamat Penerima :</label>
                <textarea name="alamat_penerima" id="alamat_penerima" class="form-control <?= form_error('alamat_penerima') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat Penerima"><?= $this->input->post('alamat_penerima') ?? $data->alamat_penerima;?></textarea>
                <span class="text-red"><?= form_error('alamat_penerima')?></span>
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check"></i> Submit
            </button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
  $('#stock').DataTable();

</script>
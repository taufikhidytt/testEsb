

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
            <li class="breadcrumb-item"><a href="<?= base_url('stock')?>">Data Stock</a></li>
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
            <a href="<?= base_url('stock')?>" class="btn btn-secondary btn-sm">
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group input-group input-group-sm">
              <input type="hidden" name="id_stock" id="id_stock" value="<?= $stock->id_stock?>">
              <input type="hidden" name="id_type" id="id_type" value="<?= $this->input->post('id_type') ?? $stock->id_type?>">
              <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Masukan Name Item Type" readonly value="<?= $this->input->post('name') ?? $stock->name ?>">
            </div>
            <span class="text-red"><?= form_error('name')?></span>
            <div class="form-group">
                <label for="qty">Quantity :</label>
                <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : null ?>" id="qty" name="qty" placeholder="Masukan Quantity Item Type" value="<?= $this->input->post('qty') ?? $stock->qty ?>">
                <span class="text-red"><?= form_error('qty')?></span>
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

</script>
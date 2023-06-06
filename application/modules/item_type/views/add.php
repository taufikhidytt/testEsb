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
            <li class="breadcrumb-item"><a href="<?= base_url('item_type')?>">Data Item Type</a></li>
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
            <a href="<?= base_url('item_type')?>" class="btn btn-secondary btn-sm">
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
            <div class="form-group">
                <label for="name">Name Item Type :</label>
                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Masukan Name Item Type" value="<?= $this->input->post('name')?>">
                <span class="text-red"><?= form_error('name')?></span>
            </div>
            <div class="form-group">
                <label for="description">Description Item Type :</label>
                <textarea name="description" id="description" class="form-control <?= form_error('description') ? 'is-invalid' : null ?>" placeholder="Masukan Description Item Type"><?= $this->input->post('description');?></textarea>
                <span class="text-red"><?= form_error('description')?></span>
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price :</label>
                <input type="number" class="form-control <?= form_error('unit_price') ? 'is-invalid' : null ?>" id="unit_price" name="unit_price" placeholder="Masukan Unit Price Item Type" value="<?= $this->input->post('unit_price')?>">
                <span class="text-red"><?= form_error('unit_price')?></span>
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
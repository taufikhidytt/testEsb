
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
              <input type="hidden" name="id_type" id="id_type" value="<?= $this->input->post('id_type')?>">
              <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Masukan Name Item Type" readonly value="<?= $this->input->post('name')?>">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-item">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            <span class="text-red"><?= form_error('name')?></span>
            <div class="form-group">
                <label for="qty">Quantity :</label>
                <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : null ?>" id="qty" name="qty" placeholder="Masukan Quantity Item Type" value="<?= $this->input->post('qty')?>">
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

  <div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- <h4 class="modal-title">Data Items</h4> -->
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg table-striped text-center" id="stock">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Item Type</th>
                          <th>Description</th>
                          <th>Unit Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; foreach($data->result() as $dt):?>
                      <tr>
                          <td><?= $no++;?></td>
                          <td><?= $dt->name;?></td>
                          <td><?= $dt->description;?></td>
                          <td>Rp.<?= number_format($dt->unit_price, 2,",",".");?></td>
                          <td>
                              <button type="button" class="btn btn-primary btn-xs" id="select"
                                data-idtype="<?= $dt->id_type?>"
                                data-name="<?= $dt->name?>"
                                >
                                <i class="fa fa-check"></i> Selected
                            </button>
                          </td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
              </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->


</div>
<!-- /.content-wrapper -->

<script>
  $('#stock').DataTable();

  $(document).on('click', '#select', function(){
        var id_type = $(this).data('idtype');
        var name = $(this).data('name');

        $('#id_type').val(id_type);
        $('#name').val(name);

        $('#modal-item').modal('hide');
    });

</script>
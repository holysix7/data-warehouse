<!DOCTYPE html>
<html lang="en">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('Template/Sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
                <?php $this->load->view('Template/Topbar') ?>
                <!-- End of Topbar -->
                 <div class="container-fluid">
                    <?php $this->load->view('Template/alertMessage') ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Bahan Bakar</h1>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="float-left">
                          <a type="button" href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data Produk</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th>Kode Produk </th>
                                <th>Nama Produk </th>
                                <th>Stok </th>
                                <th>Nama Unit of Material </th>
                                <th>Harga </th>
                                <th>Jenis </th>
                                <th>Min Stok </th>
                                <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i> </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $index = 1; foreach($data as $row){ ?>
                                <tr>
                                  <td><?= $index++ ?></td>
                                  <td><?= $row['product_code'] ?></td>
                                  <td><?= $row['product_name'] ?></td>
                                  <td class="text-right"><?= number_format($row['stock']) ?></td>
                                  <td><?= $row['uom_name'] ?></td>
                                  <td class="text-right"><?= number_format($row['price']) ?></td>
                                  <td><?= $row['type'] ?></td>
                                  <td class="text-right"><?= number_format($row['min_stock']) ?></td>
                                  <td class="text-center">
                                    <button href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="btn btn-warning"
                                    onclick="
                                        edit(
                                          '<?php echo $row['id'] ?>',
                                          '<?php echo $row['product_code'] ?>',
                                          '<?php echo $row['product_name'] ?>',
                                          '<?php echo $row['stock'] ?>',
                                          '<?php echo $row['uom_id'] ?>',
                                          '<?php echo $row['price'] ?>',
                                          '<?php echo $row['type'] ?>',
                                          '<?php echo $row['min_stock'] ?>',
                                          )">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("bahan-bakar/delete/".$row['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                    </a>             
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- Content Row -->
                </div>
                <!-- Begin Page Content -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('bahan-bakar/add'); ?>" method="POST">
                <div class="form-group">
                  <label>Kode Produk </label>
                  <input type="text" name="product_code" class="form-control" value="<?= $kode ?>" required readonly>
                </div>
                <div class="form-group">
                  <label>Nama Produk </label>
                  <input type="text" name="product_name" class="form-control" placeholder="Nama Unit of Material" required>
                </div>
                <div class="form-group">
                  <label>Nama Unit of Material </label>
                  <select class="form-control" name="uom_id">
                    <?php foreach($mUom as $row){ ?>
                      <option value="<?= $row['id'] ?>"><?= $row['uom_name'] ?> | <?= $row['uom_code'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok </label>
                  <input type="number" name="stock" class="form-control" placeholder="Stok Product" required>
                </div>
                <div class="form-group">
                  <label>Harga </label>
                  <input type="number" name="price" class="form-control" placeholder="Harga Product" required>
                </div>
                <div class="form-group">
                  <label>Jenis </label>
                  <select class="form-control" name="type" required>
                      <option value="Non Stok">Non Stok</option>
                      <option value="Stok">Stok</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Min Stok </label>
                  <input type="number" name="min_stock" class="form-control" placeholder="Minimal Stok" value="0" required>
                </div>
              <hr>
              <div class="text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('bahan-bakar/update'); ?>" method="POST">
                <div class="form-group">
                  <label>Kode Produk </label>
                  <input type="text" name="product_code" id="e_product_code" class="form-control" required readonly>
                  <input type="hidden" name="id" id="e_id">
                </div>
                <div class="form-group">
                  <label>Nama Produk </label>
                  <input type="text" name="product_name" id="e_product_name" class="form-control" placeholder="Nama Product" required>
                </div>
                <div class="form-group">
                  <label>Nama Unit of Material </label>
                  <select class="form-control" name="uom_id" id="e_uom_id">
                    <?php foreach($mUom as $row){ ?>
                      <option value="<?= $row['id'] ?>"><?= $row['uom_name'] ?> | <?= $row['uom_code'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok </label>
                  <input type="number" name="stock" id="e_stock" class="form-control" placeholder="Stok Product" required>
                </div>
                <div class="form-group">
                  <label>Harga </label>
                  <input type="number" name="price" id="e_price" class="form-control" placeholder="Harga Product" required>
                </div>
                <div class="form-group">
                  <label>Jenis </label>
                  <select class="form-control" id="e_type" name="type" required>
                      <option value="Non Stok">Non Stok</option>
                      <option value="Stok">Stok</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Min Stok </label>
                  <input type="number" name="min_stock" id="e_min_stock" class="form-control" placeholder="Minimal Stok" required>
                </div>
              <hr>
              <div class="text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript">
    function edit(id, product_code, product_name, stock, uom_id, price, type, min_stock){
      $('#e_id').val(id);
      $('#e_product_code').val(product_code);
      $('#e_product_name').val(product_name);
      $('#e_stock').val(stock);
      $('#e_uom_id').val(uom_id);
      $('#e_price').val(price);
      $('#e_type').val(type);
      $('#e_min_stock').val(parseInt(min_stock));

      $('#editModal').modal('show'); 
    }
    </script>
    
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
</body>

</html>
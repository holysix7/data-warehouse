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
                      <h1 class="h3 mb-0 text-gray-800">List Sparepart In By <b><?= $dataParent != null ? $dataParent->adjustment_code : null ?></b></h1>
                    </div>

                    <div class="col-xl-12 col-lg-7">
                      <div class="card shadow mb-4">
                          <!-- Card Header - Dropdown -->
                        <div
                          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">In and Out Inventories</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Dibuat Oleh 
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->name : null ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Status 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->status_goods : null ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Penerima
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->receiver_name : null ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Nama CC
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->cc_name : null ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Kode CC
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->cc_code : null ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Tanggal Barang Keluar 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->created_at : null ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Remark
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent != null ? $dataParent->remark : null ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <?php if($dataParent->status != "Approved" && $dataParent->status != "Canceled"){ ?>
                          <a href="<?php echo base_url('out/judgement/'.$dataParent->id.'/approve'); ?>" class="btn btn-success">Approve</a>
                          <a href="<?php echo base_url('out/judgement/'.$dataParent->id.'/cancel'); ?>" class="btn btn-danger">Cancel</a>
                        <?php } ?>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th>Kode Produk </th>
                                <th>Nama Produk </th>
                                <th>Quantity Produk</th>
                                <th>Satuan Produk</th>
                                <th>Remark </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $index = 1; foreach($dataItem as $row){ ?>
                                <tr>
                                  <td><?= $index++ ?></td>
                                  <td><?= $row['product_code'] ?></td>
                                  <td><?= $row['product_name'] ?></td>
                                  <td><?= number_format($row['quantity']) ?></td>
                                  <td><?= $row['uom_name'] ?></td>
                                  <td><?= $row['remark'] ?></td>
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
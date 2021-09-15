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
                      <h1 class="h3 mb-0 text-gray-800">List Sparepart In By <b><?= $dataParent->adjustment_code ?></b></h1>
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
                              <input type="text" class="form-control" value="<?= $dataParent->name ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Supplier 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->supplier_name ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Keterangan 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->status_goods ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              No PO 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->po_number ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              No Pol 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->inventaris_name ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Supir
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->driver_name ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Tanggal Terima 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= date("Y-m-d", strtotime($dataParent->created_at)) ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Tanggal Supplier 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->supplier_date ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Remark 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" value="<?= $dataParent->remark ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <?php if($dataParent->status != "Approved" && $dataParent->status != "Canceled"){ ?>
                          <a href="<?php echo base_url('in/judgement/'.$dataParent->id.'/approve'); ?>" class="btn btn-success">Approve</a>
                          <a href="<?php echo base_url('in/judgement/'.$dataParent->id.'/cancel'); ?>" class="btn btn-danger">Cancel</a>
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
                                <th>Kode Rak </th>
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
                                  <td><?= $row['rack_code'] ?></td>
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
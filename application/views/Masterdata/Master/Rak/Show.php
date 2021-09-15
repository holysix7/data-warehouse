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
                        <h1 class="h3 mb-0 text-gray-800">List of Product in <?= $calling->rack_code ?></h1>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th>Kode Rak </th>
                                <th>Nama Rak </th>
                                <th>Nama Produk </th>
                                <th>Kategori Produk </th>
                                <th>Quantity </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $index = 1; foreach($data as $row){ ?>
                                <tr>
                                  <td><?= $index++ ?></td>
                                  <td><?= $row['rack_code'] ?></a></td>
                                  <td><?= $row['rack_name'] ?></a></td>
                                  <td><?= $row['product_name'] ?></a></td>
                                  <td><?= $row['category'] ?></a></td>
                                  <td class="text-right"><?= number_format($row['total_quantity']) ?></a></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                            <?php $jumlah_object = count($data); ?>
                            <?php if($jumlah_object > 0){ ?> 
                              <tfoot>
                                <?php if($grandTotalSparepart > 0){ ?>
                                  <tr>
                                    <th colspan="5">Grand Total Sparepart</th>
                                    <th class="text-right"><?= number_format($grandTotalSparepart) ?></th>
                                  </tr>
                                <?php } ?>
                                <?php if($grandTotalBahanBakar > 0){ ?>
                                <tr>
                                  <th colspan="5">Grand Total Bahan Bakar</th>
                                  <th class="text-right"><?= number_format($grandTotalBahanBakar) ?></th>
                                </tr>
                                <?php } ?>
                                <?php if($grandTotalBahanPembantu > 0){ ?>
                                <tr>
                                  <th colspan="5">Grand Total Bahan Pembantu</th>
                                  <th class="text-right"><?= number_format($grandTotalBahanPembantu) ?></th>
                                </tr>
                                <?php } ?>
                              </tfoot>
                            <?php } ?>
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

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript">
    function edit(id, rack_code, rack_name, rack_status){
        $('#e_id').val(id);
        $('#e_rack_code').val(rack_code);
        $('#e_rack_name').val(rack_name);
        $('#e_rack_status').val(rack_status);

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
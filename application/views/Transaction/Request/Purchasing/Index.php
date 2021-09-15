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
                        <h1 class="h3 mb-0 text-gray-800">Purchasing</h1>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="float-left">
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-6 col-md-6 mb-4">
                              <a href="<?= base_url('request/purchasing/form-purchasing') ?>">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Percentage Documents Approved</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Data Permintaan Pembelian</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width:50%" aria-valuenow="" aria-valuemin="0"
                                                                aria-valuemax="100" id="progressBar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </a>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-6 col-md-6 mb-4">
                              <a href="<?= base_url('request/purchasing/form-repair') ?>">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Percentage Documents Approved</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Data Permintaan Repair & Fabrikasi</div>
                                                    </div>
                                                    <div class="col" style="padding-left: 25px;">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width:50%" aria-valuenow="" aria-valuemin="0"
                                                                aria-valuemax="100" id="progressBar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-toolbox fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </a>
                            </div>

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
      function edit(id, supplier_code, supplier_name, supplier_address){
        $('#e_id').val(id);
        $('#e_supplier_code').val(supplier_code);
        $('#e_supplier_name').val(supplier_name);
        $('#e_supplier_address').val(supplier_address);

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
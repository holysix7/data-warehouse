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
                        <h1 class="h3 mb-0 text-gray-800">List Adjustment In</h1>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="float-left">
                          <a type="button" href="<?= base_url('in/new') ?>" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data Adjustment</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th>Kode Adjustment </th>
                                <th>Dibuat Oleh </th>
                                <th>Dibuat Pada Tanggal </th>
                                <th>Keterangan </th>
                                <th>Status </th>
                                <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i> </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $index = 1; foreach($data as $row){ ?>
                                <tr>
                                  <td><a href="<?= base_url('adjustment/in/'.$row['id'])?>" class="text-dark"><?= $index++ ?></a></td>
                                  <td><a href="<?= base_url('adjustment/in/'.$row['id'])?>" class="text-dark"><?= $row['adjustment_code'] ?></a></td>
                                  <td><a href="<?= base_url('adjustment/in/'.$row['id'])?>" class="text-dark"><?= $row['name'] ?></a></td>
                                  <td><a href="<?= base_url('adjustment/in/'.$row['id'])?>" class="text-dark"><?= date("Y-m-d", strtotime($row['created_at'])) ?></a></td>
                                  <td><a href="<?= base_url('adjustment/in/'.$row['id'])?>" class="text-dark"><?= $row['status_goods'] ?></a></td>
                                  <td>
                                    <?php if($row['status'] == 'Created'){ ?>
                                      <span class="btn btn-success"><?= $row['status'] ?></span>
                                    <?php }else if($row['status'] == 'Approved'){ ?>
                                      <span class="btn btn-primary"><?= $row['status'] ?></span>
                                    <?php }else{ ?>
                                      <span class="btn btn-danger"><?= $row['status'] ?></span>
                                    <?php } ?>
                                  </td>
                                  <td class="text-center">
                                    <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("adjustment/delete/".$row['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
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
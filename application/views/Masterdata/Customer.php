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
                        <h1 class="h3 mb-0 text-gray-800">List of Customers</h1>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="float-left">
                          <a type="button" href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data Customers</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th>Kode Customer </th>
                                <th>Nama Customer </th>
                                <th>Alamat Customer </th>
                                <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i> </th>
                              </tr>
                            </thead>
                            <tbody id="">
                              <?php $index = 1; foreach($data as $row){ ?>
                                <tr>
                                  <td><?= $index++ ?></td>
                                  <td><?= $row['customer_code'] ?></td>
                                  <td><?= $row['customer_name'] ?></td>
                                  <td><?= $row['customer_address'] ?></td>
                                  <td class="text-center">
                                    <button href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="btn btn-warning"
                                    onclick="
                                        edit(
                                          '<?php echo $row['id'] ?>',
                                          '<?php echo $row['customer_code'] ?>',
                                          '<?php echo $row['customer_name'] ?>',
                                          '<?php echo $row['customer_address'] ?>',
                                          )">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("customer/delete/".$row['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('customer/add'); ?>" method="POST">
                <div class="form-group">
                  <label>Kode Customer </label>
                  <input type="text" name="customer_code" class="form-control" value="<?= $kode ?>" required readonly>
                </div>
                <div class="form-group">
                  <label>Nama Customer </label>
                  <input type="text" name="customer_name" class="form-control" placeholder="Nama Customer" required>
                </div>
                <div class="form-group">
                  <label>Alamat Customer </label>
                  <TextArea class="form-control" name="customer_address" placeholder="Alamat Supplier"></TextArea>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('customer/update'); ?>" method="POST">
                <div class="form-group">
                  <label>Kode Produk </label>
                  <input type="text" name="customer_code" id="e_customer_code" class="form-control" required readonly>
                  <input type="hidden" name="id" id="e_id">
                </div>
                <div class="form-group">
                  <label>Nama Produk </label>
                  <input type="text" name="customer_name" id="e_customer_name" class="form-control" placeholder="Nama Product" required>
                </div>
                <div class="form-group">
                  <label>Alamat Customer </label>
                  <TextArea class="form-control" name="customer_address" id="e_customer_address" placeholder="Alamat Supplier"></TextArea>
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

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript">
    function edit(id, customer_code, customer_name, customer_address){
      $('#e_id').val(id);
      $('#e_customer_code').val(customer_code);
      $('#e_customer_name').val(customer_name);
      $('#e_customer_address').val(customer_address);

      $('#editModal').modal('show'); 
    }
    $(document).ready(function(){
      var getUrl = window.location;
      var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
      var typeUrl = '/api/list-customer'
      let index = 1;
      $.get(baseUrl+typeUrl, function(data, status){
        var element = JSON.parse(JSON.stringify(data))
        element.forEach(val => {
          $('#rowId').append(
            "<tr>"+
            "<td>"+ index++ +"</td>" +
            "<td>"+ val.customer_code +"</td>" +
            "<td>"+ val.customer_name +"</td>" +
            "<td>"+ val.customer_address +"</td>" +
            "</tr>"
          )
        });
      })
      // $('#example').DataTable( {
      //   processing: true,
      //   serverSide: true,
      //   paginationType: "full_numbers",
      //   lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
      //   ajax: getUrl + typeUrl,
      // });
    }) 
    </script>
    
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
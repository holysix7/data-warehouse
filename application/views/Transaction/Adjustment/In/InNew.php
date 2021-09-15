<!DOCTYPE html>
<html lang="en">
<head>
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</head>
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
                      <h1 class="h3 mb-0 text-gray-800">Create Adjustment In</b></h1>
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
                              <input class="form-control" value="<?= $name ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Supplier 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <select class="form-control" id="idSupp">
                                <?php foreach($suppliers as $row){ ?>
                                  <option value="<?= $row['id'] ?>"><?= $row['supplier_name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Status 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" value="In" name="status_goods" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              No PO 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" id="id_no_purchasing" placeholder="Isi No PO">
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              No Pol 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <select class="form-control" id="id_no_pol">
                                <?php foreach($datacc as $row){ ?>
                                  <option value="<?= $row['id'] ?>"><?= $row['inventaris_name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Supir
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" id="id_supir" placeholder="Isi Nama Supir">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Tanggal Terima 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" value="<?= $date ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Tanggal Supplier 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="date" class="form-control" id="id_tgl_supplier">
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Remark
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" name="remark" id="id_remark" placeholder="Isi Remark">
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="row">
                          <div class="col">
                            <div class="float-left">
                            <a type="button" href="#" class="btn btn-success btn-icon-split" id="btn-tambah-form">
                              <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                              </span>
                              <span class="text">Tambah Data Adjustment</span>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <form action="<?php echo base_url('in/create'); ?>" method="POST">
                      <div class="card-body">
                    
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 5%">No </th>
                                <th style="width: 20%">Kode Produk | Nama Produk </th>
                                <th style="width: 15%">Quantity Produk</th>
                                <th style="width: 15%">Kode Rak </th>
                                <th>Remark </th>
                              </tr>
                            </thead>
                            <tbody class="form-group" id="insert-form">
                              <tr>
                                <td>1</td>
                                <td>
                                  <select class='form-control' name='id_product[]'>
                                    <?php foreach($products as $el){?>
                                      <option value='<?= $el["id"] ?>'><?= $el['product_code'] ?> | <?= $el['product_name'] ?> </option>
                                    <?php } ?>
                                  </select>
                                </td>
                                <td><input type='number' class='form-control' name='quantity[]' placeholder='Silahkan Isi'></td>
                                <td>
                                  <select class='form-control' name='id_rack[]'><?php foreach($racks as $el){ ?>
                                    <option value='<?= $el["id"] ?>'><?= $el['rack_code'] ?></option><?php } ?>
                                  </select>
                                </td>
                                <td><input type='text' class='form-control' name='remark[]' placeholder='Silahkan Isi'></td>
                              </tr>
                            </tbody>
                          </table>
                        <div class="float-right">
                          <input type="hidden" value="<?= $date ?>" name="created_at" readonly>
                          <input type="hidden" id="id_tgl_supplier_fix" name="supplier_date" readonly>
                          <input type="hidden" id="id_supir_fix" name="driver_name" readonly>
                          <input type="hidden" id="id_no_purchasing_fix" name="no_po" readonly>
                          <input type="hidden" id="id_remark_fix" name="remark_parent" readonly>
                          <input type="hidden" id="id_supplier_fix" name="id_supplier" readonly>
                          <input type="hidden" id="id_no_pol_fix" name="no_pol" readonly>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              <input type="hidden" id="jumlah-form" value="1">

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

<script type="text/javascript">
$(document).ready(function(){ 
  var idSuppl = $("#idSupp").val();
  var idPol = $("#id_no_pol").val();

  $('#id_supplier_fix').val(idSuppl)
  $('#id_no_pol_fix').val(idPol)
  
  $('#idSupp').change(function(){
    var idSuppl = $("#idSupp").val();
    console.log(idSuppl)
    $('#id_supplier_fix').val(idSuppl)
  })
  
  $('#id_no_pol').change(function(){
    var idNoPol = $("#id_no_pol").val();
    console.log(idNoPol)
    $('#id_no_pol_fix').val(idNoPol)
  })
  
  $('#id_no_purchasing').change(function(){
    var idNoPO = $("#id_no_purchasing").val();
    console.log(idNoPO)
    $('#id_no_purchasing_fix').val(idNoPO)
  })
  
  $('#id_supir').change(function(){
    var idSupir = $("#id_supir").val();
    console.log(idSupir)
    $('#id_supir_fix').val(idSupir)
  })
  
  $('#id_remark').change(function(){
    var idSupir = $("#id_remark").val();
    console.log(idSupir)
    $('#id_remark_fix').val(idSupir)
  })
  
  $('#id_tgl_supplier').change(function(){
    var idTglSupp = $("#id_tgl_supplier").val();
    console.log(idTglSupp)
    $('#id_tgl_supplier_fix').val(idTglSupp)
  })
  // Ketika halaman sudah diload dan siap
  $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
    var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
    // console.log(nextform)
    // Kita akan menambahkan form dengan menggunakan append
    // pada sebuah tag div yg kita beri id insert-form
    $("#insert-form").append(
      "<tr>"+
      "<td>"+ nextform +"</td>" + 
      "<td><select class='form-control' name='id_product[]'>" + "<?php foreach($products as $el){?><option value='<?= $el["id"] ?>'><?= $el['product_code'] ?> | <?= $el['product_name'] ?> </option><?php } ?>" + "</select></td>" +
      "<td><input type='number' class='form-control' name='quantity[]' placeholder='Silahkan Isi'></td>" +
      "<td><select class='form-control' name='id_rack[]'>" + "<?php foreach($racks as $el){?><option value='<?= $el["id"] ?>'><?= $el['rack_code'] ?></option><?php } ?>" + "</select></td>" +
      "<td><input type='text' class='form-control' name='remark[]' placeholder='Silahkan Isi'></td>" +
      "</tr>")
    
    $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
  });
});
</script>
    

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
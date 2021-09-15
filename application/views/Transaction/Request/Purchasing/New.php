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
                      <h1 class="h3 mb-0 text-gray-800">Purchasing Order</b></h1>
                    </div>

                    <div class="col-xl-12 col-lg-7">
                      <div class="card shadow mb-4">
                          <!-- Card Header - Dropdown -->
                        <div
                          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Purchasing Order Form</h6>
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
                              Jenis PP 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <select class="form-control" id="id_jenis_pp" required>
                                <option value="null">--- Pilih ---</option>
                                <option value="datapusat">Data PP Pusat</option>
                                <option value="datainvestasi">Data PP Investasi</option>
                                <option value="datalocal">Data PP Local</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Kategori Barang
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <select class="form-control" id="id_category_barang" required>
                                <option value="null">--- Pilih ---</option>
                                <option value="Stok">Stok</option>
                                <option value="Non Stok">Non Stok</option>
                              </select>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Keterangan 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" class="form-control" id="id_keterangan" placeholder="Isi Keterangan">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              No PO
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" id="id_request_code" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Tanggal 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" value="<?= date("Y-m-d", strtotime($date)) ?>" class="form-control" id="id_tgl_po" readonly>
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
                          <input type="text" id="id_jenis_pp_fix" name="jenis_request" readonly>
                          <input type="text" id="id_category_barang_fix" name="category_barang" readonly>
                          <input type="text" id="id_keterangan_fix" name="remark" readonly>
                          <input type="text" id="id_request_code_fix" name="request_code" readonly>
                          <input type="text" value="<?= $date ?>" name="created_at" readonly>
                          <input type="text" value="<?= $userId ?>" name="created_by" readonly>
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
  $('#id_category_barang').change(function(){
    var catBarVal = $("#id_category_barang").val()
    $('#id_category_barang_fix').val(catBarVal)
  })
  $('#id_keterangan').change(function(){
    var keteranganVal = $("#id_keterangan").val()
    $('#id_keterangan_fix').val(keteranganVal)
  })
  $('#id_jenis_pp').change(function(){
    var id_pp = $("#id_jenis_pp").val()
    var getUrl = window.location
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]
    var params_form = getUrl.pathname.split('/')[4]
    // console.log(id_pp)
    if(id_pp != null){
      $.get(baseUrl+"/api/ajax-request/"+params_form+"/"+id_pp+"/PO", function(data, status){
        if(data != null){
          // console.log(data.result_code)
          $('#id_request_code_fix').val(data.result_code)
          $('#id_request_code').val(data.result_code)
        }else{
          console.log(status)
        }
      })
    }else{
      $('#id_request_code_fix').html("")
      $('#id_request_code').html("")
    }
  })
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
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
                      <h1 class="h3 mb-0 text-gray-800">Update Access User: <?= $data->name ?></b></h1>
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
                              Diubah Oleh 
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              <input class="form-control" value="<?= $name ?>" readonly>
                            </div>
                            <div class="col-lg-2" style="margin-top: 8px; padding-top: 10px">
                              Nama 
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" value="<?= $data->name ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              NIK
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input type="text" value="<?= $data->username ?>" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px; margin-top: 8px">
                              Role
                            </div>
                            <div class="col-lg-2" style="padding-top: 10px">
                              <input class="form-control" value="<?= $data->role ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-body">
                        <form action="<?php echo base_url('list-users/access/update'); ?>" method="POST">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <?php foreach($list_access as $row){ ?>
                                  <th style="width: 5%"><?= $row['access_name'] ?></th>
                                <?php } ?>
                              </tr>
                            </thead>
                            <tbody class="form-group">
                              <!-- <tr id="LoopedAccess"> -->
                              <tr>
                              <?php if(count($data_access) > 0){ ?>
                                <?php foreach ($data_access as $element) { ?>
                                  <?php if($element['status'] == 'On'){ ?>
                                    <td>
                                      <input type="checkbox" name="list_access_id[<?= $element['list_access_id'] ?>]" value="<?= $element['list_access_id'] ?>" style="width: 25; height:25; display: block;margin-right: auto;margin-left: auto;" checked>
                                    </td>
                                  <?php }else{ ?>
                                    <td>
                                      <input type="checkbox" name="list_access_id[<?= $element['list_access_id'] ?>]" value="<?= $element['list_access_id'] ?>" style="width: 25; height:25; display: block;margin-right: auto;margin-left: auto;">
                                    </td>
                                  <?php } ?>
                                <?php } ?>
                              <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        <div class="float-right">
                          <input type="hidden" value="<?= $data->id ?>" name="user_id" id="user_id" readonly>
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
  var id = $('#user_id').val()
  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  $.get(baseUrl+"/list-users/access/json_access/"+id, function(data, status){
    console.log(status)
    if(data.length > 0){
      var element = JSON.parse(data)
      $.each(element, function(index, el){
        if(el['status'] != 'Off'){
          $('#LoopedAccess').append(
            "<td><input id='id_access["+ el.list_access_id +"]' type='checkbox' name='"+ el.list_access_id +"' value='"+ el.list_access_id +"' style='width: 25; height:25; display: block;margin-right: auto;margin-left: auto;' checked></td>"
          )
        }else{
          $('#LoopedAccess').append(
            "<td><input type='checkbox' name='"+ el.list_access_id +"' value='"+ el.list_access_id +"' style='width: 25; height:25; display: block;margin-right: auto;margin-left: auto;'></td>"
          )
        }
      })
    }else{
      $('#LoopedAccess').append(
        "<td><input type='checkbox' name='list_access_id["+id+"]' value='list_access_id["+id+"]' style='width: 25; height:25; display: block;margin-right: auto;margin-left: auto;'></td>"
      )
    }
  });
  var id_access = $('#id_access[1]');
  id_access.change(function(){
    console.log(id_access.val())
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
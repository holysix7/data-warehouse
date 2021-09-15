<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
        <div class="sidebar-brand-icon">
            <i class="fab fa-airbnb"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WAREHOUSE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
		
    <?php if($this->session->userdata('role') == 'Super Admin'){ ?>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('list-users') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>List Users</span></a>
			</li>
    <?php }else{ ?>
			<li class="nav-item">
				<a class="nav-link" href="<?= $_SERVER['SCRIPT_FILENAME'] ?>" onClick="checkingUser()">
				<i class="fas fa-fw fa-users"></i>
				<span>List Users</span></a>
			</li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Suppliers:</h6>
                <a class="collapse-item" href="<?= base_url('list-customer') ?>">Customers List</a>
                <a class="collapse-item" href="<?= base_url('list-rack') ?>">Racks List</a>
                <a class="collapse-item" href="<?= base_url('list-supplier') ?>">Suppliers List</a>
                <a class="collapse-item" href="<?= base_url('list-data-cc') ?>">CC List Data</a>
                <a class="collapse-item" href="<?= base_url('data-inventaris-kendaraan-alat-berat') ?>">Inventaris</a>
            </div>
        </div>
    </li>
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-industry"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products:</h6>
                <a class="collapse-item" href="<?= base_url('spesification') ?>">Unit of Materials</a>
                <a class="collapse-item" href="<?= base_url('sparepart') ?>">Stocks and Not Stocks</a>
                <a class="collapse-item" href="<?= base_url('bahan-bakar') ?>">Data Bahan Bakar</a>
                <a class="collapse-item" href="<?= base_url('bahan-pembantu') ?>">Data Bahan Pembantu</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transactions
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fab fa-audible"></i>
            <span>Adjustment</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaction:</h6>
                <a class="collapse-item" href="<?= base_url('adjustment/in') ?>">In</a>
                <a class="collapse-item" href="<?= base_url('adjustment/out') ?>">Out</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKetiga"
            aria-expanded="true" aria-controls="collapseKetiga">
            <i class="fas fa-tools"></i>
            <span>Request</span>
        </a>
        <div id="collapseKetiga" class="collapse" aria-labelledby="headingKetiga" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Request:</h6>
                <a class="collapse-item" href="<?= base_url('request/purchasing') ?>">Purchasing</a>
                <a class="collapse-item" href="<?= base_url('request/repairing') ?>">Repairing & Fabrication</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeempat"
            aria-expanded="true" aria-controls="collapseKeempat">
            <i class="fas fa-book"></i>
            <span>File</span>
        </a>
        <div id="collapseKeempat" class="collapse" aria-labelledby="headingKetiga" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File:</h6>
                <a class="collapse-item" href="<?= base_url('file/suratjalan') ?>">Surat Jalan</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelima"
            aria-expanded="true" aria-controls="collapseKelima">
            <i class="fas fa-undo-alt"></i>
            <span>Return</span>
        </a>
        <div id="collapseKelima" class="collapse" aria-labelledby="headingKetiga" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Return:</h6>
                <a class="collapse-item" href="<?= base_url('return/barang') ?>">Barang</a>
                <a class="collapse-item" href="<?= base_url('return/internal') ?>">Internal</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Documentations
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocSatu"
            aria-expanded="true" aria-controls="collapseDocSatu">
            <i class="fab fa-audible"></i>
            <span>Daily Report</span>
        </a>
        <div id="collapseDocSatu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daily Report:</h6>
                <a class="collapse-item" href="<?= base_url('dailyreport/pemakaian') ?>">Pemakaian</a>
                <a class="collapse-item" href="<?= base_url('dailyreport/biayapemakaian') ?>">Biaya Pemakaian</a>
                <a class="collapse-item" href="<?= base_url('dailyreport/email') ?>">Email Ke Pak Robert</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card">
        <img class="sidebar-card-illustration mb-2" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" alt="">
    </div> -->

</ul>


	<script type="text/javascript">
		function checkingUser(){
			alert('Maaf Anda Tidak Memiliki Akses Untuk Melihat List User')
		}
	</script>
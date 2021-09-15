<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


########################
######### Auth #########
########################

$route['login']         = 'Auth/login';
$route['logout']        = 'Auth/logout';
$route['dashboard']     = 'Dashboard';

/**
 * MASTER DATA
 */



########################
######### Jsons ########
########################
$route['api/ajax-cc-code/(:any)']                 = 'BaseJson/json_access/$1';
$route['api/list-customer']                       = 'BaseJson/json_customers';
$route['api/ajax-request/(:any)/(:any)/(:any)']   = 'BaseJson/json_request/$1/$2/$3';

########################
######### Users ########
########################

$route['list-users']               = 'Masterdata/User/Users';
$route['list-users/add']           = 'Masterdata/User/Users/create';
$route['list-users/update']        = 'Masterdata/User/Users/update';
$route['list-users/(:any)']        = 'Masterdata/User/Users/show/$1';
$route['list-users/access/update'] = 'Masterdata/User/Users/UpdateAccess';
$route['list-users/delete/(:any)'] = 'Masterdata/User/Users/delete/$1';

########################
####### Customer #######
########################

$route['list-customer']          = 'Masterdata/Master/Customer';
$route['customer/add']           = 'Masterdata/Master/Customer/create';
$route['customer/update']        = 'Masterdata/Master/Customer/update';
$route['customer/delete/(:any)'] = 'Masterdata/Master/Customer/delete/$1';

########################
####### Customer #######
########################

$route['data-inventaris-kendaraan-alat-berat']               = 'Masterdata/Master/Tools';
$route['data-inventaris-kendaraan-alat-berat/add']           = 'Masterdata/Master/Tools/create';
$route['data-inventaris-kendaraan-alat-berat/update']        = 'Masterdata/Master/Tools/update';
$route['data-inventaris-kendaraan-alat-berat/delete/(:any)'] = 'Masterdata/Master/Tools/delete/$1';

########################
### Bahan Pembantu #####
########################

$route['list-data-cc']                = 'Masterdata/Master/DataCC';
$route['list-data-cc/add']            = 'Masterdata/Master/DataCC/create';
$route['list-data-cc/update']         = 'Masterdata/Master/DataCC/update';
$route['list-data-cc/delete/(:any)']  = 'Masterdata/Master/DataCC/delete/$1';

########################
########## Rak #########
########################

$route['list-rack']          = 'Masterdata/Master/Rak';
$route['list-rack/(:any)']   = 'Masterdata/Master/Rak/show/$1';
$route['rak/add']            = 'Masterdata/Master/Rak/create';
$route['rak/update']         = 'Masterdata/Master/Rak/update';
$route['rak/delete/(:any)']  = 'Masterdata/Master/Rak/delete/$1';

########################
####### Supplier #######
########################

$route['list-supplier']           = 'Masterdata/Master/Supplier';
$route['supplier/add']            = 'Masterdata/Master/Supplier/create';
$route['supplier/update']         = 'Masterdata/Master/Supplier/update';
$route['supplier/delete/(:any)']  = 'Masterdata/Master/Supplier/delete/$1';

########################
#### Spesification #####
########################

$route['spesification']           = 'Masterdata/Products/Spesification';
$route['uom/add']                 = 'Masterdata/Products/Spesification/create';
$route['uom/update']              = 'Masterdata/Products/Spesification/update';
$route['uom/delete/(:any)']       = 'Masterdata/Products/Spesification/delete/$1';

########################
####### Products #######
########################

$route['sparepart']                = 'Masterdata/Products/Sparepart';
$route['sparepart/add']            = 'Masterdata/Products/Sparepart/create';
$route['sparepart/update']         = 'Masterdata/Products/Sparepart/update';
$route['sparepart/delete/(:any)']  = 'Masterdata/Products/Sparepart/delete/$1';

########################
##### Bahan Bakar ######
########################

$route['bahan-bakar']                = 'Masterdata/Products/Bahanbakar';
$route['bahan-bakar/add']            = 'Masterdata/Products/Bahanbakar/create';
$route['bahan-bakar/update']         = 'Masterdata/Products/Bahanbakar/update';
$route['bahan-bakar/delete/(:any)']  = 'Masterdata/Products/Bahanbakar/delete/$1';

########################
### Bahan Pembantu #####
########################

$route['bahan-pembantu']                = 'Masterdata/Products/Bahanpembantu';
$route['bahan-pembantu/add']            = 'Masterdata/Products/Bahanpembantu/create';
$route['bahan-pembantu/update']         = 'Masterdata/Products/Bahanpembantu/update';
$route['bahan-pembantu/delete/(:any)']  = 'Masterdata/Products/Bahanpembantu/delete/$1';

/**
 * Transaction
 */

########################
###### Adjusment #######
########################

$route['adjustment/in']                = 'Transaction/Adjustment/in';
$route['adjustment/in/(:any)']         = 'Transaction/Adjustment/inShow/$1';
$route['in/new']                       = 'Transaction/Adjustment/newIn';
$route['in/create']                    = 'Transaction/Adjustment/createIn';

$route['in/judgement/(:any)/(:any)']   = 'Transaction/Adjustment/judgement/$1/$2';
$route['out/judgement/(:any)/(:any)']  = 'Transaction/Adjustment/judgement/$1/$2';

$route['adjustment/out']               = 'Transaction/Adjustment/out';
$route['adjustment/out/(:any)']        = 'Transaction/Adjustment/outShow/$1';
$route['out/new']                      = 'Transaction/Adjustment/newOut';
$route['out/create']                   = 'Transaction/Adjustment/createOut';
$route['adjustment/delete/(:any)']     = 'Transaction/Adjustment/delete/$1';

########################
######## Request #######
########################

$route['request/purchasing']         = 'Transaction/Request';
$route['request/purchasing/(:any)']  = 'Transaction/Request/new/$1';

$route['transaction/stockcard']    = 'Transaction/Transaction';

// tes API
$route['json/supplier'] = 'Transaction/Transaction/suppJson';
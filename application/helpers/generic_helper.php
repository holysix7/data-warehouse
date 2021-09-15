<?php
	function toDatatable($data,$totalData){	
		$output = array(
			'draw' => intval($_POST['draw']),
			'recordsTotal' => $totalData,
			'recordsFiltered' => $totalData,
			'data' => $data
		);
		return $output;
	}

	function show_alert($message, $status){
		return '<div class="alert alert-'.$status.' alert-dismissible">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  '.$message.'
				</div>';
	}

	function show_level($lv){
		if($lv == '0'){
			$msg = '<span class="badge badge-danger"><i class="fa fa-ban"></i> Ditolak</span>';
		
		}else if($lv == '1'){
			$msg = '<span class="badge badge-info"><i class="fa fa-clock"></i> Menunggu Acc Kepala Sekolah</span>';

		}else if($lv == '2'){
			$msg = '<span class="badge badge-primary"><i class="fa fa-clock"></i> Menunggu Acc Bag. Keuangan</span>';
		
		}else if($lv == '3'){
			$msg = '<span class="badge badge-success"><i class="fa fa-check"></i> Disetujui</span>';
		}

		return $msg;
	}

	function show_tipe_transaksi($tipe, $opt = ''){
		if($tipe == 'perolehan'){
         $prefix = "Perolehan";

	    }else if($tipe == 'setoran'){
	         $prefix = "Setoran Pemilik";

	    }else if($tipe == 'penarikan'){
	         $prefix = 'Penarikan Pemilik';
	      
	    }else if($tipe == 'bop'){
	         $prefix = 'BOP';
	      
	    }else if($tipe == 'bank'){
	    	if($opt == 'masuk'){
	    		$prefix = 'Setoran Bank Masuk';
	    	}else{
	        	$prefix = 'Setoran Bank Keluar';
	    	}

	    }else if($tipe == 'tabungan_siswa'){
	         $prefix = 'Tabungan Siswa';
	    
	    }else if($tipe == 'komponen_pendidikan'){
	    	$prefix = 'Komponen Pembayaran Pendaftaran';

	    }else if($tipe == 'komponen_operasional'){
	    	$prefix = 'Komponen Pembayaran Bulanan';
	    
	    }else if($tipe == 'undur_diri'){
	    	$prefix = 'Undur Diri Siswa';
	    
	    }else if($tipe == 'pinjaman'){
	    	$prefix = 'Pinjaman Karyawan';
	    }

	    return $prefix;
	}

	function generateRandom($n){ 
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    $randomString = ''; 
	  
	    for ($i = 0; $i < $n; $i++) { 
	        $index = rand(0, strlen($characters) - 1); 
	        $randomString .= $characters[$index]; 
	    } 
	  
	    return $randomString; 
	} 

	function searchKey($array, $key, $value){
	    $results = [];

	    if (is_array($array)) {
	        if (isset($array[$key]) && $array[$key] == $value) {
	            $results[] = $array;
	        }

	        foreach ($array as $subarray) {
	            $results = array_merge($results, searchKey($subarray, $key, $value));
	        }
	    }

	    return $results;
	}

	function diffMonth($date1, $date2){

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        return str_replace('-', '',  $diff) + 1;
	}

	function calculatePPH21($nominal){
		$pph = 0;
		$fix = [
			50000000, 250000000, 500000000
		];
		if($nominal <= $fix[0]){
			$pph += percentage(5, $nominal);
		
		}else if($nominal > $fix[0] && $nominal <= $fix[1]){
			$tmp =  $nominal - $fix[0];
			$pph += percentage(5, $fix[0]);
			$pph += percentage(15, $tmp);
		
		}else if($nominal > $fix[1] && $nominal <= $fix[2]){
			$tmp =  $nominal - $fix[1];
			$pph += percentage(5, $fix[0]);
			$pph += percentage(15, $fix[1]);
			$pph += percentage(25, $tmp);
		
		}else if($nominal > $fix[2]){
			$tmp = $nominal - $fix[2];
			$pph += percentage(5, $fix[0]);
			$pph += percentage(15, $fix[1]);
			$pph += percentage(25, $fix[2]);
			$pph += percentage(30, $tmp);
		}

		return $pph / 12;
	}

	function percentage($persen, $nominal){
		return ($persen / 100) * $nominal;
	}

	function calculatePenyusutan($harga_asset, $residu, $masa_pakai, $tgl_perolehan, $jumlah, $diff = ''){
	    $num = 0;

	    $tgl = substr($tgl_perolehan, 8, 2);
	    $bln = substr($tgl_perolehan, 5, 2);
	    $num = $bln;

	    if($tgl >= '15'){
	      $num = $num + 1;

	      if($bln == '12'){
	        $num = 1;
	      }
	    }

	     $num = 12 - $num;

	    if($diff != '' || $diff == 0){
	    	$harga_penyusutan = (($harga_asset - $residu) / (($masa_pakai * 12) - $diff));
	    }else{
	    	$harga_penyusutan = ($num / 12) * (($harga_asset - $residu) / $masa_pakai);
	    }

	   
	    //$total_penyusutan = ($harga_asset - $harga_penyusutan) * $jumlah;
	    return $harga_penyusutan; 
  }


  function search($array, $search_list){ 
  
	    // Create the result array 
	    $result = array(); 
	  
	    // Iterate over each array element 
	    foreach ($array as $key => $value) { 
	  
	        // Iterate over each search condition 
	        foreach ($search_list as $k => $v) { 
	      
	            // If the array element does not meet 
	            // the search condition then continue 
	            // to the next element 
	            if (!isset($value[$k]) || $value[$k] != $v) 
	            { 
	                  
	                // Skip two loops 
	                continue 2; 
	            } 
	        } 
	      
	        // Append array element's key to the 
	        //result array 
	        $result[] = $value; 
	    } 
	  
	    // Return result  
	    return $result; 
	} 

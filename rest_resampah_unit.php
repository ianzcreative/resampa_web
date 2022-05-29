<?php
require_once "koneksi_resampah.php";
header('Content-Type: application/json');
date_default_timezone_set('Asia/Jakarta');

   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }
      

   function login()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["password_nasabah"]) && !empty($_GET["key"])) {
         $username = $_GET["nik_nasabah"];
         $password = $_GET["password_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah, tbl_user_type.id_type FROM tbl_nasabah LEFT JOIN tbl_user_type ON tbl_nasabah.id_type = tbl_user_type.id_type WHERE tbl_nasabah.nik_nasabah='".$username."' and tbl_nasabah.password_nasabah='".$password."'");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_unit()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_unit_desa"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_unit_desa"];
      } 
     
      $query = $connect->query("SELECT tbl_unit_desa.id_unit_desa, tbl_unit_desa.nik_unit_desa, tbl_unit_desa.nama_unit_desa, tbl_unit_desa.nama_kepala_unit_desa, tbl_desa.id_desa, tbl_desa.nama_desa, tbl_desa.kecamatan_desa, tbl_desa.kabupaten_desa, tbl_desa.provinsi_desa, tbl_desa.kode_pos_desa FROM tbl_unit_desa LEFT JOIN tbl_desa ON tbl_unit_desa.id_desa = tbl_desa.id_desa WHERE nik_unit_desa='".$nik."'");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_informasi()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      $query = $connect->query("SELECT * FROM tbl_info");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_pengenalan()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      $query = $connect->query("SELECT * FROM tbl_pengenalan");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function get_lingkungan()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      $query = $connect->query("SELECT * FROM tbl_lingkungan");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function get_desa()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["id"]) && !empty($_GET["key"])) {
         $id = $_GET["id"];
      } 
     
      $query = $connect->query("SELECT id_desa, nama_desa, kecamatan_desa, kabupaten_desa, provinsi_desa, kode_pos_desa, gambar_desa FROM tbl_desa WHERE id_desa='".$id."'");            
      while($row=mysqli_fetch_object($query)) {
         $data[] = $row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function get_list_notifikasi()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      if (!empty($_GET["id_unit_desa"]) && !empty($_GET["key"]) && !empty($_GET["topic"])) {
         $id_unit = $_GET["id_unit_desa"];
		 $topic = $_GET["topic"];
      } 
     
      if ($_GET["topic"] == 'informasi'){
         $query = $connect->query("SELECT id_notifikasi, title, body, topics, tanggal FROM tbl_notifikasi WHERE tbl_notifikasi.topics = 'informasi' ORDER BY tanggal DESC");
      } else{
         $query = $connect->query("SELECT tbl_notifikasi.id_notifikasi, tbl_notifikasi.title, tbl_notifikasi.body, tbl_notifikasi.topics, tbl_notifikasi.tanggal FROM tbl_notifikasi LEFT JOIN tbl_token ON tbl_notifikasi.id_token = tbl_token.id_token LEFT JOIN tbl_nasabah ON tbl_token.id_nasabah = tbl_nasabah.id_nasabah LEFT JOIN tbl_unit_desa ON tbl_nasabah.id_unit_desa = tbl_unit_desa.id_unit_desa WHERE tbl_unit_desa.id_unit_desa ='".$id_unit."' AND tbl_notifikasi.topics = '".$topic."' ORDER BY tanggal DESC");
      }
                  
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function get_profil()
   {
      global $connect;      
      $key = "12H6383H3";
	   
	  $resultArr = array();
      $result = $connect->query("SELECT * FROM tbl_kategori_profil"); 
      
      if ($result->num_rows > 0 && $_GET["key"] == $key) {
            $resultArr = array('success' => true, 'total' => $result->num_rows);
            while($row = $result->fetch_assoc()) {
                $resultArr['data_kategori'][$row['id_kategori_profil']] = array('id_kategori_profil' => $row['id_kategori_profil'], 'kategori_profil' => $row['kategori_profil']);
				
                $sql2 = "SELECT tbl_profil.id_profil, tbl_profil.subtitle_profil, tbl_profil.icon_profil, tbl_profil.intent_profil FROM tbl_profil LEFT JOIN  tbl_kategori_profil ON tbl_profil.id_kategori_profil = tbl_kategori_profil.id_kategori_profil WHERE tbl_profil.id_kategori_profil = '".$row['id_kategori_profil']."'";
                $result2 = $connect->query($sql2);
                while($row2 = $result2->fetch_assoc()) {
                    $resultArr['data_kategori'][$row['id_kategori_profil']]['data'][] = $row2;
                }
            }
            $resultArr['data_kategori'] = array_values($resultArr['data_kategori']);
        } else {
            $resultArr = array('success' => false, 'total' => 0);
        }
	    header('Content-Type: application/json');
        echo json_encode($resultArr);
   }
   
   function get_keypair()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      $query = $connect->query("SELECT * FROM tbl_keypair");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function insert_nasabah()
   {
     global $connect;   
     $check = array('nik_nasabah' => '', 'username_nasabah' => '', 'nama_nasabah' => '', 'alamat_nasabah' => '', 'jk_nasabah' => '', 'id_desa' => '', 'id_unit_desa' => '', 'id_type' => '');
     $check_match = count(array_intersect_key($_POST, $check));
    
     if ($check_match == count($check)){
         
         $query_found = $connect->query("SELECT COUNT(nik_nasabah) AS found FROM tbl_nasabah WHERE nik_nasabah = '$_POST[nik_nasabah]' ");            
         while($row_found = mysqli_fetch_object($query_found)) {
           $found = $row_found->found;
         }
         
         if ($found == 1){
             $response = array('status' => 10, 'message' =>'Data NIK ini sudah pernah di isikan, mohon lakukan <h5>"Edit Nasabah"</h5> jika ingin mengubah data');
         } else {
             $result = mysqli_query($connect, "INSERT INTO tbl_nasabah (nik_nasabah, username_nasabah, nama_nasabah, alamat_nasabah, jk_nasabah, id_desa, id_unit_desa, id_type, password_nasabah, no_hp_nasabah, id_kartu) VALUES('$_POST[nik_nasabah]','$_POST[username_nasabah]','$_POST[nama_nasabah]','$_POST[alamat_nasabah]','$_POST[jk_nasabah]','$_POST[id_desa]','$_POST[id_unit_desa]','$_POST[id_type]', 'null', 'null', 0)");
    	     if($result) {
    	         
    		   $query_select_ids = $connect->query("SELECT id_nasabah FROM tbl_nasabah WHERE nik_nasabah = '$_POST[nik_nasabah]' ");            
                while($row_select_ids = mysqli_fetch_object($query_select_ids)) {
                   $id = $row_select_ids->id_nasabah;
                }
    		   
    		   $insert_saldo = mysqli_query($connect, "INSERT INTO tbl_saldo (jml_saldo_nasabah, id_nasabah) VALUES(0, '$id')");
    		   $insert_token = mysqli_query($connect, "INSERT INTO tbl_token (token, id_nasabah) VALUES('', '$id')");
    		   $insert_pincode = mysqli_query($connect, "INSERT INTO tbl_pincode (pincode, id_nasabah) VALUES(0, '$id')");
    		   $insert_pencapaian = mysqli_query($connect, "INSERT INTO tbl_pencapaian (total_pencapaian_kg, id_nasabah) VALUES(0, '$id')");
    		   
    		   $response = array('status' => 1, 'message' =>'Registrasi NIK Berhasil');
    		   
    	    } else {
    		   $response = array('status' => 0, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
    	    }
         }
         
     } else {
    	$response = array('status' => 0, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
     }
     
     header('Content-Type: application/json');
     echo json_encode($response);
   }
   
   function get_points()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["id_unit_desa"]) && !empty($_GET["key"])) {
         $id_unit = $_GET["id_unit_desa"];
      } 
      
      $query = $connect->query("SELECT SUM(jumlah_poin) as jumlah_poin FROM tbl_poin_unit WHERE id_unit_desa = '".$id_unit."'");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_kartu()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["id_kartu"])) {
         $id_kartu = $_GET["id_kartu"];
      } 
      
      
      $query = $connect->query("SELECT * FROM tbl_kartu WHERE id_kartu = '".$id_kartu."' ");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
          
        $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      } else {
          
        $response = array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_informasi_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah, tbl_nasabah.nama_nasabah, tbl_nasabah.no_hp_nasabah, tbl_nasabah.alamat_nasabah, tbl_nasabah.jk_nasabah, tbl_unit_desa.id_unit_desa, tbl_unit_desa.nama_unit_desa, tbl_unit_desa.nama_kepala_unit_desa, tbl_desa.id_desa, tbl_desa.nama_desa, CONCAT('Desa ', tbl_desa.nama_desa, ' Kec.', tbl_desa.kecamatan_desa, ' Kab. ', tbl_desa.kabupaten_desa, ', ', tbl_desa.provinsi_desa, ' ', tbl_desa.kode_pos_desa) as informasi_desa, tbl_nasabah.id_type FROM tbl_nasabah LEFT JOIN tbl_unit_desa ON tbl_nasabah.id_unit_desa = tbl_unit_desa.id_unit_desa LEFT JOIN tbl_desa ON tbl_nasabah.id_desa = tbl_desa.id_desa WHERE nik_nasabah='".$nik."'");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
        $response = array('status' => 1, 'message' =>'success', 'data' => $data);
      } else {
        $response = array('status' => 0, 'message' =>'No Data Found');
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function get_item_sampah()
   {
      global $connect;      
      $key = "12H6383H3";
      
     
      $query = $connect->query("SELECT tbl_sampah.*, tbl_kategori_sampah.nama_kategori_sampah FROM tbl_sampah LEFT JOIN tbl_kategori_sampah ON tbl_sampah.id_kategori_sampah = tbl_kategori_sampah.id_kategori_sampah");            
      while($row=mysqli_fetch_object($query)) {
         $data[] =$row;
      }
      
      if($data && $_GET["key"] == $key) {
        $response = array('status' => 1, 'message' =>'success', 'data' => $data);
      } else {
        $response = array('status' => 0, 'message' =>'No Data Found');
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
   
   function insert_transaksi_sampah()
   {
     global $connect;   
     
     $date = date('Y-m-d H:i:s');
     $current_date = date('Y-m-d');
     $last_date_of_month = date('Y-m-t');
     
     $check = array('id_unit_desa' => '', 'id_nasabah' => '', 'subtotal_transaksi_sampah' => '', 'catatan_transaksi_sampah' => '', 'saldo' => '', 'pencapaian' => '', 'pilah' => '', 'id_type' => '');
     $check_match = count(array_intersect_key($_POST, $check));
    
     if ($check_match == count($check)){
         
         $result = mysqli_query($connect, "INSERT INTO tbl_transaksi_sampah (id_transaksi_sampah, subtotal_transaksi_sampah, tgl_transaksi_sampah, catatan_transaksi_sampah, id_nasabah, id_unit_desa) VALUES(NULL,'$_POST[subtotal_transaksi_sampah]','$date','$_POST[catatan_transaksi_sampah]','$_POST[id_nasabah]', '$_POST[id_unit_desa]')");
    	 
    	 if($result) {
    	     
    	    $query_select_ids = $connect->query("SELECT id_transaksi_sampah FROM tbl_transaksi_sampah WHERE id_nasabah = '$_POST[id_nasabah]' AND catatan_transaksi_sampah = '$_POST[catatan_transaksi_sampah]' AND subtotal_transaksi_sampah = '$_POST[subtotal_transaksi_sampah]'");
            while($row_select_ids = mysqli_fetch_object($query_select_ids)) {
                $id_query_transaksi_sampah = $row_select_ids->id_transaksi_sampah;
            }
    	    
    	    //START MANDATORY FUNCTION
    	    
    	    $query_update_saldo = $connect->query("UPDATE tbl_saldo SET jml_saldo_nasabah = jml_saldo_nasabah + '$_POST[saldo]' WHERE id_nasabah = '$_POST[id_nasabah]'");
    	    
    	    $query_update_pencapaian = $connect->query("UPDATE tbl_pencapaian SET total_pencapaian_kg = total_pencapaian_kg + '$_POST[pencapaian]' WHERE id_nasabah = '$_POST[id_nasabah]'");
    	    
    	    $insert_tbl_saldo_monthly = mysqli_query($connect, "INSERT INTO tbl_saldo_monthly (id_saldo_monthly, jml_saldo_monthly, starting_date_monthly, end_date_monthly, id_nasabah) VALUES(NULL,'$_POST[subtotal_transaksi_sampah]','$current_date','$last_date_of_month','$_POST[id_nasabah]')");
    	     
    	    if ($_POST['pilah'] == 'true'){
    	        if ($_POST['id_type'] == 1){
    	            $insert_poin_nasabah = mysqli_query($connect, "INSERT INTO tbl_poin_nasabah (id_poin, id_nasabah, jumlah_poin) VALUES(NULL,'$_POST[id_nasabah]', 10)");
    	        } else if ($_POST['id_type'] == 2){
    	            $insert_poin_nasabah = mysqli_query($connect, "INSERT INTO tbl_poin_nasabah (id_poin, id_nasabah, jumlah_poin) VALUES(NULL,'$_POST[id_nasabah]', 20)");
    	        } else if ($_POST['id_type'] == 3){
    	            $insert_poin_nasabah = mysqli_query($connect, "INSERT INTO tbl_poin_nasabah (id_poin, id_nasabah, jumlah_poin) VALUES(NULL,'$_POST[id_nasabah]', 35)");
    	        } else if ($_POST['id_type'] == 4){
    	            $insert_poin_nasabah = mysqli_query($connect, "INSERT INTO tbl_poin_nasabah (id_poin, id_nasabah, jumlah_poin) VALUES(NULL,'$_POST[id_nasabah]', 50)");
    	        } else {
    	            $insert_poin_nasabah = mysqli_query($connect, "INSERT INTO tbl_poin_nasabah (id_poin, id_nasabah, jumlah_poin) VALUES(NULL,'$_POST[id_nasabah]', 0)");
    	        }
    	    } 
    	    
    	    $insert_poin_unit = mysqli_query($connect, "INSERT INTO tbl_poin_unit (id_poin, id_unit_desa, jumlah_poin) VALUES(NULL,'$_POST[id_unit_desa]', 10)");
    	    
            //END MANDATORY FUNCTION
            
            
            $query_select_nasabah = $connect->query("SELECT nik_nasabah, id_transaksi_sampah, subtotal_transaksi_sampah, tgl_transaksi_sampah FROM tbl_nasabah LEFT JOIN tbl_transaksi_sampah ON tbl_nasabah.id_nasabah = tbl_transaksi_sampah.id_nasabah WHERE tbl_nasabah.id_nasabah = '$_POST[id_nasabah]'");
            while($row_select_nasabah = mysqli_fetch_object($query_select_nasabah)) {
                $nasabah_id = $row_select_nasabah->nik_nasabah;
                $id_setor = $row_select_nasabah->id_transaksi_sampah;
                $saldo_setor = $row_select_nasabah->subtotal_transaksi_sampah;
                $tgl_setor = $row_select_nasabah->tgl_transaksi_sampah;
            }
            
            $notif_id_unit_desa = $_POST['id_unit_desa'];
            $notif_id_desa = $_POST['id_unit_desa'];
            
            $title = "Pemberitahuan Setor Sampah Dengan ID : RESTR". $id_setor. "U". $notif_id_unit_desa. "D". $notif_id_desa;
            $body = "Transaksi setor sampah berhasil pada tanggal $tgl_setor, saldo bertambah Rp" . number_format($saldo_setor,2,',','.');
            $topic = "setor";
            
            //SEND NOTIF
            call_notification($nasabah_id, $title, $body, $topic);
                
    		$response = array('status' => 1, 'message' =>'Transaksi Sampah Berhasil', 'id' => $id_query_transaksi_sampah);
    	 } else {
    		$response = array('status' => 0, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
    	 }
     } else {
    	$response = array('status' => 404, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
     }
     
     header('Content-Type: application/json');
     echo json_encode($response);
   }
   
   function insert_item_transaksi_sampah()
   {
     global $connect;
     
     $check = array('id_transaksi_sampah' => '', 'id_sampah' => '', 'jumlah_item_transaksi' => '');
     $check_match = count(array_intersect_key($_POST, $check));
    
     if ($check_match == count($check)){
         
         $result = mysqli_query($connect, "INSERT INTO tbl_item_transaksi_sampah (id_item_transaksi_sampah, id_transaksi_sampah, id_sampah, jumlah_item_transaksi) VALUES(NULL,'$_POST[id_transaksi_sampah]','$_POST[id_sampah]','$_POST[jumlah_item_transaksi]')");
    	 
    	 if($result) {
    		$response = array('status' => 1, 'message' =>'Insert Item Sampah Berhasil');
    	 } else {
    		$response = array('status' => 0, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
    	 }
     } else {
    	$response = array('status' => 404, 'message' =>'Terjadi kesalahan, mohon mencobanya lagi');
     }
     
     header('Content-Type: application/json');
     echo json_encode($response);
   }
   
   function get_daftar_transaksi_sampah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["id_unit_desa"]) && !empty($_GET["key"])) {
         $id_unit = $_GET["id_unit_desa"];
      } 

     $resultArr = array();
      $result = $connect->query("SELECT tbl_transaksi_sampah.id_transaksi_sampah, tbl_nasabah.id_nasabah, tbl_nasabah.nama_nasabah, tbl_transaksi_sampah.subtotal_transaksi_sampah, tbl_transaksi_sampah.tgl_transaksi_sampah, tbl_transaksi_sampah.catatan_transaksi_sampah, tbl_transaksi_sampah.id_unit_desa, tbl_desa.id_desa, SUM(tbl_item_transaksi_sampah.jumlah_item_transaksi) AS qty_items FROM tbl_transaksi_sampah \n"

    . "LEFT JOIN tbl_nasabah ON tbl_transaksi_sampah.id_nasabah = tbl_nasabah.id_nasabah JOIN tbl_unit_desa ON tbl_transaksi_sampah.id_unit_desa = tbl_unit_desa.id_unit_desa JOIN tbl_desa ON tbl_unit_desa.id_desa = tbl_desa.id_desa JOIN tbl_item_transaksi_sampah ON tbl_transaksi_sampah.id_transaksi_sampah = tbl_item_transaksi_sampah.id_transaksi_sampah WHERE tbl_unit_desa.id_unit_desa ='".$id_unit."' GROUP BY id_transaksi_sampah ORDER BY id_transaksi_sampah DESC"); 
	     
      
        if ($result->num_rows > 0 && $_GET["key"] == $key) {
            $resultArr = array('success' => true, 'total' => $result->num_rows);
            while($row = $result->fetch_assoc()) {
                $resultArr['data_transaksi'][$row['id_transaksi_sampah']] = array('id_transaksi_sampah' => $row['id_transaksi_sampah'], 'id_nasabah' => $row['id_nasabah'], 'nama_nasabah' => $row['nama_nasabah'], 'id_unit_desa' => $row['id_unit_desa'], 'id_desa' => $row['id_desa'], 'subtotal_transaksi_sampah' => $row['subtotal_transaksi_sampah'], 'tgl_transaksi_sampah' => $row['tgl_transaksi_sampah'], 'catatan_transaksi_sampah' => $row['catatan_transaksi_sampah'], 'id_nasabah' => $row['id_nasabah'], 'qty_items' => $row['qty_items']);

                //Anwser table results
                $sql2 = "SELECT tbl_sampah.nama_sampah, tbl_sampah.harga_sampah, tbl_kategori_sampah.nama_kategori_sampah, tbl_item_transaksi_sampah.jumlah_item_transaksi FROM tbl_item_transaksi_sampah JOIN tbl_sampah ON tbl_item_transaksi_sampah.id_sampah = tbl_sampah.id_sampah JOIN tbl_kategori_sampah ON tbl_kategori_sampah.id_kategori_sampah = tbl_sampah.id_kategori_sampah WHERE tbl_item_transaksi_sampah.id_transaksi_sampah = '".$row['id_transaksi_sampah']."'";
                $result2 = $connect->query($sql2);
                while($row2 = $result2->fetch_assoc()) {
                    $resultArr['data_transaksi'][$row['id_transaksi_sampah']]['data_katalog'][] = $row2;
                }
            }
            $resultArr['data_transaksi'] = array_values($resultArr['data_transaksi']);
        } else {
            $resultArr = array('success' => false, 'total' => 0);
           // echo "question 0 results";
        }
	    header('Content-Type: application/json');
        echo json_encode($resultArr);
   }
   
   function call_notification($nik, $title, $body, $topic){
       
     $ch = curl_init();
     $url = "https://sv-resa.platiniumlogistic.com/notification.php";
     
     $dataArray = [
        'function' => 'send_notif_to_nasabah', 
        'nik_nasabah' => $nik,
        'title' => $title,
        'body' => $body,
        'topic' => $topic];
        
     $data = http_build_query($dataArray);
     $getUrl = $url."?".$data;
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($ch, CURLOPT_URL, $getUrl);
     curl_setopt($ch, CURLOPT_TIMEOUT, 80);
     $responsex = curl_exec($ch);
     if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
     }
     curl_close($ch);
       
   }
   
?>
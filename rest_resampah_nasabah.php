<?php
require_once "koneksi_resampah.php";
header('Content-Type: application/json');

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
   
   function get_pincode()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah,tbl_nasabah.nama_nasabah,tbl_pincode.pincode FROM tbl_nasabah LEFT JOIN tbl_pincode ON tbl_nasabah.id_nasabah = tbl_pincode.id_nasabah WHERE nik_nasabah='".$nik."'");            
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

   function get_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah,tbl_nasabah.nama_nasabah,tbl_nasabah.alamat_nasabah,tbl_nasabah.jk_nasabah,tbl_desa.id_desa,tbl_desa.nama_desa,tbl_desa.kecamatan_desa,tbl_desa.kabupaten_desa,tbl_desa.provinsi_desa,tbl_desa.kode_pos_desa FROM tbl_nasabah LEFT JOIN tbl_desa ON tbl_nasabah.id_desa = tbl_desa.id_desa WHERE nik_nasabah='".$nik."'");            
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
   
   function get_saldo_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah,tbl_nasabah.nama_nasabah,tbl_saldo.jml_saldo_nasabah FROM tbl_nasabah LEFT JOIN tbl_saldo ON tbl_nasabah.id_nasabah = tbl_saldo.id_nasabah WHERE nik_nasabah='".$nik."'");            
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
   
   function get_saldo_nasabah_bulan_ini()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["starting_date_month"]) && !empty($_GET["ending_date_month"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
         $starting_date = $_GET["starting_date_month"];
         $ending_date = $_GET["ending_date_month"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah,tbl_nasabah.nama_nasabah, SUM(tbl_saldo_monthly.jml_saldo_monthly) AS total_saldo_monthly,tbl_saldo_monthly.starting_date_monthly,tbl_saldo_monthly.end_date_monthly FROM tbl_nasabah LEFT JOIN tbl_saldo_monthly ON tbl_nasabah.id_nasabah = tbl_saldo_monthly.id_nasabah WHERE (tbl_saldo_monthly.starting_date_monthly >= '".$starting_date."' AND tbl_saldo_monthly.end_date_monthly <= '".$ending_date."') AND nik_nasabah = '".$nik."'");            
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

   function get_riwayat_saldo_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"]) && !empty($_GET["starting_date_month"])) {
         $nik = $_GET["nik_nasabah"];
		 $parts = explode('-', $_GET["starting_date_month"]);
		 $year = $parts[0];
		 $month = $parts[1];
      } 
     
      $query = $connect->query("SELECT DISTINCT(tbl_nasabah.id_nasabah), tbl_saldo_monthly.jml_saldo_monthly, tbl_saldo_monthly.starting_date_monthly, tbl_saldo_monthly.end_date_monthly FROM `tbl_saldo_monthly` LEFT JOIN tbl_nasabah ON tbl_saldo_monthly.id_nasabah = tbl_nasabah.id_nasabah WHERE YEAR(starting_date_monthly) = '".$year."' AND MONTH(starting_date_monthly) = '".$month."' AND tbl_nasabah.nik_nasabah = '".$nik."'");            
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
   
   function get_setor_sampah_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
     
      $query = $connect->query("SELECT tbl_nasabah.id_nasabah, tbl_nasabah.nik_nasabah,tbl_nasabah.nama_nasabah,tbl_pencapaian.total_pencapaian_kg FROM tbl_nasabah LEFT JOIN tbl_pencapaian ON tbl_nasabah.id_nasabah = tbl_pencapaian.id_nasabah WHERE nik_nasabah='".$nik."'");            
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

   function get_daftar_transaksi_sampah_nasabah()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 

     $resultArr = array();
      $result = $connect->query("SELECT tbl_transaksi_sampah.id_transaksi_sampah, tbl_transaksi_sampah.subtotal_transaksi_sampah, tbl_transaksi_sampah.tgl_transaksi_sampah, tbl_transaksi_sampah.catatan_transaksi_sampah, tbl_transaksi_sampah.id_nasabah, tbl_transaksi_sampah.id_unit_desa, tbl_unit_desa.id_desa, SUM(tbl_item_transaksi_sampah.jumlah_item_transaksi) AS qty_items FROM tbl_transaksi_sampah \n"

    . "LEFT JOIN tbl_unit_desa ON tbl_transaksi_sampah.id_unit_desa = tbl_unit_desa.id_unit_desa JOIN tbl_nasabah ON tbl_transaksi_sampah.id_nasabah = tbl_nasabah.id_nasabah JOIN tbl_item_transaksi_sampah ON tbl_transaksi_sampah.id_transaksi_sampah = tbl_item_transaksi_sampah.id_transaksi_sampah WHERE tbl_nasabah.nik_nasabah ='".$nik."' GROUP BY id_transaksi_sampah ORDER BY id_transaksi_sampah DESC"); 
   //  $result = $conn->query($query); 
	     
      
        if ($result->num_rows > 0 && $_GET["key"] == $key) {
            $resultArr = array('success' => true, 'total' => $result->num_rows);
            while($row = $result->fetch_assoc()) {
                $resultArr['data_transaksi'][$row['id_transaksi_sampah']] = array('id_transaksi_sampah' => $row['id_transaksi_sampah'], 'id_unit_desa' => $row['id_unit_desa'], 'id_desa' => $row['id_desa'], 'subtotal_transaksi_sampah' => $row['subtotal_transaksi_sampah'], 'tgl_transaksi_sampah' => $row['tgl_transaksi_sampah'], 'catatan_transaksi_sampah' => $row['catatan_transaksi_sampah'], 'id_nasabah' => $row['id_nasabah'], 'qty_items' => $row['qty_items']);

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
      
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"]) && !empty($_GET["topic"])) {
         $nik = $_GET["nik_nasabah"];
		 $topic = $_GET["topic"];
      } 
     
     if ($_GET["topic"] == 'informasi'){
       $query = $connect->query("SELECT id_notifikasi, title, body, topics, tanggal FROM tbl_notifikasi WHERE topics = 'informasi' ORDER BY tanggal DESC");
     } else {
       $query = $connect->query("SELECT tbl_notifikasi.id_notifikasi, tbl_notifikasi.title, tbl_notifikasi.body, tbl_notifikasi.topics, tbl_notifikasi.tanggal FROM tbl_notifikasi LEFT JOIN tbl_token ON tbl_notifikasi.id_token = tbl_token.id_token LEFT JOIN tbl_nasabah ON tbl_token.id_nasabah = tbl_nasabah.id_nasabah WHERE nik_nasabah ='".$nik."' AND tbl_notifikasi.topics = '".$topic."' ORDER BY tanggal DESC");  
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
   
   function get_points()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
      } 
      
      $query = $connect->query("SELECT SUM(tbl_poin_nasabah.jumlah_poin) as jumlah_poin FROM tbl_poin_nasabah LEFT JOIN tbl_nasabah ON tbl_poin_nasabah.id_nasabah = tbl_nasabah.id_nasabah WHERE tbl_nasabah.nik_nasabah = '".$nik."'");            
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
   
   
   function update_user_login()
      {
         global $connect;
         if (!empty($_GET["id"]) && !empty($_GET["ipaddress"]) && !empty($_GET["device"]) && !empty($_GET["device_number"])) {
             $id = $_GET["id"];
             $ipaddress = $_GET["ipaddress"];
             $device = $_GET["device"];
             $device_number = $_GET["device_number"];
         }
         
         $check = array('id' => '', 'ipaddress' => '', 'device' => '', 'device_number' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE app_users SET ipaddress='$_POST[ipaddress]', device='$_POST[device]', device_number='$_POST[device_number]' WHERE id='$_POST[id]'");
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function update_token()
      {
         global $connect;
         if (!empty($_GET["nik_nasabah"]) && !empty($_GET["token"])) {
             $nik_nasabah = $_GET["nik_nasabah"];
             $token = $_GET["token"];
         }
         
         $check = array('nik_nasabah' => '', 'token' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE tbl_token LEFT JOIN tbl_nasabah ON tbl_token.id_nasabah = tbl_nasabah.id_nasabah SET tbl_token.token = '$_POST[token]' WHERE tbl_nasabah.nik_nasabah='$_POST[nik_nasabah]'");
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function update_saldo_transaksi_qr_owner()
      {
         global $connect;
	   	 $key_match = "12H6383H3";
	   
         if (!empty($_GET["nik_nasabah"]) && !empty($_GET["saldo_pending"]) && !empty($_GET["key"])) {
             $nik_nasabah = $_GET["nik_nasabah"];
             $saldo_pending = $_GET["saldo_pending"];
         }
         
         $check = array('nik_nasabah' => '', 'saldo_pending' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
            $result = mysqli_query($connect, "UPDATE tbl_saldo LEFT JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_saldo.id_nasabah SET tbl_saldo.jml_saldo_nasabah = tbl_saldo.jml_saldo_nasabah - '$_POST[saldo_pending]' WHERE tbl_nasabah.nik_nasabah='$_POST[nik_nasabah]'");
         
            if($result && $_GET["key"] == $key_match)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function update_saldo_transaksi_qr_target()
      {
         global $connect;
	   	 $key_match = "12H6383H3";
	   
         if (!empty($_GET["nik_nasabah"]) && !empty($_GET["saldo_pending"]) && !empty($_GET["key"])) {
             $nik_nasabah = $_GET["nik_nasabah"];
             $saldo_pending = $_GET["saldo_pending"];
         }
         
         $check = array('nik_nasabah' => '', 'saldo_pending' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
            $result = mysqli_query($connect, "UPDATE tbl_saldo LEFT JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_saldo.id_nasabah SET tbl_saldo.jml_saldo_nasabah = tbl_saldo.jml_saldo_nasabah + '$_POST[saldo_pending]' WHERE tbl_nasabah.nik_nasabah='$_POST[nik_nasabah]'");
         
            if($result && $_GET["key"] == $key_match)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

	function delete_karyawan()
   	  {
		
      global $connect;
      $id = $_GET['id'];
      $query = "DELETE FROM karyawan WHERE id=".$id;
      if(mysqli_query($connect, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 ?>
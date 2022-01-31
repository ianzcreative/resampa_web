<?php
require_once "koneksi_resampah.php";
header('Content-Type: application/json');

   if(function_exists($_GET['function'])) {
         $_GET['function']();
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
   
   function get_login()
   {
      global $connect;      
      $key = "12H6383H3";
      
      if (!empty($_GET["nik_nasabah"]) && !empty($_GET["password_nasabah"]) && !empty($_GET["key"])) {
         $nik = $_GET["nik_nasabah"];
         $password = $_GET["password_nasabah"];
      } 
     
      $query = $connect->query("SELECT app_users.id, app_users.nama as nama, app_users.email, app_users.no_hp, app_users.account_type, tipe_akun.nama as nama_tipe_akun, tipe_akun.keterangan FROM app_users LEFT JOIN tipe_akun ON app_users.account_type = tipe_akun.id_tipe WHERE email='".$email."' and password='".$password."'");            
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
     
      $query = $connect->query("SELECT tbl_transaksi_sampah.id_transaksi_sampah, tbl_transaksi_sampah.subtotal_transaksi_sampah, tbl_transaksi_sampah.tgl_transaksi_sampah, tbl_transaksi_sampah.catatan_transaksi_sampah, tbl_transaksi_sampah.id_nasabah FROM tbl_transaksi_sampah \n"

    . "JOIN tbl_nasabah ON tbl_transaksi_sampah.id_nasabah = tbl_nasabah.id_nasabah WHERE tbl_nasabah.nik_nasabah ='".$nik."'");  
	     
	   
      while($row=mysqli_fetch_object($query)) {
		 $datum[] = $row;
		 
		 $query2 = $connect->query("SELECT tbl_item_transaksi_sampah.id_item_transaksi_sampah, tbl_item_transaksi_sampah.id_transaksi_sampah, tbl_sampah.nama_sampah, tbl_sampah.harga_sampah, tbl_kategori_sampah.nama_kategori_sampah FROM tbl_item_transaksi_sampah JOIN tbl_sampah ON tbl_item_transaksi_sampah.id_sampah = tbl_sampah.id_sampah JOIN tbl_kategori_sampah ON tbl_kategori_sampah.id_kategori_sampah = tbl_sampah.id_kategori_sampah WHERE tbl_item_transaksi_sampah.id_transaksi_sampah ='".$row->id_transaksi_sampah."'");
		  
		  while($row=mysqli_fetch_object($query2)) {
			  $data[] = $row;
		  }
		  
      }
      
      if($data && $_GET["key"] == $key) {
		  
		$array_data = $data;
          
        $response = array(
						 'status' => 1,
						 'message' =>'Success',
						  array( array('datum'=>$datum), 
           				       'data'=>array($data)
				         )	
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
      
   function get_provinsi()
   {
      global $connect;      
      $key = "12H6383H3";
      
      
      $query = $connect->query("SELECT DISTINCT prov FROM option_provinsi");            
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
   
   
   function get_kecamatan()
   {
      global $connect;
      $key = "12H6383H3";
      
      if (!empty($_GET["asal"]) && !empty($_GET["key"])) {
         $asal = $_GET["asal"];
      }            
      $query ="SELECT DISTINCT tujuan FROM option_harga WHERE tujuan LIKE '".$asal."%'";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data && $_GET["key"] == $key)
      {
      $response = array(
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      echo json_encode($response);
   }
   
   function get_kota()
   {
      global $connect;
      $key = "12H6383H3";
      
      if (!empty($_GET["asal"]) && !empty($_GET["key"])) {
         $asal = $_GET["asal"];
      }            
      $query ="SELECT DISTINCT kota FROM option_harga WHERE kota LIKE '".$asal."%'";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data && $_GET["key"] == $key)
      {
      $response = array(
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      echo json_encode($response);
   }
   
   function get_count_pengiriman()
   {
      global $connect;
      $key = "12H6383H3";
      
      if (!empty($_GET["id"]) && !empty($_GET["status"]) && !empty($_GET["key"])) {
         $id = $_GET["id"];
         $status = $_GET["status"];
      }            
      $query ="SELECT COUNT(resi_id) as count_pengiriman FROM parsel WHERE user_id = '".$id."' and status_id = '".$status."'";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data && $_GET["key"] == $key)
      {
      $response = array(
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
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
   
   function insert_register()
   {
     global $connect;   
     $check = array('nama' => '', 'email' => '', 'password' => '', 'no_hp' => '', 'ipaddress' => '', 'device' => '', 'device_number' => '', 'account_type' => '');
     $check_match = count(array_intersect_key($_POST, $check));
    
     if($check_match == count($check)){
    
    	   $result = mysqli_query($connect, "INSERT INTO app_users (nama,email,password,no_hp,ipaddress,device,device_number,account_type) VALUES('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[no_hp]','$_POST[ipaddress]','$_POST[device]','$_POST[device_number]','$_POST[account_type]')");
    
    	   if($result)
    	   {
    		  $response='success';
    	   }
    	   else
    	   {
    		  $response='failed';
    	   }
     }else{
    	$response=array(
    			 'status' => 0,
    			 'message' =>'Wrong Parameter'
    		  );
     }
     header('Content-Type: application/json');
     echo json_encode($response);
   }
   
   function insert_alamat()
   {
     global $connect;   
     $check = array('id_pengguna' => '', 'alias' => '', 'no_hp' => '', 'jalan' => '', 'kecamatan' => '', 'provinsi' => '', 'kode_pos' => '', 'type' => '');
     $check_match = count(array_intersect_key($_POST, $check));
    
     if($check_match == count($check)){
    
    	   $result = mysqli_query($connect, "INSERT INTO alamat (id_pengguna,alias,no_hp,jalan,kecamatan,provinsi,kode_pos,type) VALUES('$_POST[id_pengguna]','$_POST[alias]','$_POST[no_hp]','$_POST[jalan]','$_POST[kecamatan]','$_POST[provinsi]','$_POST[kode_pos]','$_POST[type]')");
    
    	   if($result)
    	   {
    		  $response='success';
    	   }
    	   else
    	   {
    		  $response='failed';
    	   }
     }else{
    	$response=array(
    			 'status' => 0,
    			 'message' =>'Wrong Parameter'
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
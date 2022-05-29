<?php
require_once "koneksi_resampah.php";
header('Content-Type: application/json');

   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }
      

   function exec_iuran_seribu()
   {
      global $connect;      
      $key = "12H6383H3";
      
      $substitute = 1000;
      
      
      $query = $connect->query("UPDATE tbl_saldo SET jml_saldo_nasabah = jml_saldo_nasabah - '".$substitute."'");
      
      $count_user = $connect->query("SELECT COUNT(*) AS jml_nasabah FROM tbl_nasabah");
      $row_count_user = mysqli_fetch_assoc($count_user);
      $jml_nasabah = $row_count_user['jml_nasabah'];
      
      $update_valuasi = $connect->query("UPDATE tbl_valuasi SET total_valuasi = total_valuasi + ('".$substitute."' * '".$jml_nasabah."') WHERE sumber_valuasi = 'routine_month'");
      
      if($query && $update_valuasi) {
          
        $response = array(
                     'message' =>'Success'
                  );
      } else {
          
        $response = array(
                     'message' =>'No Data Found'
                  );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 ?>
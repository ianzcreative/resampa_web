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
      
      
      $query = $connect->query("UPDATE tbl_saldo SET jml_saldo_nasabah = jml_saldo_nasabah - 1000");            
      
      if($query) {
          
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
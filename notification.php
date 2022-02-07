<?php
require_once "koneksi_resampah.php";
header('Content-Type: application/json');

   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }


	function send_notif_to_nasabah()
	{
		 global $connect;
         if (!empty($_GET["nik_nasabah"]) && !empty($_GET["title"]) && !empty($_GET["body"]) && !empty($_GET["img"])) {
             $nik = $_GET["nik_nasabah"];
			 $title = $_GET["title"];
			 $body = $_GET["body"];
			 $img = $_GET["img"];
         }
		
		 $query_id = $connect->query("SELECT tbl_token.id_token, tbl_token.token FROM tbl_token LEFT JOIN tbl_nasabah ON tbl_token.id_nasabah = tbl_nasabah.id_nasabah WHERE tbl_nasabah.nik_nasabah='".$nik."'");
         
         $check = array('title' => '', 'body' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
		 $query_insert = mysqli_query($connect, "INSERT INTO tbl_notifikasi VALUES('$_POST[title]','$_POST[body]', '".$query_id->id_token."'");
         
            if($query_insert)
            {
               $response = array(
                  'status' => 1,
                  'message' =>'Send Notification Success'                  
               );
				
			   send_notification($query_id->id_token, $title, $body, $img);
            }
            else
            {
               $response = array(
                  'status' => 0,
                  'message' =>'Send Notification Failed'                  
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

	function send_notification($to, $title, $message, $img)
	{
		$msg = $message;
		$content = array(
			"id" => $msg
		);
		$headings = array(
			"id" => $title
		);
		if ($img == '') {
			$fields = array(
				'app_id' => '70d89de3-43b5-4949-81b5-64c9fe75306d',
				"headings" => $headings,
				'include_player_ids' => array($to),
				'large_icon' => "https://www.google.co.in/images/branding/googleg/1x/googleg_standard_color_128dp.png",
				'content_available' => true,
				'contents' => $content
			);
		} else {
			$ios_img = array(
				"id1" => $img
			);
			$fields = array(
				'app_id' => '70d89de3-43b5-4949-81b5-64c9fe75306d',
				"headings" => $headings,
				'include_player_ids' => array($to),
				'contents' => $content,
				"big_picture" => $img,
				'large_icon' => "https://www.google.co.in/images/branding/googleg/1x/googleg_standard_color_128dp.png",
				'content_available' => true,
				"ios_attachments" => $ios_img
			);

		}
		$headers = array(
			'Authorization: key=OTQwNGU1YTMtNmI1NS00ZWM0LWI0ZjItZjMyZjAwYTk5YzA2',
			'Content-Type: application/json; charset=utf-8'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
 ?>
<?php
	class FCM {
		static public function pushNotification($registrationIds = array(), $msg = array()) {
			// API access key from Google API's Console
			define('API_ACCESS_KEY', 'AAAAU44yFI8:APA91bGcfM-1I9_mvwLUxrEt26fJAS8bxweLAI_lgdg4SnVXkz9KMz7pAYADCcyBK_Y3pEzU5bm7HMk0FEPrGEGs13-nXKc23Us53yOQwNohGxyui0CjMHhHuEsW1k7GTZGCXoKJ8Q6x');

			$fields = array(
				'registration_ids' => $registrationIds,
				'data'			   => $msg
			);
			 
			$headers = array(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
			 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result;
		}
	}


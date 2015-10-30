<?php

	$body = $_REQUEST['body'];
	
// $postData = array('to' => '/topics/global',
//                   'notification' => array(
//                       'message' => $body,
//                       'title' => 'Test message'));
                     
                     //iPad 2 
                     //kSZGBeIJqPQ:APA91bEmxalhWvvA9YRYtlu5oqKZJZEd68FJn7NcDMKay5_ZvkzvljErto0_N3tGeYq_nWtSx-rn0z2kzhmg-KX91BiI2bNkHAYLfYhGgQxVg03ekPUnnYrROnBsdXZkTLZBMjaAJQry
    $postData = array('to' => '/topics/global',
                  'notification' => array(
                  	'alert' => $body,
				   	'sound' => "default",
				   	'message' => $body,
				   	'body' => $body,
				   	'title' => 'GCM push')
				);
				     
	    
    echo "aqui: ";                 
	echo json_encode($postData) . "</br>";

$curl = curl_init('https://gcm-http.googleapis.com/gcm/send');

//AppGospel KEY: AIzaSyBNA4ht-neGvhP6ylKNmelDyDbxD-cDgAA
//MyNotificationsSample KEY: AIzaSyB4MYcwYd6dR4CQuPWLQ0DjWTuJkbdiG8U

curl_setopt_array($curl, array(CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => array(
    'Authorization:key=AIzaSyBNA4ht-neGvhP6ylKNmelDyDbxD-cDgAA',
    'Content-Type:application/json'
),
CURLOPT_POSTFIELDS => json_encode($postData)));
//CURLOPT_POSTFIELDS => '{"aps":{"alert":"Hello, world!","sound":"default"}}'));
$response = curl_exec($curl);

if($response === false){
    die(curl_error($curl));
}

$responseData = json_decode($response, true);

// Print the date from the response
print_r($responseData);
?>

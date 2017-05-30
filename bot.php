<?php
$access_token = '12muyj1ECaiKSv+TUcS5fT/6XA9S6yMogQ6oa/ASqfJgUqpm7I6kkciaIjRjvDr8iDw/HEG+MrcO6YKjzAsWQQ8R7DJqusLacqZWp7uK7ajF2qJICxMSQmUieGOvJOSd7qoZaAbNvUTD/t94kJDQLgdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	//user id 
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
	//bot
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text." http://202.29.80.36/bizapp/skf_store/ ".$result
			];
			//test 
			{
    "type": "image",
    "originalContentUrl": "https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwj7k_ehi5jUAhXFOo8KHd-nCGoQjRwIBw&url=http%3A%2F%2Fwww.bloggang.com%2Fviewdiary.php%3Fid%3Dcochonelle%26month%3D03-2012%26date%3D30%26group%3D7%26gblog%3D100&psig=AFQjCNFp-Ytyi96ubs1YIPILMo7kG1wyiQ&ust=1496249870663014",
    "previewImageUrl": "https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwj7k_ehi5jUAhXFOo8KHd-nCGoQjRwIBw&url=http%3A%2F%2Fwww.bloggang.com%2Fviewdiary.php%3Fid%3Dcochonelle%26month%3D03-2012%26date%3D30%26group%3D7%26gblog%3D100&psig=AFQjCNFp-Ytyi96ubs1YIPILMo7kG1wyiQ&ust=1496249870663014"
}
			//test
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
			
		}
	}
}

echo "OK";

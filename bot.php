<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '0546ebd5f096b185dc6f7c988fd2bf67';
$access_token  = '12muyj1ECaiKSv+TUcS5fT/6XA9S6yMogQ6oa/ASqfJgUqpm7I6kkciaIjRjvDr8iDw/HEG+MrcO6YKjzAsWQQ8R7DJqusLacqZWp7uK7ajF2qJICxMSQmUieGOvJOSd7qoZaAbNvUTD/t94kJDQLgdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
echo "OK";

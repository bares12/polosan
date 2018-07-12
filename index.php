<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'W87tpLbjGorG1Oinv3DWM8XdNriJ2NsCmnos6VaI6D5obHTIM6NkC/UUMN24XdpAduwc5YDuFV45gQqRxVt3Ibu1O4CgRbCNJU+lru5RumhP0vYeFMgtycbiNOz3gQGwsNgGjXloAaqV1rj5S4ma0QdB04t89/1O/w1cDnyilFU=
'; //sesuaikan 
$channelSecret = '941b173d5a8b59b29b2bc1d00657f826';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>

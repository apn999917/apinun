<?php
function reply_msg($txtback,$replyToken)//สร้างข้อความและตอบกลับ
{
    $access_token = 'REGnVB/OI7mwsa9/5EQOtchj3pUn47bh7sknrm1X+pUs+mbYG/33SqFGogTb/FU6ii3A/3r2ERT+DQGQZ6B/92ofjUMJiQYWx65sVDO5PqG1h9dM3M0hrYgcBy1ZjJ6nIaUjjoSH9smAIhRYY5FU+wdB04t89/1O/w1cDnyilFU=';
    $messages = ['type' => 'text','text' => $txtback];//สร้างตัวแปร 
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
	$content = file_get_contents('php://input');//ประกาศตัวแปรชื่อ content รับข้อมูลจากไลน์
	$events = json_decode($content, true);//แปลง json เป็น php แล้วเก็บข้อมูลในตัวแปร events
	if (!is_null($events['events'])) //check ค่าในตัวแปร $events //เครื่องหมายตกใจเป็นเครื่องหมายตรงกันข้าม
	{
		  foreach ($events['events'] as $event) // Forechคือการวนลูปแล้วมาใส่ใน event
		  {
			   if ($event['type'] == 'message' && $event['message']['type'] == 'text')
			   {
				   $replyToken = $event['replyToken']; //เก็บ reply token เอาไว้ตอบกลับ
				   $txtin = $event['message']['text'];//เอาข้อความจากไลน์ใส่ตัวแปร $txtin
				   if($txtin == "hibot")
				   {
					   $txtback = "hihumen
					   reply_msg($txtback,$replyToken);
				   }
			   }
		  }
	}
		
		
?>
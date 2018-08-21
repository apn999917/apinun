<?php
function reply_msg($text,$replyToken)//สร้างข้อความและตอบกลับ
{
    $access_token = 'REGnVB/OI7mwsa9/5EQOtchj3pUn47bh7sknrm1X+pUs+mbYG/33SqFGogTb/FU6ii3A/3r2ERT+DQGQZ6B/92ofjUMJiQYWx65sVDO5PqG1h9dM3M0hrYgcBy1ZjJ6nIaUjjoSH9smAIhRYY5FU+wdB04t89/1O/w1cDnyilFU=';
    $messages = ['type' => 'text','text' => $text];
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

// รับข้อมูล
$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['events'])) 
{
    foreach ($events['events'] as $event) 
    {
        if ($event['type'] == 'message' && $event['message']['type'] == 'text')
        {
            $replyToken = $event['replyToken']; //เก็บ reply token เอาไว้ตอบกลับ
            $txtin = $event['message']['text'];//เอาข้อความจากไลน์ใส่ตัวแปร $txtin
            $lineid = $event['source']['userId'];//เก็บ UID
            reply_msg($txtin,$replyToken);
        }
    }
}
echo "OKJAA";

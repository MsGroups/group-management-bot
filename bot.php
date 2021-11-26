<?php 


ob_start(); 
//לשים תטוקן של הבוט שלכם
$API_KEY =  "1709546567:AAH2eak8uYXCuEiEShu8qc5c0QfCd9ZVBTg";
define('API_KEY', $API_KEY);
function bot($method,$datas=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method; 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
    var_dump(curl_error($ch));
}else{
    return json_decode($res);
   }

}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$mid = $message->message_id;
$name = $message->from->first_name;
$iid = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$member = file_get_contents("data/$from_id/member.txt");
$number = file_get_contents("data/$from_id/number.txt");
$message_id = $update->message->message_id;
$callID = $update->callback_query->id;
//קישור לערוץ
$Grup = "https://t.me/joinchat/T2-OVTCnadgUAl1i";
//קישור לקבוצה
$Grup2 = "https://t.me/joinchat/O8DjIDRlrR5mZGNk";
//קישור ליצרת קשר
$Grup3 = "http://t.me/Ma_semeyanen_bot";



if($data == "on"){
bot("answerCallbackQuery",[
"callback_query_id"=>$callID,
//אם אפשר רק להשאיר תקרדיט 
//אפשר להוסיף גם את שלכם תודה.
'text'=>"בוט זה נוצר על ידי מנהלי מה שמעניין",
  'show_alert' => true,
]);
}



if($text == "/start"){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "היי $name
 
 השתמשו בלחצנים למטה⬇️
 
 מתחברים לקבוצה?
 שימו לב לשמור על הכללים
 (נמצא בהודעה מוצמדת בקבוצה)",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
['text'=>'📢 לחצו עלי כדי להתחבר לערוץ 📢', 'url'=>"$Grup"],
         ],
        [
['text'=>'👥 לחצו עלי כדי להתחבר לקבוצה 👥', 'url'=>"$Grup2"],
         ],
            [
['text'=>'📢🗞️ לחצו עלי כדי להתחבר לערוץ העיתונים 🗞️', 'url'=>"https://t.me/Newspapers_Israel"],
         ],
         [
['text'=>'עבודות איכות - בכל הארץ', 'url'=>"https://t.me/Workingyes1"],
         ],
[
['text'=>'👨‍💼 לפניה למנהלים 👨‍💼' , 'url'=>"$Grup3"],
         ],
[
['text'=>'פרטי הבוט' , 'callback_data'=>"on"],
         ], 
]
])
]);
}

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
    var_dump(curl_error($ch));
}else{
    return json_decode($res);
   }
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$mid = $message->message_id;
$name = $message->from->first_name;
$iid = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;

if($text == '/start'){
file_put_contents("data/$chat_id/ali.txt", "esm");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"⬇️לרשימת קבוצות הווצאפ שלנו⬇️",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[
['text'=>' לחץ/י כאן', 'callback_data'=>"home"]
        ],
      
]
])
]);
}

if($data == "home"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"בחר/י את הקבוצה",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
              ['text'=>"מה שמעניין",'callback_data'=>"A"]
              ],
              [
              ['text'=>"עבודות איכות - בכל הארץ",'callback_data'=>"B"]
],
[
              ['text'=>"חדשות",'callback_data'=>"C"]
],
      
       [
              ['text'=>"עיתונים",'callback_data'=>"D"]
],
       
]
        
])
]);
}
    
if($data == "A"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*ערוצי מה שמעניין* - בהם נשלחים תוכן מעניין כגון מוזיקה חדשה, עיתונים, סדרות לפי בחירת חברי הקבוצה, סרטונים מעניינים/מצחיקים וכו'

ערוץ 〽️ה שמ➰ניין 1️⃣
https://chat.whatsapp.com/HkkPUhyBf0K4bmGPSRjCn9
ערוץ 〽️ה שמ➰ניין 2️⃣
https://chat.whatsapp.com/LAUsNGMQizCFKIiJb5ZmaN
ערוץ 〽️ה שמ➰ניין 3️⃣
https://chat.whatsapp.com/ITe4pIzT3SRFGymsjrf4ok
ערוץ 〽️ה שמ➰ניין 4️⃣
https://chat.whatsapp.com/GzSM0UjDUipCXjfEIe6LEy
ערוץ 〽️ה שמ➰ניין 5️⃣
https://chat.whatsapp.com/H8v4UMxDtUSIYM9kZsrfVr
ערוץ 〽️ה שמ➰ניין 6️⃣
https://chat.whatsapp.com/IIKB2ZUOqnC5NTrW0tfRZh
ערוץ 〽️ה שמ➰ניין 7️⃣
https://chat.whatsapp.com/HsSfrXsZJYl84kOMiQO9XR
ערוץ - 〽️ה שמ➰ניין 8️⃣
https://chat.whatsapp.com/EoElVzKAe11KXxRbCEWltQ
ערוץ - 〽️ה שמ➰ניין 9️⃣
https://chat.whatsapp.com/IMCmicCh2uQ7aYAmlM2NKC
ערוץ - 〽️ה שמ➰ניין 🔟
https://chat.whatsapp.com/D3uMpFviijNCJuBv04NufC

*אין להצטרף ליותר מערוץ אחד ברשימה זו!*",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [
                     ['text'=>"חזור",'callback_data'=>"home"]
],       
]        
])
]);
}

if($data == "B"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*עבודות איכות - בכל הארץ*
בקבוצות נשלחים עבודות מומלצות מכל הארץ ויש לכם סיכוי גבוה למצוא בקבוצה עבודה שתתאים לכם

עבודות איכות 1️⃣
https://chat.whatsapp.com/G5lXigoIFxP1kCn7jEunW1
עבודות איכות 2️⃣
https://chat.whatsapp.com/KIgm78DCTNkBE8aSCUtl6p
עבודות איכות 3️⃣
https://chat.whatsapp.com/GjibtdlgfFf23rZrILGgZu
עבודות איכות 4️⃣
https://chat.whatsapp.com/FJk1nqsRjmFBkEdcuFV9yY
עבודות איכות 5️⃣
https://chat.whatsapp.com/JzYMWQl49ZF2yMtcVBOxky
עבודות איכות 6️⃣
https://chat.whatsapp.com/JZQXNJdpglqIqkxgNjZS24
עבודות איכות7️⃣
https://chat.whatsapp.com/LJakBnm31Xj4Mw2wRfvh5S
עבודות איכות8️⃣
https://chat.whatsapp.com/FTGTbEQMlF7AweE49Mb6F0

*אין להצטרף ליותר מערוץ אחד ברשימה זו!*",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [
                     ['text'=>"חזור",'callback_data'=>"home"]
],       
]        
])
]);
}
if($data == "C"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*מה שמעניין - חדשות*
〽️ה שמ➰ניין - חדשות🎙️1️⃣
https://chat.whatsapp.com/Bo0iKaagk4ZKpjIEAun4pN
〽️ה שמ➰ניין - חדשות🎙️2️⃣
https://chat.whatsapp.com/Hd5b3ekMgmB5Jb7rMzoYrJ
〽️ה שמ➰ניין - חדשות🎙️3️⃣
https://chat.whatsapp.com/DUwaLOblYBw0iNtpw0lidC
〽️ה שמ➰ניין - חדשות🎙️4️⃣
https://chat.whatsapp.com/J5bHeXMgw4N9gekr1fqu1T",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [
                     ['text'=>"חזור",'callback_data'=>"home"]
],       
]        
])
]);
}     
if($data == "D"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"עיתונים
https://chat.whatsapp.com/JgFKB7Qwl3G1kQkWU6XPTF",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [
                     ['text'=>"חזור",'callback_data'=>"home"]
],       
]        
])
]);
} 
  
    
if (isset ($update->message->new_chat_member )) {
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}
if (isset ($update->message->left_chat_member )) {
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}







$id = $message->from->id;
$admin ="594373881";

if($text == '/start' and $id==$admin){
$user = file_get_contents('users.doc');
$members = explode("\n", $user);
if (!in_array($id, $members)) {
$add_user = file_get_contents('users.doc');
$add_user .= $id."\n";
$step = file_get_contents("data/".$id."/step.doc");
file_put_contents("data/$chat_id/membrs.doc", "0");
file_put_contents('users.doc', $add_user);}
file_put_contents("data/$chat_id/arash.doc", "no");

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
שלום לך  👋 
",
'parse_mode' => 'Markdown',
'reply_to_message_id'=>$message->message_id
    ]);
}


//הפקודה /משתמשים מציגה את מספר המשתמשים 
 elseif ($text == "/משתמשים" and $id==$admin) {
        $user = file_get_contents("users.doc");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
bot('sendmessage', [
'chat_id'=>$chat_id,
'text' => "סה'כ משתמשים :* $member_count*",
'parse_mode' => "MarkDown",
        ]);
    }
    
$bcpv = file_get_contents("bcpv.doc");
if($text == "הודעה למשתמשים" and $chat_id ==$admin){
    file_put_contents("bcpv.doc","bc");
 bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"עכשיו שלח לי תטקסט שלך",
    'parse_mode' => 'Markdown',
  ]);
}
if($bcpv == "bc" && $chat_id == $admin){
    file_put_contents("bcpv.doc","none");
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"ההודעה שלך נשלחה בהצלחה לכל המשתמשים!",
  ]);
 $all_member = fopen( "users.doc", "r");
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
   bot('sendmessage',[
'chat_id'=>$user,
'text'=>$text,
'parse_mode' => 'Markdown',
'disable_web_page_preview' => true,
]);
  }
}    
    
 if(preg_match('/start/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}
   


if($text && $text != "/start"){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "
זהו בוט הצטרפות לקבוצות מבית *מה שמעניין* בלבד
אם קיבלתם הודעה זו ככל הנראה ששלחתם בקשה שאינה קיימת בבוט

או שלח/י שוב /start",
'reply_to_message_id'=>$message_id,
'parse_mode' => "MarkDown",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[
['text'=>'👨‍💼 לפניה למנהלים 👨‍💼' , 'url'=>"$Grup3"],
         ],
]
])
]);
}    

?>

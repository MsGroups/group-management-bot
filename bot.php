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



if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ברוכים הבאים $name 
אני רובוט שנבנה על ידי @Elazar12 😜
כן היה לי משעממם מידי אז אני מנסה דברים 😜☺️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
        'keyboard'=>[
            [['text'=>'🔰 קישור לערוץ'],['text'=>'😉 קישור לערוץ האישי']],
            [['text'=>'😋 לתמיכה']],
            ],
            'resize_keyboard'=> true

])
]);
}
elseif($text == '🔰 קישור לערוץ'){
file_put_contents("data/$chat_id/ali.txt", "esm");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"לחץ למטה כע למטה הלוווו כע ",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
['text'=>'לחץ כאן', 'url'=>"https://t.me/elazar12_apk"],
         ],
[
['text'=>'מקלדת צפה', 'callback_data'=>"home"]
        ],
      
]
])
]);
}

if($data == "home"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"אהלן לך תיראה מה הולך כאן למטה יאוווו  ",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
              ['text'=>"כפתור 1",'callback_data'=>"A"]
              ],
              [
              ['text'=>"כפתור 2",'callback_data'=>"B"]
],
[
              ['text'=>"כפתור 3",'callback_data'=>"C"]
],
      
       [
              ['text'=>"כפתור 4",'callback_data'=>"D"]
],
       
]
        
])
]);
}
    


elseif($text == '😉 קישור לערוץ האישי'){
file_put_contents("data/$chat_id/ali.txt", "esm");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"לכניסה לערוץ האישי שלי",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
          ['text'=>'לחץ כאן', 'url'=>"https://t.me/joinchat/AAAAAEU_5uFskyB7LP9HMw"]
        ],

]
])
]);
}
elseif($text == '😋 לתמיכה'){
file_put_contents("data/$chat_id/ali.txt", "esm");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"יש לך בעיה או סתם באלך לשגע אותי",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
          ['text'=>'לחץ כאן', 'url'=>"https://t.me/elazar12"]
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
['text'=>'📢🗞️ לחצו עלי כדי להתחבר לערוץ העיתונים 🗞️📢', 'url'=>"https://t.me/Newspapers_Israel"],
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
 
   


if($text && $text != "/start"){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "*שגיאה*❗
לא הבנתי את הבקשה.

לפניה למנהלים יש לפנות באמצעות בוט מנהלים
או שלח/י /start",
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

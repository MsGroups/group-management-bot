<?php 


ob_start(); 
//לשים תטוקן של הבוט שלכם איפה שכתוב טוקן
$API_KEY =  "1605730204:AAEBL9RVdCIO6aa6Exx5CSZGEBY1WvnG7k4";
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
$name = $message->from->first_name;


$id = $message->from->id;
$admin ="1665697388";

$tc = $message->chat->type;

$Grup = '-1001239468753';

$A1 =$update->message->new_chat_member->first_name;
$A2 = $update->message->new_chat_member->last_name;
//לשים קישור לרובוט בלי @ 
$grup = "Attempts_bot";



$reply = $message->reply_to_message;




if($reply and $text == '/העף' and $id == $admin){
bot ('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'המשתמש הוסר מהקבוצה @' . $message->reply_to_message->from->username,
]);
}


if($reply and $text == '/השתק' and $id == $admin){
bot ('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
'until_date' => strtotime("+120 minutes"),
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'בוט ניהול השתיק את
@' . $message->reply_to_message->from->username,
]);

}

if($reply and $text == '/השתק לתמיד' and $id == $admin){
bot ('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'בוט ניהול השתיק את
@' . $message->reply_to_message->from->username,
]);

}

if($reply and $text == '/החזר' and $id == $admin){
bot ('unbanChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
]);

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'המשתמש יכול לחזור לקבוצה @' . $message->reply_to_message->from->username,
]);
}




if($text == '/start'  and $id == $admin){
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
מנהל הקבוצה",
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




elseif($text == '/start'){  
bot('sendMessage',[
'chat_id' => "$chat_id",
'reply_to_message_id'=>$message-> message_id,
'text'=>"היי $name
אני בוט הניהול של קבוצת 〽️ה שמ➰ניין

רק מנהל הקבוצה יכול להשתמש בי


אבל אפשר להשתמש מכפתורים פה למטה👇",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[
['text'=>'👈  לחץ כאן לפניה למנהלי הקבוצה  👉', 'url'=>"http://t.me/Ma_semeyanen_bot"],
         ],
[
['text'=>'👈 לחץ כאן למעבר לבוט ההצטרפות לקבוצה 👉', 'url'=>"http://t.me/MaShemeyanyen_bot"],
         ],
        [
['text'=>'👈 לחץ לשיתוף הקבוצה 👉', 'url'=>"https://telegram.me/share/url?url=היי%0aאני%20רוצה%20להמליץ%20לך%20על%20קבוצת%0a〽️ה%20שמ➰ניין%0a%0aלהצטרפות%20כנסו%20לבוט%20הניהול%20↙️%0ahttp://t.me/MaShemeyanyen_bot"],
         ],
]
])
]);
}



$mid = $message->message_id;

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



if($message->sticker and $id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$message->sticker->file_id

]);
}



if($text== 'תודה רבה'){
bot('sendsticker',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message-> message_id,
'sticker'=>'CAACAgQAAxkBAAIBE2BNDR59-I6e5wPP6wQXyDx3CjFcAAJCAAP5bG0jddhJXsO7EfseBA',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
['text'=>'נהנתם? לחצו כאן כדי לשתף', 'url'=>"https://telegram.me/share/url?url=היי%0aאני%20רוצה%20להמליץ%20לך%20על%20קבוצת%0a〽️ה%20שמ➰ניין%0a%0aלהצטרפות%20כנסו%20לבוט%20הניהול%20↙️%0ahttp://t.me/MaShemeyanyen_bot"],
         ],

]
])
]);
}

elseif(preg_match('/תודה רבה/',$text)){
bot('sendsticker',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message-> message_id,
'sticker'=>'CAACAgQAAxkBAAIBE2BNDR59-I6e5wPP6wQXyDx3CjFcAAJCAAP5bG0jddhJXsO7EfseBA',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
['text'=>'נהנתם? לחצו כאן כדי לשתף', 'url'=>"https://telegram.me/share/url?url=היי%0aאני%20רוצה%20להמליץ%20לך%20על%20קבוצת%0a〽️ה%20שמ➰ניין%0a%0aלהצטרפות%20כנסו%20לבוט%20הניהול%20↙️%0ahttp://t.me/MaShemeyanyen_bot"],
         ],

]
])
]);
}



if(preg_match("/\p{Arabic}|🇮🇷|^[آ-ی]$/u", $message->text)){
bot('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$update->message->from->id,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'ההודעה נמחקה
הסיבה: שימוש בשפה הערבית' . $message->reply_to_message->from->username,
]);
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
]);
}
if(preg_match("/\p{Arabic}|🇮🇷|^[آ-ی]$/u", $message->document->file_name)){
bot('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$update->message->from->id,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'ההודעה נמחקה
הסיבה: שימוש בשפה הערבית' . $message->reply_to_message->from->username,
]);
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
]);
}
if(preg_match("/\p{Arabic}|🇮🇷|^[آ-ی]$/u", $message->caption)){
bot('restrictChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$update->message->from->id,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'ההודעה נמחקה
הסיבה: שימוש בשפה הערבית' . $message->reply_to_message->from->username,
]);
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
]);
}
if( (preg_match("/\p{Arabic}|🇮🇷|^[آ-ی]$/u", $A1))||(preg_match("/\p{Arabic}|🇮🇷|^[آ-ی]$/u", $A2))){
bot('kickChatmember',[
'chat_id'=>$chat_id,
'user_id'=>$update->message->from->id,
]);
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid,
]);
}

if($text== 'תודה'){
bot('sendsticker',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message-> message_id,
'sticker'=>'CAACAgQAAxkBAAIBE2BNDR59-I6e5wPP6wQXyDx3CjFcAAJCAAP5bG0jddhJXsO7EfseBA',
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
['text'=>'נהנתם? לחצו כאן כדי לשתף', 'url'=>"https://telegram.me/share/url?url=היי%0aאני%20רוצה%20להמליץ%20לך%20על%20קבוצת%0a〽️ה%20שמ➰ניין%0a%0aלהצטרפות%20כנסו%20לבוט%20הניהול%20↙️%0ahttp://t.me/MaShemeyanyen_bot"],
         ],

]
])
]);
}




if($text == '/כללים' and $id == $admin){  
bot('sendMessage',[
'chat_id' => "$chat_id",
'reply_to_message_id'=>$message-> message_id,
'text'=>"כללי הקבוצה

• אין לעלות תוכן מיני/סוטה

• אין לשלוח קישורים לקבוצות

• ניתן להגיב או להתכתב כל עוד זה בטעם טוב ולא חפירה לשאר הקבוצה

• אין לשלוח מודעות פירסום (ניתן לפנות למנהלים)

•לכבד כל אחד מחברי הקבוצה

• לשון הרע לא מדבר אלי
בקבוצה שלנו מכבדים כל אדמור או רב, יש לך דעות? תשאיר אותה מחוץ לקבוצה!!!

• מי שלא ישמור על הכללים יוסר מיד

• נא לשמור על איכות הקבוצה



מטרידים אתכם בפרטי?
דבר ראשון צלמו מסך.
ותפנו מיד למנהלים ואנו נפיץ את המספר בכל מקום אפשרי!
וכמובן שנסיר אותו מהקבוצות שלנו!",
]);
}

date_default_timezone_set('Asia/Jerusalem'); 
header('Content-Type: text/html; charset=utf-8');

$update = file_get_contents('php://input');   
$update = json_decode($update, TRUE);

define('TOKEN', "1605730204:AAEBL9RVdCIO6aa6Exx5CSZGEBY1WvnG7k4");
define('BOT_ID', "1605730204");

function saveId($chatId) {
	$filename = "ids.txt";
	if(!file_exists($filename)) file_put_contents($filename," ");
	$handle = fopen($filename, "r");
	$allIds = fread($handle, filesize($filename));
	fclose($handle);
	if (strpos($allIds, "$chatId") === false)
	{
		$allIds .= " ".$chatId;
		$handle = fopen($filename, "w");
		fwrite($handle, $allIds);
		fclose($handle);
	}
}
function checkId($chatId) {
	$filename = "ids.txt";
	if(!file_exists($filename)) file_put_contents($filename," ");
	$handle = fopen($filename, "r");
	$allIds = fread($handle, filesize($filename));
	fclose($handle);
	if (strpos($allIds, "$chatId") === false)
		return true;
	else
		return false;
}
function isShabat(){
    if((date("l") == "Friday" && time() > date_sunset(time(), SUNFUNCS_RET_TIMESTAMP)))
        return true;
    if((date("l") == "Saturday" && time() < date_sunset(time(), SUNFUNCS_RET_TIMESTAMP)))
        return true;
    else
        return false;
}

function curlPost($method,$datas=[]==NULL){    
    $urll = "https://api.telegram.org/bot".TOKEN."/".$method;
	
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urll);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
   
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
		curl_close($ch);
    }else{
		curl_close($ch);
        return json_decode($res,true);
    }
}
function sendMessage($id, $message, $reply_markup = NULL, $parse_mode = "markdown"){
    $PostData = array(
        'chat_id' => $id,
        'text' => $message,
        'parse_mode' => $parse_mode, 
        'reply_markup' => $reply_markup
        );
	return curlPost('sendMessage',$PostData,$id);
}


$message = $update["message"]["text"]?$update["message"]["text"]:$update["edited_channel_post"]["text"];
$message = $message?$message:$update['message']['caption'];
$name = $update["message"]["from"]["first_name"].$update["message"]["from"]["last_name"];
$fwdname = $update["message"]["forward_from"]["first_name"].$update["message"]["forward_from"]["last_name"];
$chatId = $update["message"]["chat"]["id"]?$update["message"]["chat"]["id"]:$update["edited_channel_post"]["from"]["id"];
$mesId = $update['message']['message_id']?$update['message']['message_id']:$update['edited_channel_post']['message_id'];
$fromId = $update["message"]["from"]["id"]?$update["message"]["from"]["id"]:$update["edited_channel_post"]["from"]["id"];
$chatType = $update["message"]["chat"]["type"]?$update["message"]["chat"]["type"]:$update["edited_channel_post"]["chat"]["type"];
$ncpId = $update["message"]["new_chat_member"]["id"]?$update["message"]["new_chat_member"]["id"]:0;
$ncpName = $update["message"]["new_chat_member"]["first_name"]?$update["message"]["new_chat_member"]["first_name"].$update["message"]["new_chat_member"]["last_name"]:0;
$text = "היי👋,  
אני רובוט 'הרובוט היהודי'.  
תוכלו להוסיף אותי לקבוצתכם ולהעניק לי ניהול למחיקת הודעות, אני אמחק כל הודעה שתשלח בקבוצה במהלך השבת. 
בנוסף, אני מוחק הודעות בערבית. 
 
לדיווח על שגיאות @YehudaEisenberg. 
תודה ל @Avi_av על העזרה. 
 
➕ להוספת הרובוט לקבוצה [לחץ כאן](http://t.me/GardShabatBot?startgroup=true). 
📣 לערוץ העדכונים: @GardShabatBot.
";



if(checkId($chatId))
    saveId($chatId);
if($chatType == "supergroup" && isShabat())
	curlPost('deleteMessage', array('chat_id' => $chatId, 'message_id' => $mesId));

    $res = curlPost('kickChatMember', array('chat_id' => $chatId, 'user_id' => $fromId));
    curlPost('deleteMessage', array('chat_id' => $chatId, 'message_id' => $res['result']['message_id']));
}
elseif($chatType == "supergroup" && ($fromId == 1665697388) && $message == "המשתמש הועף בהצלחה"){
    curlPost('deleteMessage', array('chat_id' => $chatId, 'message_id' => $mesId));
}
elseif($chatType == "private"){
	sendMessage($chatId, $text);
	sendMessage($chatId, "*נ.ב.\nחובה להגדיר אותי כמנהל כדי שאני אוכל לעבוד*");
}
if(isset($ncpId)){
    if($ncpId == BOT_ID){
        if(isArabic($update['message']['chat']['title'])){
            curlPost('leaveChat', array("chat_id" => $chatId));
        }
        sendMessage($chatId, "שלום לכולם 👋🏼 \nמעכשיו, כל הודעה שתשלח בקבוצה זו במהלך השבת תמחק.\nבנוסף, גם הודעות בערבית ימחקו");
        sendMessage($chatId, "*נ.ב.\nחובה להגדיר אותי כמנהל כדי שאני אוכל לעבוד*");
    }





if(preg_match('/start/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}

if(preg_match('/טינדר/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}

if(preg_match('/סקס/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}



if(preg_match('/נערות עירומות ברשת/',$text)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$mid
]);
}






?>

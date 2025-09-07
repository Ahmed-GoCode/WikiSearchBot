<?php
ob_start();
error_reporting(0);

// Replace with your bot token
define("API_KEY", 'YOUR_BOT_TOKEN_HERE'); 

// Function to send requests to Telegram API
function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/$method";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

// Get incoming update
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
$message_id = $message->message_id;

// Function to search Wikipedia
function wikipedia($query) {
    $query = str_replace(' ', '_', $query);
    $url = "https://en.wikipedia.org/api/rest_v1/page/summary/" . urlencode($query);
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Handle /start command
if ($text === '/start') {
    bot('sendMessage', [
        'chat_id' => $chat_id, 
        'text' => "*Hello, $name! 👋*\n\n" .
                  "This is a Wikipedia search bot 🔍.\n" .
                  "Just send me any term, and I will provide information along with an image if available.\n\n" .
                  "Example:\n`Iraq`",
        'parse_mode' => 'Markdown',
        'reply_to_message_id' => $message_id, 
        'disable_web_page_preview' => true
    ]);
} elseif (isset($text)) {
    $result = wikipedia($text);
    
    if (isset($result['title']) && isset($result['thumbnail']['source'])) {
        $title = $result['title'];
        $extract = $result['extract'];
        $image_url = $result['thumbnail']['source'];
        
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $image_url,
            'caption' => "📌 *Title:*\n$title\n\n📝 *Summary:*\n$extract",
            'parse_mode' => 'Markdown',
            'reply_to_message_id' => $message_id
        ]);
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*Sorry, I couldn't find any information for:* `$text`",
            'parse_mode' => 'Markdown',
            'reply_to_message_id' => $message_id
        ]);
    }
}
?>
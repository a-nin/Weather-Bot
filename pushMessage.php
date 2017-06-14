<?php

// Composerでインストールしたライブラリを一括読み込み
require_once __DIR__ . '/vendor/autoload.php';

// アクセストークンを使いCurlHTTPClientをインスタンス化
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));

// CurlHTTPClientとシークレットを使いLINEBotをインスタンス化
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('CHANNEL_SECRET')]);

// あなたのユーザーIDを入力して下さい
// $userId = getenv('USER_ID');
$message = 'Hello Push API';

// メッセージをユーザーID宛てにPush
$response = $bot->pushMessage(getenv('USER_ID'), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message));
if (!$response->isSucceeded()) {
  error_log('Failed!'. $responce->getHTTPStatus . ' ' . $responce->getRawBody());
}

?>

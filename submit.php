<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 送信されたフォームデータを取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $ai_report = $_POST['ai_report'];

    // メールの内容を構成
    $subject = "後見人サポートサービスから売買契約に関する通知";
    $message = "
    被後見人が売買契約を締結されましたので、政府より通知させていただきます。\n
    場所：株式会社ハッピー・ショッピング\n
    商品名：$product\n
    価格：$price\n
    決済方法：クレジットカード\n\n
    AIからの報告：\n$ai_report\n\n
    後見人及び被後見人は被後見人の法律行為を取り消しすることができます。取り消しをしたい場合は以下の通りに手続きを行ってください。\n
    以上
    ";

    // メールのヘッダー設定
    $headers = "From: no-reply@kouken.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // メールを送信
    if (mail($email, $subject, $message, $headers)) {
        echo "メールが送信されました。";
    } else {
        echo "メール送信に失敗しました。";
    }
}
?>

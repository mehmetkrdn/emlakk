<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Müşteri ilişkileri temsilcisine gönderilecek sabit e-posta adresi
    $to = "mehmetkordon09@gmail.com"; // Temsilcinin e-posta adresi

    $email_subject = "Yeni İletişim: " . $subject; // E-posta başlığı

    // E-posta içeriği
    $email_message = "<html>
                    <head>
                        <title>Yeni İletişim Formu</title>
                    </head>
                    <body>
                        <p><strong>Adı Soyadı:</strong> $name</p>
                        <p><strong>E-posta:</strong> $email</p>
                        <p><strong>Konu:</strong> $subject</p>
                        <p><strong>Mesaj:</strong><br> $message</p>
                    </body>
                    </html>";

    // E-posta başlıkları
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Gönderenin e-posta adresi
    $headers .= "Reply-To: $email" . "\r\n"; // Cevap verilmesi gereken e-posta

    // E-posta gönder
    if (mail($to, $email_subject, $email_message, $headers)) {
        echo "Form başarıyla gönderildi.";
    } else {
        echo "E-posta gönderilirken bir hata oluştu.";
    }
}
?>

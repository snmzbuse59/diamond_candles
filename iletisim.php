<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer autoload dosyasını dahil ediyoruz.
require 'vendor/autoload.php'; // Eğer composer ile yüklemediyseniz bu yol hatalı olabilir. PHPMailer dosyalarının doğru yolunu ekleyin.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz ve güvenlik amacıyla özel karakterleri temizliyoruz.
    $isim = htmlspecialchars($_POST['isim']);  // Formdaki "isim" alanını burada düzenleyin.
    $email = htmlspecialchars($_POST['email']); // Formdaki "email" alanını burada düzenleyin.
    $mesaj = htmlspecialchars($_POST['mesaj']); // Formdaki "mesaj" alanını burada düzenleyin.

    // Yeni bir PHPMailer örneği oluşturuyoruz.
    $mail = new PHPMailer(true);

    try {
        // Sunucu ayarları
        $mail->isSMTP(); // SMTP kullanacağımızı belirtiyoruz.
        $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP sunucusu. Eğer farklı bir sunucu kullanıyorsanız bu alanı düzenleyin.
        $mail->SMTPAuth   = true; // SMTP kimlik doğrulaması kullanılıyor.
        $mail->Username   = 'buse.ozenn74@gmail.com'; // BURAYA KENDİ GMAIL ADRESİNİZİ GİRİN.
        $mail->Password   = 'Bs221515@+-'; // BURAYA GMAIL ŞİFRENİZİ GİRİN. İki faktörlü doğrulama kullanıyorsanız, bir "uygulama şifresi" oluşturun.
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Güvenlik protokolü olarak

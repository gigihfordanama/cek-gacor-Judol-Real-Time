<?php
require 'vendor/autoload.php'; // pastikan Composer autoload digunakan

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Konfigurasi SMTP Brevo
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp-relay.brevo.com';
$mail->SMTPAuth   = true;
$mail->Username   = '92ccccc1@smtp-brevo.com';       // Ganti: Email Brevo
$mail->Password   = 'D2gFaNGkcZbBccccccC1zW';          // Ganti: API Key Brevo (SMTP key)
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

// Email tujuan
$to = "email@eng.unila.ac.id";  // Ganti sesuai kebutuhan
$mail->setFrom('xxx@xxx.xxx.ac.id', 'Monitor GACOR');
$mail->addAddress($to);
$mail->isHTML(true);
$mail->Subject = '⚠️ Peringatan: Ditemukan Domain GACOR';

// Cek file
$filename = "/home/USERSSS/public_html/hasil_cek_domain.txt";
if (!file_exists($filename)) {
    die("❌ File tidak ditemukan: $filename");
}

// Parsing isi file
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$gacorList = [];
$currentDomain = null;

foreach ($lines as $line) {
    $line = trim($line);
    if (stripos($line, 'Domain') === 0) {
        $currentDomain = trim(explode(':', $line, 2)[1]);
    } elseif (stripos($line, 'Status') === 0 && $currentDomain) {
        $status = strtoupper(trim(explode(':', $line, 2)[1]));
        if ($status === 'GACOR') {
            $gacorList[] = $currentDomain;
        }
        $currentDomain = null;
    }
}

// Jika ada GACOR, kirim email
if (!empty($gacorList)) {
    $body = "<p>Berikut adalah domain yang terdeteksi <strong style='color:red;'>GACOR</strong>:</p><ul>";
    foreach ($gacorList as $domain) {
        $body .= "<li>$domain</li>";
    }
    $body .= "</ul><p>Segera lakukan tindakan!</p>";

    $mail->Body = $body;

    try {
        $mail->send();
        echo "✅ Email terkirim ke $to\n";
    } catch (Exception $e) {
        echo "❌ Gagal mengirim email: {$mail->ErrorInfo}\n";
    }
} else {
    echo "✅ Tidak ada domain GACOR.\n";
}



<?php
$filename = "hasil_cek_domain.txt"; // pastikan file ini ada

date_default_timezone_set("Asia/Jakarta");
$timestamp = strftime("%A, %d %B %Y %H:%M WIB");
//kontrol
// Baca isi file
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$domains = [];
$currentDomain = null;

foreach ($lines as $line) {
    $line = trim($line);
    if (strpos($line, 'Domain') === 0) {
        $currentDomain = trim(explode(':', $line, 2)[1]);
    } elseif (strpos($line, 'Status') === 0 && $currentDomain) {
        $status = trim(explode(':', $line, 2)[1]);
        $domains[] = [
            "domain" => $currentDomain,
            "status" => strtoupper($status)
        ];
        $currentDomain = null;
    }
}

// Urutkan: GACOR di atas
usort($domains, function($a, $b) {
    return $a["status"] === "GACOR" ? -1 : 1;
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Cek Domain Jurnal Unila</title>
    <meta http-equiv="refresh" content="5">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f0f0f0;
        }
        h2, .timestamp {
            text-align: center;
        }
        .timestamp {
            color: #444;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px 12px;
            border: 1px solid #ccc;
        }
        th {
            background: #eee;
        }
        .ok {
            color: green;
            font-weight: bold;
        }
        .gacor {
            color: red;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Hasil Pengecekan indikasi GACHOR JUDOL Jurnal Unila -- CLUSTER ANGLING-DHARMA</h2>
    <div class="timestamp">🕒 Waktu Pengecekan: <?= htmlspecialchars($timestamp) ?></div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Domain</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domains as $i => $d): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><a href="https://<?= htmlspecialchars($d['domain']) ?>" target="_blank"><?= htmlspecialchars($d['domain']) ?></a></td>
                    <td class="<?= strtolower($d['status']) ?>"><?= $d['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>


Program ini online pada alamat https://ejurnal.unila.ac.id
Github ada di sini https://github.com/gigihfordanama/cek-gacor-Judol-Real-Time

Yang terjadi pada program ini;
1. Shell script dibuat utk memantau file index.php pada seluruh user directory  public_html
2. Pada seluruh file index.php , ditanam kode  //kontrol
3. GACOR atau Judol biasanya akan menempatkan folder promosi judi online, lalu menempatkan file google*.html utk memantau domain web dari google console punya mereka, dan bisa memantau tuyul tuyul mereka yang sdh ditarok di target
4. Deteksi folder selundupan gacor/judol akan memakan resource lumayan besar, apalagi usernya yang anda kelola hingga ratusan (case ini kita hanya cek 1 file, index.php saja, jadi gak perlu resource gede).
5. Program checkgacor.sh yang akan lakukan pengecekan, lalu loop.sh utk jalankan setiap detik


Utk Notifikasi ada di folder kirim_email, yang terjadi pada program ini
1. Gunakan PHP-Mailer, silahkan install manual dari composer
2. program kirim_email akan cek secara realtime, luaran dari cek domain Gachor, jika ada perubahan maka akan kirim email via SMTP Brevo
3. Siapkan API key dan User Brevo anda
4. Duduk manis, kalau domain web ada yg berubah akan ada email baru ke anda, berharap aja gak ada email, artinya gak ada masalah :-D

Program deteksi IP penyerang Gachor / Judol akan dibawah terpisah, cara deteksinya, melisting IP, lakukan blockir, cari WHOIS informasi IP nya, dan tampilkan peta dan statistik IP penyerang, ini akan dibahas terpisah pada sikuel berikutnya

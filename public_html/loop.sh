#!/bin/bash

# Path ke program eksternal
TARGET="/home/USERSSS/public_html/cekgachor.sh"  # atau /path/ke/program.sh

echo "⏱️ Menjalankan $TARGET setiap 3 detik..."
echo "Tekan Ctrl+C untuk menghentikan."

while true; do
    echo "-----------------------------"
    echo "🕒 $(date) - Menjalankan $TARGET"
    bash "$TARGET"
    sleep 3
done

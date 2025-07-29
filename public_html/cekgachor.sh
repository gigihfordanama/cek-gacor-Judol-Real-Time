#!/bin/bash

OUTPUT="/home/USERSS/public_html/hasil_cek_domain.txt"
echo "Hasil Pengecekan index.php Semua Domain" > "$OUTPUT"
echo "=======================================" >> "$OUTPUT"

USERFILEDIR="/var/cpanel/users"

for userdir in /home/*; do
    if [ -d "$userdir" ]; then
        username=$(basename "$userdir")
        userfile="$USERFILEDIR/$username"

        # Ambil domain utama
        if [ -f "$userfile" ]; then
            domain=$(grep -i '^DNS=' "$userfile" | cut -d= -f2)
        else
            continue  # skip jika tidak ditemukan
        fi

        indexphp="$userdir/public_html/index.php"

        # Default status GACOR
        status="GACOR"

        if [ -f "$indexphp" ]; then
            if grep -qi 'kontrol' "$indexphp"; then
                status="OK"
            fi
        fi

        {
            echo "Domain : $domain"
            echo "Status : $status"
            echo "---------------------------"
        } >> "$OUTPUT"
    fi
done

echo "✅ Hasil disimpan di: $OUTPUT"


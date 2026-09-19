<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Mahasiswa</title>
    <style>
        /* Import font ala terminal/mesin tik */
        @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap');

        body {
            /* Warna latar retro yang mencolok dengan pola grid titik-titik */
            background-color: #ff90e8;
            background-image: radial-gradient(#000 2px, transparent 2px);
            background-size: 30px 30px;
            font-family: 'Space Mono', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Kartu dengan garis tepi tebal dan bayangan solid */
        .id-card {
            background: #fff;
            border: 4px solid #000;
            box-shadow: 12px 12px 0px #000;
            width: 320px;
            padding: 35px 25px 25px 25px;
            position: relative;
            transition: all 0.2s ease;
        }

        .id-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 16px 16px 0px #000;
        }

        /* Label unik yang menembus batas atas kartu */
        .label-top {
            position: absolute;
            top: -18px;
            left: 50%;
            transform: translateX(-50%);
            background: #000;
            color: #fff;
            padding: 6px 16px;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 2px;
            border: 2px solid #000;
        }

        .avatar-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        /* Foto Profil berbentuk lingkaran sesuai instruksi modul[cite: 1] */
        .avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 4px solid #000;
            box-shadow: 6px 6px 0px #000;
            background: #4ade80; /* Warna hijau neon */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 45px;
            font-weight: 700;
            color: #000;
        }

        .data-row {
            border-bottom: 3px dashed #000;
            padding: 12px 0;
            text-align: left;
        }

        .data-row:last-of-type {
            border-bottom: 4px solid #000;
            padding-bottom: 20px;
        }

        .label {
            font-size: 11px;
            font-weight: 700;
            color: #000;
            margin-bottom: 5px;
        }

        .value {
            font-size: 18px;
            font-weight: 700;
            color: #000;
            word-wrap: break-word;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            font-weight: bold;
            background: #fde047; /* Warna kuning stabilo */
            border: 3px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>

    <div class="id-card">
        <div class="label-top">UNILA_ID</div>
        
        <!-- Bagian lingkaran profil -->
        <div class="avatar-container">
            <div class="avatar">
                {{ strtoupper(substr($name, 0, 1)) }}
            </div>
        </div>

        <div class="data-row">
            <div class="label">NAMA LENGKAP</div>
            <!-- str_replace untuk menghilangkan %20 jika URL menggunakan spasi -->
            <div class="value">{{ str_replace('%20', ' ', $name) }}</div>
        </div>

        <div class="data-row">
            <div class="label">NOMOR POKOK MAHASISWA</div>
            <div class="value">{{ $npm }}</div>
        </div>

        <div class="data-row">
            <div class="label">KELAS</div>
            <div class="value">{{ $kelas }}</div>
        </div>

        <div class="footer">
            SISTEM INFORMASI
        </div>
    </div>

</body>
</html>
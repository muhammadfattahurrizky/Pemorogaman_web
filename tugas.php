<?php

// ==========================================
// 1. DATA MATA KULIAH
// ==========================================

$matkul = [
    [
        "nama" => "Algoritma dan Pemrograman",
        "sks" => 3,
        "nilai" => 90
    ],
    [
        "nama" => "Pemrograman Web",
        "sks" => 3,
        "nilai" => 82
    ],
    [
        "nama" => "Basis Data",
        "sks" => 3,
        "nilai" => 76
    ],
    [
        "nama" => "Matematika Diskrit",
        "sks" => 2,
        "nilai" => 68
    ],
    [
        "nama" => "Jaringan Komputer",
        "sks" => 3,
        "nilai" => 55
    ],
    [
        "nama" => "Kalkulus",
        "sks" => 2,
        "nilai" => 45
    ]
];


// ==========================================
// 2. FUNGSI HITUNG BOBOT
// ==========================================

function hitungBobot($nilai) {

    if ($nilai >= 85) {
        $huruf = "A";
        $bobot = 4.0;
    } elseif ($nilai >= 75) {
        $huruf = "B";
        $bobot = 3.0;
    } elseif ($nilai >= 65) {
        $huruf = "C";
        $bobot = 2.0;
    } elseif ($nilai >= 50) {
        $huruf = "D";
        $bobot = 1.0;
    } else {
        $huruf = "E";
        $bobot = 0.0;
    }

    return [
        "huruf" => $huruf,
        "bobot" => $bobot
    ];
}


// ==========================================
// 3. PERHITUNGAN IPS
// ==========================================

$totalSKS = 0;
$totalBobot = 0;
$totalLulus = 0;
$totalMengulang = 0;

foreach ($matkul as $mk) {

    $hasil = hitungBobot($mk["nilai"]);

    $totalSKS += $mk["sks"];

    $totalBobot += $hasil["bobot"] * $mk["sks"];

    if ($hasil["bobot"] >= 2.0) {
        $totalLulus++;
    } else {
        $totalMengulang++;
    }
}

$ips = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;


// ==========================================
// 4. BATAS MAKSIMAL SKS
// ==========================================

if ($ips >= 3.00) {
    $maksSKS = 24;
} else {
    $maksSKS = 20;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academic Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        /* ==================================
           GLOBAL STYLE
        ================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b1020;
            color: #f1f5f9;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        /* ==================================
           HEADER
        ================================== */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 20px;
        }

        .header-label {
            color: #818cf8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .header h1 {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .header p {
            color: #94a3b8;
            font-size: 13px;
            margin-top: 9px;
        }

        .header-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1e1b4b;
            color: #a78bfa;
            border-radius: 16px;
            font-size: 25px;
        }

        /* ==================================
           SUMMARY CARDS
        ================================== */

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 30px;
        }

        .card {
            background: #141c30;
            border: 1px solid #25314a;
            padding: 23px;
            border-radius: 16px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: #6366f1;
        }

        .card-label {
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 17px;
        }

        .card h2 {
            font-size: 29px;
            font-weight: 800;
        }

        .purple {
            color: #a78bfa;
        }

        .blue {
            color: #60a5fa;
        }

        .green {
            color: #34d399;
        }

        .red {
            color: #f87171;
        }

        .card-info {
            color: #64748b;
            font-size: 11px;
            margin-top: 10px;
        }

        /* ==================================
           MAIN CONTENT
        ================================== */

        .content-box {
            background: #141c30;
            border: 1px solid #25314a;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 23px;
            gap: 10px;
        }

        .section-header h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .section-header span {
            color: #94a3b8;
            font-size: 11px;
        }

        /* ==================================
           TABLE
        ================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            text-align: left;
            padding: 15px 13px;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            border-bottom: 1px solid #29354c;
        }

        td {
            padding: 17px 13px;
            font-size: 12px;
            color: #cbd5e1;
            border-bottom: 1px solid #222d43;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #1b2740;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number {
            color: #64748b;
        }

        .subject {
            color: #f1f5f9;
            font-weight: 600;
        }

        /* ==================================
           STATUS BADGES
        ================================== */

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-lulus {
            color: #34d399;
            background: #064e3b;
        }

        .status-mengulang {
            color: #f87171;
            background: #7f1d1d;
        }

        /* BARIS MENGULANG WARNA MERAH */

        .mengulang {
            background: rgba(127, 29, 29, 0.20);
        }

        .mengulang:hover {
            background: rgba(127, 29, 29, 0.35);
        }

        .grade {
            font-weight: 800;
            color: #a78bfa;
        }

        /* ==================================
           IPS SUMMARY
        ================================== */

        .ips-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .ips-main {
            background: linear-gradient(
                135deg,
                #312e81,
                #4c1d95
            );
            padding: 27px;
            border-radius: 15px;
        }

        .ips-main p {
            font-size: 12px;
            color: #c4b5fd;
        }

        .ips-main h2 {
            font-size: 45px;
            margin: 15px 0;
            font-weight: 800;
        }

        .ips-main span {
            font-size: 11px;
            color: #ddd6fe;
        }

        .ips-detail {
            background: #1a263d;
            border: 1px solid #293953;
            border-radius: 15px;
            padding: 25px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #29354c;
            font-size: 12px;
            gap: 10px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-row span:first-child {
            color: #94a3b8;
        }

        .detail-row strong {
            color: #f1f5f9;
        }

        /* ==================================
           SKS INFORMATION
        ================================== */

        .sks-box {
            background: #171f35;
            border: 1px solid #37306b;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .sks-box h3 {
            font-size: 15px;
            margin-bottom: 10px;
        }

        .sks-box p {
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.7;
        }

        .sks-number {
            font-size: 43px;
            font-weight: 800;
            color: #a78bfa;
            white-space: nowrap;
        }

        .sks-number small {
            font-size: 13px;
            color: #c4b5fd;
        }

        /* ==================================
           FOOTER
        ================================== */

        footer {
            text-align: center;
            color: #475569;
            font-size: 11px;
            padding: 20px 0;
        }

        /* ==================================
           RESPONSIVE
        ================================== */

        @media (max-width: 900px) {

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            body {
                padding: 25px 12px;
            }

            .header h1 {
                font-size: 23px;
            }

            .summary {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .card {
                padding: 17px;
            }

            .card h2 {
                font-size: 24px;
            }

            .content-box {
                padding: 17px;
            }

            .ips-layout {
                grid-template-columns: 1fr;
            }

            .sks-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .ips-main h2 {
                font-size: 38px;
            }

        }

    </style>

</head>

<body>

<div class="container">


    <!-- HEADER -->

    <header class="header">

        <div>

            <div class="header-label">
                STUDENT ACADEMIC SYSTEM
            </div>

            <h1>Academic Overview</h1>

            <p>
                Rekapitulasi nilai dan indeks prestasi semester mahasiswa.
            </p>

        </div>

        <div class="header-icon">
            ✦
        </div>

    </header>


    <!-- SUMMARY CARDS -->

    <section class="summary">

        <div class="card">

            <div class="card-label">
                Indeks Prestasi Semester
            </div>

            <h2 class="purple">
                <?= number_format($ips, 2) ?>
            </h2>

            <div class="card-info">
                IPS Semester Ini
            </div>

        </div>


        <div class="card">

            <div class="card-label">
                Total SKS
            </div>

            <h2 class="blue">
                <?= $totalSKS ?>
            </h2>

            <div class="card-info">
                SKS yang ditempuh
            </div>

        </div>


        <div class="card">

            <div class="card-label">
                Mata Kuliah Lulus
            </div>

            <h2 class="green">
                <?= $totalLulus ?>
            </h2>

            <div class="card-info">
                Mata kuliah berhasil
            </div>

        </div>


        <div class="card">

            <div class="card-label">
                Mata Kuliah Mengulang
            </div>

            <h2 class="red">
                <?= $totalMengulang ?>
            </h2>

            <div class="card-info">
                Perlu perbaikan nilai
            </div>

        </div>

    </section>


    <!-- TABLE NILAI -->

    <section class="content-box">

        <div class="section-header">

            <h2>Daftar Mata Kuliah</h2>

            <span>Academic Grade Report</span>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        <th>Huruf</th>
                        <th>Bobot</th>
                        <th>Status</th>
                    </tr>

                </thead>


                <tbody>

                    <?php
                    $no = 1;

                    foreach ($matkul as $mk):

                        $hasil = hitungBobot($mk["nilai"]);

                        $huruf = $hasil["huruf"];
                        $bobot = $hasil["bobot"];

                        $status = ($bobot >= 2.0)
                            ? "LULUS"
                            : "MENGULANG";

                        $class = ($status == "MENGULANG")
                            ? "mengulang"
                            : "";

                    ?>

                    <tr class="<?= $class ?>">

                        <td class="number">
                            <?= $no++ ?>
                        </td>

                        <td class="subject">
                            <?= htmlspecialchars($mk["nama"]) ?>
                        </td>

                        <td>
                            <?= $mk["sks"] ?>
                        </td>

                        <td>
                            <?= $mk["nilai"] ?>
                        </td>

                        <td class="grade">
                            <?= $huruf ?>
                        </td>

                        <td>
                            <?= number_format($bobot, 1) ?>
                        </td>

                        <td>

                            <?php if ($status == "LULUS"): ?>

                                <span class="status status-lulus">
                                    LULUS
                                </span>

                            <?php else: ?>

                                <span class="status status-mengulang">
                                    MENGULANG
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </section>


    <!-- IPS SUMMARY -->

    <section class="content-box">

        <div class="section-header">

            <h2>Semester Performance</h2>

            <span>IPS Calculation</span>

        </div>


        <div class="ips-layout">

            <div class="ips-main">

                <p>INDEKS PRESTASI SEMESTER</p>

                <h2>
                    <?= number_format($ips, 2) ?>
                </h2>

                <span>
                    Hasil perhitungan seluruh mata kuliah.
                </span>

            </div>


            <div class="ips-detail">

                <div class="detail-row">

                    <span>Total Mata Kuliah</span>

                    <strong>
                        <?= count($matkul) ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>Total SKS</span>

                    <strong>
                        <?= $totalSKS ?> SKS
                    </strong>

                </div>


                <div class="detail-row">

                    <span>Total Bobot x SKS</span>

                    <strong>
                        <?= number_format($totalBobot, 2) ?>
                    </strong>

                </div>


                <div class="detail-row">

                    <span>Rata-rata IPS</span>

                    <strong class="purple">
                        <?= number_format($ips, 2) ?>
                    </strong>

                </div>

            </div>

        </div>

    </section>


    <!-- MAX SKS -->

    <section class="content-box">

        <div class="section-header">

            <h2>Next Semester Credit Limit</h2>

            <span>Academic Recommendation</span>

        </div>


        <div class="sks-box">

            <div>

                <h3>Batas Maksimal Pengambilan SKS</h3>

                <p>

                    <?php if ($ips >= 3.00): ?>

                        IPS memenuhi syarat minimal 3.00.
                        Kamu dapat mengambil maksimal 24 SKS
                        pada semester berikutnya.

                    <?php else: ?>

                        IPS masih di bawah 3.00.
                        Batas maksimal pengambilan adalah
                        20 SKS pada semester berikutnya.

                    <?php endif; ?>

                </p>

            </div>


            <div class="sks-number">

                <?= $maksSKS ?>

                <small>SKS</small>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        <p>
            Academic Dashboard | Built with PHP Native & HTML CSS
        </p>

        <p style="margin-top: 7px;">
            Student Grade Management System
        </p>

    </footer>


</div>

</body>

</html>

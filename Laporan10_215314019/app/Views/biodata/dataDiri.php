<!DOCTYPE html>
<html>

<head>
    <title>Tampilan KTP</title>
</head>

<body>
    <?php
    // Data KTP
    $nama = "Basilius Dimas";
    $nik = "1234567890";
    $tempat_lahir = "Yogyakarta";
    $tanggal_lahir = "01 Januari 2000";
    $jenis_kelamin = "Laki-laki";
    $alamat = "Jl. Slamet No. 23";
    $rt_rw = "001/011";
    $kelurahan = "Timbulharjo";
    $kecamatan = "Sewon";
    $agama = "Katolik";
    $kewarganegaraan = "Warga Negara Indonesia";
    ?>

    <div class="container">
        <h2>KARTU TANDA PENDUDUK</h2>
        <div class="row">
            <div class="col-sm-8">
                <span class="label">Nama</span>:
                <?php echo $nama; ?><br>
                <span class="label">NIK</span>:
                <?php echo $nik; ?><br>
                <span class="label">Tempat/Tgl Lahir</span>:
                <?php echo $tempat_lahir .", ". $tanggal_lahir; ?><br>
                <span class="label">Jenis Kelamin</span>:
                <?php echo $jenis_kelamin; ?><br>
                <span class="label">Alamat</span>:
                <?php echo $alamat; ?><br>
                <span class="label">RT/RW</span>:
                <?php echo $rt_rw; ?><br>
                <span class="label">Kelurahan</span>:
                <?php echo $kelurahan; ?><br>
                <span class="label">Kecamatan</span>:
                <?php echo $kecamatan; ?><br>
                <span class="label">Agama</span>:
                <?php echo $agama; ?><br>
            </div>
            <div class="col-sm-1">
                <img src="https://images.glints.com/unsafe/300x300/glints-dashboard.s3.amazonaws.com/profile-picture/1c59c7404e6f460457bbeb9cb56fc6a0.jpg"
                    alt="Foto KTP" width="150px" border="3">
            </div>
        </div>
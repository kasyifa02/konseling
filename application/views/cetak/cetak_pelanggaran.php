<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>

<body>
    <!-- <a href="cetak.php" target="_blank" rel="noopener noreferrer">cetak</a> -->
    <table style="text-align: center;" width="100%">
        <tr>
            <td rowspan="5">
                <img src="<?= base_url('assets/img/Logo.png') ?>" width="70" alt="">
            </td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">LAPORAN PELANGGARAN SISWA</td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">SMA PGRI 1 Kota Serang</td>
        </tr>
        <tr>
            <td style="font-size: 10px;">Jl. KH Abdul Fatah Hasan No.17 B, Cipare, Kec. Serang, Kota Serang, Banten 42117, Indonesia </td>
        </tr>
    </table>
    <hr>

    <h4 style="text-align: center;"><?= $title ?></h4>

    <table border="1" style="margin-top: 10px; font-size: 11px; border-collapse: collapse;" width="100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Pelanggaran</th>
            <th>Sanksi</th>
            <th>kelas</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_materi as $row) :
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row->tgl ?></td>
                <?php
                $query = "SELECT * FROM tbl_user WHERE username='$row->username'";
                $result = $this->db->query($query)->row();
                ?>
                <td><?= $result->full_name ?></td>
                <td><?= $row->pelanggaran ?></td>
                <td><?= $row->sanksi ?></td>
                <td><?= $row->kelas ?></td>
            </tr>
        <?php
            $no++;
        endforeach;
        ?>

    </table>

    <p style="font-size: 11px; text-align: right; align-self: flex-end;">
        <?php
        setlocale(LC_TIME, 'id_ID.utf8');
        $hariIni = new DateTime();
        echo "Serang, " . strftime('%d %B %Y', $hariIni->getTimestamp());
        ?>
        <br>
        Kepala Sekolah
    </p>
    <br><br><br>
    <p style="font-size: 11px; text-align: right; align-self: flex-end;">
        Drs.H. Zaini, MM
        <br>
        <span style="font-weight:bold;">NIP. 19630814 198903 1 013 </span>
    </p>
</body>

</html>
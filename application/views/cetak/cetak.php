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
                <!-- <img src="<?= base_url('assets/images/unbaja.png') ?>" width="70" alt=""> -->
            </td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;"><?= $title ?></td>
        </tr>
        <tr>
            <td style="font-size: 15px; font-weight: bold;">SMK INSAN MULYA KIBIN</td>
        </tr>
        <tr>
            <td style="font-size: 10px;">Jl. Raya Serang - Jkt No.Km. 20, Kibin, Kec. Kibin, Serang, Banten</td>
        </tr>
    </table>
    <hr>

    <h4 style="text-align: center;">Laporan</h4>

    <table border="1" style="margin-top: 10px; font-size: 11px; border-collapse: collapse;" width="100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>Prestasi</th>
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
                <td><?= $result->username ?></td>
                <td><?= $result->full_name ?></td>
                <td><?= $row->prestasi ?></td>
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
        Sukari
        <br>
        <span style="font-weight:bold;">NIP : 0001</span>
    </p>
</body>

</html>
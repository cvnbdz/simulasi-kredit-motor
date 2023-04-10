<?php
if (isset($_POST['submit'])) {
    $harga_motor = (int) $_POST['harga_motor'];
    $uang_muka = (int) $_POST['uang_muka'];
    $lama_angsuran = (int) $_POST['lama_angsuran'];
    $bunga = (int) $_POST['bunga'];
    $pinjaman_awal = ($harga_motor - $uang_muka);
    $minimal = ($harga_motor * 30 / 100);
    $maksimal = $harga_motor;
    $tot_ang_bunga = $harga_motor * $bunga / 100;

    $harga_motor -= $uang_muka;
    $angsuran_bunga_per_bulan = $harga_motor * $bunga / 100 / 12;
    $total_bunga = $angsuran_bunga_per_bulan * ($lama_angsuran * 12);
    $angsuran_pokok_per_bulan =  $harga_motor / ($lama_angsuran * 12);
    $total_angsuran_pokok = $angsuran_pokok_per_bulan * ($lama_angsuran * 12);
    $total_angsuran_per_bulan = ($angsuran_bunga_per_bulan + $angsuran_pokok_per_bulan);
    $total_angsuran_semua = $total_bunga + $total_angsuran_pokok;

    $harga = $harga_motor;
    $sisa_pinjaman = $harga_motor;
    $total_seluruh_angsuran = ($total_angsuran_per_bulan * $lama_angsuran);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Kredit Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </script>
</head>

<body class="bg-light">
    <?php

    function rupiah($angka)
    {

        $jadi = "Rp. " . number_format($angka, 2, ',', '.');

        return $jadi;
    }

    ?>
    <h1 class="text-center text-dark card=title mt-5">Simulasi Kredit Motor</h1>
    <div class="container bg-light mt-5">
        <?php
        if ($uang_muka < $minimal) :
            echo "<p align=center style=color:red;font-weight:bold>!Uang Muka Minimal 30%!</p>";
        elseif ($uang_muka > $maksimal) :
            echo "<p align=center style=color:red;font-weight:bold>!Uang Muka Maksimal 100%!</p>";
        else :
            echo "<pre>";

            echo "Jumlah yang Harus Diangsur    = " . "<b>" . rupiah($pinjaman_awal) . "</b>" . "<br>";

            echo "Tenor                         = " . "<b>" . $lama_angsuran . " Tahun" . "</b>" . "<br>";

            echo "Bunga per tahun               = " . "<b>" . $bunga . ' %' . "</b>" . "<br>";

            echo "<br>";

            echo "Angsuran Pokok Per Bulan      = " . "<b>" . rupiah($angsuran_pokok_per_bulan) . "</b>" . "<br>";

            echo "Angsuran Bunga Per Bulan      = " . "<b>" . rupiah($angsuran_bunga_per_bulan) . "</b>" . "<br>";

            echo "                               _____________________ ( + )<br>";

            echo "Total Angsuran Per Bulan      = " . "<b>" . rupiah($total_angsuran_per_bulan) . "</b>";

            echo "</pre>";

        endif
        ?>
        <table class="table table-light table-striped border border-1 border-secondary">
            <tr>
                <th scope="col">Bulan</th>
                <th scope="col">Angsuran Bunga</th>
                <th scope="col">Angsuran Pokok</th>
                <th scope="col">Total Angsuran</th>
                <th scope="col">Sisa Angsuran</th>
            </tr>
            <?php for ($i = 1; $i <= ($lama_angsuran * 12); $i++) : ?>
                <?php if ($uang_muka < $minimal) : ?>
                    <td class="fw-bold text-center" colspan="5">-</td>
                    <?php break; ?>
                <?php elseif ($uang_muka > $maksimal) : ?>
                    <td class="fw-bold text-center" colspan="5">-</td>
                    <?php break; ?>
                <?php endif ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td>Rp.<?= number_format($angsuran_bunga_per_bulan) ?></td>
                    <td>Rp.<?= number_format($angsuran_pokok_per_bulan) ?></td>
                    <td>Rp.<?= number_format($total_angsuran_per_bulan) ?></td>
                    <td>Rp.<?= number_format($sisa_pinjaman -= $angsuran_pokok_per_bulan) ?></td>
                </tr>
            <?php endfor ?>
        </table>
        <a href="index.php" class="btn btn-danger">Kembali</a>
    </div>

</body>

</html>
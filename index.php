<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Kredit Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <form action="hitung.php" method="post">
        <div class="container mt-5 d-flex justify-content-center">
            <div class="card w-50 text-white bg-secondary ">
                <div class="card-body">
                    <h1 class="text-center card=title">Simulasi Kredit Motor</h1>
                    <div class="mb-3">
                        <label for="harga_motor" class="form-label">Harga Motor</label>
                        <input type="number" name="harga_motor" class="form-control" id="harga_motor" min="15000000">
                    </div>
                    <div class="mb-3">
                        <label for="uang_muka" class="form-label">Uang Muka</label>
                        <input type="number" name="uang_muka" class="form-control" id="uang_muka" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="lama_angsuran" class="form-label">Tenor (Tahun)</label>
                        <select class="form-select" id="lama_angsuran" name="lama_angsuran">
                            <option selected>-Pilih Tenor-</option>
                            <option value="1">1 Tahun</option>
                            <option value="2">2 Tahun</option>
                            <option value="3">3 Tahun</option>
                            <option value="4">4 Tahun</option>
                            <option value="5">5 Tahun</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bunga" class="form-label">Bunga</label>
                        <select class="form-select" id="bunga" name="bunga">
                            <option selected>-Pilih Bunga-</option>
                            <option value="5">5 %</option>
                            <option value="6">6 %</option>
                            <option value="7">7 %</option>
                            <option value="8">8 %</option>
                            <option value="9">9 %</option>
                            <option value="10">10 %</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Hitung</button>
                </div>
            </div>
        </div>
    </form>


</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" type="text/css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <a href="form.php" class="btn btn-primary">Tambah</a>
        <div class="row mt-3">
            <?php 
                $cUrl = curl_init();
                $options = array(
                    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/getAllDosen',
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($cUrl, $options);
                $response = curl_exec($cUrl);
                $data = json_decode($response);
                curl_close($cUrl);

                foreach ($data as $row) :
            ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="assets/img/<?= $row->foto; ?> " class="card-img-top" alt="<?= $row->nama; ?>">
                    <div class="card-body">
                        <p class="card-text"><?= $row->nama; ?></p>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <table class="table table-bordered my-5" id="tDosen">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Usia</th>
                <th scope="col">Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $cUrl = curl_init();
                    $options = array(
                        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/getAllDosen',
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_RETURNTRANSFER => true
                    );
                    curl_setopt_array($cUrl, $options);
                    $response = curl_exec($cUrl);
                    $data = json_decode($response);
                    curl_close($cUrl);
                    $i = 1;
                    foreach ($data as $row) :
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->jenis_kelamin; ?></td>
                    <td><?= $row->usia; ?></td>
                    <td><?= $row->prodi->nama.'('.$row->prodi->kode.')'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#tDosen')
        new DataTable('#tDosen')
    </script>
</body>
</html>
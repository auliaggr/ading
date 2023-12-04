<?php 

    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $usia = $_POST['usia'];
    $kode_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $foto = $_FILES['foto'];

    if(move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/'.$_FILES['foto']['name'])) {
        // echo 'Berhasil Upload';
        $prodi = array(
            'kode' => $kode_prodi,
            'nama' => $nama_prodi
        );

        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/postDosen',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'usia' => $usia,
                'prodi' => json_encode($prodi),
                'foto' => $_FILES['foto']['name']
            ))
        );
        curl_setopt_array($cUrl, $options);
        $response = curl_exec($cUrl);
        curl_close($cUrl);

    } else {
        // echo 'Gagal Upload';
    }

    header('Location: index.php');

?>
<?php
    class Report extends CI_Controller {
        public function index() {
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

            $this -> load -> library('pdf');
            
            $view = '
                    <h1>Institut Pertanian Bogor</h1>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                        </tr>';

            $i = 1;
            foreach ($data as $row) :
                $view .= '<tr>
                <td>'.($i++).'</td>
                <td>'.(empty($row -> nama) ? '' : $row -> nama).'</td>
                <td>'.$row -> jenis_kelamin'</td>
                <td>'.(empty($row -> usia) ? '' : $row -> usia).'</td>
                ';
            endforeach;

            $view .= '</table>';
    
            $this -> pdf -> generate($view);
        }
    }
?>
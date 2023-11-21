<?php
    class Report extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pdf');
        }
        
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

            $view = '
                    <h1>Institut Pertanian Bogor</h1>
                    <hr>
                    <table border="1" width="100%" cellpadding="5px">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                        </tr>';

            $i = 1;
            foreach ($data as $row) :
                $view .= '<tr>
                    <td align="center">'.($i++).'</td>
                    <td>'.(empty($row -> nama) ? '' : $row -> nama).'</td>
                    <td>'.$row -> jenis_kelamin.'</td>
                    <td>'.(empty($row -> usia) ? '' : $row -> usia).'</td>
                </tr>';
            endforeach;

            $view .= '</table>';
            return $this->pdf->generate($view, 'test');
        }
    }

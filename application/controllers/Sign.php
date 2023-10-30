<?php
    class Sign extends CI_Controller {
        public function index() {
            $this->load->view('sign');
        }

        public function in() {
            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://ap-southeast-1.aws.data.mongodb-api.com/app/application-2023-zygac/endpoint/getPenggunaByUsernamePassword?username='.$this->input->get('username').'&password='.md5($this->input->get('password')),
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_RETURNTRANSFER => true,
                // CURLOPT_POSTFIELDS => http_build_query(array(
                //     'username' => $_GET['username'],
                //     'password' => $_GET['password']
                // ))
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);

            $data = json_decode($response);

            curl_close($cUrl);

            if (count($data)) {
                // Terdaftar
                $this->session->set_userdata('username', $this->input->get('username'));
            } else {
                // Tidak Terdaftar
            }

            redirect('Chat');
        }
        
        public function out() {
            $this->session->sess_destroy();

            redirect('Sign');
        }

        public function up() {

        }
    }
?>
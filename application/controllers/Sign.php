<?php
    class Sign extends CI_Controller {
        public function index() {
            $this->load->view('sign');
        }

        public function in() {  
            $cUrl = curl_init();

            $options = array(
                // CURLOPT_URL => 'https://ap-southeast-1.aws.data.mongodb-api.com/app/application-2023-zygac/endpoint/getPenggunaByUsernamePassword?username='.$this->input->get('username').'&password='.md5($this->input->get('password')),
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/getPenggunaByUsernamePassword?username='.$this->input->get('username').'&password='.md5($this->input->get('password')),
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
            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/postPengguna?username='.$this->input->get('username').'&password='.md5($this->input->get('password')),
                CURLOPT_CUSTOMREQUEST => 'POST',
                // CURLOPT_RETURNTRANSFER => true,
                // CURLOPT_POSTFIELDS => http_build_query(array(
                //     'username' => $_GET['username'],
                //     'password' => $_GET['password']
                // ))
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);

            curl_close($cUrl);

            $this -> session -> set_flashdata('status_signup', $response);

            redirect('Sign');
        }

        public function forgot() {
            $this -> load -> view('forgot');
        }
        
        public function send() {
            $this -> load -> library('email');

            $this -> email -> from('aul@gmail.com', 'Admin Chat App');
            $this -> email -> to($this -> input -> get('username'));

            echo $password = rand();
            
            $this -> email -> subject('Forgot Password');
            $this -> email -> message('Password baru Anda adalah <b>'.$password.'</b>. Silahkan aktifkan password baru Anda dengan klik <a href="'.site_url('Sign/active/'.urlencode(base64_encode($this -> input -> get('username'))).'/'.$password).'">Disini</a>');
            
            $this -> email -> send();

            redirect('Sign');
        }

        public function active($email, $password) {
            $email = base64_decode(urldecode($email));

            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-2023-abouk/endpoint/putPenggunaByUsername?username='.$email.'&password='.md5($password),
                CURLOPT_CUSTOMREQUEST => 'PUT',
                // CURLOPT_RETURNTRANSFER => true,
                // CURLOPT_POSTFIELDS => http_build_query(array(
                //     'username' => $_GET['username'],
                //     'password' => $_GET['password']
                // ))
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);

            curl_close($cUrl);

            redirect('Sign');
        }

    }
?>
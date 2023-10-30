<?php
    class Chat extends CI_Controller {
        public function __construct() {
            parent::__construct();
            
            if (empty($this->session->userdata('username'))) {
                redirect ('Sign');
            }
        }

        public function index() {
            $this->load->view('chat');
        }
    }
?>
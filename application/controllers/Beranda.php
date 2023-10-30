<?php
    class Beranda extends CI_Controller {
        public function index() {
            // echo 'Hello World';
            $this->load->view('beranda');
        }

        public function greeting($name) {
            echo 'Hai '.$name;
        }

        public function add($x = null, $y = null) {
            echo $x + $y;
        }

        public function edit($id) {
            echo $id;
        }
    }
?>
<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';        

        $this->view('components/header', $data);
        $this->view('home/index', $data);
        $this->view('components/footer');
    }
}

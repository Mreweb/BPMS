<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Page404 extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        header("HTTP/1.0 404 Not Found");
        $this->load->view('access');
    }



}

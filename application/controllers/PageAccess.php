<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PageAccess extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        header("HTTP/1.0 403 Not Found");
        $this->load->view('access');
    }

}

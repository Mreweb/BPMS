<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/ModelCountry');
    }

    public function index(){}

    public function getCityByProvinceId($stateId){
        echo json_encode($this->ModelCountry->getCityByProvinceId($stateId));
    }

}
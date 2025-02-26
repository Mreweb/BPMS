<?php

class ModelCountry extends CI_Model{
       function __construct(){
        parent::__construct();
    }
    public function getProvinceList()
    {
        $this->db->select('*');
        $this->db->from('province');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        $arr = array(
            'type' => "red",
            'content' => "اطلاعات نامعتبر است",
            'success' => false
        );
        return $arr;
    }
    public function getProvinceById($stateId){
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where(array('ProvinceId' => $stateId));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        $arr = array(
            'type' => "red",
            'content' => "اطلاعات نامعتبر است",
            'success' => false
        );
        return $arr;
    }
    public function getCityByProvinceId($stateId)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where(array('CityProvinceId' => $stateId));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        $arr = array(
            'type' => "red",
            'content' => "اطلاعات نامعتبر است",
            'success' => false
        );
        return $arr;
    }
}

?>
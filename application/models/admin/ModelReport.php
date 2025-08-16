<?php

class ModelReport extends CI_Model{


    public function getTotalSaleByDate($inputs){

        $this->db->select('COUNT(ReqId) as count_order')->from('person_requests');
        if (isset($inputs['inputFromDate']) && $inputs['inputFromDate'] != '') {
            $this->db->where('person_requests.CreateDateTime >= ' . $inputs['inputFromDate']);
        }
        if (isset($inputs['inputToDate']) && $inputs['inputToDate'] != '') {
            $this->db->where('person_requests.CreateDateTime <= ' . $inputs['inputToDate']);
        }
        $result = $this->db->get()->result_array();
        $data['Counts'][] = $result[0]['count_order'];

        return $data;

    }
    public function getTotalByType($inputs){

        $this->db->select('COUNT(ReqId) as count_order')->from('person_requests');
        if (isset($inputs['inputFromDate']) && $inputs['inputFromDate'] != '') {
            $this->db->where('person_requests.CreateDateTime >= ' . $inputs['inputFromDate']);
        }
        if (isset($inputs['inputToDate']) && $inputs['inputToDate'] != '') {
            $this->db->where('person_requests.CreateDateTime <= ' . $inputs['inputToDate']);
        }
        $this->db->where('person_requests.ReqType' , $inputs['Type']);

        $result = $this->db->get()->result_array();
        $data['Counts'][] = $result[0]['count_order'];

        return $data;

    }
    public function getTotalByStatus($inputs){

        $this->db->select('COUNT(ReqId) as count_order')->from('person_requests');
        if (isset($inputs['inputFromDate']) && $inputs['inputFromDate'] != '') {
            $this->db->where('person_requests.CreateDateTime >= ' . $inputs['inputFromDate']);
        }
        if (isset($inputs['inputToDate']) && $inputs['inputToDate'] != '') {
            $this->db->where('person_requests.CreateDateTime <= ' . $inputs['inputToDate']);
        }
        $this->db->where('person_requests.ReqStatus' , $inputs['Status']);

        $result = $this->db->get()->result_array();
        $data['Counts'][] = $result[0]['count_order'];

        return $data;

    }
    public function getTotalSaleByProvince($inputs){

        $data['Names'] = [];
        $data['Counts'] = [];
        foreach ($inputs['provinceList'] as $province) {
            $this->db->select('SUM(person_requests.ReqId) as ReqCount');
            $this->db->from('province');
            $this->db->join('person_requests' , 'person_requests.ReqProvinceId = province.ProvinceId');
            $this->db->where('province.ProvinceId' , $province['ProvinceId']);
            $count = $this->db->get()->result_array()[0]['ReqCount'];
            $this->db->reset_query();
            $data['Names'][] = $province['ProvinceName'];
            $data['Counts'][] = $count;
            $this->db->reset_query();
        }

        return $data;

    }
    public function getTotalPerson(){
        $this->db->select('COUNT(PersonId) as count_person')->from('person');
        $result = $this->db->get()->result_array();
        $data['Counts'][] = $result[0]['count_person'];
        return $data;

    }



}

?>
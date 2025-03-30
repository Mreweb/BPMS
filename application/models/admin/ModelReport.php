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


        $this->db->select('region_id,default_name');
        $this->db->from('province');
        $provinces = $this->db->get()->result_array();
        $this->db->reset_query();

        $data['Names'] = [];
        $data['Sales'] = [];
        $data['Counts'] = [];
        foreach ($provinces as $province) {
            $this->db->select('SUM(CalculatedFinalPrice)/10 as sum_total , COUNT(order_id) as count_order');
            $this->db->from('ordering');
            $this->db->join('customer_address', 'customer_address.address_id = ordering.address_id');
            $this->db->join('admin_users', 'admin_users.id = ordering.ref_user_id');
            $this->db->where('customer_address.province', $province['region_id']);
            $this->db->where_not_in('ordering.status', $this->config->item('ENUM')['ORDERSTATUSUNCOMPLETE']);
            $this->db->where('ordering.order_id >= 2547');
            if (isset($inputs['inputFromDate']) && $inputs['inputFromDate'] != '') {
                $this->db->where('ordering.CreateDateTime >= ' . $inputs['inputFromDate']);
            }
            if (isset($inputs['inputToDate']) && $inputs['inputToDate'] != '') {
                $this->db->where('ordering.CreateDateTime <= ' . $inputs['inputToDate']);
            }
            $result = $this->db->get()->result_array();


            $data['Names'][] = $province['default_name'];
            $data['Sales'][] = floatval($result[0]['sum_total']);
            $data['Counts'][] = floatval($result[0]['count_order']);

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
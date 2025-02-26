<?php

class ModelPerson extends CI_Model{

    public function doAddPerson($inputs){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->group_start();
        $this->db->where(array('PersonPhone' => $inputs['inputPersonPhone']));
        $this->db->or_where(array('Username' => $inputs['inputPersonUserName']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            return $this->config->item('DBMessages')['DuplicateInfo'];
        } else {
            $userArray = array(
                'PersonFirstName' => $inputs['inputPersonFirstName'],
                'PersonLastName' => $inputs['inputPersonLastName'],
                'PersonPhone' => $inputs['inputPersonPhone'],
                'PersonNationalCode' => $inputs['inputPersonNationalCode'],
                'PersonEmail' => $inputs['inputPersonEmail'],
                'IsActive' => $inputs['inputIsActive'],
                'PersonGender' => $inputs['inputGender'],
                'Username' => $inputs['inputPersonUserName'],
                'Password' => md5($inputs['inputPersonPassword']),
                'CreateDatetime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person', $userArray);

            $personId = $this->db->insert_id();
            $userArray = array(
                'PersonId' => $personId,
                'LegalOrganizationName' => $inputs['inputLegalOrganizationName'],
                'LegalFinanceCode' => $inputs['inputLegalFinanceCode'],
                'LegalCompanyCode' => $inputs['inputLegalCompanyCode'],
                'LegalRegisterNumber' => $inputs['inputLegalRegisterNumber'],
                'LegalPhone' => $inputs['inputLegalPhone'],
                'LegalProvinceId' => $inputs['inputLegalProvinceId'],
                'CreateDateTime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_legal_info', $userArray);


            $userArray = array(
                'PersonId' => $personId,
                'Role' => $inputs['inputRole']
            );
            $this->db->insert('person_roles', $userArray);

        }
        return $this->config->item('DBMessages')['SuccessAction'];
    }
    public function doPersonsPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person');
        if ($inputs['inputPersonFirstName'] != '') {
            $this->db->like('PersonFirstName', $inputs['inputPersonFirstName']);
        }
        if ($inputs['inputPersonLastName'] != '') {
            $this->db->like('PersonLastName', $inputs['inputPersonLastName']);
        }
        if ($inputs['inputPersonNationalCode'] != '') {
            $this->db->like('PersonNationalCode', $inputs['inputPersonNationalCode']);
        }
        if ($inputs['inputPersonPhone'] != '') {
            $this->db->like('PersonPhone', $inputs['inputPersonPhone']);
        }
        if ($inputs['inputFromDate'] != '') {
            $this->db->where('person.CreateDateTime >=', makeTime($inputs['inputFromDate']));
        }
        if ($inputs['inputToDate'] != '') {
            $this->db->where('person.CreateDateTime <=', makeTime($inputs['inputToDate']));
        }
        $this->db->order_by('PersonId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */

        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $index = 0;
            foreach ($query as $item) {
                $query[$index]['PersonRoles'] = $this->db->select('*')->from('person_roles')->where(array('PersonId' => $item['PersonId']))->get()->num_rows();
                $index += 1;
            }
            $result['data'] = $query;
            $result['count'] = $queryCount;
            return $result;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
            return $result;
        }
    }
    public function doSetRoles($inputs)
    {

        $this->db->delete('person_roles', array('PersonId' => $inputs['inputPersonId']));
        foreach ($inputs['inputRoles'] as $role) {
            $userArray = array(
                'PersonId' => $inputs['inputPersonId'],
                'Role' => $role,
                'CreateDateTime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_roles', $userArray);
        }
        return $this->config->item('DBMessages')['SuccessAction'];
    }
    public function getPersonInfo($personId){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonId' => $personId));
        $data = $this->db->get()->result_array()[0];
        $this->db->reset_query();

        $this->db->reset_query();

        $this->db->select('*');
        $this->db->from('person_roles');
        $this->db->where(array('PersonId' => $personId));
        $data['roles'] = $this->db->get()->result_array();

        $this->db->reset_query();

        $this->db->select('*');
        $this->db->from('person_legal_info');
        $this->db->where(array('PersonId' => $personId));
        $data['legal_info'] = $this->db->get()->result_array();

        $this->db->reset_query();

        $this->db->select('*');
        $this->db->from('roles_group_person');
        $this->db->where(array('PersonId' => $personId));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data['roleGroupId'] = $query->result_array()[0]['RoleGroupId'];
        } else {
            $data['roleGroupId'] = 0;
        }

        return $data;

    }
    public function doEditPerson($inputs)
    {
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonId !=' => $inputs['inputPersonId']));
        $this->db->group_start();
        $this->db->where(array('PersonPhone' => $inputs['inputPersonPhone']));
        $this->db->or_where(array('Username' => $inputs['inputPersonUserName']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            return $this->config->item('DBMessages')['DuplicateInfo'];
        } else {
            if ($inputs['inputPersonPassword'] != '') {
                $userArray = array(
                    'PersonFirstName' => $inputs['inputPersonFirstName'],
                    'PersonLastName' => $inputs['inputPersonLastName'],
                    'PersonPhone' => $inputs['inputPersonPhone'],
                    'PersonNationalCode' => $inputs['inputPersonNationalCode'],
                    'PersonEmail' => $inputs['inputPersonEmail'],
                    'IsActive' => $inputs['inputIsActive'],
                    'PersonGender' => $inputs['inputGender'],
                    'Username' => $inputs['inputPersonUserName'],
                    'Password' => md5($inputs['inputPersonPassword']),
                    'ModifyDatetime' => time(),
                    'ModifyPersonId' => $inputs['inputModifyPersonId']
                );
                $this->db->where('PersonId', $inputs['inputPersonId']);
                $this->db->update('person', $userArray);
            } else {
                $userArray = array(
                    'PersonFirstName' => $inputs['inputPersonFirstName'],
                    'PersonLastName' => $inputs['inputPersonLastName'],
                    'PersonNationalCode' => $inputs['inputPersonNationalCode'],
                    'PersonPhone' => $inputs['inputPersonPhone'],
                    'PersonEmail' => $inputs['inputPersonEmail'],
                    'Username' => $inputs['inputPersonUserName'],
                    'IsActive' => $inputs['inputIsActive'],
                    'PersonGender' => $inputs['inputGender'],
                    'ModifyDatetime' => time(),
                    'ModifyPersonId' => $inputs['inputModifyPersonId']
                );
                $this->db->where('PersonId', $inputs['inputPersonId']);
                $this->db->update('person', $userArray);
            }


            $this->db->delete('person_roles', array(
                'PersonId' =>  $inputs['inputPersonId']
            ));

            $userArray = array(
                'PersonId' => $inputs['inputPersonId'],
                'Role' => $inputs['inputRole']
            );
            $this->db->insert('person_roles', $userArray);


        }
        return $this->config->item('DBMessages')['SuccessAction'];
    }
    public function doEditPersonLegalInfo($inputs){
        if ($this->db->select('*')->from('person_legal_info')->where('PersonId', $inputs['inputPersonId'])->get()->num_rows() > 0) {
            $userArray = array(
                'LegalOrganizationName' => $inputs['inputLegalOrganizationName'],
                'LegalFinanceCode' => $inputs['inputLegalFinanceCode'],
                'LegalCompanyCode' => $inputs['inputLegalCompanyCode'],
                'LegalRegisterNumber' => $inputs['inputLegalRegisterNumber'],
                'LegalPhone' => $inputs['inputLegalPhone'],
                'LegalProvinceId' => $inputs['inputLegalProvinceId'],
                'ModifyDatetime' => time(),
                'ModifyPersonId' => $inputs['inputModifyPersonId']
            );
            $this->db->where('PersonId', $inputs['inputPersonId']);
            $this->db->update('person_legal_info', $userArray);
        } else {
            $userArray = array(
                'PersonId' => $inputs['inputPersonId'],
                'LegalOrganizationName' => $inputs['inputLegalOrganizationName'],
                'LegalFinanceCode' => $inputs['inputLegalFinanceCode'],
                'LegalCompanyCode' => $inputs['inputLegalCompanyCode'],
                'LegalRegisterNumber' => $inputs['inputLegalRegisterNumber'],
                'LegalPhone' => $inputs['inputLegalPhone'],
                'LegalProvinceId' => $inputs['inputLegalProvinceId'],
                'CreateDateTime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_legal_info', $userArray);
        }
        return $this->config->item('DBMessages')['SuccessAction'];
    }
    public function getAllPersons()
    {
        $this->db->select('*');
        $this->db->from('person');
        return $this->db->get()->result_array();
    }

}

?>
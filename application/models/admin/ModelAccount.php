<?php

class ModelAccount extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
    public function do_login_user($inputs){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('Username' => $inputs['inputPhone']));
        $this->db->where(array('IsActive' => 1));
        $this->db->where(array('Password' => md5($inputs['inputPassword'])));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();

            $this->db->select('Role');
            $this->db->from('person_roles');
            $this->db->where(array('PersonId' => $result[0]['PersonId']));
            $roles = $this->db->get()->result_array();
            $admin_role = [];
            foreach ($roles as $role) {
                $admin_role[] = $role['Role'];
            }

            $this->session->set_userdata('AdminIsLogged', TRUE);
            $this->session->set_userdata('AdminLoginInfo', $result);
            $this->session->set_userdata('AdminRoles', $admin_role);

            response(get_req_message('SuccessAction', 'ورود با موفقیت انجام شد'), 200);
        }
        response(get_req_message('ErrorAction', 'اطلاعات نامعتبر است یا کاربر غیرفعال است.'), 400);
    }
    public function do_submit_phone($inputs){

        /*send SMS*/
        $code = randomString('nozero', 4);
        $curl = curl_init();
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => "http://api.ghasedaksms.com/v2/send/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "type=1&param1=" . $code . "&receptor=" . $inputs['inputPhone'] . "&template=" . getSMSTemplate(),
                CURLOPT_HTTPHEADER => array(
                    "apikey: " . getSMSAPI(),
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded",
                )));
        curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            response(get_req_message('ErrorAction', "خطا در ارسال پیام تایید"), 400);
        }

        /* check user exists */
        $this->session->set_userdata('PersonPhone', $inputs['inputPhone']);
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonPhone' => $inputs['inputPhone']));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array()[0];
            $this->set_activation_code($result['PersonId'], $code);
        } else {

            /* if user not exists then register user */
            if(isset($inputs['inputFirstName'])) {
                $userArray = array(
                    'PersonPhone' => $inputs['inputPhone'],
                    'PersonFirstName' => $inputs['inputFirstName'],
                    'PersonLastName' => $inputs['inputLastName'],
                    'Username' => $inputs['inputPhone'],
                    'Password' => md5($inputs['inputPhone']),
                    'ActivationCode' => $code,
                    'CreateDateTime' => time(),
                    'ModifyDatetime' => time()
                );
            } else{
                $userArray = array(
                    'PersonPhone' => $inputs['inputPhone'],
                    'Username' => $inputs['inputPhone'],
                    'Password' => md5($inputs['inputPhone']),
                    'ActivationCode' => $code,
                    'CreateDateTime' => time(),
                    'ModifyDatetime' => time()
                );
            }
            $this->db->insert('person', $userArray);
            $personId = $this->db->insert_id();

            /*add balance with zero money */
            $userArray = array(
                'PersonId' => $personId,
                'AccountBalance' => 0,
                'CreateDateTime' => time(),
                'CreatePersonId' => $personId
            );
            $this->db->insert('person_account_balance', $userArray);

            /* add user role */
            $userArray = array(
                'PersonId' => $personId,
                'Role' => 'User',
                'CreateDateTime' => time(),
                'CreatePersonId' => $personId
            );
            $this->db->insert('person_roles', $userArray);

            /* add user legal info */
            if(isset($inputs['inputLegalCompanyCode'])) {
                $userArray = array(
                    'PersonId' => $personId,
                    'LegalOrganizationName' => '',
                    'LegalFinanceCode' => '',
                    'LegalCompanyCode' => $inputs['inputLegalCompanyCode'],
                    'LegalRegisterNumber' => '',
                    'LegalPhone' => '',
                    'LegalProvinceId' => '',
                    'CreateDateTime' => time(),
                    'CreatePersonId' => $personId
                );
                $this->db->insert('person_legal_info', $userArray);
            }


        }
        response(get_req_message('SuccessAction', "کد تایید به شماره همرا شما ارسال شد."), 200);
    }
    public function set_activation_code($personId, $code, $update = true){
        if ($update) {
            $userArray = array('ActivationCode' => $code);
            $this->db->where('PersonId', $personId);
            $this->db->update('person', $userArray);
        }
        $this->session->set_userdata('VerifyPersonId', $personId);
        $this->session->set_userdata('ActivationCode', $code);
    }
    public function do_verify_phone($inputs){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(
            array(
                'ActivationCode' => $inputs['inputVerifyCode'],
                'PersonPhone' => $inputs['inputPhone']
            )
        );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $this->db->select('Role');
            $this->db->from('person_roles');
            $this->db->where(array('PersonId' => $result[0]['PersonId']));
            $roles = $this->db->get()->result_array();
            $admin_role = [];
            foreach ($roles as $role) {
                $admin_role[] = $role['Role'];
            }
            $this->session->set_userdata('AdminIsLogged', TRUE);
            $this->session->set_userdata('AdminLoginInfo', $result);
            $this->session->set_userdata('AdminRoles', $admin_role);
            response(get_req_message('SuccessAction', 'ورود با موفقیت انجام شد'), 200);
        } else {
            response(get_req_message('ErrorAction', "کد ورود نامعتبر است"), 400);
        }
    }
}

?>
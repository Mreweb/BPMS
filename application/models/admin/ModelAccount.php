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
        sendSMS("bpms-otp", $inputs['inputPhone'],array($code));


        /* check user exists */
        $this->session->set_userdata('PersonPhone', $inputs['inputPhone']);
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonPhone' => $inputs['inputPhone']));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array()[0];
            $this->set_activation_code($result['PersonId'], $code);
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
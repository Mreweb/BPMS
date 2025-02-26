<?php

class ModelProfile extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getMyInfo(){
        return $this->db->select('*')->from('person')->where('PersonId' , getLoginInfo()['PersonId'])->get()->result_array()[0];
    }
    public function doUpdateProfile($inputs){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonId !=' =>  getLoginInfo()['PersonId'] ));
        $this->db->group_start();
        $this->db->where(array('PersonPhone' => $inputs['inputPersonPhone']));
        $this->db->or_where(array('Username' => $inputs['inputPersonUserName']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            response(get_req_message('DuplicateInfo' , 'نام کاربری یا تلفن همراه قبلا در سامانه ثبت شده است') , 400);
        } else {
            if ($inputs['inputPersonPassword'] != '') {
                $userArray = array(
                    'PersonFirstName' => $inputs['inputPersonFirstName'],
                    'PersonLastName' => $inputs['inputPersonLastName'],
                    'PersonNationalCode' => $inputs['inputPersonNationalCode'],
                    'PersonEmail' => $inputs['inputPersonEmail'],
                    'PersonGender' => $inputs['inputGender'],
                    'Username' => $inputs['inputPersonUserName'],
                    'Password' => md5($inputs['inputPersonPassword']),
                    'ModifyDatetime' => time(),
                    'ModifyPersonId' =>getLoginInfo()['PersonId']
                );
                $this->db->where('PersonId', getLoginInfo()['PersonId']);
                $this->db->update('person', $userArray);
            } else {
                $userArray = array(
                    'PersonFirstName' => $inputs['inputPersonFirstName'],
                    'PersonLastName' => $inputs['inputPersonLastName'],
                    'PersonNationalCode' => $inputs['inputPersonNationalCode'],
                    'PersonPhone' => $inputs['inputPersonPhone'],
                    'PersonGender' => $inputs['inputGender'],
                    'PersonEmail' => $inputs['inputPersonEmail'],
                    'Username' => $inputs['inputPersonUserName'],
                    'ModifyDatetime' => time(),
                    'ModifyPersonId' =>getLoginInfo()['PersonId']
                );
                $this->db->where('PersonId', getLoginInfo()['PersonId']);
                $this->db->update('person', $userArray);
            }
        }
        response(get_req_message('SuccessAction') , 200);
    }
    public function doSubmitNewPhone($inputs){

        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(array('PersonId !=' =>  getLoginInfo()['PersonId'] ));
        $this->db->group_start();
        $this->db->where(array('PersonPhone' => $inputs['inputPersonPhone']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            response(get_req_message('DuplicateInfo' )  , 400);
        } else {

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
                    CURLOPT_POSTFIELDS => "type=1&param1=".$code."&receptor=" . $inputs['inputPersonPhone'] . "&template=" . getSMSTemplate(),
                    CURLOPT_HTTPHEADER => array(
                        "apikey: ".getSMSAPI(),
                        "cache-control: no-cache",
                        "content-type: application/x-www-form-urlencoded",
                    )));
            curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                response(get_req_message('ErrorAction', "خطا در ارسال پیام تایید"), 400);
            }

            $userArray = array('ActivationCode' => $code);
            $this->db->where('PersonId', getLoginInfo()['PersonId']);
            $this->db->update('person', $userArray);


            return $this->config->item('DBMessages')['SuccessAction'];
        }
    }
    public function doVerifyPhone($inputs){
        $this->db->select('*');
        $this->db->from('person');
        $this->db->where(
            array(
                'ActivationCode' => $inputs['inputVerifyCode'],
                'PersonId' => $inputs['inputPersonId']
            )
        );
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $userArray = array('PersonPhone' => $inputs['inputPersonPhone']);
            $this->db->where('PersonId', $inputs['inputPersonId']);
            $this->db->update('person', $userArray);
            response(get_req_message('SuccessAction', 'تغییر تلفن با موفقیت انجام شد'), 200);
        } else {
            response(get_req_message('ErrorAction', "کد ورود نامعتبر است"), 400);
        }
    }


    public function doMyRequestsPagination($inputs){
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputPersonId'] != '') {
            $this->db->where('PersonId', $inputs['inputPersonId']);
        }
        $this->db->order_by('ReqId', 'DESC');
        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
            return $result;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
            return $result;
        }
    }


}

?>
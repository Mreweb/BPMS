<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Account extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/ModelAccount');
        if($this->session->userdata('AdminIsLogged') ){
            redirect(base_url('Admin/Dashboard/Home'));
            die();
        }
    }

    /*login by username*/
    public function index(){
        $data['noImg'] = $this->config->item('defaultImage');
        $data['pageTitle'] = $this->config->item('defaultPageTitle') . 'ورود';
        $this->load->view('admin/login/index', $data);
        $this->load->view('admin/login/index_css');
        $this->load->view('admin/login/index_js');
    }
    public function do_login(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);
        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPhone', 'نام کاربری', 'trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('inputPassword', 'رمز عبور', 'trim|required|max_length[80]');
        $this->form_validation->set_rules('inputCaptcha', 'کد امنیتی', 'trim|required|min_length[5]|max_length[5]');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }
        $captchaCode = $this->session->userdata['captchaCode'];
        if (strtolower($inputs['inputCaptcha']) == strtolower($captchaCode)) {
            $result = $this->ModelAccount->do_login_user($inputs);
            response(get_req_message('SuccessAction', $result), 200);

        } else {
            response(get_req_message('ErrorAction', 'کد امنیتی نامعتبر است'), 400);
        }
    }

    /* register by phone number */
    public function phone(){
        $data['noImg'] = $this->config->item('defaultImage');
        $data['pageTitle'] = $this->config->item('defaultPageTitle') . 'ثبت نام';
        $this->load->view('admin/phone/index', $data);
        $this->load->view('admin/phone/index_css');
        $this->load->view('admin/phone/index_js');
    }
    public function do_submit_phone(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $captchaCode = $this->session->userdata['captchaCode'];
        if (strtolower($inputs['inputCaptcha']) == strtolower($captchaCode)) {
            $this->form_validation->set_data($inputs);
            $this->form_validation->set_rules('inputPhone', 'تلفن همراه', 'trim|required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('inputFirstName', 'نام نماینده', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('inputLastName', 'نام خانوادگی نماینده', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('inputLegalCompanyCode', 'شناسه ملی شرکت', 'trim|required|min_length[3]|max_length[50]|numeric');
            $this->form_validation->set_rules('inputCaptcha', 'کد امنیتی', 'trim|required|min_length[5]|max_length[5]');
            if ($this->form_validation->run() == FALSE) {
                response(get_req_message('ErrorAction', validation_errors()), 400);
            }
            $inputs['inputPhone'] = "0".$inputs['inputPhone'];
            $this->ModelAccount->do_submit_phone($inputs);

        } else {
            response(get_req_message('ErrorAction', 'کد امنیتی نامعتبر است'), 400);
        }



    }
    public function do_verify_phone(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $captchaCode = $this->session->userdata['captchaCode'];
        if (strtolower($inputs['inputCaptcha']) == strtolower($captchaCode)) {
            $this->form_validation->set_data($inputs);
            $this->form_validation->set_rules('inputPhone', 'تلفن همراه', 'trim|required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('inputVerifyCode', 'کد تایید', 'trim|required|min_length[4]|max_length[4]|numeric');
            $this->form_validation->set_rules('inputCaptcha', 'کد امنیتی', 'trim|required|min_length[5]|max_length[5]');
            if ($this->form_validation->run() == FALSE) {
                response(get_req_message('ErrorAction', validation_errors()), 400);
            }
        } else {
            response(get_req_message('ErrorAction', 'کد امنیتی نامعتبر است'), 400);
        }


        $inputs['inputPhone'] = "0".$inputs['inputPhone'];
        $result = $this->ModelAccount->do_verify_phone($inputs);

        /* Log Action */
        if($result['success']) {
            $logArray = getVisitorInfo();
            $logArray['Action'] = $this->router->fetch_class() . "_" . $this->router->fetch_method();
            $logArray['Description'] = json_encode($inputs);
            $logArray['LogPersonId'] = $result['personId'];
            $this->ModelLog->doAdd($logArray);
            $this->session->unset_userdata('PersonPhone');
        }
        /* End Log Action */

        echo json_encode($result);
    }

    /*login by phone*/
    public function phone_login(){
        $data['noImg'] = $this->config->item('defaultImage');
        $data['pageTitle'] = $this->config->item('defaultPageTitle') . 'ورود با تلفن همراه';
        $this->load->view('admin/phone_login/index', $data);
        $this->load->view('admin/phone_login/index_css');
        $this->load->view('admin/phone_login/index_js');
    }
    public function do_phone_login(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $captchaCode = $this->session->userdata['captchaCode'];
        if (strtolower($inputs['inputCaptcha']) == strtolower($captchaCode)) {
            $this->form_validation->set_data($inputs);
            $this->form_validation->set_rules('inputPhone', 'تلفن همراه', 'trim|required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('inputCaptcha', 'کد امنیتی', 'trim|required|min_length[5]|max_length[5]');
            if ($this->form_validation->run() == FALSE) {
                response(get_req_message('ErrorAction', validation_errors()), 400);
            }
            $inputs['inputPhone'] = "0".$inputs['inputPhone'];
            $this->ModelAccount->do_submit_phone($inputs);

        } else {
            response(get_req_message('ErrorAction', 'کد امنیتی نامعتبر است'), 400);
        }



    }


}
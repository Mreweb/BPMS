<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('admin/admin_login');
        $this->load->model('admin/ModelPerson');
        $this->load->model('admin/ModelProfile');
        $this->load->model('admin/ModelCountry');
        $this->loginInfo = getLoginInfo();
        $this->loginRoles = getLoginRoles();
        $this->enum = $this->config->item('ENUM');
    }
	public function index()
	{
        $data['pageTitle'] = 'ویرایش پروفایل';
        $data['person'] = $this->ModelProfile->getMyInfo();
        $data['enum'] = $this->enum;
        $data['province'] = $this->ModelCountry->getProvinceList();
	    $this->load->view('admin_panel/static/header', $data);
	    $this->load->view('admin_panel/profile/index', $data);
        $this->load->view('admin_panel/profile/index_css');
        $this->load->view('admin_panel/profile/index_js');
	    $this->load->view('admin_panel/static/footer');
	}
    public function doUpdateProfile(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);
        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPersonFirstName', 'نام', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPersonLastName', 'نام خانوادگی', 'trim|required|min_length[3]|max_length[80]');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }
        $this->ModelProfile->doUpdateProfile($inputs);
        response(get_req_message('SuccessAction') , 200);
    }
    public function doSubmitNewPhone(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPersonPhone', 'تلفن همراه', 'trim|required|min_length[11]|max_length[11]|numeric');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }

        if ($this->loginInfo['PersonPhone'] == $inputs['inputPersonPhone']) {
            response(get_req_message('ErrorAction' , 'تلفن همراه تکراری است')  , 400);
        }

        $this->ModelProfile->doSubmitNewPhone($inputs);

        /* Log Action */
        $logArray = getVisitorInfo();
        $logArray['Action'] = $this->router->fetch_class()."_".$this->router->fetch_method();
        $logArray['Description'] = json_encode($inputs);
        $logArray['LogPersonId'] = $this->loginInfo['PersonId'];
        $this->ModelLog->doAdd($logArray);
        /* End Log Action */

        response(get_req_message('SuccessAction') , 200);

    }
    public function doVerifyPhone(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);
        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPersonPhone', 'تلفن همراه', 'trim|required|min_length[11]|max_length[11]|numeric');
        $this->form_validation->set_rules('inputVerifyCode', 'کد تایید', 'trim|required|min_length[4]|max_length[4]|numeric');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }

        $inputs['inputPersonId'] =  getLoginInfo()['PersonId'];
        $result = $this->ModelProfile->doVerifyPhone($inputs);

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


    public function my_requests(){
        $data['pageTitle'] = 'تاریخچه گزارشات من';
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $data);
        $this->load->view('admin_panel/profile/my_requests/index', $data);
        $this->load->view('admin_panel/profile/my_requests/index_js');
        $this->load->view('admin_panel/static/footer');
    }
    public function doMyRequestsPagination(){
        $inputs = $this->input->post(NULL, TRUE);

        $inputs['inputPersonId'] = $this->loginInfo['PersonId'];
        $data = $this->ModelProfile->doMyRequestsPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/profile/my_requests/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }


}

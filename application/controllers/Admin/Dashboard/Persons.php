<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Persons extends CI_Controller{

    private $loginInfo;
    private $loginRoles;
    private $enum;
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin/admin_login');
        $this->load->model('admin/ModelPerson');
        $this->load->model('admin/ModelCountry');
        $this->loginInfo = getLoginInfo();
        $this->loginRoles = getLoginRoles();
        $this->enum = $this->config->item('ENUM');
        checkPersonAccess($this->loginRoles, 'ADMIN');
    }
    public function index(){
        $page['pageTitle'] = 'فهرست کاربران';
        $data['loginInfo'] = $this->loginInfo;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/persons/index', $data);
        $this->load->view('admin_panel/persons/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doPersonsPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelPerson->doPersonsPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/persons/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }

    public function Add(){
        $page['pageTitle'] = 'افزودن  کاربر';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['province'] = $this->ModelCountry->getProvinceList();

        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/persons/add/index', $data);
        $this->load->view('admin_panel/persons/add/index_css', $data);
        $this->load->view('admin_panel/persons/add/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doAddPerson(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPersonFirstName', 'نام', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPersonLastName', 'نام خانوادگی', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPersonPhone', 'تلفن همراه', 'trim|required|min_length[3]|max_length[80]|numeric');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }

        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId'];
        $result = $this->ModelPerson->doAddPerson($inputs);
        /* Log Action */
        $logArray = getVisitorInfo();
        $logArray['Action'] = $this->router->fetch_class() . "_" . $this->router->fetch_method();
        $logArray['Description'] = json_encode($inputs);
        $logArray['LogPersonId'] = $this->loginInfo['PersonId'];
        $this->ModelLog->doAdd($logArray);
        /* End Log Action */

        if (!$result['success']) {
            response(get_req_message('DuplicateInfo') , 400);
        } else {
            response(get_req_message('SuccessAction') , 200);
        }
    }
    public function Edit($personId){

        if(!is_numeric($personId)){
            invalidUrlParameterInput();
        }

        $page['pageTitle'] = 'ویرایش کاربر ';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['person'] = $this->ModelPerson->getPersonInfo($personId);
        $data['province'] = $this->ModelCountry->getProvinceList();


        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/persons/edit/index', $data);
        $this->load->view('admin_panel/persons/edit/index_css', $data);
        $this->load->view('admin_panel/persons/edit/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEditPerson(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPersonFirstName', 'نام', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPersonLastName', 'نام خانوادگی', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPersonPhone', 'تلفن همراه', 'trim|required|min_length[3]|max_length[80]|numeric');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelPerson->doEditPerson($inputs);

        /* Log Action */
        $logArray = getVisitorInfo();
        $logArray['Action'] = $this->router->fetch_class() . "_" . $this->router->fetch_method();
        $logArray['Description'] = json_encode($inputs);
        $logArray['LogPersonId'] = $this->loginInfo['PersonId'];
        $this->ModelLog->doAdd($logArray);
        /* End Log Action */
        if (!$result['success']) {
            response(get_req_message('DuplicateInfo') , 400);
        } else {
            response(get_req_message('SuccessAction') , 200);
        }

    }
    public function doEditPersonLegalInfo(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);
        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelPerson->doEditPersonLegalInfo($inputs);

        /* Log Action */
        $logArray = getVisitorInfo();
        $logArray['Action'] = $this->router->fetch_class() . "_" . $this->router->fetch_method();
        $logArray['Description'] = json_encode($inputs);
        $logArray['LogPersonId'] = $this->loginInfo['PersonId'];
        $this->ModelLog->doAdd($logArray);
        /* End Log Action */
        if (!$result['success']) {
            response(get_req_message('ErrorAction') , 400);
        }
        else {
            response(get_req_message('SuccessAction') , 200);
        }

    }


}
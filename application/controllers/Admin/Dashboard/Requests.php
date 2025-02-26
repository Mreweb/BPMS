<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller{

    private $loginInfo;
    private $loginRoles;
    private $enum;
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin/admin_login');
        $this->load->model('admin/ModelRequests');
        $this->loginInfo = getLoginInfo();
        $this->loginRoles = getLoginRoles();
        $this->enum = $this->config->item('ENUM');
        //checkPersonAccess($this->loginRoles, 'Admin');
    }

    public function index(){
        $page['pageTitle'] = 'فهرست درخواست های من';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/index', $data);
        $this->load->view('admin_panel/requests/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelRequests->doPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }

    public function Add(){
        $page['pageTitle'] = 'افزودن درخواست پذیرش';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;

        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/add/index', $data);
        $this->load->view('admin_panel/requests/add/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doAdd(){
        $inputs = $this->input->post(NULL, TRUE);

        //$inputs = secureInput($inputs);
        /*$this->form_validation->set_data($inputs);
        $this->form_validation->set_rules('inputPackageTitle', 'عنوان', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('inputPackageType', 'نوع', 'trim|required|min_length[3]|max_length[80]');
        if ($this->form_validation->run() == FALSE) {
            response(get_req_message('ErrorAction', validation_errors()), 400);
        }*/


        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId'];
        $result = $this->ModelRequests->doAdd($inputs);

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

    public function Edit($id){

        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }

        $page['pageTitle'] = 'ویرایش درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);


        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/edit/index', $data);
        $this->load->view('admin_panel/requests/edit/index_css', $data);
        $this->load->view('admin_panel/requests/edit/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEdit(){
        $inputs = $this->input->post(NULL, TRUE);

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelRequests->doEdit($inputs);

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


    public function publishProposal($id){

        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }

        $page['pageTitle'] = 'ویرایش درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);


        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/publish_proposal/index', $data);
        $this->load->view('admin_panel/requests/publish_proposal/index_css', $data);
        $this->load->view('admin_panel/requests/publish_proposal/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doPublishProposal(){
        $inputs = $this->input->post(NULL, TRUE);
        $data['proposalId'] = $inputs['inputReqId'];
        $data['proposalName'] = $inputs['inputProposalTitle'];
        $this->load->view('admin_panel/requests/publish_proposal/publish', $data );

        /*$inputs = $this->input->post(NULL, TRUE);
        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId'];
        $result = $this->ModelRequests->doPublishProposal($inputs);
        $logArray = getVisitorInfo();
        $logArray['Action'] = $this->router->fetch_class() . "_" . $this->router->fetch_method();
        $logArray['Description'] = json_encode($inputs);
        $logArray['LogPersonId'] = $this->loginInfo['PersonId'];
        $this->ModelLog->doAdd($logArray);
        if (!$result['success']) {
            response(get_req_message('DuplicateInfo') , 400);
        } else {
            response(get_req_message('SuccessAction') , 200);
        }*/

    }


    public function legal(){
        $page['pageTitle'] = 'درخواست های در مرحله کمیسیون حقوقی';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/legal/index', $data);
        $this->load->view('admin_panel/requests/legal/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doStepLegalPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelRequests->doStepLegalPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/legal/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }
    public function EditLegal($id){
        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }
        $page['pageTitle'] = 'بررسی درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/legal/view/index', $data);
        $this->load->view('admin_panel/requests/legal/view/index_css', $data);
        $this->load->view('admin_panel/requests/legal/view/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEditLegal(){
        $inputs = $this->input->post(NULL, TRUE);

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelRequests->doEditLegal($inputs);

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

    public function economic(){
        $page['pageTitle'] = 'درخواست های در مرحله کمیسیون اقتصادی';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/economic/index', $data);
        $this->load->view('admin_panel/requests/economic/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doStepEconimicPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelRequests->doStepEconimicPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/economic/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }
    public function EditEconimic($id){
        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }
        $page['pageTitle'] = 'بررسی درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/economic/view/index', $data);
        $this->load->view('admin_panel/requests/economic/view/index_css', $data);
        $this->load->view('admin_panel/requests/economic/view/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEditEconimic(){
        $inputs = $this->input->post(NULL, TRUE);

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelRequests->doEditEconimic($inputs);

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

    public function final(){
        $page['pageTitle'] = 'درخواست های در مرحله کمیسیون اقتصادی';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/final/index', $data);
        $this->load->view('admin_panel/requests/final/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doStepFinalPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelRequests->doStepFinalPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/final/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }
    public function EditFinal($id){
        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }
        $page['pageTitle'] = 'بررسی درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/final/view/index', $data);
        $this->load->view('admin_panel/requests/final/view/index_css', $data);
        $this->load->view('admin_panel/requests/final/view/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEditFinal(){
        $inputs = $this->input->post(NULL, TRUE);

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelRequests->doEditFinal($inputs);

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

    public function finished(){
        $page['pageTitle'] = 'درخواست های در مرحله کمیسیون اقتصادی';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/finished/index', $data);
        $this->load->view('admin_panel/requests/finished/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doStepFinishedPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $data = $this->ModelRequests->doStepFinishedPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/finished/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }
    public function viewFinished($id){
        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }
        $page['pageTitle'] = 'بررسی درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/finished/view/index', $data);
        $this->load->view('admin_panel/requests/finished/view/index_css', $data);
        $this->load->view('admin_panel/requests/finished/view/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }


}
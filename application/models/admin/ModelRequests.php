<?php

class ModelRequests extends CI_Model{

    public function doPagination($inputs){
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('* , person_requests.CreateDateTime as RequestCreateDateTime');
        $this->db->from('person_requests');
        $this->db->join('person' , 'person.PersonId = person_requests.ReqPersonId');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        if ($inputs['inputNationalCode'] != '') {
            $this->db->like('PersonNationalCode', $inputs['inputNationalCode']);
        }
        if ($inputs['inputName'] != '') {
            $this->db->like('PersonFirstName', $inputs['inputName']);
            $this->db->or_like('PersonLastName', $inputs['inputName']);
        }
        if ($inputs['inputReqStatus'] != '') {
            $this->db->where('ReqStatus', $inputs['inputReqStatus']);
        }
        if ($inputs['inputFromDate'] != '') {
            $this->db->where('person_requests.CreateDateTime >=', makeTimeFromDate($inputs['inputFromDate']));
        }
        if ($inputs['inputToDate'] != '') {
            $this->db->where('person_requests.CreateDateTime <=', makeTimeFromDate($inputs['inputToDate']));
        }
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doMyPagination($inputs){
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->join('person' , 'person.PersonId = person_requests.ReqPersonId');
        $this->db->where('ReqPersonId' , $inputs['inputPersonId']);
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepCentralBankPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'CENTRALBANK');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepLegalPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'LEGAL');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepEconimicPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'ECONOMIC');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepFinalPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'FINAL_ACCEPT');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepFinishedPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where_in('ReqStatus', array('ACCEPT', 'REJECT'));
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('person_requests');
        /*$this->db->join('person_requests_property_info' , 'person_requests_property_info.RequestId = person_requests.ReqId' , 'left');
        $this->db->join('person_requests_property_owner_info' , 'person_requests_property_owner_info.RequestId = person_requests.ReqId' , 'left');*/
         $this->db->where('ReqId', $id);
        return $this->db->get()->result_array();
    }

    public function getAttachmentByReqId($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_attachments');
        $this->db->where('AttachReqId', $id);
        return $this->db->get()->result_array();
    }

    public function getAttachmentById($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_attachments');
        $this->db->where('AttachId', $id);
        return $this->db->get()->result_array();
    }

    public function getPropertyInfoById($id){
        $this->db->select('*');
        $this->db->from('person_requests_property_info');
        $this->db->where('RequestId', $id);
        return $this->db->get()->result_array();
    }
    public function getPropertyOwnerInfoById($id){
        $this->db->select('*');
        $this->db->from('person_requests_property_owner_info');
        $this->db->where('RequestId', $id);
        return $this->db->get()->result_array();
    }
    public function getPropertyCentralBankInfoById($id){
        $this->db->select('*');
        $this->db->from('person_requests_property_central_bank_result');
        $this->db->where('RequestId', $id);
        return $this->db->get()->result_array();
    }


    public function doAdd($inputs){

        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->group_start();
        $this->db->where(array('ReqTitle' => $inputs['inputTitle']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();

        if(isset($_GET['draft']) && $_GET['draft']){
            $status = 'DRAFT';
        }
        else {
            $status = 'CENTRALBANK';
        }

        /* Add Request Main Info*/
        $userArray = array(
            'ReqPersonId' => $inputs['inputCreatePersonId'],
            'ReqTitle' => $inputs['inputTitle'],
            'ReqDescription' => $inputs['inputDescription'],
            'ReqType' => $inputs['inputReqType'],
            'ReqAgentNationalCode' => $inputs['inputAgentNationalCode'],
            'ReqMarketMakerNationalCode' => $inputs['inputMarketMakerNationalCode'],
            'ReqPrice' => $inputs['inputPrice'],
            'ReqStatus' => $status,
            'CreateDatetime' => time(),
            'CreatePersonId' => $inputs['inputCreatePersonId']
        );
        $this->db->insert('person_requests', $userArray);

        $reqId = $this->db->insert_id();

        if(is_numeric($reqId)){

            foreach ($inputs['inputAttachments'] as $inputAttachment) {
                if ($inputAttachment['src'] != "") {
                    $userArray = array(
                        'AttachReqId' => $reqId,
                        'AttachUrl' => $inputAttachment['src'],
                        'AttachTitle' => $inputAttachment['name'],
                        'AttachType' => $inputAttachment['type'],
                        'CreateDatetime' => time(),
                        'CreatePersonId' => $inputs['inputCreatePersonId']
                    );
                    $this->db->insert('person_requests_attachments', $userArray);
                }
            }

            /* Add Request Property Info*/
            $userArray = array(
                'RequestId' => $reqId,
                'PropertyID' => $inputs['inputPropertyID'],
                'PropertyRegisterDate' => $inputs['inputPropertyRegisterDate'],
                'PropertyType' => $inputs['inputPropertyType'],
                'PropertySpecialStatus' => $inputs['inputPropertySpecialStatus'],
                'PropertyUseType' => $inputs['inputPropertyUseType'],
                'PropertyDocType' => $inputs['inputPropertyDocType'],
                'PropertyUseReason' => $inputs['inputPropertyUseReason'],
                'PropertyUUID' => $inputs['inputPropertyUUID'],
                'PropertyPassword' => $inputs['inputPropertyPassword'],
                'PropertyAreaSupply' => $inputs['inputPropertyAreaSupply'],
                'PropertyAreaNobility' => $inputs['inputPropertyAreaNobility'],
                'PropertyRegistrationPlate' => $inputs['inputPropertyRegistrationPlate'],
                'PropertySeparate' => $inputs['inputPropertySeparate'],
                'PropertyPiece' => $inputs['inputPropertyPiece'],
                'PropertyRegistrationDepartment' => $inputs['inputPropertyRegistrationDepartment'],
                'PropertyDistrict' => $inputs['inputPropertyDistrict'],
                'PropertyBlock' => $inputs['inputPropertyBlock'],
                'PropertyFloor' => $inputs['inputPropertyFloor'],
                'PropertySide' => $inputs['inputPropertySide'],
                'PropertyBuildYear' => $inputs['inputPropertyBuildYear'],
                'PropertyPostalCode' => $inputs['inputPropertyPostalCode'],
                'PropertyAddress' => $inputs['inputPropertyAddress'],
                'PropertyUseTypeSide' => $inputs['inputPropertyUseTypeSide'],
                'CreateDatetime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_requests_property_info', $userArray);

            /* Add Request Property Owner Info*/
            $userArray = array(
                'RequestId' => $reqId,
                'OwnerNationalCode' => $inputs['inputOwnerNationalCode'],
                'OwnerName' => $inputs['inputOwnerName'],
                'OwnerBankRelation' => $inputs['inputOwnerBankRelation'],
                'OwnerCompanyType' => $inputs['inputOwnerCompanyType'],
                'OwnerTypeDependentPerson' => $inputs['inputOwnerTypeDependentPerson'],
                'OwnerOwnershipPercentage' => $inputs['inputOwnerOwnershipPercentage'],
                'CreateDatetime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_requests_property_owner_info', $userArray);

            $userArray = array(
                'RequestId' => $reqId,
                'FinalPropertyPercentageOwnership' => $inputs['inputFinalPropertyPercentageOwnership'],
                'FinalPropertyAcquire' => $inputs['inputFinalPropertyAcquire'],
                'FinalPropertyType' => $inputs['inputFinalPropertyType'],
                'FinalPropertyBuyDate' => $inputs['inputFinalPropertyBuyDate'],
                'FinalPropertySurplus' => $inputs['inputFinalPropertySurplus'],
                'FinalPropertyExcluded' => $inputs['inputFinalPropertyExcluded'],
                'FinalPropertyExcludeReason' => $inputs['inputFinalPropertyExcludeReason'],
                'FinalPropertyUnopposed' => $inputs['inputFinalPropertyUnopposed'],
                'FinalPropertyHasLegal' => $inputs['inputFinalPropertyHasLegal'],
                'FinalPropertyOrderDate' => $inputs['inputFinalPropertyOrderDate'],
                'FinalPropertyVote' => $inputs['inputFinalPropertyVote'],
                'FinalPropertyWithdrawBenefit' => $inputs['inputFinalPropertyWithdrawBenefit'],
                'FinalPropertyDocFinalStatus' => $inputs['inputFinalPropertyDocFinalStatus'],
                'FinalPropertySummary' => $inputs['inputFinalPropertySummary'],
                'FinalPropertyValue' => $inputs['inputFinalPropertyValue'],
                'FinalPropertyValueCheck' => $inputs['inputFinalPropertyValueCheck'],
                'FinalPropertyCheckValue' => $inputs['inputFinalPropertyCheckValue'],
                'FinalPropertySurvey' => $inputs['inputFinalPropertySurvey'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_property_central_bank_result', $userArray);

            return $this->config->item('DBMessages')['SuccessAction'];
        }

        if($status == 'CENTRALBANK') {
            $person = getPersonInfoById($inputs['inputCreatePersonId']);
            sendSMS($this->config->item('SMSTemplate')['bpms-add-order'], $person['PersonPhone'], array($reqId));
        }

        return $this->config->item('DBMessages')['ErrorAction'];



    }
    public function doEdit($inputs){

        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->where(array('ReqId !=' => $inputs['inputReqId']));
        $this->db->where(array('ReqTitle' => $inputs['inputTitle']));
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            return $this->config->item('DBMessages')['DuplicateInfo'];
        } else {

            if(isset($_GET['draft']) && $_GET['draft']){
                $status = 'DRAFT';
            }
            else {
                $status = 'CENTRALBANK';
            }

            $userArray = array(
                'ReqPersonId' => $inputs['inputCreatePersonId'],
                'ReqTitle' => $inputs['inputTitle'],
                'ReqDescription' => $inputs['inputDescription'],
                'ReqType' => $inputs['inputReqType'],
                'ReqAgentNationalCode' => $inputs['inputAgentNationalCode'],
                'ReqMarketMakerNationalCode' => $inputs['inputMarketMakerNationalCode'],
                'ReqPrice' => $inputs['inputPrice'],
                'ReqStatus' => $status,
                'ModifyDateTime' => time(),
                'ModifyPersonId' => $inputs['inputModifyPersonId']
            );
            $this->db->where('ReqId', $inputs['inputReqId']);
            $this->db->update('person_requests', $userArray);

            $this->db->delete('person_requests_attachments', array(
                'AttachReqId' => $inputs['inputReqId']
            ));

            foreach ($inputs['inputAttachments'] as $inputAttachment) {
                if ($inputAttachment['src'] != "") {
                    $userArray = array(
                        'AttachReqId' => $inputs['inputReqId'],
                        'AttachUrl' => $inputAttachment['src'],
                        'AttachTitle' => $inputAttachment['name'],
                        'AttachType' => $inputAttachment['type'],
                        'CreateDatetime' => time(),
                        'CreatePersonId' => $inputs['inputCreatePersonId']
                    );
                    $this->db->insert('person_requests_attachments', $userArray);
                }
            }


            /* Add Request Property Info*/
            $this->db->delete('person_requests_property_info', array(
                'RequestId' => $inputs['inputReqId']
            ));
            $userArray = array(
                'RequestId' => $inputs['inputReqId'],
                'PropertyID' => $inputs['inputPropertyID'],
                'PropertyRegisterDate' => $inputs['inputPropertyRegisterDate'],
                'PropertyType' => $inputs['inputPropertyType'],
                'PropertySpecialStatus' => $inputs['inputPropertySpecialStatus'],
                'PropertyUseType' => $inputs['inputPropertyUseType'],
                'PropertyDocType' => $inputs['inputPropertyDocType'],
                'PropertyUseReason' => $inputs['inputPropertyUseReason'],
                'PropertyUUID' => $inputs['inputPropertyUUID'],
                'PropertyPassword' => $inputs['inputPropertyPassword'],
                'PropertyAreaSupply' => $inputs['inputPropertyAreaSupply'],
                'PropertyAreaNobility' => $inputs['inputPropertyAreaNobility'],
                'PropertyRegistrationPlate' => $inputs['inputPropertyRegistrationPlate'],
                'PropertySeparate' => $inputs['inputPropertySeparate'],
                'PropertyPiece' => $inputs['inputPropertyPiece'],
                'PropertyRegistrationDepartment' => $inputs['inputPropertyRegistrationDepartment'],
                'PropertyDistrict' => $inputs['inputPropertyDistrict'],
                'PropertyBlock' => $inputs['inputPropertyBlock'],
                'PropertyFloor' => $inputs['inputPropertyFloor'],
                'PropertySide' => $inputs['inputPropertySide'],
                'PropertyBuildYear' => $inputs['inputPropertyBuildYear'],
                'PropertyPostalCode' => $inputs['inputPropertyPostalCode'],
                'PropertyAddress' => $inputs['inputPropertyAddress'],
                'PropertyUseTypeSide' => $inputs['inputPropertyUseTypeSide'],
                'CreateDatetime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_requests_property_info', $userArray);

            /*  */
            $this->db->delete('person_requests_property_owner_info', array(
                'RequestId' => $inputs['inputReqId']
            ));
            $userArray = array(
                'RequestId' => $inputs['inputReqId'],
                'OwnerNationalCode' => $inputs['inputOwnerNationalCode'],
                'OwnerName' => $inputs['inputOwnerName'],
                'OwnerBankRelation' => $inputs['inputOwnerBankRelation'],
                'OwnerCompanyType' => $inputs['inputOwnerCompanyType'],
                'OwnerTypeDependentPerson' => $inputs['inputOwnerTypeDependentPerson'],
                'OwnerOwnershipPercentage' => $inputs['inputOwnerOwnershipPercentage'],
                'CreateDatetime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_requests_property_owner_info', $userArray);



            $this->db->delete('person_requests_property_central_bank_result', array(
                'RequestId' => $inputs['inputReqId']
            ));
            $userArray = array(
                'RequestId' => $inputs['inputReqId'],
                'FinalPropertyPercentageOwnership' => $inputs['inputFinalPropertyPercentageOwnership'],
                'FinalPropertyAcquire' => $inputs['inputFinalPropertyAcquire'],
                'FinalPropertyType' => $inputs['inputFinalPropertyType'],
                'FinalPropertyBuyDate' => $inputs['inputFinalPropertyBuyDate'],
                'FinalPropertySurplus' => $inputs['inputFinalPropertySurplus'],
                'FinalPropertyExcluded' => $inputs['inputFinalPropertyExcluded'],
                'FinalPropertyExcludeReason' => $inputs['inputFinalPropertyExcludeReason'],
                'FinalPropertyUnopposed' => $inputs['inputFinalPropertyUnopposed'],
                'FinalPropertyHasLegal' => $inputs['inputFinalPropertyHasLegal'],
                'FinalPropertyOrderDate' => $inputs['inputFinalPropertyOrderDate'],
                'FinalPropertyVote' => $inputs['inputFinalPropertyVote'],
                'FinalPropertyWithdrawBenefit' => $inputs['inputFinalPropertyWithdrawBenefit'],
                'FinalPropertyDocFinalStatus' => $inputs['inputFinalPropertyDocFinalStatus'],
                'FinalPropertySummary' => $inputs['inputFinalPropertySummary'],
                'FinalPropertyValue' => $inputs['inputFinalPropertyValue'],
                'FinalPropertyValueCheck' => $inputs['inputFinalPropertyValueCheck'],
                'FinalPropertyCheckValue' => $inputs['inputFinalPropertyCheckValue'],
                'FinalPropertySurvey' => $inputs['inputFinalPropertySurvey'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_property_central_bank_result', $userArray);

        }


        if($status == 'CENTRALBANK') {
            $person = getPersonInfoById($inputs['inputModifyPersonId']);
            sendSMS($this->config->item('SMSTemplate')['bpms-add-order'], $person['PersonPhone'], array($inputs['inputReqId']));
        }

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditCentralBank($inputs){

        $request = $this->getById($inputs['inputReqId'])[0];

        if( $request['ReqStatus'] != 'CENTRALBANK'){
            $msg = $this->config->item('DBMessages')['ErrorAction'];
            $msg['content'] = 'درخواست در وضعیت بررسی بانک مرکزی قرار ندارد.';
            return $msg;
        }

        $status = "LEGAL";
        if ($inputs['inputResult'] == "0") {
            $status = "DRAFT";
        }
        if ($inputs['inputResult'] == "1") {
            $status = "CENTRALBANKACCEPT";
        }
        $userArray = array(
            'ReqStatus' => $status
        );


        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);
        if ($inputs['inputResult'] == "1") {
            /*$userArray = array(
                'RequestId' => $inputs['inputReqId'],
                'FinalPropertyPercentageOwnership' => $inputs['inputFinalPropertyPercentageOwnership'],
                'FinalPropertyAcquire' => $inputs['inputFinalPropertyAcquire'],
                'FinalPropertyType' => $inputs['inputFinalPropertyType'],
                'FinalPropertyBuyDate' => $inputs['inputFinalPropertyBuyDate'],
                'FinalPropertySurplus' => $inputs['inputFinalPropertySurplus'],
                'FinalPropertyExcluded' => $inputs['inputFinalPropertyExcluded'],
                'FinalPropertyExcludeReason' => $inputs['inputFinalPropertyExcludeReason'],
                'FinalPropertyUnopposed' => $inputs['inputFinalPropertyUnopposed'],
                'FinalPropertyHasLegal' => $inputs['inputFinalPropertyHasLegal'],
                'FinalPropertyOrderDate' => $inputs['inputFinalPropertyOrderDate'],
                'FinalPropertyVote' => $inputs['inputFinalPropertyVote'],
                'FinalPropertyWithdrawBenefit' => $inputs['inputFinalPropertyWithdrawBenefit'],
                'FinalPropertyDocFinalStatus' => $inputs['inputFinalPropertyDocFinalStatus'],
                'FinalPropertySummary' => $inputs['inputFinalPropertySummary'],
                'FinalPropertyValue' => $inputs['inputFinalPropertyValue'],
                'FinalPropertyValueCheck' => $inputs['inputFinalPropertyValueCheck'],
                'FinalPropertyCheckValue' => $inputs['inputFinalPropertyCheckValue'],
                'FinalPropertySurvey' => $inputs['inputFinalPropertySurvey'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_property_central_bank_result', $userArray);*/
        }
        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'CENTRALBANK',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        $person = getPersonInfoById($request['ReqPersonId']);
        sendSMS($this->config->item('SMSTemplate')['bpms-change-order'], $person['PersonPhone'], array($inputs['inputReqId'] , pipeEnum('REQ_STATUS', $status , null,true) ) );

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditLegal($inputs){
        $request = $this->getById($inputs['inputReqId'])[0];

        $status = "LEGAL";
        if ($inputs['inputResult'] == "0") {
            $status = "CENTRALBANK";
        }
        if ($inputs['inputResult'] == "1") {
            $status = "ECONOMIC";
        }
        $userArray = array(
            'ReqStatus' => $status
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'LEGAL',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        $person = getPersonInfoById($request['ReqPersonId']);
        sendSMS($this->config->item('SMSTemplate')['bpms-change-order'], $person['PersonPhone'], array($inputs['inputReqId'] , pipeEnum('REQ_STATUS', $status , null,true) ) );
        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditEconimic($inputs)
    {
        $request = $this->getById($inputs['inputReqId'])[0];

        $status = "LEGAL";
        if ($inputs['inputResult'] == "0") {
            $status = "LEGAL";
        }
        if ($inputs['inputResult'] == "1") {
            $status = "FINAL_ACCEPT";
        }
        $userArray = array(
            'ReqStatus' => $status
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'ECONOMIC',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        $person = getPersonInfoById($request['ReqPersonId']);
        sendSMS($this->config->item('SMSTemplate')['bpms-change-order'], $person['PersonPhone'], array($inputs['inputReqId'] , pipeEnum('REQ_STATUS', $status , null,true) ) );

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditFinal($inputs){
        $request = $this->getById($inputs['inputReqId'])[0];

        $userArray = array(
            'ReqStatus' => $inputs['inputResult']
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'FINAL_ACCEPT',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        $person = getPersonInfoById($request['ReqPersonId']);
        sendSMS($this->config->item('SMSTemplate')['bpms-change-order'], $person['PersonPhone'], array($inputs['inputReqId'] , pipeEnum('REQ_STATUS', $inputs['inputResult'] , null,true) ) );
        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function getCommentsById($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_comments');
        $this->db->where('CommentReqId', $id);
        $this->db->order_by('RowId', 'ASC');
        return $this->db->get()->result_array();
    }

}

?>
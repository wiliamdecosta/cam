<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class invoice_controller
* @version 07/05/2015 12:18:00
*/
class Invoice_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','bill_prd, account_name');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('invoice/invoice');
            $table = $ci->invoice;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'] = array();

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            $filtesToolbarArr = json_decode($filterToolbar, true);
            if(count($filtesToolbarArr['rules']) > 0){
                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
            }


            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function readLog() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','id');
        $sord = getVarClean('sord','str','desc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('invoice/invoice');
            $table = $ci->invoice;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table
            $req_param['where'][] =' 1=1 ';
            // Filter Table
            $req_param['where'][] .=  "userid = '".getUserName()."' " ;

            // set table 
            $table->setModelLogInvoice();

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            $filtesToolbarArr = json_decode($filterToolbar, true);
            if(count($filtesToolbarArr['rules']) > 0){
                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
            }


            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
    
    function readDataParameter() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','name');
        $sord = getVarClean('sord','str','asc');
        $param_name = getVarClean('param_name','str','');
        $isHeader = getVarClean('isHeader','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('invoice/parameter');
            $table = $ci->parameter;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );
            
            // init filter
            $req_param['where'][] =' 1=1 ';
            // Filter Table
            if(!$isHeader){
                $sidx = 'param_id';
                $table->setSelect();
                $req_param['where'][] .=  "name = '".$param_name."' " ;
            }

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            $filtesToolbarArr = json_decode($filterToolbar, true);
            if(count($filtesToolbarArr['rules']) > 0){
                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
                //die($whereSql);
            }

            //var_dump($filtesToolbarArr['rules']);
            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

     function readDataRBill() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','customer_ref');
        $sord = getVarClean('sord','str','asc');
        $param_name = getVarClean('param_name','str','');
        $isHeader = getVarClean('isHeader','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('report/r_detail_tagihan');
            $table = $ci->r_detail_tagihan;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );
            
            // init filter
            $req_param['where'][] =' 1=1 ';

            // set filter default 
            $req_param['where'][] =" product_group not in ('PPN') and bill_unbill_status = 'UNBILL' ";

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            $filtesToolbarArr = json_decode($filterToolbar, true);
            if(count($filtesToolbarArr['rules']) > 0){
                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
            }

            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }


    function readDataBilling() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','ord');
        $sord = getVarClean('sord','str','asc');
        $accountNum = getVarClean('accountNum','str','');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('invoice/billing');
            $table = $ci->billing;

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );
            
            // init filter
            $req_param['where'][] =' 1=1 ';
            // Filter Table
            //$req_param['where'] = array( "account_num = '".$accountNum."'"  );
            $table->setSelectBilling($accountNum, $periode);

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            if(!empty($filterToolbar)){
                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
            }


            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
   

    function crud() {

        $data = array();
        $oper = getVarClean('oper', 'str', '');
        switch ($oper) {
            case 'add' :
                permission_check('can-pooling-invoice');
                $data = $this->create();
            break;

            case 'edit' :
                permission_check('can-edit-invoice');
                $data = $this->update();
            break;

            case 'del' :
                permission_check('can-delete-invoice');
                $data = $this->destroy();
            break;

            default :
                permission_check('can-view-invoice');
                $data = $this->read();
            break;
        }

        return $data;
    }


    function create() {

        $ci = & get_instance();
        $ci->load->model('invoice/invoice');
        $table = $ci->invoice;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $jsonItems = getVarClean('items', 'str', '');
        $items = jsonDecode($jsonItems);

        /*$items = array();
        foreach ($items as $key => $value) {
            $items['id'] = $table->getIdPooling;
            $items['id'] = $table->getIdPooling;

        }
*/

        if (!is_array($items)){
            $data['message'] = 'Invalid items parameter';
            return $data;
        }

        $table->actionType = 'CREATE';
        $errors = array();

        if (isset($items[0])){
            $numItems = count($items);
           
            for($i=0; $i < $numItems; $i++){
                try{
                    $idPooling = $table->getIdPooling();
                    $items[$i]['id'] = $idPooling;
                    $items[$i]['userid'] = $table->userSession;
                    
                    //save data 
                    $table->saveDataPooling($items[$i]);
                    $table->startPooling($idPooling);
                   
                }catch(Exception $e){
                    $errors[] = $e->getMessage();
                }
            }

            /*try{
                $table->startPooling($idPooling);
            }catch(Exception $e){
                $errors[] = $e->getMessage();
            }*/

            $numErrors = count($errors);
            if ($numErrors > 0){
                $data['message'] = $numErrors." from ".$numItems." record(s) failed to be saved.<br/><br/><b>System Response:</b><br/>- ".implode("<br/>- ", $errors)."";
            }else{
                $data['success'] = true;
                $data['message'] = 'Data added successfully';
            }
            $data['rows'] =$items;
        }
        return $data;

    }

    function update() {

        $ci = & get_instance();
        $ci->load->model('invoice/invoice');
        $table = $ci->invoice;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $jsonItems = getVarClean('items', 'str', '');
        $items = jsonDecode($jsonItems);

        if (!is_array($items)){
            $data['message'] = 'Invalid items parameter';
            return $data;
        }

        $table->actionType = 'UPDATE';

        if (isset($items[0])){
            $errors = array();
            $numItems = count($items);
            for($i=0; $i < $numItems; $i++){
                try{
                    $table->db->trans_begin(); //Begin Trans

                        $table->setRecord($items[$i]);
                        $table->update();

                    $table->db->trans_commit(); //Commit Trans

                    $items[$i] = $table->get($items[$i][$table->pkey]);
                }catch(Exception $e){
                    $table->db->trans_rollback(); //Rollback Trans

                    $errors[] = $e->getMessage();
                }
            }

            $numErrors = count($errors);
            if ($numErrors > 0){
                $data['message'] = $numErrors." from ".$numItems." record(s) failed to be saved.<br/><br/><b>System Response:</b><br/>- ".implode("<br/>- ", $errors)."";
            }else{
                $data['success'] = true;
                $data['message'] = 'Data update successfully';
            }
            $data['rows'] =$items;
        }else {

            try{
                $table->db->trans_begin(); //Begin Trans

                    $table->setRecord($items);
                    $table->update();

                $table->db->trans_commit(); //Commit Trans

                $data['success'] = true;
                $data['message'] = 'Data update successfully';

                $data['rows'] = $table->get($items[$table->pkey]);
            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    function destroy() {
        $ci = & get_instance();
        $ci->load->model('invoice/invoice');
        $table = $ci->invoice;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $jsonItems = getVarClean('items', 'str', '');
        $items = jsonDecode($jsonItems);

        try{
            $table->db->trans_begin(); //Begin Trans

            $total = 0;
            if (is_array($items)){
                foreach ($items as $key => $value){
                    if (empty($value)) throw new Exception('Empty parameter');

                    $table->remove($value);
                    $data['rows'][] = array($table->pkey => $value);
                    $total++;
                }
            }else{
                $items = (int) $items;
                if (empty($items)){
                    throw new Exception('Empty parameter');
                };
                // print_r($items);exit;
                $table->remove_foreign_primary($items);
                // $table->remove($items);
                $data['rows'][] = array($table->pkey => $items);
                $data['total'] = $total = 1;
            }

            $data['success'] = true;
            $data['message'] = $total.' Data deleted successfully';

            $table->db->trans_commit(); //Commit Trans

        }catch (Exception $e) {
            $table->db->trans_rollback(); //Rollback Trans
            $data['message'] = $e->getMessage();
            $data['rows'] = array();
            $data['total'] = 0;
        }
        return $data;
    }

    function uploadSigner() {

        $ci = & get_instance();
        $ci->load->model('invoice/parameter');
        $table = $ci->parameter;

        $name = getVarClean('name', 'str', '');
        $position = getVarClean('position', 'str', '');

        $data = array('success' => false, 'message' => '');

        try{

            $config['upload_path'] = './application/third_party/uploads/invoice_signer/';
            $config['allowed_types'] = 'jpg|JPG|JPEG';
            $config['max_size'] = '10000000';
            $config['overwrite'] = TRUE;
            $config['file_name'] = str_replace(' ','_',$name)."_signer_";//.date('Ymd h:i:s');

            $ci->load->library('upload');
            $ci->upload->initialize($config);

            if (!$ci->upload->do_upload("file_upload")) {
                throw new Exception( $ci->upload->display_errors() );
            }else{
                $filedata = $ci->upload->data();
            }
             
                $data['param_id'] = $table->getIdParam();
                $data['value'] = $name.'|'.$position.'|'.$config['file_name'];
                $data['name'] = 'SIGNER';
                
                $table->saveDataParam($data);

            //$table->db->insert( $table->table, $rec );
            /*foreach($datainsert as $rec) {
                $table->db->insert( $table->table, $rec );
            }
*/
            //$table->insertPeriodeExpense($batch_id);
            // update batch id di sc_schema 

            $data['message'] = 'Upload data success';
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function UpdDataInv() {

        $ci = & get_instance();
        $ci->load->model('invoice/invoice');
        $table = $ci->invoice;

        $signer = getVarClean('signer', 'str', '');
        $up = getVarClean('up', 'str', '');
        $perihal = getVarClean('perihal', 'str', '');
        $bank = getVarClean('bank', 'str', '');
        $account_num = getVarClean('account_num', 'str', '');
        $periode = getVarClean('periode', 'str', '');
        $invoice_date = getVarClean('inv_date', 'str', '');
        $contract_no = getVarClean('contract_no', 'str', '');
        $contract_date = getVarClean('contract_date', 'str', '');

        $data = array('success' => false, 'message' => '');

        try{
                $data['account_num'] = $account_num;
                $data['periode'] = $periode;
                $data['signer'] = $signer;
                $data['up'] = $up;
                $data['perihal'] = $perihal;
                $data['bank'] = $bank;
                $data['invoice_date'] = $invoice_date;
                $data['contract_no'] = $contract_no;
                $data['contract_date'] = $contract_date;
                
                $table->UpdDataInv($data);

            $data['message'] = 'Updated';
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    
    function getDataParam(){
        $ci = & get_instance();
        $ci->load->model('invoice/invoice');
        $table = $ci->sin;

        //$id = $table->getNextId();
        $inv_num = getVarClean('invoice_num', 'str', '');

        $userinfo = $ci->ion_auth->user()->row();
        $data = array('success' => false, 'message' => '');

        try{
            
            $item = $table->getDataParam($inv_num);
                
            $data['item'] = $item;
            $data['message'] = 'OK';
            $data['success'] = true;

        }catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;

    }

    function readLovInvoice() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','invoice_num');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            //permission_check('view-customer');

            $ci = & get_instance();
            $ci->load->model('lov/invoice_info');
            $table = $ci->invoice_info;

            //Set default criteria. You can override this if you want
            foreach ($table->fields as $key => $field){
                if (!empty($$key)){ // <-- Perhatikan simbol $$
                    if ($field['type'] == 'str'){
                        $table->setCriteria($table->getAlias().$key.$table->likeOperator." '".$$key."' ");
                    }else{
                        $table->setCriteria($table->getAlias().$key." = ".$$key);
                    }
                }
            }

            if(!empty($searchPhrase)) {
                $table->setCriteria("(upper(invoice_num) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(account_num) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
            }

            $start = ($start-1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
}

/* End of file Groups_controller.php */
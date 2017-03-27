<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Detailaccount_controller {

	function read_detail_acc() {

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getDetailAccount($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function read_billing() {

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getBilling($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function read_add_info() {
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','business_share');
        $sord = getVarClean('sord','str','desc');

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('account/additional_information');
            $table = new Additional_information($account_num);

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

    function read_suspension() {
        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','effective_dtm');
        $sord = getVarClean('sord','str','desc');

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('account/suspension');
            $table = new Suspension($account_num);

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

    function read_service_address() {

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getServiceAddress($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function read_finance() {

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getFinance($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }
   
}
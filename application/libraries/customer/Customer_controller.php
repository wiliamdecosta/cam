<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Customer_controller {

    function getComboIC(){
        $user = getUserName();
        $invoicing_co_id = getVarClean('invoicing_co_id','str', '0');
        $invoicing_co_id = getVarClean('invoicing_co_id','str', '0');
        echo  buatcombo2($nama = 'in_CustomerType',
                        $id= 'in_CustomerType',
                        $table= "table(pack_lov.get_invoicingcompany_list('".$user."', '".$invoicing_co_id."'))",
                        $field= 's21',
                        $pk = 'n01',
                        $kondisi = array(),
                        $required ='Y',
                        $default = '' );
        exit;
    }

    function getComboMS(){
        $user = getUserName();

        $invoicing_co_id = getVarClean('invoicing_co_id','str', '0');
        $market_segment_id = getVarClean('market_segment_id','int',0);

        if(empty($market_segment_id)) {


            echo  buatcombo2($nama = 'in_MarketSegment',
                            $id= 'in_MarketSegment',
                            $table= "(select  n01 as market_segment_id ,
                                          s01 as market_segment_name
                                       from table(pack_lov.get_marketsegment_list('".$user."', '".$invoicing_co_id."', '')))",
                            $field= 'market_segment_name',
                            $pk = 'market_segment_id',
                            $kondisi = array(),
                            $required ='Y',
                            $default = '- Pilih Market Segment -' );
        }else {
            echo  buatcombo3($nama = 'in_MarketSegment',
                            $id= 'in_MarketSegment',
                            $table= "(select  n01 as market_segment_id ,
                                          s01 as market_segment_name
                                       from table(pack_lov.get_marketsegment_list('".$user."', '".$invoicing_co_id."', '')))",
                            $field= 'market_segment_name',
                            $pk = 'market_segment_id',
                            $kondisi = array(),
                            $required ='Y',
                            $emptyText = '- Pilih Market Segment -',
                            $default = $market_segment_id );
        }
        exit;
    }

    function getComboCustomerType() {
        $user = getUserName();
        $customer_type_id = getVarClean('customer_type_id','str','');

        echo  buatcombo3($nama = 'in_CustomerType',
                            $id= 'in_CustomerType',
                            $table= "(select  n01 as customer_type_id ,
                                      s01 as customer_type_name,
                                      s21 as customer_type_desc
                                   from table(pack_lov.get_customertype_list('user_name', '')))",
                            $field= 'customer_type_name',
                            $pk = 'customer_type_id',
                            $kondisi = array(),
                            $required ='Y',
                            $emptyText = '- Pilih Customer Type -',
                            $default = $customer_type_id );

        exit;
    }

    function getComboContactType() {
        $user = getUserName();
        $contact_type_id = getVarClean('contact_type_id','str','');

        echo  buatcombo4($nama = 'in_ContactType',
                            $id= 'in_ContactType',
                            $table= "gparams",
                            $field= 'name',
                            $pk = 'rfid',
                            $kondisi = array('rfen' => 'CONTACTTYPE'),
                            $required ='Y',
                            $emptyText = '- Pilih Contact Type -',
                            $default = $contact_type_id );

        exit;
    }

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','ct.customer_ref');
        $sord = getVarClean('sord','str','asc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('customer/customer');
            $table = $ci->customer;

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

    function readLovParentCust() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','address_name');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            permission_check('view-customer');

            $ci = & get_instance();
            $ci->load->model('lov/customer');
            $table = $ci->customer;
            $table->setCriteria("parent_customer_ref is null ");


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
                $table->setCriteria("(upper(customer_ref) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(first_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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

    function readLov() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','address_name');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            permission_check('view-customer');

            $ci = & get_instance();
            $ci->load->model('lov/customer');
            $table = $ci->customer;

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
                $table->setCriteria("(upper(customer_ref) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(first_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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

    function crud() {

        $data = array();
        $oper = getVarClean('oper', 'str', '');
        switch ($oper) {
            case 'add' :
                permission_check('add-customer');
                $data = $this->create();
            break;

            case 'edit' :
                permission_check('edit-customer');
                $data = $this->update();
            break;

            case 'del' :
                permission_check('delete-customer');
                $data = $this->destroy();
            break;

            default :
                permission_check('view-customer');
                $data = $this->read();
            break;
        }

        return $data;
    }


    function create() {

        $ci = & get_instance();
        $ci->load->model('customer/customer');
        $table = $ci->customer;

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        $jsonItems = getVarClean('items', 'str', '');
        $items = jsonDecode($jsonItems);

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

                    $table->db->trans_begin(); //Begin Trans

                        $table->setRecord($items[$i]);
                        $table->create();

                    $table->db->trans_commit(); //Commit Trans

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
                $data['message'] = 'Data added successfully';
            }
            $data['rows'] =$items;
        }else {

            try{
                $table->db->trans_begin(); //Begin Trans

                    $table->setRecord($items);
                    $table->create();

                $table->db->trans_commit(); //Commit Trans

                $data['success'] = true;
                $data['message'] = 'Data added successfully';

            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    function update() {

        $ci = & get_instance();
        $ci->load->model('customer/customer');
        $table = $ci->customer;

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
        $ci->load->model('customer/customer');
        $table = $ci->customer;

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
}

/* End of file Groups_controller.php */
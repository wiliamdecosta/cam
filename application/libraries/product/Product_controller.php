<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Product_controller {
 
 function crud() {

        $data = array();
        $oper = getVarClean('oper', 'str', '');
        switch ($oper) {
            case 'add' :
                permission_check('add-product');
                $data = $this->create();
            break;

            case 'edit' :
                permission_check('edit-product');
                $data = $this->update();
            break;

            case 'del' :
                permission_check('delete-product');
                $data = $this->destroy();
            break;

            default :
                permission_check('view-product');
                $data = $this->read();
            break;
        }

        return $data;
    }

     function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','account_num');
        $sord = getVarClean('sord','str','asc');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('product/product');
            $table = $ci->product;

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

    function readLovProduct() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','product_id');
        $dir  = getVarClean('dir','str','asc');
        $parent_product_id = getVarClean('parent_product_id', 'int', null);

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/product');
            //$table = $ci->product;
            $table = new Product($parent_product_id); //kalau ada param

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
                $table->setCriteria("(upper(product_name) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(product_desc) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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

    function readLovParentProduct() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','product_id');
        $dir  = getVarClean('dir','str','asc');
        $account_num = getVarClean('account_num', 'str', '');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/parent_product');
            //$table = $ci->parent_product;
            $table = new Parent_product($account_num); //kalau ada param

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
                $table->setCriteria("(upper(product_name) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(product_desc) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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

    function readLovCountry() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','country_id');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/country');
            $table = $ci->country;
            //$table = new Account($customer_ref); //kalau ada param

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
                $table->setCriteria("(upper(country_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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

    function readLovBm() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','area_code');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/bm');
            $table = $ci->bm;
            //$table = new Account($customer_ref); //kalau ada param

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
                $table->setCriteria("(upper(area_code) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(area_name) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(fm_code) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(fm_name) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(bm_code) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                    OR upper(bm_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
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


    function readLovPrice() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','tariff_name');
        $dir  = getVarClean('dir','str','asc');
        $account_num = getVarClean('account_num', 'str', '');
        $product_id = getVarClean('product_id', 'str', '');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/Price_plan');
            //$table = $ci->customer;
            $table = new Price_plan($account_num,$product_id); //kalau ada param

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
                $table->setCriteria("(upper(tariff_name) ".$table->likeOperator." upper('%".$searchPhrase."%') 
                                        OR upper(tariff_desc) ".$table->likeOperator." upper('%".$searchPhrase."%')
                                      )");
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

    function readLovAnddress()
    {

        $start = getVarClean('current', 'int', 0);
        $limit = getVarClean('rowCount', 'int', 5);

        $sort = getVarClean('sort', 'str', 'address_1');
        $dir = getVarClean('dir', 'str', 'asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');
        $customer_ref = getVarClean('customer_ref', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            permission_check('view-account');

            $ci = &get_instance();
            $ci->load->model('lov/address');
            $table = new Address($customer_ref);
            // $table = $ci->account;

            //Set default criteria. You can override this if you want
            foreach ($table->fields as $key => $field) {
                if (!empty($$key)) { // <-- Perhatikan simbol $$
                    if ($field['type'] == 'str') {
                        $table->setCriteria($table->getAlias() . $key . $table->likeOperator . " '" . $$key . "' ");
                    } else {
                        $table->setCriteria($table->getAlias() . $key . " = " . $$key);
                    }
                }
            }

            if (!empty($searchPhrase)) {
                $table->setCriteria("(  upper(address_1) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(address_2) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(address_3) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(address_4) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(address_5) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(zipcode) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(country_name) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(customer_ref) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                         OR upper(address_seq) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                    )");
            }

//            $table->setCriteria("b.account_status = 'OK'");
            // $table->setCriteria("c.billing_contact_seq = e.contact_seq");
            // $table->setCriteria("e.address_seq = f.address_seq");
            // $table->setCriteria("c.end_dat is null");
            // $table->setCriteria("e.end_dat is null");
            //$table->setCriteria("(a.account_num like '90%' or a.account_num like '80%')");

            // if (!empty($customer_ref)) {
            //     $table->setCriteria("a.customer_ref = '" . $customer_ref . "'");
            // }

            $start = ($start - 1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();
            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;
            //$data['message'] = $items->address_4;

        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
   
}

/* End of file Groups_controller.php */
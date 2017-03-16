<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Product_controller {

    function readLovProduct() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','product_id');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('lov/product');
            $table = $ci->product;
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
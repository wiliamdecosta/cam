<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Generate_sap_unbill_controller {

    function read()
    {

        $page = getVarClean('page', 'int', 1);
        $limit = getVarClean('rows', 'int', 5);
        $sidx = getVarClean('sidx', 'str', 'batch_control_id');
        $sord = getVarClean('sord', 'str', 'asc');

        


        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');
        //$customer_ref = getVarClean('customer_ref', 'str', '');

        try {

            $ci = &get_instance();
            $ci->load->model('invoice/generate_sap_unbill');
            $table = $ci->generate_sap_unbill;
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

            

            // if (!empty($customer_ref)) {
            //     $req_param['where'][] = "a.customer_ref = '" . $customer_ref . "'";
            // }

            // filterToolbar Search 
            $filterToolbar = getVarClean('filters', 'str', '');
            if(!empty($filterToolbar)){

                $whereSql = filterToolbarJqgrid($filterToolbar, 'true');
                $req_param['where'][] .= $whereSql;
                /*{"groupOp":"AND","rules":[{"field":"account_name","op":"cn","data":"ACC"}]}
                $searchSql = "";
                $opS = $filterToolbar['groupOp'];
                foreach ($filterToolbar['rules'] as $key => $value) {
                    $searchSql .= $value['field']." = '".$value['']."'";
                }
                $req_param['where'][] .= $searchSql; //"a.customer_ref = '" . $customer_ref . "'";*/
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

        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

   //simpan dicontroller
function submit_sap() {

        $i_nper = getVarClean('i_nper', 'str', '');
        $i_desc = getVarClean('i_desc', 'int', 0);

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('invoice/generate_sap_unbill');
            $table = $ci->generate_sap_unbill;
            
            $items = $table->generateSapUnbill($i_nper, $i_desc);

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

/* End of file Groups_controller.php */
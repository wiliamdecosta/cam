<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class R_detail_tagihan_controller
* @version 07/05/2015 12:18:00
*/
class R_detail_tagihan_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','customer_ref');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance(); 
            $ci->load->model('report/r_detail_tagihan');
            //$table = $ci->r_bil_complete_area;
             //$periode='201712';;
            $table = new r_detail_tagihan($periode);

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

    function excel()
    {
        $sidx = getVarClean('sidx', 'str', 'customer_ref');
        $sord = getVarClean('sord', 'str', 'asc');
        $periode = getVarClean('periode','str','');

        try {

            $ci = &get_instance();
           $ci->load->model('report/r_detail_tagihan');
            $table = new r_detail_tagihan($periode);

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => getVarClean('_search'),
                "search_field" => getVarClean('searchField'),
                "search_operator" => getVarClean('searchOper'),
                "search_str" => getVarClean('searchString')
            );

            

            $table->setJQGridParam($req_param);
            $items = $table->getAll();

            startExcel(date("dmy") . '_R_DETAIL_TAGIHAN.xls');
            echo '<html>';
            echo '<head><title>Detail Tagihan</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Customer Ref</th>';
            echo '<th>Account Num</th>';
            echo '<th>Account Name</th>';
            echo '<th>Invoice Num</th>';
            echo '<th>NPWP</th>';
            echo '<th>Revenue Code id</th>';
            echo '<th>Product Group</th>';
            echo '<th>Product Name</th>';
            echo '<th>Product Label</th>';
            echo '<th>Prod Period</th>';
            echo '<th>Gl Account</th>'; 
            echo '<th>Curr Type</th>';
            echo '<th>Bill Mny</th>';
            echo '<th>Installation</th>';
            echo '<th>Abonemen</th>';
            echo '<th>Charge Start Dat</th>';
            echo '<th>Cust Order Num</th>';//-------
            echo '<th>Product Id</th>';
            echo '<th>Product Seq</th>';
            echo '<th>Sap Code Bill</th>';
            echo '<th>Sap Code Unbill</th>';
            echo '</tr>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['customer_ref'] . '</td>';
                echo '<td>' . $item['account_num']. '</td>';
                echo '<td>' . $item['account_name'] . '</td>';
                echo '<td>' . $item['invoice_num'] . '</td>';
                echo '<td>' . $item['npwp'] . '</td>';
                echo '<td>' . $item['revenue_code_id'] . '</td>';
                echo '<td>' . $item['product_group'] . '</td>';
                echo '<td>' . $item['product_name'] . '</td>';
                echo '<td>' . $item['product_label'] . '</td>';
                echo '<td>' . $item['prod_period'] . '</td>';
                echo '<td>' . $item['gl_account'] . '</td>';
                echo '<td>' . $item['curr_type'] . '</td>';
                echo '<td>' . $item['bill_mny'] . '</td>';
                echo '<td>' . $item['installation'] . '</td>';
                echo '<td>' . $item['abonemen'] . '</td>';
                echo '<td>' . $item['charge_start_dat'] . '</td>';
                echo '<td>' . $item['cust_order_num'] . '</td>';
                echo '<td>' . $item['product_id'] . '</td>';
                echo '<td>' . $item['product_seq'] . '</td>';
                echo '<td>' . $item['sap_code_bill'] . '</td>';
                echo '<td>' . $item['sap_code_unbill'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</body>';
            echo '</html>';
            exit;

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }
}

/* End of file Groups_controller.php */
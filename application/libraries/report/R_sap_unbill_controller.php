<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class R_sap_unbill_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','journal_no');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');
        $isGenerate = getVarClean('isGenerate','str','ungenerate');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('report/r_sap_unbill');
            //$table = $ci->r_bil_complete_area;
            $table = new R_sap_unbill($periode,$isGenerate);

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
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null,
                "periode" => isset($_REQUEST['periode']) ? $_REQUEST['periode'] : null
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
        $sidx = getVarClean('sidx', 'str', 'journal_no');
        $sord = getVarClean('sord', 'str', 'asc');
        $periode = getVarClean('periode','str','');
        $isGenerate = getVarClean('isGenerate','str','ungenerate');

        try {

            $ci = &get_instance();
            $ci->load->model('report/r_sap_unbill');
            //$table = $ci->r_bil_complete_area;
            $table = new R_sap_unbill($periode,$isGenerate);
            // $table2 = new R_sap_unbill($periode,$isGenerate);

            // $req_param = array(
            //     "sort_by" => $sidx,
            //     "sord" => $sord,
            //     "limit" => null,
            //     "field" => null,
            //     "where" => null,
            //     "where_in" => null,
            //     "where_not_in" => null,
            //     "search" => getVarClean('_search'),
            //     "search_field" => getVarClean('searchField'),
            //     "search_operator" => getVarClean('searchOper'),
            //     "search_str" => getVarClean('searchString'),
            //     "periode" => getVarClean('periode')
            // );

            // Filter Table
            // $req_param['where'] = array();

            // if (!empty($periode)) {
            //     $req_param['where'][] = "periode = '" . $periode . "'";
            // }

            // $table->setJQGridParam($req_param);
            $items = $table->getAll();

            $file_name = date("dmy") . '_SAP_UNBILL.xls';

            startExcel($file_name);
            echo '<html>';
            echo '<head><title>SAP UNBILL</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Journal No</th>';
            echo '<th>Line Item</th>';
            echo '<th>Co Code</th>';
            echo '<th>Doc Type</th>';
            echo '<th>Periode</th>';
            echo '<th>Curr</th>';
            echo '<th>Reference</th>';
            echo '<th>Doc Header</th>';
            echo '<th>Doc Date</th>';
            echo '<th>Post Date</th>';
            echo '<th>Pos Key</th>';
            echo '<th>Customer GL</th>';
            echo '<th>BA</th>';
            echo '<th>Cost Center</th>';
            echo '<th>Profit Center</th>';
            echo '<th>Activity Type</th>';
            echo '<th>Assignment</th>';
            echo '<th>Text</th>';
            echo '<th>Amount Doc</th>';
            echo '<th>Amount Local</th>';
            echo '<th>Cust GL Type</th>';
            echo '<th>D_C</th>';
            echo '<th>Trade Partner</th>';
            echo '</tr>';

            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['journal_no'] . '&nbsp;</td>';
                echo '<td>' . $item['line_item'] . '</td>';
                echo '<td>' . $item['co_code'] . '&nbsp;</td>';
                echo '<td>' . $item['doc_type'] . '</td>';
                echo '<td>' . $item['period'] . '&nbsp;</td>';
                echo '<td>' . $item['curr'] . '</td>';
                echo '<td>' . $item['reference'] . '</td>';
                echo '<td>' . $item['doc_header'] . '</td>';
                echo '<td>' . $item['doc_date'] . '</td>';
                echo '<td>' . $item['post_date'] . '</td>';
                echo '<td>' . $item['pos_key'] . '</td>';
                echo '<td>' . $item['customer_gl'] . '&nbsp;</td>';
                echo '<td>' . $item['ba'] . '&nbsp;</td>';
                echo '<td>' . $item['cost_center'] . '&nbsp;</td>';
                echo '<td>' . $item['profit_center'] . '&nbsp;</td>';
                echo '<td>' . $item['activity_type'] . '&nbsp;</td>';
                echo '<td>' . $item['assignment'] . '</td>';
                echo '<td>' . $item['text'] . '</td>';
                echo '<td>' . $item['amount_doc'] . '</td>';
                echo '<td>' . $item['amount_local'] . '</td>';
                echo '<td>' . $item['cust_gl_type'] . '</td>';
                echo '<td>' . $item['d_c'] . '</td>';
                echo '<td>' . $item['trade_partner'] . '</td>';
                echo '</tr>';

               
                $table->edit_generate($file_name,$item['journal_no'],$item['line_item'],$item['customer_gl'],$item['cust_gl_type']);
                 
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

    function update() {

        $ci = & get_instance();
        $ci->load->model('report/r_sap_unbill');
        $table = $ci->menus;

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
                logging('update data menu');
                $data['rows'] = $table->get($items[$table->pkey]);
            }catch (Exception $e) {
                $table->db->trans_rollback(); //Rollback Trans

                $data['message'] = $e->getMessage();
                $data['rows'] = $items;
            }

        }
        return $data;

    }

    
}

/* End of file Groups_controller.php */
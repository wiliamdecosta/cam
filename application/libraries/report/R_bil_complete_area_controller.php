<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class R_bil_complete_area_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','area');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('report/r_bil_complete_area');
            //$table = $ci->r_bil_complete_area;
            $table = new R_bil_complete_area($periode);

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

    function excelAccountList()
    {
        $sidx = getVarClean('sidx', 'str', 'area');
        $sord = getVarClean('sord', 'str', 'asc');
        $periode = getVarClean('periode','str','');

        try {

            $ci = &get_instance();
            $ci->load->model('report/r_bil_complete_area');
            //$table = $ci->r_bil_complete_area;
            $table = new R_bil_complete_area($periode);

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
                "search_str" => getVarClean('searchString'),
                "periode" => getVarClean('periode')
            );

            // Filter Table
            $req_param['where'] = array();

            // if (!empty($periode)) {
            //     $req_param['where'][] = "periode = '" . $periode . "'";
            // }

            $table->setJQGridParam($req_param);
            $items = $table->getAll();

            startExcel(date("dmy") . '_BILLING_COMPLETE_AREA.xls');
            echo '<html>';
            echo '<head><title>Billing Complete Area</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Area</th>';
            echo '<th>FM</th>';
            echo '<th>BM</th>';
            echo '<th>Jumlah BC</th>';
            echo '</tr>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['area'] . '</td>';
                echo '<td>' . $item['fm'] . '</td>';
                echo '<td>' . $item['bm'] . '</td>';
                echo '<td>' . $item['jml_bc'] . '</td>';
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
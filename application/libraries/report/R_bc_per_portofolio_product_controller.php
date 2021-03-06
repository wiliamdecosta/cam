<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class R_bc_per_portofolio_product_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','area');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('report/r_bc_per_portofolio_product');
            //$table = $ci->r_bil_complete_area;
            $table = new R_bc_per_portofolio_product($periode);

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
        $sidx = getVarClean('sidx', 'str', 'area');
        $sord = getVarClean('sord', 'str', 'asc');
        $periode = getVarClean('periode','str','');

        try {

            $ci = &get_instance();
           $ci->load->model('report/r_bc_per_portofolio_product');
            $table = new r_bc_per_portofolio_product($periode);

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

            startExcel(date("dmy") . 'billcom_per_portofolio_product.xls');
            echo '<html>';
            echo '<head><title>Billing Completed per Protofolio Product</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Area</th>';
            echo '<th>Portofolio</th>';
            echo '<th>Jumlah BC</th>';
            echo '</tr>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['area'] . '</td>';
                echo '<td>' . $item['portofolio'] . '</td>';
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

    function tableBcPerPortofolioProduct() {
        $periode = getVarClean('periode','str','');

        $ci = & get_instance();
        $ci->load->model('report/r_bc_per_portofolio_product');

        $table = new r_bc_per_portofolio_product($periode);

        $items = $table->getAll(0,-1,'area, portofolio','asc');
        $data = array();
        $data2 = array();
        $data3 = array();
        foreach($items as $item) {
            $data[$item['area']][$item['portofolio']] = $item['jml_bc'];
            $data2[$item['area']][$item['portofolio']] = 0;
        }

        $total_all = 0;
        foreach($data as $area => $items_portofolio) {
            echo '<tr>';
            echo '<td rowspan="'.(  count($data2[$area]) ).'">'.$area.'</td>';

            $portofolio_first_loop = true;
            $total_area = 0;
            foreach($items_portofolio as $portofolio => $val) {
                if($portofolio_first_loop) {
                    echo '<td>'.$portofolio.'</td>';
                    echo '<td align="right">'.$val.'</td>';
                    echo '</tr>';
                    $portofolio_first_loop = false;
                }else {
                    echo '<tr>';
                    echo '<td>'.$portofolio.'</td>';
                    echo '<td align="right">'.$val.'</td>';
                    echo '</tr>';
                }
                /*$total_portofolio = 0;
                $total_portofolio += $val;

                echo '<tr>';
                echo '<td colspan="1" class="info"> <strong>Total '.$portofolio.'</strong></td>';
                echo '<td align="right" class="info"><strong> '.$total_portofolio.' </strong></td>';
                echo '</tr>'; */

                $total_area += $val;
               
            }

            echo '<tr>';
            echo '<td colspan="2" class="success"> <strong>Total '.$area.'</strong></td>';
            echo '<td align="right" class="success"><strong> '.$total_area.' </strong></td>';
            echo '</tr>';
            $total_all += $total_area;

           //  exit;
        }

        echo '<tr>';
        echo '<td colspan="2" class="danger"> <strong>GRAND TOTAL</strong></td>';
        echo '<td align="right" class="danger"><strong> '.$total_all.' </strong></td>';
        echo '</tr>';

        exit;
    }
}

/* End of file Groups_controller.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class R_bil_area_controller {
 
    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','area');
        $sord = getVarClean('sord','str','asc');
        $periode = getVarClean('periode','str','');

        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance(); 
            $ci->load->model('report/r_bil_area');
            //$table = $ci->r_bil_complete_area;
             //$periode='201712';;
            $table = new r_bil_area($periode);

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
           $ci->load->model('report/r_bil_area');
            $table = new r_bil_area($periode);

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

            startExcel(date("dmy") . '_R_BIL_AREA.xls');
            echo '<html>';
            echo '<head><title>Billing per Area</title></head>';
            echo '<body>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Area</th>';
            echo '<th>FM</th>';
            echo '<th>BM</th>';
            echo '<th>Jumlah Bill Bulan N</th>';
            echo '<th>Jumlah Bill Bulan N-1</th>';
            echo '<th>Growth</th>';
            echo '</tr>';
            $i = 1;
            foreach ($items as $item) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . $item['area'] . '</td>';
                echo '<td>' . $item['fm'] . '</td>';
                echo '<td>' . $item['profit_center'] . '</td>';
                echo '<td>' . $item['jml_bulan_n'] . '</td>';
                echo '<td>' . $item['jml_bulan_n_1'] . '</td>';
                echo '<td>' . $item['jml_growth'] . '</td>';
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
    function tableBilComplete() {
        $periode = getVarClean('periode','str','');

        $ci = & get_instance();
        $ci->load->model('report/r_bil_area');

        $table = new R_bil_area($periode);

        $items = $table->getAll(0,-1,'area, fm, profit_center','asc');
        $data = array();
        $data2 = array();
        $data3 = array();
        foreach($items as $item) {
            $data[$item['area']][$item['fm']][$item['profit_center']][0] = $item['jml_bulan_n'];
            $data[$item['area']][$item['fm']][$item['profit_center']][1] = $item['jml_bulan_n_1'];
            $data[$item['area']][$item['fm']][$item['profit_center']][2] = $item['jml_growth'];
            $data2[$item['area']][$item['fm']] = 0;
            $data3[$item['area']][$item['profit_center']] = 0;
        }
        /*echo "<pre>";
        print_r($data);

        exit;*/

        $total_all_n = 0;
        $total_all_n_1 = 0;
        $total_all_growth = 0;
        foreach($data as $area => $items_fm) {
            echo '<tr>';
            echo '<td rowspan="'.( count($data3[$area]) + count($data2[$area]) ).'">'.$area.'</td>';

            $fm_first_loop = true;
            $total_area_n = 0;
            $total_area_n_1 = 0;
            $total_area_growth = 0;
            foreach($items_fm as $fm => $items_bm) {
                if($fm_first_loop) {
                    echo '<td rowspan='.count($items_bm).'>'.$fm.'</td>';
                    $fm_first_loop = false;
                }else {
                    echo '<tr>';
                    echo '<td rowspan='.count($items_bm).'>'.$fm.'</td>';
                }

                $bm_first_loop = true;
                $total_fm_n = 0;
                $total_fm_n_1 = 0;
                $total_fm_growth = 0;
                foreach($items_bm as $bm => $val) {
                    if($bm_first_loop) {
                        echo '<td>'.$bm.'</td>';
                        echo '<td align="right">'.$val[0].'</td>';
                        echo '<td align="right">'.$val[1].'</td>';
                        echo '<td align="right">'.$val[2].'</td>';
                        echo '</tr>';
                        $bm_first_loop = false;
                    }else {
                        echo '</tr>';
                        echo '<td>'.$bm.'</td>';
                        echo '<td align="right">'.$val[0].'</td>';
                        echo '<td align="right">'.$val[1].'</td>';
                        echo '<td align="right">'.$val[2].'</td>';
                        echo '</tr>';
                    }
                    $total_fm_n += $val[0];
                    $total_fm_n_1 += $val[1];
                    $total_fm_growth += $val[2];
                }

                echo '<tr>';
                echo '<td colspan="2" class="info"> <strong>Total '.$fm.'</strong></td>';
                echo '<td align="right" class="info"><strong> '.$total_fm_n.' </strong></td>';
                echo '<td align="right" class="info"><strong> '.$total_fm_n_1.' </strong></td>';
                echo '<td align="right" class="info"><strong> '.$total_fm_growth.' </strong></td>';
                echo '</tr>';

                $total_area_n += $total_fm_n;
                $total_area_n_1 += $total_fm_n_1;
                $total_area_growth += $total_fm_growth;
            }

            echo '<tr>';
            echo '<td colspan="3" class="success"> <strong>Total '.$area.'</strong></td>';
            echo '<td align="right" class="success"><strong> '.$total_area_n.' </strong></td>';
            echo '<td align="right" class="success"><strong> '.$total_area_n_1.' </strong></td>';
            echo '<td align="right" class="success"><strong> '.$total_area_growth.' </strong></td>';
            echo '</tr>';
            $total_all_n += $total_area_n;
            $total_all_n_1 += $total_area_n_1;
            $total_all_growth += $total_area_growth;
        }

        echo '<tr>';
        echo '<td colspan="3" class="danger"> <strong>GRAND TOTAL</strong></td>';
        echo '<td align="right" class="danger"><strong> '.$total_all_n.' </strong></td>';
        echo '<td align="right" class="danger"><strong> '.$total_all_n_1.' </strong></td>';
        echo '<td align="right" class="danger"><strong> '.$total_all_growth.' </strong></td>';
        echo '</tr>';

        exit;
    }
}

/* End of file Groups_controller.php */
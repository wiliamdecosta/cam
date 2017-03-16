<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();
    }

    function index() {
        check_login();
        $this->load->view('home/index');
    }


    function load_combo_budg ($id){

        $sql = "select n01 as budget_centre_seq,
                       s01 as budget_centre_name
                from table (pack_lov.get_budget_center_list('".getUserName()."','".$id."',''))
                ";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        $html = "";
        $html.="<select name='in_BudgetCenter' id='in_BudgetCenter'  class='form-control'>";
        foreach ($items as $data) {
          $html .=" <option value='" . $data['budget_centre_seq'] . "'>" . $data['budget_centre_name'] . "</option>";
        }
        $html .= "</select>";

        echo $html;
        exit;
    }

    function load_combo_acc ($id){

        $sql = "select n01 as cps_id,
                       s01 as cps_name
                from table (pack_lov.get_cps_list('".getUserName()."','".$id."',''))
                ";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        $html = "";
        $html.="<select name='in_BudgetCenter' id='in_BudgetCenter'  class='form-control required'>";
        foreach ($items as $data) {
          $html .=" <option value='" . $data['cps_id'] . "'>" . $data['cps_name'] . "</option>";
        }
        $html .= "</select>";

        echo $html;
        exit;
    }

    function load_content($id) {
        try {
            $file_exist = true;
            check_login();
            $id = str_replace('.php','',$id);
            $file = explode(".", $id);
            $url_file = "";
            if(count($file) > 1) {
                if(strtolower(substr($file[1],-4)) != ".php")
                    $file[1] .= ".php";
                if(file_exists(APPPATH."views/".$file[0].'/'.$file[1])) {
                    $this->load->view($file[0].'/'.$file[1]);
                }else {
                    $file_exist = false;
                }

                $url_file = APPPATH."views/".$file[0].'/'.$file[1];
            }else {
                if(strtolower(substr($id,-4)) != ".php")
                    $id .= ".php";

                if(file_exists(APPPATH."views/".$id)) {
                    $this->load->view($id);
                }else {
                    $file_exist = false;
                }

                $url_file = APPPATH."views/".$id;
            }

            if(!$file_exist) {
                $this->load->view("error_404.php");
            }

        }catch(Exception $e) {
            echo "
                <script>
                    swal({
                      title: 'Session Timeout',
                      text: '".$e->getMessage()."',
                      html: true,
                      type: 'error'
                    });
                </script>
            ";
            exit;
        }
    }

    function load_html($id) {
        $sql = "select  n01 as product_id ,
                  n02 as product_attribute_subid ,
                  s01 as attribute_ua_name,
                  s02 as attribute_bill_name,
                  s03 as mandatory_boo,
                  s04 as attribute_units,
                  n03 as display_position 
               from table(pack_lov.get_prodattr_list_byprodid('".getUserName()."', ".$id.",''))
               order by display_position asc";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        // print_r($items);
        $htlm = genAttributesHTML($items);
        
        echo $htlm;
        exit;
    }

}
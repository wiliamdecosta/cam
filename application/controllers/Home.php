<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('lov/Customer', 'cust');
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
        $html.="<select name='in_cps' id='in_cps'  class='form-control required'>";
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
                  n03 as display_position,
                  s05 as val_type,
                  s06 as val_refference
               from table(pack_lov.get_prodattr_list_byprodid('".getUserName()."', ".$id.",''))
               order by display_position asc";
        $query = $this->db->query($sql);
        $items = $query->result_array();
        // print_r($items);
        $htlm = genAttributesHTML($items);

        echo $htlm;
        exit;
    }

    function gen_con(){
        $sql = "select pack_lov.f_get_order_num ('".getUserName()."') as jml from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        return $items->jml; 
        // echo json_encode($items);
        // exit;
    }

    function gen_prod($idd){
        $sql = "select pack_lov.f_get_product_label ('".getUserName()."', '".$idd."') as jml from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        echo json_encode($items);
        exit;
    }

    function save_product(){
        // die($this->input->post('wizard5_initiation_price'));
        // exit;
        logging('save data product');
        /**
         * Upload file
         */

        $filesCount = count($_FILES['attributesImage']['tmp_name']);
        $uploadPath = 'application/third_party/uploads';

        $upload_data = array();
        $attrSubId = array();
        $countAttrSubId = count($this->input->post('subAttributesId'));
        if($countAttrSubId > 0){
          $attrSubId = $this->input->post('subAttributesId');
        }

        
        // die('test');
        $i_Order_Type = 'ZXAO';
        // $i_Order_No = $this->input->post('in_Customer_Order_Number');
        $i_Order_No = $this->gen_con();
        var_dump($i_Order_No); exit;
        $i_Customer_Ref = $this->input->post('wizard1_customer_ref');
        $i_Account_Num = $this->input->post('wizard1_account_num');
        $i_Product_Id = $this->input->post('wizard2_product_id');
        $i_UserName = getUserName();
        $i_orderHeader = "<?xml version='1.0'?>
            <orderHeader>
              <orderType>ZXAO</orderType>
              <orderSubType></orderSubType>
              <orderCode>AO</orderCode>
              <orderId>".$this->input->post('in_Customer_Order_Number')."</orderId>
              <orderDate>".change_date_format($this->input->post('in_Start_Date_Time'))."</orderDate>
              <soldToParty>".$this->input->post('wizard1_customer_ref')."</soldToParty>
              <org></org>
              <bundling>F</bundling>
              <bundlingRef></bundlingRef>
              <DC>DBS</DC>
            </orderHeader>";

        $prod = "";
        $attrId = array();
        $attrType = array();
        $attr = array();
        $attrId = $this->input->post('attributesId');
        $attrType = $this->input->post('attributesType');
        $attr = $this->input->post('attributes');


        for($i=0; $i<count($attrId); $i++){
             $prod .= "<productAttribute>";
             $prod .= "<attrName>".$attrId[$i]."</attrName>";
             $prod .= "<attrType>".$attrType[$i]."</attrType>";
             if($attrType[$i] == 'D'){
                if(!empty($attr[$i])){
                    $date = DateTime::createFromFormat('d/m/Y', $attr[$i]);
                    $attr[$i] = $date->format('Ymd');
                }
                
             }
             $prod .= "<attrValue>".$attr[$i]."</attrValue>";
             $prod .= "</productAttribute>";
        }
        // die($prod);
        $i_orderDoc = "<?xml version='1.0'?>
                            <products>
                              <product>
                                <currency>IDR</currency>
                                <ppnEffectiveDat>".change_date_format($this->input->post('in_Start_Date_Time'))."</ppnEffectiveDat>
                                <customerRef>".$this->input->post('wizard1_customer_ref')."</customerRef>
                                <accountNum>".$this->input->post('wizard1_account_num')."</accountNum>
                                <productId>".$this->input->post('wizard2_product_id')."</productId>
                                <parentProductId>".$this->input->post('wizard1_parent_product_id')."</parentProductId>
                                <tariffId>".$this->input->post('wizard2_tariff_id')."</tariffId>
                                <competitorTariffId></competitorTariffId>
                                <subscriptionRef></subscriptionRef>
                                <supplierOrderNumber>".$this->input->post('in_Supplier_Order_Number')."</supplierOrderNumber>
                                <custOrderNumber>".$this->input->post('in_Customer_Order_Number')."</custOrderNumber>
                                <productLabel>".$this->input->post('in_Product_Label')."</productLabel>
                                <startDtm>".change_date_format($this->input->post('in_Start_Date_Time'))."</startDtm>
                                <endDtm></endDtm>
                                <productStatus>OK</productStatus>
                                <statusReason>Aktivasi</statusReason>
                                <cpsId>".$this->input->post('in_cps')."</cpsId>
                                <budgetCentreSeq>".$this->input->post('in_BudgetCenter')."</budgetCentreSeq>
                                <productQty>".$this->input->post('in_Product_Quantity')."</productQty>
                                <productPrice>
                                  <customerRef>".$this->input->post('wizard1_customer_ref')."</customerRef>
                                  <productId>".$this->input->post('wizard2_product_id')."</productId>
                                  <startDate>".change_date_format($this->input->post('wizard5_in_Start_Date'))."</startDate>
                                  <endDate>".change_date_format($this->input->post('wizard5_in_End_Date'))."</endDate>
                                  <productSeq></productSeq>
                                  <overrideType>".$this->input->post('recurring_mod_type_id')."</overrideType>
                                  <initiationCharge>".str_replace(",","",$this->input->post('wizard5_initiation_price'))."</initiationCharge>
                                  <recurringModTypeId>".$this->input->post('recurring_mod_type_id')."</recurringModTypeId>
                                  <recurringCharge>".str_replace(",","",$this->input->post('wizard5_periodic_price'))."</recurringCharge>
                                  <suspModTypeId>".$this->input->post('susp_mod_type_id')."</suspModTypeId>
                                  <suspCharge>".str_replace(",","",$this->input->post('wizard5_suspesion_price'))."</suspCharge>
                                  <suspRecurModTypeId>".$this->input->post('susp_recur_mod_type_id')."</suspRecurModTypeId>
                                  <suspRecurringCharge>".str_replace(",","",$this->input->post('wizard5_susp_recur_price'))."</suspRecurringCharge>
                                  <terminationModTypeId>".$this->input->post('termination_mod_type_id')."</terminationModTypeId>
                                  <termCharge>".str_replace(",","",$this->input->post('wizard5_termination_price'))."</termCharge>
                                  <reactModTypeId>".$this->input->post('react_mod_type_id')."</reactModTypeId>
                                  <reactivationCharge>".str_replace(",","",$this->input->post('wizard5_react_price'))."</reactivationCharge>
                                  <reactCharge></reactCharge>
                                  <earlyTermCharge></earlyTermCharge>
                                </productPrice>
                                <installationAddr>
                                  <addr1>".$this->input->post('wizard5_in_Address_line1')."</addr1>
                                  <addr2>".$this->input->post('wizard5_in_Address_line2')."</addr2>
                                  <addr3>".$this->input->post('wizard5_in_City')."</addr3>
                                  <addr4>".$this->input->post('wizard5_in_Additional_address_1')."</addr4>
                                  <addr5>".$this->input->post('wizard5_in_Additional_address_2')."</addr5>
                                  <postCode>".$this->input->post('wizard5_in_Zip_Code')."</postCode>
                                  <country>".$this->input->post('wizard5_country_code')."</country>
                                </installationAddr>
                                <productAttributes>
                                ".$prod."
                                </productAttributes>
                              </product>
                            </products>";

            $sql = "BEGIN "
                    . " TLKCAMWEBINTERFACE.CreateOrderAO ("
                    . " :i_Order_Type, "
                    . " :i_Order_No, "
                    . " :i_Customer_Ref, "
                    . " :i_Account_Num, "
                    . " :i_UserName, "
                    . " :i_orderHeader, "
                    . " :i_orderDoc, "
                    . " :o_orderStatus, "
                    . " :o_productSeq "
                    . "); END;";

            // var_dump($this->cust->db->conn_id);
            // exit;
            $stmt = oci_parse($this->cust->db->conn_id, $sql);

            //  Bind the input parameter
            oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
            oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
            oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
            oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
            oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
            oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
            oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

            // Bind the output parameter
            oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);
            oci_bind_by_name($stmt, ':o_productSeq', $o_productSeq, 2000000);

            ociexecute($stmt);

            $dt = array('status' => $o_orderStatus,
                        'product_seq' => $o_productSeq,
                        'msg'=>null);

            if($dt['status'] == 'COMPLETED'){
                $stringMsg = '';
                for($i = 0; $i < $filesCount; $i++){

                      if(empty($_FILES['attributesImage']['name'][$i])) continue;
                      $_FILES['uploadfile']['name'] = date("Ymdhis").'_'.$attrId[$i].'_'.str_replace(" ","_",$_FILES['attributesImage']['name'][$i]);            
                      $_FILES['uploadfile']['type'] = $_FILES['attributesImage']['type'][$i];
                      $_FILES['uploadfile']['tmp_name'] = $_FILES['attributesImage']['tmp_name'][$i];
                      $_FILES['uploadfile']['error'] = $_FILES['attributesImage']['error'][$i];
                      $_FILES['uploadfile']['size'] = $_FILES['attributesImage']['size'][$i];

                      $config['overwrite'] = TRUE; //overwrite user avatar
                      $config['remove_spaces'] = FALSE; //overwrite user avatar
                      $config['upload_path'] = $uploadPath;
                      $config['allowed_types'] = 'doc|pdf|png|jpg|jpeg|txt|docx|xlsx|xls';

                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);
                      if(!$this->upload->do_upload('uploadfile')){
                           // $dt = array('status' => 'UPLOAD FAILED');

                           // echo json_encode($dt);
                           // exit;
                          $stringMsg .= 'Upload File (failed) '.$_FILES['uploadfile']['name'].' : FAILED <br>';
                      }else{
                        $sqlupload = "BEGIN "
                                  . " TLKCAMWEBINTERFACE.FileUploaded ("
                                  . " :pIn_Order_No, "
                                  . " :pIn_Customer_Ref, "
                                  . " :pIn_Account_Num, "
                                  . " :pIn_UserName, "
                                  . " :pIn_ProductSeq, "
                                  . " :pIn_Productid, "
                                  . " :pIn_ProdAttrSubid, "
                                  . " :pIn_FileName, "
                                  . " :pIn_OrigFilename, "
                                  . " :pIn_FileDir, "
                                  . " :pOut_Status "
                                  . "); END;";

                        $stmt = oci_parse($this->cust->db->conn_id, $sqlupload);

                        //  Bind the input parameter
                        oci_bind_by_name($stmt, ':pIn_Order_No', $i_Order_No);
                        oci_bind_by_name($stmt, ':pIn_Customer_Ref', $i_Customer_Ref);
                        oci_bind_by_name($stmt, ':pIn_Account_Num', $i_Account_Num);
                        oci_bind_by_name($stmt, ':pIn_UserName', $i_UserName);
                        oci_bind_by_name($stmt, ':pIn_ProductSeq', $o_productSeq);
                        oci_bind_by_name($stmt, ':pIn_Productid', $i_Product_Id);
                        oci_bind_by_name($stmt, ':pIn_ProdAttrSubid', $attrSubId[$i]);
                        oci_bind_by_name($stmt, ':pIn_FileName', $_FILES['uploadfile']['name']);
                        oci_bind_by_name($stmt, ':pIn_OrigFilename', $_FILES['attributesImage']['name'][$i]);
                        oci_bind_by_name($stmt, ':pIn_FileDir', $uploadPath);

                        // Bind the output parameter
                        oci_bind_by_name($stmt, ':pOut_Status', $pOut_Status, 2000000);

                        ociexecute($stmt);

                        $stringMsg .= 'Upload File (success) '.$_FILES['attributesImage']['name'][$i].' : '.$pOut_Status.'<br>';

                      }
                      
                }

                 $dt['msg'] = $stringMsg;
            }

            echo json_encode($dt);
            exit;

    }

    function get_date(){
        $sql = "select to_char(pack_lov.get_system_date, 'DD/MM/YYYY') dates from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        echo json_encode($items);
        exit;
    }

}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'language'));
        $this->load->model('M_helper');
    }

    function index() { 
        check_login();
    }

    function gen_con(){
        $sql = "select pack_lov.f_get_order_num ('".getUserName()."') as jml from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        return $items->jml; 
    }

    function reactivate_product(){
        $productStatus = $this->input->post('prod_status_code1');
        $product_label = $this->input->post('product_label');
        $current_effective_dtm = str_replace('-','',$this->input->post('current_effective_dtm'));

        $i_Order_Type = 'ZROS';
        $i_Order_No = $this->gen_con();
        $i_Customer_Ref = $this->input->post('customer_ref');
        $i_Account_Num = $this->input->post('account_num');
        $i_Product_Seq = $this->input->post('product_seq');
        $i_UserName = getUserName();
        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType></orderSubType>
                              <orderCode>RO</orderCode>
                              <orderId>".$i_Order_No."</orderId>
                              <previousOrderId></previousOrderId>
                              <orderDate>".date('Ymd')."</orderDate>
                              <soldToParty>".$i_Customer_Ref."</soldToParty>
                              <org></org>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DIVES</DC>
                            </orderHeader>";

        $i_orderDoc = "<?xml version='1.0'?>
                        <productStatus>
                          <customerRef>".$i_Customer_Ref."</customerRef>
                          <productSeq>".$i_Product_Seq."</productSeq>
                          <productStatus>".$productStatus."</productStatus>
                          <custOrderNumber>".$i_Order_No."</custOrderNumber>
                          <productLabel>".$product_label."</productLabel>
                          <startDate>".$current_effective_dtm."</startDate>
                          <endDate></endDate>
                          <statusReason>Resumption</statusReason>
                        </productStatus>";
        // die($i_orderDoc); exit;

        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.CreateOrderRO ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_Account_Num, "
                . " :i_Product_Seq, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
        oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
        oci_bind_by_name($stmt, ':i_Product_Seq', $i_Product_Seq);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;

    }

    function suspend_product(){
        $productStatus = $this->input->post('prod_status_code1');
        $product_label = $this->input->post('product_label');
        $current_effective_dtm = str_replace('-','',$this->input->post('eff_from'));

        $i_Order_Type = 'ZSOS';
        $i_Order_No = $this->gen_con();
        $i_Customer_Ref = $this->input->post('customer_ref');
        $i_Account_Num = $this->input->post('account_num');
        $i_Product_Seq = $this->input->post('product_seq');
        $i_UserName = getUserName();
        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType></orderSubType>
                              <orderCode>RO</orderCode>
                              <orderId>".$i_Order_No."</orderId>
                              <previousOrderId></previousOrderId>
                              <orderDate>".date('Ymd')."</orderDate>
                              <soldToParty>".$i_Customer_Ref."</soldToParty>
                              <org></org>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DIVES</DC>
                            </orderHeader>";
        $i_orderDoc = "<?xml version='1.0'?>
                        <productStatus>
                          <customerRef>".$i_Customer_Ref."</customerRef>
                          <productSeq>".$i_Product_Seq."</productSeq>
                          <productStatus>SU</productStatus>
                          <custOrderNumber>".$i_Order_No."</custOrderNumber>
                          <startDate>".$current_effective_dtm."</startDate>
                          <endDate/>
                          <statusReason>Suspension</statusReason>
                        </productStatus>";

        //die($i_orderDoc); exit;


        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.CreateOrderSO ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_Account_Num, "
                . " :i_Product_Seq, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
        oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
        oci_bind_by_name($stmt, ':i_Product_Seq', $i_Product_Seq);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;

    }


    function terminate_product(){
        $productStatus = $this->input->post('prod_status_code1');
        //$product_label = $this->input->post('product_label');
        $current_effective_dtm = str_replace('-','',$this->input->post('current_effective_dtm'));

        $i_Order_Type = 'ZXDO';
        $i_Order_No = $this->gen_con();
        $i_Customer_Ref = $this->input->post('customer_ref');
        $i_Account_Num = $this->input->post('account_num');
        $i_Product_Seq = $this->input->post('product_seq');
        $i_UserName = getUserName();

        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType></orderSubType>
                              <orderCode>DO</orderCode>
                              <orderId>".$i_Order_No."</orderId>
                              <previousOrderId></previousOrderId>
                              <orderDate>".date('Ymd')."</orderDate>
                              <soldToParty>".$i_Customer_Ref."</soldToParty>
                              <org></org>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DBS</DC>
                            </orderHeader>";

        $i_orderDoc = "<?xml version='1.0'?>
                        <productStatus>
                          <customerRef>".$i_Customer_Ref."</customerRef>
                          <productSeq>".$i_Product_Seq."</productSeq>
                          <productStatus>".$productStatus."</productStatus>
                          <custOrderNumber>".$i_Order_No."</custOrderNumber>
                          <startDate>".$current_effective_dtm."</startDate>
                          <endDate></endDate>
                          <statusReason>Deaktivasi</statusReason>
                        </productStatus>";
         //die($i_orderDoc); exit;

        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.CreateOrderDO ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_Account_Num, "
                . " :i_Product_Seq, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
        oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
        oci_bind_by_name($stmt, ':i_Product_Seq', $i_Product_Seq);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;

    }

    function delete_product(){
        $i_Order_Type = 'ZXDEL';
        $i_Order_No = $this->gen_con();
        $i_Customer_Ref = $this->input->post('customer_ref');
        $i_Account_Num = $this->input->post('account_num');
        $i_Product_Seq = $this->input->post('product_seq');
        $i_UserName = getUserName();
        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType></orderSubType>
                              <orderCode>DEL</orderCode>
                              <orderId>".$i_Order_No."</orderId>
                              <previousOrderId></previousOrderId>
                              <orderDate>".date('Ymd')."</orderDate>
                              <soldToParty>".$i_Customer_Ref."</soldToParty>
                              <org></org>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DBS</DC>
                            </orderHeader>";
        $i_orderDoc = "<?xml version='1.0'?>
                        <productStatus>
                          <customerRef>".$i_Customer_Ref."</customerRef>
                          <productSeq>".$i_Product_Seq."</productSeq>
                          <productStatus>DEL</productStatus>
                          <custOrderNumber>".$i_Order_No."</custOrderNumber>
                          <startDate>".date('Ymd h:i:s')."</startDate>
                          <endDate></endDate>
                          <statusReason>Deletion</statusReason>
                        </productStatus>";
        // die($i_orderHeader); exit;

        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.CreateOrderDEL ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_Account_Num, "
                . " :i_Product_Seq, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
        oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
        oci_bind_by_name($stmt, ':i_Product_Seq', $i_Product_Seq);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;

    }


}
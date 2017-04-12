<?php

/**
 * Pembuatan schema Model
 *
 */
class Product extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array(


                            );
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " ACCOUNT_NUM, 
                                ACCOUNT_NAME , 
                                CUSTOMER_REF , 
                                PRODUCT_SEQ , 
                                PRODUCT_NAME , 
                                PRODUCT_LABEL , 
                                START_DAT ,  
                                END_DAT ,          
                                CUST_ORDER_NUM ,  
                                CURRENCY_CODE ,  
                                INSTALL ,  
                                ABONEMEN ,  
                                PRODUCT_ID , 
                                PARENT_PRODUCT_SEQ , 
                                KONTRAK , 
                                KONTRAK_START_DAT ,  
                                KONTRAK_END_DAT ,  
                                BA ,  
                                PROFIT_CENTER ";

    public $fromClause      = "( select   s01 as ACCOUNT_NUM, 
                                          s02 as ACCOUNT_NAME , 
                                          s03 as CUSTOMER_REF , 
                                          n01 as PRODUCT_SEQ , 
                                          s04 as PRODUCT_NAME , 
                                          s05 as PRODUCT_LABEL , 
                                          s06 as START_DAT ,  
                                          s07 as END_DAT ,          
                                          s08 as CUST_ORDER_NUM ,  
                                          s09 as CURRENCY_CODE ,  
                                          n04 as INSTALL ,  
                                          n05 as ABONEMEN ,  
                                          n02 as PRODUCT_ID , 
                                          n03 as PARENT_PRODUCT_SEQ , 
                                          s12 as KONTRAK , 
                                          s13 as KONTRAK_START_DAT ,  
                                          s14 as KONTRAK_END_DAT ,  
                                          s15 as BA ,  
                                          s16 as PROFIT_CENTER 
                                from table(pack_list_cust_acc_prod.product_list(%s ,null, null,''))
                                                                 ) ct ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'"); 

        $this->db_crm = $this->load->database('corecrm', TRUE);
        $this->db_crm->_escape_char = ' ';
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

        }
        return true;
    }

    public function genCustReff(){

        $prefix = (int)$this->input->post('prefix');
        //print_r($prefix);
        //exit;
        $sql = " DECLARE " .
            "  BEGIN " .
            "  SIN_CORE.SINCUSTOMER.GENCUSTOMERREF(:params1,:cursor); END;";

        $params = array(
            array('name' => ':params1', 'value' => $prefix, 'type' => SQLT_INT, 'length' => 11),
        );

        // Bind the output parameter
        $stmt = oci_parse($this->db_crm->conn_id, $sql);
        foreach ($params as $p) {
            // Bind Input
            oci_bind_by_name($stmt, $p['name'], $p['value'], $p['length']);
        }

        $cursor = oci_new_cursor($this->db_crm->conn_id);

        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt, OCI_DEFAULT);
        oci_execute($cursor, OCI_DEFAULT);

        oci_fetch_all($cursor, $res);
        echo json_encode($res);
    }

    public function getDetailProduct($customer_ref, $product_seq){
        $sql = "select  s01 as product_name, 
                        s02 as cust_order_num , 
                        s03 as supplier_order_num , 
                        s04 as package_name , 
                        s05 as parent_prod_name , 
                        s06 as prod_billed_to ,  
                        s07 as chg_alow_from ,          
                        s08 as cur_product_status ,  
                        s09 as inv_co_name 
                     from table(pack_list_cust_acc_prod.product_details_product('".$this->session->userdata('user_name')."','".$customer_ref."', ".$product_seq."))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getReactivateProduct($customer_ref, $product_seq){
        $sql = "select  s01 as current_effective_dtm, 
                        s02 as current_status , 
                        s03 as current__reason_txt ,
                        s04 as prod_status_code
                     from table(pack_list_cust_acc_prod.product_details_status('".$this->session->userdata('user_name')."','".$customer_ref."', ".$product_seq."))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getReactivateProductCurr($customer_ref, $product_seq){
        $sql = "select  s01 as current_effective_dtm, 
                        s02 as current_status , 
                        s03 as current__reason_txt ,
                        s04 as prod_status_code
                     from table(pack_list_cust_acc_prod.product_det_current_status('".$this->session->userdata('user_name')."','".$customer_ref."', ".$product_seq."))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


    public function getFinance($customer_ref, $product_seq){
        $sql = "select    s01 as account_num,
                          s02 as subscription ,
                          s03 as budget_centre_name ,
                          s04 as contract_reff ,
                          s05 as product_label ,
                          s06 as cps_name ,
                          s07 as tax_exempt_ref ,
                          s08 as tax_exempt_txt ,
                          s09 as contact_name ,
                          s10 as daytime_contact_tel ,
                          s11 as evening_contact_tel ,
                          s12 as fax_contact_tel ,
                          s13 as mobile_contact_tel ,
                          s14 as email ,
                          s21 as adress,
                          n01 as cps_id,
                          n02 as budget_centre_seq
                     from table(pack_list_cust_acc_prod.product_details_finance('".$this->session->userdata('user_name')."','".$customer_ref."', ".$product_seq."))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

}

/* End of file Users.php */

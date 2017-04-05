<?php

/**
 * Pembuatan schema Model
 *
 */
class Customer extends Abstract_model {

    public $table           = "customer";
    public $pkey            = "customer_ref";
    public $alias           = "cust";

    public $fields          = array(


                            );
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " ct.customer_ref ,
                                ct.ADDRESS_NAME ,
                                ct.FIRST_NAME ,
                                ct.LAST_NAME ,
                                ct.SALUTATION_NAME ,
                                ct.MARKET_SEGMENT_NAME ,
                                ct.INVOICING_CO_NAME ,
                                ct.MARKET_SEGMENT_ID ,
                                ct.PARENT_CUSTOMER_REF,
                                ct.INVOICING_CO_ID,
                                '-' as account_num,
                                '-' as account_name";
    public $fromClause      = "( select s01 as customer_ref ,
                                        s21 as ADDRESS_NAME ,
                                        s02 as FIRST_NAME ,
                                        s03 as LAST_NAME ,
                                        s22 as SALUTATION_NAME ,
                                        s05 as MARKET_SEGMENT_NAME ,
                                        s06 as INVOICING_CO_NAME ,
                                        s07 as SAP_CODE_BILL ,
                                        s08 as SAP_CODE_UNBILL ,
                                        n01 as MARKET_SEGMENT_ID ,
                                        s04 as PARENT_CUSTOMER_REF ,
                                        n02 as INVOICING_CO_ID
                                 from table(pack_list_cust_acc_prod.customer_list(%s, ''))
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


     public function getDetailCustomer($customer_ref = ''){
        $sql = "select s01 as customer_ref,
          s02 as customer_name,
          s03 as parent_customer_ref,
          s04 as parent_customer_name,
          n03 as customer_type_id,
          s05 as customer_type_name,
          s06 as provider_name,
          s07 as password,
          n05 as invoicing_co_id,
          s08 as invoicing_co_name,
          n04 as market_segment_id,
          s09 as market_segment_name,
          s10 as tax_exempt_ref,
          s11 as vat_registration,
          s12 as is_hirarcy_bill,
          n01 as bill_period,
          s13 as bill_period_units,
          s14 as next_bill_dtm,
          n01 as bills_per_statement
            from table(pack_list_cust_acc_prod.customer_details_customer('".$this->session->userdata('user_name')."','".$customer_ref."'))";
        $query = $this->db->query($sql);

        return $query->row_array();
    }

    public function getContactDetails($customer_ref = ''){
        $sql = "select    s01 as customer_name,
          s21 as address,
          s02 as email_address,
          s03 as daytime_contact_tel,
          s04 as evening_contact_tel,
          s05 as mobile_contact_tel,
          s06 as fax_contact_tel
        from table(pack_list_cust_acc_prod.customer_details_contact('".$this->session->userdata('user_name')."','".$customer_ref."'))";
        $query = $this->db->query($sql);

        return $query->row_array();
    }


    public function getContactAddressDetails($customer_ref = '') {
        $sql = "select s21 as customer_name,
                        s01 as first_name,
                        s02 as last_name,
                        s03 as initials,
                        s04 as evening_contact_tel,
                        s05 as mobile_contact_tel,
                        s06 as fax_contact_tel,
                        s07 as customer_ref,
                        n01 as contact_type_id,
                        s08 as contact_type_name,
                        s09 as email_address,
                        s10 as daytime_contact_tel,
                        s11 as street_name,
                        s12 as block_name,
                        s13 as city_name,
                        s14 as district_name,
                        s15 as province,
                        s16 as country_name,
                        n02 as country_id,
                        s17 as zipcode,
                        s18 as title,
                        s22 as salutation_name
                     from table(pack_list_cust_acc_prod.customer_details_contact_addr('".$this->session->userdata('user_name')."','".$customer_ref."'))";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getCustomerDetailAttribute($customer_ref = '') {
        $sql = "select   s01 as sap_code_bill,
                s02 as sap_code_unbill,
                s03 as sold2party
              from table(pack_list_cust_acc_prod.customer_details_attribute('".$this->session->userdata('user_name')."','".$customer_ref."'))";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

}

/* End of file Users.php */
